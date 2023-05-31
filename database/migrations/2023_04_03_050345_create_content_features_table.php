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
        Schema::create('content_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('site_content_id')->nullable()->default(null);
            $table->longtext('type')->nullable()->default(null);
            $table->longtext('features')->nullable()->default(null);
            $table->longtext('description')->nullable()->default(null);
            $table->unsignedBigInteger('created_by')->nullable()->default(null);
            $table->unsignedBigInteger('updated_by')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('site_content_id')->references('id')->on('site_contents')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_features');
    }
};
