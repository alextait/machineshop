<?php

namespace App\Http\Controllers;

use App\Project;
use App\Category;
use App\Category_Project;
use App\Image;
use App\Models\ImageService;
use App\Tag;
use ImageTool;
use DB;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
  /**
     * Instantiate a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
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
            
            ImageService::saveFeaturedImage($imageToUpload, $request->heading, $Project->id);
        }  

        if($request->hasFile('thumb_image')){
            $imageToUpload = $request->file('thumb_image');
            ImageService::saveThumbImage($imageToUpload, $request->heading, $Project->id);
        }  

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $Categories = Category::all();
        $tags = Tag::all();
        return view('project.create')->with('Categories', $Categories)->with('tags', $tags);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        //Validate
        $this->validate($request, array(
                'heading' => 'required|max:255'
         ));
        //Store


        $Project = new Project;
        $Project->heading = $request->heading;
        $Project->subheading = $request->subheading;
        $Project->detail = $request->detail;
        
        //Parse youtube video URL
        $video_id = '';
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $request->youtubelink, $match)) {
            $video_id = $match[1];
        }

        $Project->youtubelink = $video_id;
        $Project->priority = $request->priority;
        $Project->save();

        //Save the tags
        $Project->tags()->sync($request->tags, false);

        //Save carousel
        $images=array();
        if($files=$request->file('carouselImages')){
            foreach($files as $file){
                 ImageService::saveCarouselImage($file, $request->heading, $Project->id);

            }
        }

        //Save featured
        if($request->hasFile('featured_image')){
            $imageToUpload = $request->file('featured_image');
            ImageService::saveFeaturedImage($imageToUpload, $request->heading, $Project->id);
        }

        //Save thumb
        if($request->hasFile('thumb_image')){
            $imageToUpload = $request->file('thumb_image');
            ImageService::saveThumbImage($imageToUpload, $request->heading, $Project->id);
        }




        //Add links to categorys
        if( $request->category1 != '' && $request->category1 != 'Select'){
           $this->createCatgoryProjectLink($Project->id, (int)$request->category1);
        }
        if( $request->category2 != '' && $request->category2 != 'Select'){
           $this->createCatgoryProjectLink($Project->id, (int)$request->category2);
        }
        if( $request->category3 != '' && $request->category3 != 'Select'){
           $this->createCatgoryProjectLink($Project->id, (int)$request->category3);
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
        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        //Return the view and pass in the item
        return view('project.edit')
            ->with('Project', $Project)
            ->with('Categories', $Categories)
            ->with('tags', $tags2)
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
       // $Project->youtubelink = $request->youtubelink;
        $video_id = '';
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $request->youtubelink, $match)) {
            $video_id = $match[1];
        }
        
        $Project->youtubelink = $video_id;

        $Project->priority = $request->priority;

        $Project->save();
        
        //Update images
        $this->updateImages($request, $Project);

        //Update the tags
        $Project->tags()->sync($request->tags, true);
  

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
    public function destroy($id)
    {

        $project = Project::find($id);

       //
        $project->delete();

        //Redirect to the edit page just in case they wish to edit the item they just added
        return redirect()->route('project.index');
    }
}
