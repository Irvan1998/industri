<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSkalaToIndustri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('industri', function (Blueprint $table) {
            $table->string('indikator_1')->nullable();
            $table->string('indikator_2')->nullable();
            $table->string('indikator_3')->nullable();
            $table->string('indikator_4')->nullable();
            $table->string('indikator_5')->nullable();
            $table->string('indikator_6')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('industri', function (Blueprint $table) {
            //
        });
    }
}
