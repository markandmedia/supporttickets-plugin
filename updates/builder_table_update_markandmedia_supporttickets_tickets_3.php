<?php namespace Markandmedia\SupportTickets\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMarkandmediaSupportticketsTickets3 extends Migration
{
    public function up()
    {
        Schema::table('markandmedia_supporttickets_tickets', function($table)
        {
            $table->string('status', 10)->nullable()->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('markandmedia_supporttickets_tickets', function($table)
        {
            $table->integer('status')->nullable()->unsigned(false)->default(null)->comment(null)->change();
        });
    }
}
