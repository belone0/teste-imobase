<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('photo');
            $table->string('title');
            $table->string('address');
            $table->string('type');
            $table->integer('value');
            $table->string('owner');
        });
    }
};
