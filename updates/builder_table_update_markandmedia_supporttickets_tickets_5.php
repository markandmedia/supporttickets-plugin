<?php namespace Markandmedia\SupportTickets\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMarkandmediaSupportticketsTickets5 extends Migration
{
    public function up()
    {
        Schema::table('markandmedia_supporttickets_tickets', function($table)
        {
            $table->string('status', 255)->change();
        });
    }
    
    public function down()
    {
        Schema::table('markandmedia_supporttickets_tickets', function($table)
        {
            $table->string('status', 10)->change();
        });
    }
}
