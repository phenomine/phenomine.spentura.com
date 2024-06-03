<?php

use Phenomine\Support\Database\Migration;
use Phenomine\Support\Database\Schema;
use Phenomine\Support\Database\Blueprint;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuidPrimary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    public function down() : void
    {
        Schema::drop('users');
    }

};
