<?php

namespace App\Http\Controllers;

use App\Project;
use App\Category;
use App\Category_Project;
use App\Image;
use App\Models\ImageService;
use ImageTool;
use DB;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    
    //
    public function getProjectHighlight(){
        

       // $Projects = Project::with('category', 'featured')->toSql();
        $Projects = Project::whereHas('categories', function($query){
            $query->where('category', '=', 'Highlight');
        });

        $Projects->whereHas('images', function($query){
            $query->where('type', '=', 'featured');
        });

        $Projects = $Projects->get();

        return view('project-highlight')
            ->with('Projects',  $Projects)
            ->with('pagename', 'highlight')
            ;
    }

    public function getSpecialProjects($categoryid){
        $aboutSection = 'Machine Shop have been developing and creating interactive and one off creations for as long as we can remember. Our Special Projects division was founded to make use of our diverse knowledge and experience. From the smallest visual detail to the most complex mechanical system we offer a complete service to bring your crazy ideas to life. Each project is considered to make the most of the creative idea whilst maintaining realism in budgeting. From initial ideas through 3D CAD, modelling, prototyping, software development and soak testing to complete production runs, our team are simply unfazed by the impossible.' ;   
        $subCategoryItems  =  $this->getSubCategoryItems(9);

       return  $this->getProjectList('Special Projects', 'special-projects', $aboutSection, $categoryid, $subCategoryItems  );
    }

    public function getSubCategoryItems($categoryid){
            //get any sub categories for the specials
        $subCategoryItems = Category::where('parentCategory_id', 1)->get();


        // DB::table('Projecttree')
        //    	->join('Projecttocategory', 'Projecttocategory.categoryid', '=', 'Projecttree.childid')
        //    	->join('Projectcategory', 'Projecttocategory.categoryid', '=', 'Projectcategory.categoryid')
        //    	->select('Projecttree.childid, Projecttocategory.category , Projecttocategory.categoryid ')
        //    	->where('Projecttree.parentid', '=', $categoryid);
        return  $subCategoryItems;
     }   

    public function getSpecialEffectsProjects($categoryid){
        $aboutSection = 'Machine Shop Special Effects provides a range of live atmospheric and pyrotechnic floor-effects with our reliable and experienced team of technicians. We also offer superior modelmaking and animatronics services from our team of in-house specialists.' ;   
    	$subCategoryItems  =  $this->getSubCategoryItems(1);
       	return  $this->getProjectList('Special Effects', 'special-effects', $aboutSection, $categoryid , $subCategoryItems);
    }


    public function getProjectList($pagetitle, $pagename, $aboutSection, $categoryid, $subCategoryItems){
       
        $Projects = Project::paginate(10);



        // DB::table('Project')
           
        //     ->join('Projecttocategory' , 'Projecttocategory.ProjectID', '=', 'Project.ProjectID')
        //     ->whereRaw("Projecttocategory.categoryid = ? OR Projecttocategory.categoryid IN (SELECT childid FROM Projecttree WHERE parentid = ?)" ,  [$categoryid,$categoryid ])
        //     ->select('Project.*')
        //     ->paginate(10);

       return view('view-projects')
            ->with('Projects', $Projects)
            ->with('pagename',  $pagename)
            ->with('pagetitle',  $pagetitle)
            ->with('aboutSection', $aboutSection)
            ->with('subCategoryItems', $subCategoryItems); 
    }

    public function getViewProject($Projectid){
        $Project = Project::find($Projectid);
        return view('view-project') 
            ->with('Project', $Project);
    }

    public function getNews(){
       return view('news') ->with('pagelink', 'news');
    }

    public function getAbout(){
       return view('about');
    }




    public function getImageByType($Project, $type){
        foreach($Project->images as $image){
            if($image->type == $type){
                return $image;
            }
        }  
    }

    public function updateImages($request, $Project){
        $alphaHeading = preg_replace('/[^a-z\d ]/i', '', $request->heading);
        $alphaHeading = str_replace(' ', '_', $alphaHeading  );
        $path = public_path('img/article/' . $Project->id . '/');
        if(!file_exists( $path)){
            mkdir($path);
        }
        //Save featured
        if($request->hasFile('featured_image')){
            $imageToUpload = $request->file('featured_image');
            $this->updateImage( $imageToUpload, 'featured', $Project, $path , $alphaHeading, 1920, 1080);
        }  
        if($request->hasFile('thumb_image')){
            $imageToUpload = $request->file('thumb_image');
            $this->updateImage( $imageToUpload, 'thumb', $Project, $path, $alphaHeading, 340, 310);
        }  

    }

    public function updateImage($imageToUpload, $type, $Project , $path, $alphaHeading, $width, $height){
        //First clear out any featured images which already exist.
        $currentImage = $this->getImageByType($Project, $type);
        if(!is_null($currentImage )){
            $currentlocation =  $path . $currentImage->filename;
            if(file_exists( $currentlocation)){
                unlink($currentlocation); 
            }
            $currentImage->delete();
        }
        $filename = $alphaHeading . time() . '.' .  $imageToUpload->getClientOriginalExtension();
        $location =  $path . $filename;
        
        ImageTool::make($imageToUpload)->fit( $width, $height)->save($location);
        $image = new Image;
        $image->filename =  $filename;
        $image->type =  $type;
        $Project->images()->save($image);
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $Projects = Project::orderBy('projectid', 'desc');
        $Projects = Project::all();
        return view('project.index')->with('Projects', $Projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $Categories = Category::all();
        return view('project.create')->with('Categories', $Categories);
    }

   


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validate
        $this->validate($request, array(
                'heading' => 'required|max:255'
         ));
        //Store


        $Project = new Project;
        $Project->heading = $request->heading;
        $Project->subheading = $request->subheading;
        $Project->detail = $request->detail;
        $Project->youtubelink = $request->youtubelink;

        $alphaHeading = preg_replace('/[^a-z\d ]/i', '', $request->heading);
        $alphaHeading = str_replace(' ', '_', $alphaHeading  );

        $Project->save();

        $path = public_path('img/article/' . $Project->id . '/');
        if(!file_exists( $path)){
            mkdir($path);
        }

        //Save carousel
        if($request->hasFile('thumb_image')){
            $imageToUpload = $request->file('carousel_image');
            ImageService::saveCarouselImage($imageToUpload);
        }
   



        //Save featured

        if($request->hasFile('featured_image')){
            $imageToUpload = $request->file('featured_image');
            $filename = $alphaHeading . time() . '.' .  $imageToUpload->getClientOriginalExtension();
            $location =  $path . $filename;
            ImageTool::make($imageToUpload)->fit(1920,1080) ->save($location);
        }
        $image = new Image;
        $image->filename =  $filename;
        $image->type =  'featured';
        $Project->images()->save($image);


        //Save featured
        if($request->hasFile('thumb_image')){
            $imageToUpload = $request->file('thumb_image');
            $filename = $alphaHeading . time() . 'THUMB' . '.' .  $imageToUpload->getClientOriginalExtension();
            $location =  $path . $filename;
            ImageTool::make($imageToUpload)->fit(340,310) ->save($location);
        }
        $image = new Image;
        $image->filename =  $filename;
        $image->type =  'thumb';
        $Project->images()->save($image);





        //Add links to categorys

        if( $request->category1 != ''){
           $this->createCatgoryProjectLink($Project->id, (int)$request->category1);
        }

        //Redirect to the edit page just in case they wish to edit the item they just added
        return redirect()->route('project.edit', $Project->id);
    }

    public function createCatgoryProjectLink($projectid,$categoryid)
    {
        $Category_Project = new Category_Project();
        $Category_Project->project_id = $projectid;
        $Category_Project->category_id = $categoryid;
        $Category_Project->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function show($projectid)
    {
        var_dump('SHOW');
        exit();

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function edit($projectid)
    {
        //Get post
        $Project = Project::find($projectid);
        $Categories = Category::all();
        //Return the view and pass in the item
        return view('project.edit')
            ->with('Project', $Project)
            ->with('Categories', $Categories)
           ;
    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
         //Validate
        $this->validate($request, array(
                'heading' => 'required|max:255'
         ));
        //Store

        $Project = Project::find($id);
        $Project->heading = $request->heading;
        $Project->subheading = $request->subheading;
        $Project->detail = $request->detail;
        $Project->youtubelink = $request->youtubelink;

        $Project->save();
        
        //Update images
        $this->updateImages($request, $Project);
  

        //Add links to categorys

        if( $request->category1 != ''){
           $this->createCatgoryProjectLink($Project->id, (int)$request->category1);
        }

        //Redirect to the edit page just in case they wish to edit the item they just added
        return redirect()->route('project.edit', $Project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $Project)
    {
        //
    }
}
