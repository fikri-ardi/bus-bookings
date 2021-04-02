@extends('layouts.app', ['title'=>'Bus | Edit bus data'])

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Edit Bus
        </div>
        <div class="card-body">
            <form action="{{ route('buses.update', $bus->id) }}" method="POST">
                @csrf
                @method('patch')

                <x-input field="plate_number" :model="$bus" placeholder="Enter plate number" />

                <x-select-group field="brand" label="Brand">
                    <option {{ old('brand') == 'Mercedes' || $bus->brand == 'Mercedes' ? 'selected' : '' }} value="Mercedes">Mercedes</option>
                    <option {{ old('brand') == 'Fuso'|| $bus->brand == 'Fuso' ? 'selected' : '' }} value="Fuso">Fuso</option>
                    <option {{ old('brand') == 'Scania'|| $bus->brand == 'Scania' ? 'selected' : '' }} value="Scania">Scania</option>
                </x-select-group>

                <x-input field="seat" :model="$bus" placeholder="Enter seat" />
                <x-input field="price_per_day" :model="$bus" placeholder="Enter price per day" />

                <button type="submit" class="btn btn-primary">Add Bus</button>
            </form>
        </div>
    </div>
</div>
@endsection