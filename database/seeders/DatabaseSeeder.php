<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '$2y$12$i5iVhcPyxPAsSAjSH51JGu.xYe7QfLpME3DnvxCfo4CCGIRRQAvby', //password: As12345678*
        ]);

        Student::factory([
            'user_id' => $user->id,
        ])->count(40)->create();


    }
}
