<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <script src="//code.jquery.com/jquery-1.12.3.js"></script>
        <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script
            src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet"
            href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet"
            href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <script
            src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        </head>
        <style>
        </style>

    </head>
    <body class="antialiased">
        <div class="containert">
            <h1>Business Page</h1>
            <!-- Add a link to /business -->

            <table>
                <table class="table" id="businessTable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Municipallity</th>
                            <th class="text-center">Year</th>
                            <th class="text-center">BusinessName</th>
                            <th class="text-center">IndustryLabel</th>
                            <th class="text-center">Employees</th>
                            <th class="text-center">LATITUDE</th>
                            <th class="text-center">LONGITUDE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($businessData as $item)
                        <tr>
                            <td>{{ $item->ids }}</td>
                            <td>{{ $item->Municipallity }}</td>
                            <td>{{ $item->Year }}</td>
                            <td>{{ $item->BusinessName }}</td>
                            <td>{{ $item->IndustryLabel }}</td>
                            <td>{{ $item->Employees }}</td>
                            <td>{{ $item->LATITUDE }}</td>
                            <td>{{ $item->LONGITUDE }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                <table>
            </table>

        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#businessTable').DataTable();
            });
        </script>
    </body>
</html>