<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('slug')->unique();
            $table->integer('parent_id')->nullable()->default(0);
            $table->integer('order')->nullable()->default(0);
            $table->boolean('is_published')->default(false);
        });
        
        Schema::create('page_translations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->string('menutitle');
            $table->string('description');
            $table->text('content')->nullable();
            $table->json('blocks')->nullable();
            $table->json('options')->nullable();
            $table->text('image')->nullable();
            
            $table->unique(['page_id', 'locale']);
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
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
};
