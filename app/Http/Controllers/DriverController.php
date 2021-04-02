<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Http\Requests\DriverRequest;

class DriverController extends Controller
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
        $drivers = Driver::paginate(10);
        return view('drivers.index', compact('drivers'));
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
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriverRequest $request)
    {
        Driver::create($request->all());
        return redirect('drivers')->with('status', 'The driver data has been created sucessfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(DriverRequest $request, Driver $driver)
    {
        $driver->update($request->all());
        return redirect('drivers')->with('status', 'The driver data has been updated sucessfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect('drivers')->with('status', 'The driver data has been deleted sucessfully.');
    }

    public function print()
    {
        $drivers = Driver::get();
        return view('drivers.print', compact('drivers'));
    }
    public function export()
    {
        $drivers = Driver::get();
        return view('drivers.export', compact('drivers'));
    }
}