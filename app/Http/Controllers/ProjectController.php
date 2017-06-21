<?php

namespace App\Http\Controllers;

use App\Project;
use App\DisplayItem;
use DB;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    //
    public function getProjectHighlight(){
        $displayItems = DB::table('displayitem')
             ->leftJoin('displayitemimage', function ($join) {
                    $join->on('displayitem.displayItemID', '=', 'displayitemimage.displayItemID')
                        ->where('displayitemimage.main', '=', 1);
                })
             ->join('displayitemtocategory', function ($join) {
                    $join->on('displayitemtocategory.displayItemID', '=', 'displayitem.displayItemID')
                        ->where('displayitemtocategory.categoryid', '=', 10);
                })
             ->select('displayitem.*', 'displayitemimage.filename')->get();
        return view('project-highlight')
            ->with('displayItems',  $displayItems)
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
        $subCategoryItems = DB::table('displayitemtree')
           	->join('displayitemtocategory', 'displayitemtocategory.categoryid', '=', 'displayitemtree.childid')
           	->join('displayitemcategory', 'displayitemtocategory.categoryid', '=', 'displayitemcategory.categoryid')
           	->select('displayitemtree.childid, displayitemtocategory.category , displayitemtocategory.categoryid ')
           	->where('displayitemtree.parentid', '=', $categoryid);
        return  $subCategoryItems;
     }   

    public function getSpecialEffectsProjects($categoryid){
        $aboutSection = 'Machine Shop Special Effects provides a range of live atmospheric and pyrotechnic floor-effects with our reliable and experienced team of technicians. We also offer superior modelmaking and animatronics services from our team of in-house specialists.' ;   
    	$subCategoryItems  =  $this->getSubCategoryItems(4);
       	return  $this->getProjectList('Special Effects', 'special-effects', $aboutSection, $categoryid , $subCategoryItems);
    }


    public function getProjectList($pagetitle, $pagename, $aboutSection, $categoryid, $subCategoryItems){
       
        $displayItems = DB::table('displayitem')
           
            ->join('displayitemtocategory' , 'displayitemtocategory.displayItemID', '=', 'displayitem.displayItemID')
            ->whereRaw("displayitemtocategory.categoryid = ? OR displayitemtocategory.categoryid IN (SELECT childid FROM displayitemtree WHERE parentid = ?)" ,  [$categoryid,$categoryid ])
            ->select('displayitem.*')
            ->paginate(10);

       return view('view-projects')
            ->with('displayItems', $displayItems)
            ->with('pagename',  $pagename)
            ->with('pagetitle',  $pagetitle)
            ->with('aboutSection', $aboutSection)
            ->with('subCategoryItems', $subCategoryItems); 
    }

    public function getViewProject($displayitemid){
        $displayItem = DB::table('displayitem')
            ->where('displayitem.displayitemid', '=', $displayitemid)
            ->select('displayitem.*')
            ->first();
        return view('view-project') 
            ->with('displayItem', $displayItem);
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
        
      return view('admindisplayitem');
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
