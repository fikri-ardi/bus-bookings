<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isDriver']);
    }

    public function index()
    {
        $user_id = auth()->id();
        $orders = Order::where("driver_id", $user_id)->paginate(10);
        return view('schedules.index', compact('orders'));
    }

    public function show()
    {
        return redirect()->back();
    }

    public function print()
    {
        $user_id = auth()->id();
        $orders = Order::where("driver_id", $user_id)->paginate(10);
        return view('schedules.print', compact('orders'));
    }
    public function export()
    {
        $user_id = auth()->id();
        $orders = Order::where("driver_id", $user_id)->paginate(10);
        return view('schedules.export', compact('orders'));
    }
}