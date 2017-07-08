<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Project;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->string('heading')->default('');
            $table->string('subHeading')->nullable();
            $table->string('youtubeLink')->nullable();
            $table->text('detail')->nullable();
            $table->enum('priority', ['1', '2', '3'])->default('3');

          // $table->foreign('id')->references('project_id')->on('category_project')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
