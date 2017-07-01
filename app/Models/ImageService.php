<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageService extends Model
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveCarouselImage(Request $request)
    {
	        var_dump("Her we go");
	        exit();

    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveImage($imageToSave, $type, $dimensionX, $dimensionY)
    {

        $filename = $alphaHeading . time() . 'THUMB' . '.' .  $imageToUpload->getClientOriginalExtension();
        $location =  $path . $filename;
        ImageTool::make($imageToUpload)->fit(340,310) ->save($location);
        
        $image = new Image;
        $image->filename =  $filename;
        $image->type =  'thumb';
        $Project->images()->save($image);

    }
}
