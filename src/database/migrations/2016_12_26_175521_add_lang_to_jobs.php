<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLangToJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->nullable();
            $table->string('company');
            $table->string('position');
            $table->date('startdate');
            $table->date('enddate');
            $table->text('description');
            $table->string('lang')->default('en');
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
    	Schema::table('jobs', function (Blueprint $table) {
            Schema::drop('jobs');
    	});
    }
}
