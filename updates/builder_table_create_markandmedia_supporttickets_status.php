<?php namespace Markandmedia\SupportTickets\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMarkandmediaSupportticketsStatus extends Migration
{
    public function up()
    {
        Schema::create('markandmedia_supporttickets_status', function($table)
        {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('ticket_id')->nullable();
            $table->string('status_naam')->nullable();
            $table->integer('active')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('markandmedia_supporttickets_status');
    }
}
