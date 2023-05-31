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
        Schema::create('sub_solutions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('solution_id')->nullable()->default(null);
            $table->string('slug')->unique();
            $table->string('seo_title')->nullable()->default(null);
            $table->longtext('seo_description')->nullable()->default(null);
            $table->string('seo_keywords')->nullable()->default(null);
            $table->string('title')->nullable()->default(null);
            $table->string('icon')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->longText('description')->nullable()->default(null);
            $table->longtext('detail')->nullable()->default(null);
            $table->unsignedBigInteger('created_by')->nullable()->default(null);
            $table->unsignedBigInteger('updated_by')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('solution_id')->references('id')->on('solutions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_solutions');
    }
};
