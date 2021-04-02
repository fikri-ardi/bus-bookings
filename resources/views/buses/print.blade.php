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
                <th>Plate Number</th>
                <th>Brand</th>
                <th>Seat</th>
                <th>Price Per Day</th>
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
            </tr>
            @empty
            <tr>
                <td colspan="6">
                    <div class="alert alert-info">No bus data available.</div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>