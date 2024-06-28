<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for($i = 0; $i < 10; $i++) {

            $newProject = new Project;
            $newProject->title = $faker->sentence(3);
            $newProject->readme = $faker->text(300);
            $newProject->latest_fix = $faker->date();
            $newProject->slug = Str::slug($newProject->title);
            $newProject->save();
        }
    }
}
