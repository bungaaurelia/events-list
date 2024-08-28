<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->date('event_date');
            $table->time('event_time');
            $table->unsignedBigInteger('organizer_id');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('event_type_id');
            $table->string('status')->default('published'); // Set default to 'published'
            $table->timestamps();
    
            // Add foreign key constraints
            $table->foreign('organizer_id')->references('id')->on('organizers')->onDelete('cascade');
            $table->foreign('event_type_id')->references('id')->on('event_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
