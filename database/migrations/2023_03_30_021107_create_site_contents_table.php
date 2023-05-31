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
        Schema::create('site_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->default(null);
            $table->string('slug')->unique();
            $table->string('content_type')->nullable()->default('page');
            $table->string('image')->nullable()->default(null);
            $table->longText('content')->nullable()->default(null);
            $table->longtext('excerpt')->nullable()->default(null);
            $table->string('status')->nullable()->default('publish');
            $table->bigInteger('parent')->nullable()->default(0);
            $table->string('seo_title')->nullable()->default(null);
            $table->longtext('seo_description')->nullable()->default(null);
            $table->string('seo_keywords')->nullable()->default(null);
            $table->unsignedBigInteger('created_by')->nullable()->default(null);
            $table->unsignedBigInteger('updated_by')->nullable()->default(null);
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
        Schema::dropIfExists('site_contents');
    }
};
