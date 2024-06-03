<?php

namespace Database\Seeders;

use App\Models\User;
use Phenomine\Support\Seeder;

class UserSeeder extends Seeder {

    public function run() {
        User::create([
            'name' => 'John Doe',
            'email' => 'john@doe.com'
        ]);
    }

}
