<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTypesTable extends Migration
{
    public function up()
    {
        Schema::create('event_types', function (Blueprint $table) {
            $table->id();  // Primary key (event_type_id)
            $table->string('event_type_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_types');
    }
}
