<?php

namespace Database\Seeders;

use Phenomine\Support\Seeder;

class DatabaseSeeder extends Seeder {
    public function run() {
        $this->call([
            UserSeeder::class,
        ]);
    }

}
