@extends('layouts.app', ['title'=>'Orders | Edit order data'])

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Edit Order
        </div>
        <div class="card-body">
            <form action="{{ route('orders.update', $order->id) }}" method="POST">
                @csrf
                @method('patch')

                <x-select-group field="bus_id" label="Bus">
                    @forelse ($buses as $bus)
                    <x-option :condition="old('bus_id') == $bus->id || $bus->id == $order->bus_id" :value="$bus->id"
                        :label="$bus->brand, $bus->plate_number, $bus->seat" />
                    @empty
                    <x-option :label=" 'No bus available.' " />
                    @endforelse
                </x-select-group>

                <x-select-group field="driver_id" label="Driver">
                    @forelse ($drivers as $driver)
                    <x-option :condition="old('driver_id') == $driver->id || $driver->id == $order->driver_id" :value="$driver->id"
                        :label='"$driver->name, $driver->age years old"' />
                    @empty
                    <x-option :label=" 'No driver available.' " />
                    @endforelse
                </x-select-group>

                <x-input type="text" field="contact_name" :model="$order" placeholder="Enter contact name" />
                <x-input type="text" field="contact_phone" :model="$order" placeholder="Enter contact phone" />
                <x-input type="date" field="start_rent_date" :model="$order" min="{{ date('Y-m-d', strtotime('1 day')) }}" />
                <x-input type="text" field="total_rent_days" :model="$order" placeholder="Enter total rent days" />

                <button type="submit" class="btn btn-primary">Add Order</button>
            </form>
        </div>
    </div>
</div>
@endsection