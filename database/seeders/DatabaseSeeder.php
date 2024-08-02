<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
         /// https://laravel.com/docs/11.x/seeding
        Job::factory()->createMany(
          [  [

                'title' => 'Director',
                'employer_id' => 1,
                'salary' => 50000
            ],
            [
                
                'title' => 'Programmer',
                'employer_id' => 2,
                'salary' => 10000
            ],
            [
                
                'title' => 'Teacher',
                'employer_id' => 3,
                'salary' => 40000
            ]]
        );
    }
}
