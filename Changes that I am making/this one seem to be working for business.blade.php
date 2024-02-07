<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

         {{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>
    {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    {{-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">

    <!-- jQuery 2.x -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- ... (your existing HTML) ... -->
    <style>
        .body {
            max-width: 310em;
            margin: 0 auto; /* Center the body horizontally */

        }
        .custom-dropdown {
          width: 250px; /* Adjust the width as needed */
      }
  </style>

    </head>
    <body class="antialiased">
        <div class="containert">
            <h1>Business Page</h1>
            <!-- Add a link to /business -->
            <div class="form-group">
                <label for="citySelect">Select City:</label>
                <select id="citySelect" class="form-control custom-dropdown">
                    <option value="">All Cities</option>
                    @foreach($cities as $city)
                        @if($city !== 'Municipality')
                            <option value="{{ $city }}">{{ $city }}</option>
                        @endif
                    @endforeach
                </select>
        
                <button type="button" class='btn btn-info' data-toggle='modal' data-target='#editModal'>Update Business</button>
            </div>

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
        <div id="editModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit</h4>
                    </div>
                    <div class="modal-body">
                        <!-- Your form or content goes here -->
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="fid" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="fname">Municipality</label>
                                <div class="col-sm-10">
                                    {{-- <input type="name" class="form-control" id="fname"> --}}
                                    <select id="citySelect" class="form-control custom-dropdown">
                                        {{-- <option value="">All Cities</option> --}}
                                        @foreach($cities as $city)
                                            @if($city !== 'Municipality')
                                                <option value="{{ $city }}">{{ $city }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <p class="fname_error error text-center alert alert-danger hidden"></p>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="year">Year</label>
                                <div class="col-sm-10">
                                    <input type="name" class="form-control" id="year">
                                </div>
                            </div>
                            <p class="lname_error error text-center alert alert-danger hidden"></p>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="businessName">Business Name</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="businessName">
                                </div>
                            </div>
                            <p class="email_error error text-center alert alert-danger hidden"></p>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="industry">Industry Label</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="industry">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="employee">Employees:</label>
                                <div class="col-sm-10">
                                    <input type="name" class="form-control" id="employee">
                                </div>
                            </div>
                            <p
                                class="country_error error text-center alert alert-danger hidden"></p>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="lat">Latitude </label>
                                <div class="col-sm-10">
                                    <input type="name" class="form-control" id="lat">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="long">Longitude </label>
                                <div class="col-sm-10">
                                    <input type="name" class="form-control" id="long">
                                </div>
                            </div>
                            <p
                                class="salary_error error text-center alert alert-danger hidden"></p>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">
                            <span id="footer_action_button" class='glyphicon glyphicon'> Request </span>
                        </button>
                        {{-- <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button> --}}
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                dataTable = $('#businessTable').DataTable();

                // Add event listener to the city dropdown
                $('#citySelect').change(function() {
                    var selectedCity = $(this).val();
                    dataTable.column(1).search(selectedCity).draw();
                });
            });
        </script>
    </body>
</html>