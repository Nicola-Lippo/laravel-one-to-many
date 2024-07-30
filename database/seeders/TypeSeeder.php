<?php

namespace Database\Seeders;

use App\Models\type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
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
        type::truncate();
        //inserisco i campi ciclando sugli elemnti
        $types = ['Backend', 'Frontend', 'Entrambi'];
        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->slug = Str::of($type)->slug();
            //salvo
            $new_type->save();
        }


        Schema::enableForeignKeyConstraints();
    }
}
