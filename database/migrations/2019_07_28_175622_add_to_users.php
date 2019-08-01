<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name', 32);
            $table->string('last_name', 32);
            $table->string('email', 320);
            $table->string('password', 64);
            $table->string('remember_token', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn('first_name');
             $table->dropColumn('last_name');
             $table->dropColumn('email');
             $table->dropColumn('password');
             $table->dropColumn('remember_token'); //
        });
    }
}
