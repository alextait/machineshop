<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use ImageTool;
use App\Image;
use App\Project;


class ImageService extends Model
{
    
    /**
     * Store extra/carousel
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function saveCarouselImage($imageToSave,$heading,$project_id)
    {
	   self::saveImage($imageToSave, 'extra', $heading, $project_id, 0, 0, '/extra');
    }

    /**
     * Store featured
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static  function saveFeaturedImage($imageToSave,$heading,$project_id)
    {
       self::saveImage($imageToSave, 'featured', $heading, $project_id, 1920, 1080);
    }

    /**
     * Store Thumb
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static  function saveThumbImage($imageToSave,$heading,$project_id)
    {
       self::saveImage($imageToSave, 'thumb', $heading, $project_id, 340, 310 );
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function saveImage($imageToSave, $type,$heading,$project_id, $dimensionX = 0, $dimensionY= 0, $subfolder = '')
    {
        $Project = project::find($project_id);
    
        $path = public_path('img/article/'  . $project_id . $subfolder . '/');
    
       if(!file_exists( $path)){
            mkdir($path);
        }
        $alphaHeading = preg_replace('/[^a-z\d ]/i', '', $heading);
        $alphaHeading = str_replace(' ', '_', $alphaHeading  );
        $filename = $alphaHeading . time() . $type . uniqid() . '.' .  $imageToSave->getClientOriginalExtension();
        $location =  $path . $filename;
        if($dimensionX == 0 && $dimensionY == 0){
            ImageTool::make($imageToSave)->save($location);
        }else{
            ImageTool::make($imageToSave)->fit($dimensionX, $dimensionY) ->save($location);
        }
        $image = new Image;
        $image->filename =  $filename;
        $image->type =  $type;
        $Project->images()->save($image);
    }
}
