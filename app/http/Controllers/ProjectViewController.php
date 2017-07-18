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




class ProjectViewController extends Controller
{
    
     //dfgdfg
    public function getProjectHighlight(){
       // $Projects = Project::with('category', 'featured')->toSql();
        $Projects = Project::whereHas('categories', function($query){
            $query->where('category', '=', 'Highlight');
        });

        $Projects->whereHas('images', function($query){
            $query->where('type', '=', 'featured');
        })->orderBy('priority', 'asc');

        $Projects = $Projects->get();

        return view('project.project-highlight')
            ->with('Projects',  $Projects)
            ->with('pagename', 'highlight')
            ;
    }

    public function getSubCategoryItems($categoryid){
        //get any sub categories for the specials
       
        $subCategoryItems = Category::where('parentCategory_id', $categoryid)->get();

        return  $subCategoryItems;
     }   


    public function getSpecialProjects($categoryid){

        //This could be a parent or a subcategory.
        //Need to get top level so that we can pass that to get sub categories
        $category = Category::find($categoryid);
        if( $category->parentCategory_id != 0){
            $parentCategoryID = $category->parentCategory_id;
        }else{
            $parentCategoryID = $categoryid;
        }

        $aboutSection = 'Machine Shop have been developing and creating interactive and one off creations for as long as we can remember. Our Special Projects division was founded to make use of our diverse knowledge and experience. From the smallest visual detail to the most complex mechanical system we offer a complete service to bring your crazy ideas to life. Each project is considered to make the most of the creative idea whilst maintaining realism in budgeting. From initial ideas through 3D CAD, modelling, prototyping, software development and soak testing to complete production runs, our team are simply unfazed by the impossible.' ;   
       
       return  $this->getProjectList('Special Projects', 'special-projects', $aboutSection, $categoryid, $parentCategoryID  );
    }


    public function getSpecialEffectsProjects($categoryid){
       
        
        //This could be a parent or a subcategory.
        //Need to get top level so that we can pass that to get sub categories
        $category = Category::find($categoryid);
        if( $category->parentCategory_id != 0){
            $parentCategoryID = $category->parentCategory_id;
        }else{
            $parentCategoryID = $categoryid;
        }


        $aboutSection = 'Machine Shop Special Effects provides a range of live atmospheric and pyrotechnic floor-effects with our reliable and experienced team of technicians. We also offer superior modelmaking and animatronics services from our team of in-house specialists.' ;   
        
        return  $this->getProjectList('Special Effects', 'special-effects', $aboutSection, $categoryid , $parentCategoryID);
    }

    //This needs to be renamed as its not really accurate.. its not a listing.
    public function getProjectList($pagetitle, $pagename, $aboutSection, $categoryid, $parentCategoryID){
       $subCategoryItems  =  $this->getSubCategoryItems( $parentCategoryID);
       
        //Get array of all categories in tree
        $categories =  [(int)$categoryid];
        $SubCategories  = Category::where('parentCategory_id', $categoryid)->pluck('id')->toArray();
        $allCategories =  array_merge($categories, $SubCategories);

        //Get the disctinct projects for the array of project ids
        $Projects = Project::whereHas("categories", function ($query) use ($allCategories) {
            return $query->whereIn('category_id', $allCategories);
        })->distinct()->paginate(10);


        // /Category::where('parentCategory_id', $categoryid)->get();
        return view('project.view-projects')
            ->with('Projects', $Projects)
            ->with('pagename',  $pagename)
            ->with('pagetitle',  $pagetitle)
            ->with('aboutSection', $aboutSection)
            ->with('subCategoryItems', $subCategoryItems)
            ->with('parentCategoryID', $parentCategoryID)
            ->with('categoryid', $categoryid)
            ;

    }

    public function getViewSearchResults(Request $request){
        $search = $request->search;
        $projects = Project::whereHas("tags", function($query) use ($search) {
            $query->where('tags.name', 'like', '%' .  $search  . '%');
        })->get();
        return view('project.results')->with('projects', $projects)->with('search', $search);
    }

    public function getViewProject($Projectid){
        $Project = Project::find($Projectid);
        $tags = $Project->tags()->get();
        $keywords = $tags->implode('name', ', ');
        return view('project.view-project')->with('Project', $Project)->with('keywords' ,  $keywords);
    }

    public function getAbout(){
       return view('about');
    }


}
