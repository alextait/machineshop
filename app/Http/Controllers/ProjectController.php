<?php

namespace App\Http\Controllers;

use App\Project;
use App\Category;
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
        $subCategoryItems = DB::table('Projecttree')
           	->join('Projecttocategory', 'Projecttocategory.categoryid', '=', 'Projecttree.childid')
           	->join('Projectcategory', 'Projecttocategory.categoryid', '=', 'Projectcategory.categoryid')
           	->select('Projecttree.childid, Projecttocategory.category , Projecttocategory.categoryid ')
           	->where('Projecttree.parentid', '=', $categoryid);
        return  $subCategoryItems;
     }   

    public function getSpecialEffectsProjects($categoryid){
        $aboutSection = 'Machine Shop Special Effects provides a range of live atmospheric and pyrotechnic floor-effects with our reliable and experienced team of technicians. We also offer superior modelmaking and animatronics services from our team of in-house specialists.' ;   
    	$subCategoryItems  =  $this->getSubCategoryItems(4);
       	return  $this->getProjectList('Special Effects', 'special-effects', $aboutSection, $categoryid , $subCategoryItems);
    }


    public function getProjectList($pagetitle, $pagename, $aboutSection, $categoryid, $subCategoryItems){
       
        $Projects = DB::table('Project')
           
            ->join('Projecttocategory' , 'Projecttocategory.ProjectID', '=', 'Project.ProjectID')
            ->whereRaw("Projecttocategory.categoryid = ? OR Projecttocategory.categoryid IN (SELECT childid FROM Projecttree WHERE parentid = ?)" ,  [$categoryid,$categoryid ])
            ->select('Project.*')
            ->paginate(10);

       return view('view-projects')
            ->with('Projects', $Projects)
            ->with('pagename',  $pagename)
            ->with('pagetitle',  $pagetitle)
            ->with('aboutSection', $aboutSection)
            ->with('subCategoryItems', $subCategoryItems); 
    }

    public function getViewProject($Projectid){
        $Project = DB::table('Project')
            ->where('Project.Projectid', '=', $Projectid)
            ->select('Project.*')
            ->first();
        return view('view-project') 
            ->with('Project', $Project);
    }

    public function getNews(){
       return view('news') ->with('pagelink', 'news');
    }

    public function getAbout(){
       return view('about');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
      return view('adminProject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        

        
        
        var_dump($request->heading);
        exit();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
