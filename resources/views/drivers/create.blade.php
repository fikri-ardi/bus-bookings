@extends('layouts.app', ['title'=>'Driver | Create driver data'])

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Create Driver
        </div>
        <div class="card-body">
            <form action="{{ route('drivers.store') }}" method="POST">
                @csrf

                <x-input field="name" placeholder="Enter driver's name" />
                <x-input field="age" placeholder="Enter driver's age" />
                <x-input field="id_number" placeholder="Enter id number" />

                <button type="submit" class="btn btn-primary">Add Driver</button>
            </form>
        </div>
    </div>
</div>
@endsection