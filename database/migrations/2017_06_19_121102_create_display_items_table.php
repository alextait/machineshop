<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisplayItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('displayitems', function (Blueprint $table) {
            $table->increments('displayItemID');
            $table->timestamps();
            $table->string('heading')->default('');
            $table->string('subheading')->default('');
            $table->string('youtubelink')->default('');
            $table->text('detail')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('displayitems');
    }
}
