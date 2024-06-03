<?php

use Phenomine\Support\Database\Migration;
use Phenomine\Support\Database\Schema;
use Phenomine\Support\Database\Blueprint;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id');
            $table->foreign('user_id')->restrictOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    public function down() : void
    {
        Schema::drop('posts');
    }

};
