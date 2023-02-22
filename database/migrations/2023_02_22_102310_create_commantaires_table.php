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
        Schema::create('commantaires', function (Blueprint $table) {
            $table->id();
            $table->text('comment');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_article');
            $table->foreign('id_user')->references("id")->on("users")->onDelete("cascade");
            $table->foreign('id_article')->references("id")->on("articles")->onDelete("cascade");
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
        Schema::dropIfExists('commantaires');
    }
};
