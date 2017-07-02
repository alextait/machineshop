<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Project;
use App\Models\ImageService;

class ImageController extends Controller
{
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
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //get the project to which we will be adding our image
        $Project = Project::find($request->Project_id);
        //Save carousel
        if($request->hasFile('carousel_image')){
            $imageToUpload = $request->file('carousel_image');
            ImageService::saveCarouselImage($imageToUpload, $Project->heading, $Project->id);
        }
        //Redirect to the edit page just in case they wish to edit the item they just added
        return redirect()->route('project.edit', $Project->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , $project_id)
    {
       
        $Project = Project::find($project_id);

        $Image = Image::find($id);

        $Image->Project()->dissociate();

        //$Project->images()->dissociate($Image );
        //
      
        $Image->delete();

        //Redirect to the edit page just in case they wish to edit the item they just added
        return redirect()->route('project.edit', $project_id);
    }
}
