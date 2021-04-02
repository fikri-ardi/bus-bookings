<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export buse data</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <script>
        window.print()
    </script>

    <table cellspacing="0" border="1">
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

</body>

</html>