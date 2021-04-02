@extends('layouts.app', ['title'=>'Orders | Create order data'])

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Create Order
        </div>
        <div class="card-body">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf

                <x-select-group field="bus_id" label="Bus">
                    @forelse ($buses as $bus)
                    <x-option :condition=" old('bus_id') == $bus->id ? 'selected' : '' " :value="$bus->id"
                        :label='"$bus->brand, $bus->plate_number, $bus->seat seat"' />
                    @empty
                    <x-option :label="'No bus available'" />
                    @endforelse
                </x-select-group>

                <x-select-group field="driver_id" label="Driver">
                    @forelse ($drivers as $driver)
                    <x-option :condition=" old('driver_id') == $driver->id ? 'selected' : '' " :value="$driver->id"
                        :label='"$driver->name, $driver->age years old"' />
                    @empty
                    <x-option :label="'No driver available'" />
                    @endforelse
                </x-select-group>

                <x-input type="text" field="contact_name" placeholder="Enter contact name" />
                <x-input type="text" field="contact_phone" placeholder="Enter contact phone" />
                <x-input type="date" field="start_rent_date" min="{{ date('Y-m-d', strtotime('1 day')) }}" />
                <x-input type="text" field="total_rent_days" placeholder="Enter total rent days" />

                <button type="submit" class="btn btn-primary">Add Order</button>
            </form>
        </div>
    </div>
</div>
@endsection