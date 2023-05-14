<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cast_movie', function (Blueprint $table) {
            $table->primary(['cast_id', 'movie_id']);
            $table->string('role');
            $table->timestamps();

            $table->bigInteger('cast_id')->unsigned();
            $table->foreign('cast_id')->references('id')->on('casts')
                ->onDelete('cascade')->onUpdate('cascade');

                $table->bigInteger('movie_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on('movies')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cast_movie');
    }
};
