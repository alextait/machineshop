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
        $displayItems = DB::table('displayitems')
             ->leftJoin('displayitemimage', function ($join) {
                    $join->on('displayitems.displayItemID', '=', 'displayitemimage.displayItemID')
                          ->where('displayitemimage.main', '=', 1);
                })
             ->join('displayitemtocategory', function ($join) {
                    $join->on('displayitemtocategory.displayItemID', '=', 'displayitems.displayItemID')
                          ->where('displayitemtocategory.categoryid', '=', 10);
                })

             ->select('displayitems.*', 'displayitemimage.filename')
             ->get();

        return view('project-highlight')
            ->with('displayItems',  $displayItems)
            ->with('pagename', 'highlight')
            ;
    }


    public function getSpecialProjects($categoryid){
        $aboutSection = 'Machine Shop have been developing and creating interactive and one off creations for as long as we can remember. Our Special Projects division was founded to make use of our diverse knowledge and experience. From the smallest visual detail to the most complex mechanical system we offer a complete service to bring your crazy ideas to life. Each project is considered to make the most of the creative idea whilst maintaining realism in budgeting. From initial ideas through 3D CAD, modelling, prototyping, software development and soak testing to complete production runs, our team are simply unfazed by the impossible.' ;   
       return  $this->getProjectList('Special Projects', 'special-projects', $aboutSection, $categoryid );


       return view('view-projects');
    }

  public function getSpecialEffectsProjects($categoryid){
         
        $aboutSection = 'Machine Shop Special Effects provides a range of live atmospheric and pyrotechnic floor-effects with our reliable and experienced team of technicians. We also offer superior modelmaking and animatronics services from our team of in-house specialists.' ;   
       return  $this->getProjectList('Special Effects', 'special-effects', $aboutSection, $categoryid );
    }

    public function getProjectList($pagetitle, $pagename, $aboutSection, $categoryid){
       
        $displayItems = DB::table('displayitems')
            ->select('displayitems.*')
            ->join('displayitemtocategory' , 'displayitemtocategory.displayItemID', '=', 'displayitems.displayItemID')
            ->whereRaw("displayitemtocategory.categoryid = ? OR displayitemtocategory.categoryid IN (SELECT childid FROM displayitemtree WHERE parentid = ?)" ,  [$categoryid,$categoryid ])
            ->get();  


       return view('view-projects')
            ->with('displayItems', $displayItems)
            ->with('pagename',  $pagename)
            ->with('pagetitle',  $pagetitle)
            ->with('aboutSection', $aboutSection)
            ;


    }




    public function getNews(){
       
        /*

        $displayItems = DB::table('displayitems')
             ->leftJoin('displayitemimage', function ($join) {
                    $join->on('displayitems.displayItemID', '=', 'displayitemimage.displayItemID')
                          ->where('displayitemimage.main', '=', 1);
                })


             ->select('displayitems.*', 'displayitemimage.filename')
             ->get();*/

       return view('news') ->with('pagelink', 'news');
    }

    public function getAbout(){
       
        /*

        $displayItems = DB::table('displayitems')
             ->leftJoin('displayitemimage', function ($join) {
                    $join->on('displayitems.displayItemID', '=', 'displayitemimage.displayItemID')
                          ->where('displayitemimage.main', '=', 1);
                })


             ->select('displayitems.*', 'displayitemimage.filename')
             ->get();*/

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
