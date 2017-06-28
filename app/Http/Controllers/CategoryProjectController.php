<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category_Project;
use App\Project;

class CategoryProjectController extends Controller
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
        $Category_id = $request->Category_id;
        $Project_id = $request->Project_id;
        $Category_Project = new Category_Project();
        $Category_Project->project_id = $Project_id;
        $Category_Project->category_id = $Category_id;
        $Category_Project->save();

        return redirect()->route('project.edit', $Project_id);
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

    //
        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Project_id, $Category_id)
    {
        //
        $Project = Project::find($Project_id);
        $Project->categories()->detach($Category_id);
        return redirect()->route('project.edit', $Project_id);
    }


}
