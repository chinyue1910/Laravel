<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalUserLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_user_likes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('animal_id')->unsigned()->comment('動物ID');
            $table->bigInteger('user_id')->unsigned()->comment('使用者ID');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('animal_user_likes', function (Blueprint $table) {
            $table->dropForeign('animal_user_likes_user_id_foreign');
            $table->dropForeign('animal_user_likes_animal_id_foreign');
        });
        Schema::dropIfExists('animal_user_likes');
    }
}
