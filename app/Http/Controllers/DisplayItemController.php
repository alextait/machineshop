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
  

        //Validate
        $this->validate($request, array(
                'heading' => 'required|max:255'

            ));
        //Store
        $displayItem = new DisplayItem;
        $displayItem->heading = $request->heading;
        $displayItem->subheading = $request->subheading;
        $displayItem->detail = $request->detail;
        $displayItem->youtubelink = $request->youtubelink;

        $displayItem->save();

        //Redirect to the edit page just in case they wish to edit the item they just added
        return redirect()->route('displayitem.edit', $displayItem->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\DisplayItem  $displayItem
     * @return \Illuminate\Http\Response
     */
    public function show($displayItemID)
    {
        var_dump('SHOW');
        exit();

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DisplayItem  $displayItem
     * @return \Illuminate\Http\Response
     */
    public function edit($displayItemID)
    {
        //Get post
        $displayItem = DisplayItem::find($displayItemID);
        
        //Return the view and pass in the item
        return view('displayitem.edit')
            ->with('displayItem', $displayItem);
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
