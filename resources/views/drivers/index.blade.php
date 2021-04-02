@extends('layouts.app', ['title'=>'Drivers | All drivers data'])

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Drivers
        </div>
        <div class="card-body">
            <a href="{{ route('drivers.create') }}" class="btn btn-primary">Add Driver</a>
            <a href="{{ route('drivers.print') }}" class="btn btn-info">Print</a>
            <a href="{{ route('drivers.export') }}" class="btn btn-success">Export to excel</a>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>ID Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($drivers as $driver)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $driver->name }}</td>
                        <td>{{ $driver->age }}</td>
                        <td>{{ $driver->id_number }}</td>
                        <td>
                            <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('drivers.destroy', $driver->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="alert alert-info">No driver data available.</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{ $drivers->links() }}
</div>
@endsection