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
