@extends('layouts.app', ['title'=>'Driver | Edit driver data'])

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Edit Driver
        </div>
        <div class="card-body">
            <form action="{{ route('drivers.update', $driver->id) }}" method="POST">
                @csrf
                @method('patch')

                <x-input field="name" :model="$driver" placeholder="Enter driver's name" />
                <x-input field="age" :model="$driver" placeholder="Enter driver's age" />
                <x-input field="id_number" :model="$driver" placeholder="Enter id number" />

                <button type="submit" class="btn btn-primary">Add Driver</button>
            </form>
        </div>
    </div>
</div>
@endsection