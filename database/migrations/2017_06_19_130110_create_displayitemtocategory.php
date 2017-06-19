<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisplayitemtocategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('displayitemtocategory', function (Blueprint $table) {
            $table->integer('categoryid');
            $table->integer('displayitemid');
            $table->unique(['categoryid', 'displayitemid']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('displayitemtocategory');
    }
}
