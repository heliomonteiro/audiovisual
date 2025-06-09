<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\City;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;


class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('cidade')->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $cities = City::orderBy('nome')->get();
        return view('admin.services.create', compact('cities'));
    }

    public function store(StoreServiceRequest $request)
    {
        Service::create($request->validated());
        return redirect()->route('admin.services.index')->with('success', 'Serviço criado com sucesso!');
    }

    public function edit(Service $service)
    {
        $cities = City::orderBy('nome')->get();
        return view('admin.services.edit', compact('service', 'cities'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->validated());
        return redirect()->route('admin.services.index')->with('success', 'Serviço atualizado com sucesso!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Serviço excluído com sucesso!');
    }
}
