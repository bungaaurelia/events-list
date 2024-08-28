<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizersTable extends Migration
{
    public function up()
    {
        Schema::create('organizers', function (Blueprint $table) {
            $table->id();  // Primary key (organizer_id)
            $table->string('organizer_name');
            $table->string('contact_email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('organizers');
    }
}
