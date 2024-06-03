<?php

use Phenomine\Support\Database\Migration;
use Phenomine\Support\Database\Schema;
use Phenomine\Support\Database\Blueprint;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->binary('id', 128)->unique()->primary();
            $table->blob('payload');
            $table->integer('lifetime')->unsigned();
            $table->integer('time')->unsigned();
            $table->index('sessions_lifetime_idx', ['lifetime']);
        });
    }

    public function down() : void
    {
        Schema::drop('sessions');
    }

};
