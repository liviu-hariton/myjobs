<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Liviu',
            'email' => 'liviu@myjobs.test'
        ]);

        User::factory(300)->create();

        $users = User::all()->shuffle();

        for($i = 0; $i < 20; $i++) {
            Employer::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }

        $employers = Employer::all();

        for($x = 0; $x < 100; $x++) {
            Job::factory()->create([
                'employer_id' => $employers->random()->id
            ]);
        }
    }
}
