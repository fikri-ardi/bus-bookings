@extends('layouts.app', ['title'=>'Buses | All bus data'])

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Buses
        </div>
        <div class="card-body">
            <a href="{{ route('buses.create') }}" class="btn btn-primary">Add Bus</a>
            <a href="{{ route('buses.print') }}" class="btn btn-info">Print</a>
            <a href="{{ route('buses.export') }}" class="btn btn-success">Export to excel</a>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Plate Number</th>
                        <th>Brand</th>
                        <th>Seat</th>
                        <th>Price Per Day</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($buses as $bus)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bus->plate_number }}</td>
                        <td>{{ $bus->brand }}</td>
                        <td>{{ $bus->seat }}</td>
                        <td>IDR {{ number_format($bus->price_per_day, 2,',') }}</td>
                        <td>
                            <a href="{{ route('buses.edit', $bus->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('buses.destroy', $bus->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="alert alert-info">No bus data available</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{ $buses->links() }}
</div>
@endsection