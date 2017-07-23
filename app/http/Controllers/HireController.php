<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ImageTool;
use App\Hire;
use App\HireCategory;


class HireController extends Controller
{

   
    //
    public function getHireHome(){
        return view('hire.public.home');
    }


    /**
     * getShowEquipmentHireList.
     *
     * @return \Illuminate\Http\Response
     */
    public function getShowEquipmentHireList()
    {
        //
        $hireCategories = HireCategory::all();
        return view('hire.public.categorylist')->with('hireCategories', $hireCategories);
    }
    
    /**
     * getShowEquipmentHireList.
     *
     * @return \Illuminate\Http\Response
     */
    public function getShowHireList($hire_category_id)
    {
        //
        $hires = Hire::with('HireCategory')->where('hire_category_id',$hire_category_id )->get();
        return view('hire.public.list')->with('hires', $hires);
    }
    

    /**
     * Display user view of hire item.
     *
     * @return \Illuminate\Http\Response
     */
    public function getShowHire($id)
    {
        //
        $hire = Hire::find($id);
        return view('hire.public.show')->with('hire', $hire);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hires = Hire::with('hireCategory')->get();
        return view('hire.index')->with('hires', $hires);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
        $hireCategories = HireCategory::all();
        return view('hire.create')->with('hireCategories', $hireCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $this->validate($request, [
            'image' => 'max:3000' //kb max
        ]);

        //
        $HireItem = new Hire();
        $HireItem->heading = $request->heading;
        $HireItem->detail = $request->detail;
        $HireItem->hire_category_id = $request->hire_category_id;

        $HireItem->save();

        //Save image
        if($request->hasFile('image')){
            $imageToSave = $request->file('image');
            $this->saveHireImage($imageToSave ,  $HireItem , $request->heading);
        }

        return $this->index();
    }

     /**
     * Store a newly created image in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveHireImage($imageToSave,  $HireItem, $heading){
        $path = public_path('img/hire/'  . $HireItem->id . '/');
        if(!file_exists( $path)){
            mkdir($path);
        }
        $alphaHeading = preg_replace('/[^a-z\d ]/i', '', $heading);
        $alphaHeading = str_replace(' ', '_', $alphaHeading  );
        $filename = $alphaHeading . time() . uniqid() . '.' .  $imageToSave->getClientOriginalExtension();
        $location =  $path . $filename;
        ImageTool::make($imageToSave)->fit(1920, 1080)->save($location);
        //Save to db
        $HireItem->image = $filename;
        $HireItem->save();
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
        $Hire = Hire::find($id)->with('hireCategory')->get();
        return view('hire.show')->with('Hire', $Hire);
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
        $hireCategories = HireCategory::all();
        $hire = Hire::find($id);
        return view('hire.edit')->with('hire', $hire)->with('hireCategories', $hireCategories);
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
        $HireItem = Hire::find($id);
        $HireItem->heading = $request->heading;
        $HireItem->detail = $request->detail;
        $HireItem->hire_category_id = $request->hire_category_id;

        $HireItem->save();
         //Save image
        if($request->hasFile('image')){
             //Save image
            $imageToSave = $request->file('image');
            $this->saveHireImage($imageToSave ,  $HireItem , $request->heading);
        }
        
        return $this->edit($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $Hire = Hire::find($id);

       //
        $Hire->delete();

        //Redirect to the edit page just in case they wish to edit the item they just added
        return redirect()->route('hire.index');
    }
}
