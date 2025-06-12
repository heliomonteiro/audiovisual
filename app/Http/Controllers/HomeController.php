<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home'); // sua view blade já criada
    }

    public function dadosHome()
    {
        $servicos = Service::with('cidade')->get()->map(function ($s) {
            return [
                'nome' => $s->nome,
                'estado' => $s->cidade->estado ?? '',
                'cidade' => $s->cidade->nome ?? '',
                'tipo' => $s->tipo,
                'descricao' => $s->descricao,
                'lat' => $s->lat,
                'lng' => $s->lng,
            ];
        });

        $vagas = JobOffer::with('cidade')->get()->map(function ($v) {
            return [
                'nome' => $v->nome,
                'estado' => $v->cidade->estado ?? '',
                'cidade' => $v->cidade->nome ?? '',
                'tipo' => $v->tipo,
                'descricao' => $v->descricao,
                'lat' => $v->lat,
                'lng' => $v->lng,
            ];
        });

        return response()->json([
            'servicos' => $servicos,
            'vagas' => $vagas,
        ]);
    }
    
}
