<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $t) {
            $t->id();
            $t->string('band');
            $t->string('event');
            $t->string('venue');
            $t->dateTime('event_date');
            $t->unsignedInteger('price');
            $t->unsignedInteger('stock');
            $t->string('category');
            $t->string('poster')->nullable();
            $t->text('description')->nullable();
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
