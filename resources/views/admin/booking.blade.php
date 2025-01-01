<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        .table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
            color: #ffffff;
            background-color: #343a40;
        }

        .table th {
            background-color: #454d55;
            color: #ffffff;
            padding: 10px;
            text-align: center;
        }

        .table td {
            padding: 10px;
            text-align: center;
            word-wrap: break-word;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #666;
        }

        .table-dark tbody tr:nth-of-type(odd) {
            background-color: #3d3d3d;
        }

        .table-dark tbody tr:nth-of-type(even) {
            background-color: #2e2e2e;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin-bottom: 20px;
        }
    </style>
    <!-- Tweaks for older IEs -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')

        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <table class="table table-dark table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Nama Customer</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Lapangan</th>
                                    <th>Harga</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $data->field_id }}</td>
                                        <td>{{ $data->name }}</td>

                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>
                                            @if ($data->status == 'approve')
                                                <span style="color:cornflowerblue">Approved</span>
                                            @endif
                                            @if ($data->status == 'reject')
                                                <span style="color:red">Reject</span>
                                            @endif
                                            @if ($data->status == 'waiting')
                                                <span style="color:yellow">Waiting</span>
                                            @endif

                                        </td>

                                        <td>{{ $data->room->name }}</td>
                                        <td>{{ number_format($data->room->price, 0, ',', '.') }}</td>
                                        <td>{{ $data->start }}</td>
                                        <td>{{ $data->end }}</td>
                                        <td>
                                            <img class="lapangan-image" src="fotolapang/{{ $data->room->image }}"
                                                alt="Lapangan"
                                                style="max-width: 400px; width: 150px; height: auto; object-fit: cover; border-radius: 5px;">

                                        </td>
                                        <td>
                                            <a class="btn btn-danger"
                                                href="{{ url('delete_booking', $data->id) }}">Delete</a>
                                        </td>
                                        <td>
                                            <span style="padding-bottom: 10px">
                                                <a class="btn btn-warning"
                                                    href="{{ url('approve_booking', $data->id) }}">Approve</a>
                                            </span>
                                            <a class="btn btn-success"
                                                href="{{ url('reject_booking', $data->id) }}">Reject</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="admin/vendor/jquery/jquery.min.js"></script>
        <script src="admin/vendor/popper.js/umd/popper.min.js"></script>
        <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="admin/vendor/jquery.cookie/jquery.cookie.js"></script>
        <script src="admin/vendor/chart.js/Chart.min.js"></script>
        <script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>
        <script src="admin/js/charts-home.js"></script>
        <script src="admin/js/front.js"></script>
    </div>
</body>

</html>
