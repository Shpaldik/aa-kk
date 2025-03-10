<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('operator');
            $table->string('client_number');
            $table->date('date');
            $table->num('duration'); 
            $table->string('scenario')->nullable();
            $table->string('marker')->nullable();
            $table->integer('rating');
            $table->string('language');
            $table->string('loyalty');
            $table->string('beacon')->nullable();
            $table->string('interruptions')->nullable();
            $table->number('price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};

