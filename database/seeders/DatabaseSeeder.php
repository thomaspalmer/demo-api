<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SpatieSeeder::class);

        User::factory()
            ->has(BankAccount::factory()->count(3))
            ->count(30)
            ->create()
            ->each(function (User $user) {
                $user->assignRole(fake()->randomElement(['user', 'admin']));
            });
    }
}
