<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cidades = [
            ['nome' => 'Uberaba', 'estado' => 'MG'],
            ['nome' => 'Belo Horizonte', 'estado' => 'MG'],
            ['nome' => 'São Paulo', 'estado' => 'SP'],
            ['nome' => 'Campinas', 'estado' => 'SP'],
            ['nome' => 'Rio de Janeiro', 'estado' => 'RJ'],
            ['nome' => 'Niterói', 'estado' => 'RJ'],
            ['nome' => 'Salvador', 'estado' => 'BA'],
            ['nome' => 'Curitiba', 'estado' => 'PR'],
            ['nome' => 'Porto Alegre', 'estado' => 'RS'],
            ['nome' => 'Brasília', 'estado' => 'DF'],
        ];

        foreach ($cidades as $cidade) {
            City::create([
                'nome' => $cidade['nome'],
                'estado' => $cidade['estado'],
                'slug' => Str::slug($cidade['nome'] . '-' . $cidade['estado']),
            ]);
        }
    }
}
