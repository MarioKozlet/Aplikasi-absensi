<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropFaxSekolahFromSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conf_sekolah', function (Blueprint $table) {
            $table->dropColumn('status_ppdb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conf_sekolah', function (Blueprint $table) {
            $table->enum('status_ppdb', ['1', '0']);
        });
    }
}
