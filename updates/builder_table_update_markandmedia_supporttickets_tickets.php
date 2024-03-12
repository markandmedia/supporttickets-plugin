<?php namespace Markandmedia\SupportTickets\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMarkandmediaSupportticketsTickets extends Migration
{
    public function up()
    {
        Schema::table('markandmedia_supporttickets_tickets', function($table)
        {
            $table->string('voor_wie', 10)->nullable()->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('markandmedia_supporttickets_tickets', function($table)
        {
            $table->integer('voor_wie')->nullable()->unsigned(false)->default(null)->comment(null)->change();
        });
    }
}
