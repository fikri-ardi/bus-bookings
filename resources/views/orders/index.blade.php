@extends('layouts.app', ['title'=>'Orders | All orders data'])

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Orders
        </div>
        <div class="card-body">
            <a href="{{ route('orders.create') }}" class="btn btn-primary">Add Order</a>
            <a href="{{ route('orders.print') }}" class="btn btn-info">Print</a>
            <a href="{{ route('orders.export') }}" class="btn btn-success">Export to Excel</a>
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
                        <th>Action</th>
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
                        <td>{{ $order->date_dmy }}</td>
                        <td>{{ $order->total_rent_days }}</td>
                        <td>
                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
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