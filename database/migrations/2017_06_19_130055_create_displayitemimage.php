<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\DisplayItemImage;

class CreateDisplayitemimage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('displayitemimage', function (Blueprint $table) {
            $table->increments('displayItemIimageID');
            $table->string('filename')->default('');
            $table->boolean('main')->default(0);
            $table->integer('displayitemID')->default(0);
            $table->timestamps();
        });

        // Insert some stuff
        $DisplayItem = new DisplayItemImage();
        $DisplayItem->filename = 'screen-shot-2016-08-11-at-164319.png';
        $DisplayItem->main = true;
        $DisplayItem->displayitemID = 1;
        $DisplayItem->save();

        // Insert some stuff
        $DisplayItem = new DisplayItemImage();
        $DisplayItem->filename = 'untitled-1.jpg';
        $DisplayItem->main = true;
        $DisplayItem->displayitemID = 2;
        $DisplayItem->save();

        // Insert some stuff
        $DisplayItem = new DisplayItemImage();
        $DisplayItem->filename = '6-jpeg.jpg';
        $DisplayItem->main = true;
        $DisplayItem->displayitemID = 3;
        $DisplayItem->save();

    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('displayitemimage');
    }


}
