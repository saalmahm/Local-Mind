<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('adresse')->nullable();
            $table->date('date_naissance')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('utilisateurs');
    }
};