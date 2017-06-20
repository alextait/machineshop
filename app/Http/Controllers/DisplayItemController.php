<?php

namespace App\Http\Controllers;

use App\DisplayItem;
use Illuminate\Http\Request;

class DisplayItemController extends Controller
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
        return view('displayitem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         var_dump('sdf');
         exit($request->heading);


        //Validate
        $this->validate($request, array(
                'heading' => 'required|max:255'
            ));
   
        //Store

        //Redirect
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DisplayItem  $displayItem
     * @return \Illuminate\Http\Response
     */
    public function show(DisplayItem $displayItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DisplayItem  $displayItem
     * @return \Illuminate\Http\Response
     */
    public function edit(DisplayItem $displayItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DisplayItem  $displayItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DisplayItem $displayItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DisplayItem  $displayItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(DisplayItem $displayItem)
    {
        //
    }
}
