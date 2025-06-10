<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\JobOffer;

class JobOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vagas = [
            [ 'nome' => "Auxiliar Administrativo", 'estado'=> "MG", 'cidade'=> "Uberaba", 'tipo' => "Administração", 'descricao' => "Empresa inclusiva", 'lat' => -19.75, 'lng' => -47.93 ],
            [ 'nome' => "Atendente Loja", 'estado'=> "SP", 'cidade'=> "São Paulo", 'tipo' => "Comércio", 'descricao' => "Loja com intérprete", 'lat' => -23.55, 'lng' => -46.64 ],
            [ 'nome' => "Recepcionista", 'estado'=> "MG", 'cidade'=> "Belo Horizonte", 'tipo' => "Atendimento", 'descricao' => "Ambiente acessível", 'lat' => -19.9167, 'lng' => -43.9345 ],
            [ 'nome' => "Assistente de RH", 'estado'=> "SP", 'cidade'=> "Campinas", 'tipo' => "Administração", 'descricao' => "Inclusão ativa", 'lat' => -22.9083, 'lng' => -47.0626 ],
            [ 'nome' => "Estoquista", 'estado'=> "MG", 'cidade'=> "Uberlândia", 'tipo' => "Logística", 'descricao' => "Armazém adaptado", 'lat' => -18.9181, 'lng' => -48.2749 ],
            [ 'nome' => "Monitor Escolar", 'estado'=> "SP", 'cidade'=> "São Paulo", 'tipo' => "Educação", 'descricao' => "Escola bilíngue Libras", 'lat' => -23.5523, 'lng' => -46.6345 ],
            [ 'nome' => "Técnico de Informática", 'estado'=> "MG", 'cidade'=> "Uberaba", 'tipo' => "Tecnologia", 'descricao' => "Empresa com acessibilidade digital", 'lat' => -19.7475, 'lng' => -47.9319 ],
            [ 'nome' => "Analista de Dados Júnior", 'estado'=> "SP", 'cidade'=> "Campinas", 'tipo' => "Tecnologia", 'descricao' => "Home office acessível", 'lat' => -22.9068, 'lng' => -47.0622 ],
            [ 'nome' => "Revisor de Textos", 'estado'=> "MG", 'cidade'=> "Belo Horizonte", 'tipo' => "Comunicação", 'descricao' => "Trabalho remoto com inclusão", 'lat' => -19.9198, 'lng' => -43.9384 ],
            [ 'nome' => "Promotor de Vendas", 'estado'=> "SP", 'cidade'=> "Santos", 'tipo' => "Comércio", 'descricao' => "Equipe treinada em Libras", 'lat' => -23.9611, 'lng' => -46.3332 ]
        ];

        foreach ($vagas as $dados) {
            $city = City::where('nome', $dados['cidade'])
                        ->where('estado', $dados['estado'])
                        ->first();

            if ($city) {
                JobOffer::create([
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
