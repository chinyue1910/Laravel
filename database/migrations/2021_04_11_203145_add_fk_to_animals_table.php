<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animals', function (Blueprint $table) {
            // animals 資料表 user_id 欄位對照 users 資料表 id 欄位，若 users 刪除，動物資料一起刪除
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // animals 資料表 type_id 欄位對照 types 資料表 id 欄位，若 types 刪除，動物資料 type_id 設為 null
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->dropForeign('animals_user_id_foreign');
            $table->dropForeign('animals_type_id_foreign');
        });
    }
}
