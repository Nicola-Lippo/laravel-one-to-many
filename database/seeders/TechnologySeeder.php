<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //per evitare problemi di chiavi
        //disabilito chiavi nel caso ci sono
        Schema::disableForeignKeyConstraints();
        //svuoto tabella
        Technology::truncate();
        //inserisco i campi ciclando sugli elemnti
        $technologies = ['HTML', 'CSS', 'JavaScript', 'Vue', 'Bootstrap', 'PHP', 'Laravel', 'MySQL'];
        foreach ($technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->name = $technology;
            $new_technology->slug = Str::of($technology)->slug();
            //salvo
            $new_technology->save();
        }


        Schema::enableForeignKeyConstraints();
    }
}
