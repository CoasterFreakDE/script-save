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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('scripts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('script');
            $table->integer('author_id');
            $table->integer('category_id');
            $table->integer('language_id');
            $table->bigInteger('views')->default(0);
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
        Schema::dropIfExists('scripts');
        Schema::dropIfExists('languages');
        Schema::dropIfExists('categories');
    }
};
