<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('spartans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('pv');
            $table->float('weight');
            $table->float('height');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('spartans');
    }
};

