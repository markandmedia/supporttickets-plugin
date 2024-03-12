<?php namespace Markandmedia\SupportTickets\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMarkandmediaSupportticketsBericht extends Migration
{
    public function up()
    {
        Schema::create('markandmedia_supporttickets_bericht', function($table)
        {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('ticket_id')->nullable();
            $table->integer('backend_users_id')->nullable();
            $table->text('bericht')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('markandmedia_supporttickets_bericht');
    }
}
