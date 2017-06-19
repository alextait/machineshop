<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\DisplayItemCategory;

class CreateDisplayitemcategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('displayitemcategory', function (Blueprint $table) {
            $table->increments('categoryid');
            $table->string('category')->default(0);
            $table->timestamps();
        });

        // Insert some stuff
        $DisplayItem = new DisplayItemCategory();
        $DisplayItem->categoryid = 1;  $DisplayItem->category = 'News';  $DisplayItem->save();

        $DisplayItem = new DisplayItemCategory();
        $DisplayItem->categoryid = 2; $DisplayItem->category = 'Staff'; $DisplayItem->save();

        $DisplayItem = new DisplayItemCategory();
        $DisplayItem->categoryid = 3; $DisplayItem->category = 'Projects'; $DisplayItem->save();

            $DisplayItem = new DisplayItemCategory();
            $DisplayItem->categoryid = 4; $DisplayItem->category = 'Special Effects'; $DisplayItem->save();
   
                $DisplayItem = new DisplayItemCategory();
                $DisplayItem->categoryid = 5; $DisplayItem->category = 'Rigs & Floor Effects'; $DisplayItem->save();

                $DisplayItem = new DisplayItemCategory();
                $DisplayItem->categoryid = 6; $DisplayItem->category = 'Pyrotechnics & Atmospherics'; $DisplayItem->save();

                $DisplayItem = new DisplayItemCategory();
                $DisplayItem->categoryid = 7; $DisplayItem->category = 'Models & Miniatures'; $DisplayItem->save();

                $DisplayItem = new DisplayItemCategory();
                $DisplayItem->categoryid = 8; $DisplayItem->category = 'Liquid Effects'; $DisplayItem->save();


            $DisplayItem = new DisplayItemCategory();
            $DisplayItem->categoryid = 9; $DisplayItem->category = 'Special Projects'; $DisplayItem->save();


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('displayitemcategory');
    }
}
