<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHrsMinLuncAndHrsMinBrksToTimesheets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('timesheets', function (Blueprint $table) {
           $table->double('hrs_min_lunc', 4, 2)->after('week_id')->nullable(); 
           $table->double('hrs_min_brks', 4, 2)->after('hrs_min_lunc')->nullable(); 
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('timesheets', function (Blueprint $table) {
            $table->dropColumn('hrs_min_lunc');
            $table->dropColumn('hrs_min_brks');
        });
    }
}
