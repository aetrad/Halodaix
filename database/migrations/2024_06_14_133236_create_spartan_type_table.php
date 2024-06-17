<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpartanTypeTable extends Migration
{
    public function up()
    {
        Schema::create('spartan_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spartan_id')->constrained()->onDelete('cascade');
            $table->foreignId('type_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('spartan_type');
    }
}
