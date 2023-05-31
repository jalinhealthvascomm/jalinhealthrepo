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
        Schema::create('page_elements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home_setting_id')->nullable()->default(null);
            $table->string('name');
            $table->string('type');
            $table->longtext('content');
            $table->unsignedBigInteger('created_by')->nullable()->default(null);
            $table->unsignedBigInteger('updated_by')->nullable()->default(null);
            $table->string('url')->nullable()->default(null);
            $table->string('icon')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('home_setting_id')->references('id')->on('home_settings')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_elements');
    }
};
