<?php namespace Markandmedia\SupportTickets\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMarkandmediaSupportticketsTickets extends Migration
{
    public function up()
    {
        Schema::create('markandmedia_supporttickets_tickets', function($table)
        {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('voor_wie')->nullable();
            $table->string('onderwerp')->nullable();
            $table->integer('backend_users_id')->nullable();
            $table->integer('status')->nullable();
            $table->string('type')->nullable();
            $table->integer('gesloten')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('markandmedia_supporttickets_tickets');
    }
}
