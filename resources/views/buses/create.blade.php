@extends('layouts.app', ['title'=>'Bus | Create bus data'])

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Create Bus
        </div>
        <div class="card-body">
            <form action="{{ route('buses.store') }}" method="POST">
                @csrf

                <x-input field="plate_number" placeholder="Enter plate number" />

                <x-select-group field="brand" label="Brand">
                    <option {{ old('brand') == 'Mercedes' ? 'selected' : '' }} value="Mercedes">Mercedes</option>
                    <option {{ old('brand') == 'Scania' ? 'selected' : '' }} value="Scania">Scania</option>
                    <option {{ old('brand') == 'Fuso' ? 'selected' : '' }} value="Fuso">Fuso</option>
                </x-select-group>

                <x-input field="seat" placeholder="Enter seat" />
                <x-input field="price_per_day" placeholder="Enter price per day" />

                <button type="submit" class="btn btn-primary">Add Bus</button>
            </form>
        </div>
    </div>
</div>
@endsection