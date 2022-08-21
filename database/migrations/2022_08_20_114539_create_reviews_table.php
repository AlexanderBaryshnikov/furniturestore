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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255)->nullable();
            $table->text('text');
            $table->smallInteger('rating')->nullable();
            $table->foreignId('offer_id')->nullable()->constrained('offers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('article_id')->nullable()->constrained('articles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->smallInteger('published')->default(0)->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
