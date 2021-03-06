<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarUserIdACursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->after('titular');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
