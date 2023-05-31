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
        Schema::create('schedule_demos', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable()->default(null);
            $table->string("phone")->nullable()->default(null);
            $table->string("email")->nullable()->default(null);
            $table->string("organization")->nullable()->default(null);
            $table->string("inquiry")->nullable()->default(null);
            $table->longtext("message")->nullable()->default(null);
            $table->integer("read")->nullable()->default(0);
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
        Schema::dropIfExists('schedule_demos');
    }
};
