@extends('layouts.app', ['title'=>"Schedules | Driver schedules data"])

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Schedules
        </div>
        <div class="card-body">
            <a href="{{ route('schedules.print') }}" class="btn btn-info">Print</a>
            <a href="{{ route('schedules.export') }}" class="btn btn-success">Export to Excel</a>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Bus Plate Number</th>
                        <th>Driver Name</th>
                        <th>Contact Name</th>
                        <th>Contact Phone</th>
                        <th>Start Rent Date</th>
                        <th>Total Rent Days</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->bus->plate_number }}</td>
                        <td>{{ $order->driver->name }}</td>
                        <td>{{ $order->contact_name }}</td>
                        <td>{{ $order->contact_phone }}</td>
                        <td>{{ $order->start_rent_date }}</td>
                        <td>{{ $order->total_rent_days }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">
                            <div class="alert alert-info">No orders data available.</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{ $orders->links() }}
@endsection