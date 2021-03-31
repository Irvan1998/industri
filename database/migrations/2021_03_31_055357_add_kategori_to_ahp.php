<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKategoriToAhp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ahp', function (Blueprint $table) {
            $table->string('id_matriks');
            $table->string('kategori')->nullable();
            $table->string('nilai')->default(0);
            $table->string('id_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ahp', function (Blueprint $table) {
            //
        });
    }
}
