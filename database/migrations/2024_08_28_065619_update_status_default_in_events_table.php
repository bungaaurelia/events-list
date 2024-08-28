<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('status')->default('published')->change();
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('status')->default('active')->change(); // Revert to 'active' if needed
        });
    }
};
