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
        Schema::create('incident_models', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('place');
            $table->string('name');
            $table->text('desc');
            $table->text('shortDesc');
            $table->text('coordinates');
            $table->date('date');
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
        Schema::dropIfExists('incident_models');
    }
};
