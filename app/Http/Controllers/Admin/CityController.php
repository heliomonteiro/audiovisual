<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('nome')->paginate(20);
        return view('admin.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('admin.cities.create');
    }

    public function store(StoreCityRequest $request)
    {
/*        
        $request->validate([
            'nome' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
        ]);

        City::create([
            'nome' => $request->nome,
            'estado' => $request->estado,
            'slug' => Str::slug($request->nome),
        ]);
*/

        $data = $request->validated();

        // Gerar slug a partir do nome
        $data['slug'] = Str::slug($data['nome']);

        City::create($data);
        return redirect()->route('admin.cities.index')->with('success', 'Cidade criada com sucesso!');
    }

    public function show(City $city)
    {
        return view('admin.cities.show', compact('city'));
    }

    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    public function update(UpdateCityRequest $request, City $city)
    {
/*
        $request->validate([
            'nome' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
        ]);

        $city->update([
            'nome' => $request->nome,
            'estado' => $request->estado,
            'slug' => Str::slug($request->nome),
        ]);
*/

        $data = $request->validated();

        // Gerar slug a partir do nome
        $data['slug'] = Str::slug($data['nome']);

        $city->update($request->validated());
        return redirect()->route('admin.cities.index')->with('success', 'Cidade atualizada com sucesso!');
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('admin.cities.index')->with('success', 'Cidade excluída com sucesso!');
    }
}
