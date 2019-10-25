<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('title');
            $table->json('description');
            $table->string('slug');
            $table->boolean('active')->default('1');
            $table->string('image');
            $table->string('page_id');
            $table->enum('have_gallary', ['yes' , 'no']);
            $table->enum('have_form', ['yes' , 'no']);
            $table->integer('form_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updatde_by')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
