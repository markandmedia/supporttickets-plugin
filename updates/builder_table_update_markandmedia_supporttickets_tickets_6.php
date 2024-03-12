<?php namespace Markandmedia\SupportTickets\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMarkandmediaSupportticketsTickets6 extends Migration
{
    public function up()
    {
        Schema::table('markandmedia_supporttickets_tickets', function($table)
        {
            $table->integer('urgentie')->nullable()->default(2);
        });
    }
    
    public function down()
    {
        Schema::table('markandmedia_supporttickets_tickets', function($table)
        {
            $table->dropColumn('urgentie');
        });
    }
}
