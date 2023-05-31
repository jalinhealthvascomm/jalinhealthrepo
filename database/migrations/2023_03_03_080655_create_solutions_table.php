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
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->default(null);
            $table->string('icon')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->longtext('detail')->nullable()->default(null);
            $table->unsignedBigInteger('created_by')->nullable()->default(null);
            $table->unsignedBigInteger('updated_by')->nullable()->default(null);
            $table->string('slug')->unique();
            $table->string('seo_title')->nullable()->default(null);
            $table->longtext('seo_description')->nullable()->default(null);
            $table->string('seo_keywords')->nullable()->default(null);
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
        Schema::dropIfExists('solutions');
    }
};
