<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\JobOffer;
use App\Http\Requests\StoreJobOfferRequest;
use App\Http\Requests\UpdateJobOfferRequest;

class JobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $job_offers = JobOffer::with('cidade')->paginate(10);
        return view('admin.job_offers.index', compact('job_offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::orderBy('nome')->get();
        return view('admin.job_offers.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobOfferRequest $request)
    {
        JobOffer::create($request->validated());
        return redirect()->route('admin.job_offers.index')->with('success', 'Vaga criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobOffer $job_offer)
    {
        $cities = City::orderBy('nome')->get();
        return view('admin.job_offers.edit', compact('job_offer', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobOfferRequest $request, JobOffer $job_offer)
    {
        $job_offer->update($request->validated());
        return redirect()->route('admin.job_offers.index')->with('success', 'Vaga atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobOffer $job_offer)
    {
        $job_offer->delete();
        return redirect()->route('admin.job_offers.index')->with('success', 'Vaga excluída com sucesso!');
    }
}
