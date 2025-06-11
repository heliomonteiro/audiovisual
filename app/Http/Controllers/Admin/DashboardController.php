<?php

namespace App\Http\Controllers\Admin; // <<-- MUITO IMPORTANTE: O namespace agora inclui Admin

use App\Http\Controllers\Controller; // Continua extendendo o Controller base
use App\Models\City;
use App\Models\Service;
use App\Models\JobOffer;
use App\Models\User; // Presumindo que seu modelo de usuário seja App\Models\User
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Exibe o dashboard do usuário com dados dinâmicos.
     */
    public function index(): View
    {
        // Obtenha a contagem de cada entidade
        $cityCount = City::count();
        $serviceCount = Service::count();
        $jobOfferCount = JobOffer::count();
        $userCount = User::count();

        // Passa as contagens para a view 'dashboard.blade.php'
        return view('dashboard', [ // A view 'dashboard' ainda é a mesma
            'cityCount' => $cityCount,
            'serviceCount' => $serviceCount,
            'jobOfferCount' => $jobOfferCount,
            'userCount' => $userCount,
        ]);
    }
}