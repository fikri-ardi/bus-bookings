@php
header('Content-type: application/vnd-ms-excel');
header('Content-Disposition: attachment; filename=Drivers_data_'.date('d M Y').'.xls');
@endphp

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

    <table cellspacing="0" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>ID Number</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($drivers as $driver)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $driver->name }}</td>
                <td>{{ $driver->age }}</td>
                <td>{{ $driver->id_number }}</td>
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

</body>

</html>