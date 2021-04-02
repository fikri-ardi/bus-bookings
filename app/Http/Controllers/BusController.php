<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Http\Requests\BusRequest;
use App\Models\User;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;

class BusController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buses = Bus::paginate(10);
        return view('buses.index', compact('buses'));
    }

    public function show()
    {
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusRequest $request)
    {
        Bus::create(request()->all());
        return redirect('buses')->with('status', 'The bus data has been created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function edit(Bus $bus)
    {
        return view('buses.edit', compact('bus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function update(BusRequest $request, Bus $bus)
    {
        $bus->update($request->all());
        return redirect('buses')->with('status', 'The bus data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bus $bus)
    {
        $bus->delete();
        return redirect('buses')->with('status', 'The bus data has been deleted successfully.');
    }

    public function print()
    {
        $buses = Bus::get();
        return view('buses.print', compact('buses'));
    }
    public function export()
    {
        $buses = Bus::get();
        return view('buses.export', compact('buses'));
    }
}