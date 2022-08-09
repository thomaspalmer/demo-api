<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\SpatieSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_list_of_users_and_bank_details_are_returned(): void
    {
        $this->seed(SpatieSeeder::class);

        $user = User::factory()->create()->assignRole('admin');

        Passport::actingAs($user);

        $this->get('api/users')
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'email',
                        'created_at',
                        'updated_at',
                        'bank_accounts' => [
                            '*' => [
                                'id',
                                'user_id',
                                'name_on_account',
                                'account_number',
                                'sort_code',
                                'card_number',
                                'card_expiry',
                                'card_cvc',
                                'created_at',
                                'updated_at',
                            ],
                        ],
                    ],
                ],
                'pagination' => [
                    'total',
                    'last_page',
                    'per_page',
                    'current_page',
                ],
            ]);
    }

    public function test_that_a_user_must_have_the_right_permissions(): void
    {
        $this->seed(SpatieSeeder::class);

        $user = User::factory()->create()->assignRole('user');

        Passport::actingAs($user);

        $this->get('api/users')
            ->assertStatus(403);
    }
}
