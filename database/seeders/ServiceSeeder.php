<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicos = [
            ['nome' => "Clínica Acolher", 'estado' => "MG", 'cidade' => "Uberaba", 'tipo' => "Saúde", 'descricao' => "Psicologia com Libras", 'lat' => -19.7477, 'lng' => -47.9318],
            ['nome' => "Escola Inclusiva SP", 'estado' => "SP", 'cidade' => "São Paulo", 'tipo' => "Educação", 'descricao' => "Ensino acessível", 'lat' => -23.5505, 'lng' => -46.6333],
            ['nome' => "Hospital Vida", 'estado' => "MG", 'cidade' => "Belo Horizonte", 'tipo' => "Saúde", 'descricao' => "Emergência com intérprete", 'lat' => -19.9191, 'lng' => -43.9386],
            ['nome' => "Centro Cultural Acesso", 'estado' => "SP", 'cidade' => "Campinas", 'tipo' => "Cultura", 'descricao' => "Eventos com Libras", 'lat' => -22.9099, 'lng' => -47.0626],
            ['nome' => "Faculdade Libras", 'estado' => "SP", 'cidade' => "São Paulo", 'tipo' => "Educação", 'descricao' => "Cursos com acessibilidade", 'lat' => -23.5489, 'lng' => -46.6388],
            ['nome' => "Clínica Bem Estar", 'estado' => "MG", 'cidade' => "Uberlândia", 'tipo' => "Saúde", 'descricao' => "Fonoaudiologia acessível", 'lat' => -18.9146, 'lng' => -48.2754],
            ['nome' => "Biblioteca Acessível", 'estado' => "MG", 'cidade' => "Uberaba", 'tipo' => "Cultura", 'descricao' => "Leitura com intérprete", 'lat' => -19.7432, 'lng' => -47.9299],
            ['nome' => "Oficina do Saber", 'estado' => "SP", 'cidade' => "Campinas", 'tipo' => "Educação", 'descricao' => "Reforço escolar com Libras", 'lat' => -22.9056, 'lng' => -47.0609],
            ['nome' => "Centro Médico Popular", 'estado' => "SP", 'cidade' => "Santos", 'tipo' => "Saúde", 'descricao' => "Consultas com intérprete", 'lat' => -23.9608, 'lng' => -46.3336],
            ['nome' => "Espaço Jovem Acessível", 'estado' => "MG", 'cidade' => "Belo Horizonte", 'tipo' => "Cultura", 'descricao' => "Projetos jovens com acessibilidade", 'lat' => -19.9245, 'lng' => -43.9352],
        ];

        foreach ($servicos as $dados) {
            $city = City::where('name', $dados['cidade'])
                        ->where('state', $dados['estado'])
                        ->first();

            if ($city) {
                Service::create([
                    'nome' => $dados['nome'],
                    'tipo' => $dados['tipo'],
                    'descricao' => $dados['descricao'],
                    'cidade_id' => $city->id,
                    'lat' => $dados['lat'],
                    'lng' => $dados['lng'],
                ]);
            }
        }

    }
}
