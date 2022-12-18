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
        Schema::create('block_collections', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
        });

        Schema::create('block_collection_translations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('block_collection_id')->unsigned();
            $table->string('locale')->index();

            $table->json('items')->nullable();

            $table->unique(['block_collection_id', 'locale']);
            $table->foreign('block_collection_id')->references('id')->on('block_collections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('block_collections');
    }
};
