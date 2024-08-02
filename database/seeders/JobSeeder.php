<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //job seeder starts
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

          Job::factory(10)->create();
    }
}
