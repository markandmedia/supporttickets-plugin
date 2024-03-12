<?php namespace Markandmedia\SupportTickets\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMarkandmediaSupportticketsTickets4 extends Migration
{
    public function up()
    {
        Schema::table('markandmedia_supporttickets_tickets', function($table)
        {
            $table->renameColumn('bericht', 'omschrijving_ticket');
        });
    }
    
    public function down()
    {
        Schema::table('markandmedia_supporttickets_tickets', function($table)
        {
            $table->renameColumn('omschrijving_ticket', 'bericht');
        });
    }
}
