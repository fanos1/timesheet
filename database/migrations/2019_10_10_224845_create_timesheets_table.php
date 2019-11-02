<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timesheets', function (Blueprint $table) {            
            $table->increments('id');
            $table->tinyInteger('employee_id');
            $table->date('day');
            $table->double('time_from', 2, 2);
            $table->double('time_to', 2, 2);
            $table->double('lunch_brk', 2, 2);
            $table->double('coffee_brk', 2, 2);
            $table->tinyInteger('proj_id')->default(1);
            $table->tinyInteger('week_id')->default(1);

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
        Schema::dropIfExists('timesheets');
    }
}
