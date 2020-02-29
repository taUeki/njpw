<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('unit_id');
            $table->unsignedInteger('chanpion_id');
            $table->string('name');
            $table->string('filename');
            $table->date('birthday');
            $table->float('height', 8, 2);
            $table->float('weight', 8, 2);
            $table->string('theme_song');
            $table->text('description');
            $table->timestamps();
            
            // 外部キーを追加
            $table->foreign('unit_id')
                ->references('id')
                ->on('units')
                ->onDelete('cascade');
            $table->foreign('chanpion_id')
                ->references('id')
                ->on('champions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
