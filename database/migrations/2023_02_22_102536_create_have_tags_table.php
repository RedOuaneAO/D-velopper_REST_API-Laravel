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
        Schema::create('have_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_Article');
            $table->unsignedBigInteger('id_tag');
            $table->foreign('id_Article')->references("id")->on("articles")->onDelete("cascade");
            $table->foreign('id_tag')->references("id")->on("tags")->onDelete("cascade");
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
        Schema::dropIfExists('have_tags');
    }
};
