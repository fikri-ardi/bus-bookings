<?php

namespace App\Http\Controllers;

use Directory;
use App\Models\{Bus, Order, Driver};
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
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
        $orders = Order::paginate(10);
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = Driver::get();
        $buses = Bus::get();
        return view('orders.create', compact('drivers', 'buses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $start_rent = $request->start_rent_date;
        $total_rent = $request->total_rent_days;
        $end_rent = date('Y-m-d', strtotime("$total_rent days", strtotime($start_rent)));
        $bus_id = $request->bus_id;
        $driver_id = $request->driver_id;

        $isBusBussy = Order::whereRaw("bus_id='$bus_id' AND ('$start_rent' between start_rent_date AND start_rent_date + interval total_rent_days day OR '$end_rent' between start_rent_date AND start_rent_date + interval total_rent_days day OR start_rent_date between '$start_rent' AND '$start_rent' + interval '$total_rent' day )")->get();

        $isDriverBussy = Order::whereRaw("driver_id='$driver_id' AND ('$start_rent' between start_rent_date AND start_rent_date + interval total_rent_days day OR '$end_rent' between start_rent_date AND start_rent_date + interval total_rent_days day OR start_rent_date between '$start_rent' AND '$start_rent' + interval '$total_rent' day)")->get();

        if (count($isBusBussy) > 0) {
            return redirect()->back()
                ->withErrors(['bus_id' => 'The choosen driver is bussy on the choosen date, please choose another date.'])
                ->withInput();
        }

        if (count($isDriverBussy) > 0) {
            return redirect()->back()
                ->withErrors(['driver_id' => 'The choosen driver is bussy on the choosen date, please choose another date.'])
                ->withInput();
        }

        Order::create($request->all());
        return redirect('orders')->with('status', 'The order data has been created successfully.');
    }
    public function show()
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $drivers = Driver::get();
        $buses = Bus::get();
        return view('orders.edit', compact('order', 'drivers', 'buses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        $start_rent = $request->start_rent_date;
        $total_rent = $request->total_rent_days;
        $end_rent = date('Y-m-d', strtotime("$total_rent days", strtotime($start_rent)));
        $bus_id = $request->bus_id;
        $driver_id = $request->driver_id;

        $isBusBussy = Order::whereRaw("bus_id='$bus_id' AND id!='$order->id'  AND ('$start_rent' between start_rent_date AND start_rent_date + interval total_rent_days day OR '$end_rent' between start_rent_date AND start_rent_date + interval total_rent_days day)")->get();

        $isDriverBussy = Order::whereRaw("driver_id='$driver_id' AND id!='$order->id'  AND ('$start_rent' between start_rent_date AND start_rent_date + interval total_rent_days day OR '$end_rent' between start_rent_date AND start_rent_date + interval total_rent_days day)")->get();

        if (count($isBusBussy) > 0) {
            return redirect()->back()
                ->withErrors(['bus_id' => 'The choosen driver is bussy on the choosen date, please choose another date.'])
                ->withInput();
        }

        if (count($isDriverBussy) > 0) {
            return redirect()->back()
                ->withErrors(['driver_id' => 'The choosen driver is bussy on the choosen date, please choose another date.'])
                ->withInput();
        }

        $order->update($request->all());
        return redirect('orders')->with('status', 'The order data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('orders')->with('status', 'The order data has been deleted successfully.');
    }

    public function print()
    {
        $orders = Order::get();
        return view('orders.print', compact('orders'));
    }
    public function export()
    {
        $orders = Order::get();
        return view('orders.export', compact('orders'));
    }
}