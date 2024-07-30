<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//importo faker + alias
use Faker\Generator as Faker;
//slug per url
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    //passo la classe Faker al metodo run
    public function run(Faker $faker): void
    {
        //ciclo for
        for ($i = 0; $i < 50; $i++) {
            //new modello, in alto si importa
            $project = new Project();
            //asswgna valori
            $project->title = $faker->sentence(5);
            $project->description = $faker->text(100);
            //i dati sono gia pronti, save consolida
            $project->slug = Str::of($project->title)->slug('-');
            //consolida i dati
            $project->save();
        }
    }
}
