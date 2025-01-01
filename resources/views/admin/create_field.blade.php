<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        label {
            display: inline-block;
            width: 200px;
        }

        .div_deg {
            padding-top: 30px;
        }
    </style>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <div>
                        <form action="{{ url('add_field') }}" method="Post" enctype="multipart/form-data">
                            @csrf
                            <div class="div_deg">
                                <label for="">Nama Lapangan : </label>
                                <input type="text" name="name" id="">
                            </div>
                            <div class="div_deg">
                                <label for="">Jenis Lapangan : </label>
                                <select name="type" id="">
                                    <option value="futsal">Futsal</option>
                                    <option value="biliar">biliar</option>
                                    <option value="badminton">badminton</option>
                                    <option value="basket">basket</option>
                                </select>
                            </div>
                            <div class="div_deg">
                                <label for="">Alamat : </label>
                                <input type="text" name="address" id="">
                            </div>
                            <div class="div_deg">
                                <label for="">Harga : </label>
                                <input type="text" name="price" id="">
                            </div>
                            <div class="div_deg">
                                <label for="">Foto Lapangan : </label>
                                <input type="file" name="image" id="">
                            </div>
                            <div>
                                <input class="btn btn-primary" type="submit" value="Add Field">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Navigation end-->

    </div>
    <!-- JavaScript files-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/popper.js/umd/popper.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admin/vendor/jquery.cookie/jquery.cookie.js"></script>
    <script src="admin/vendor/chart.js/Chart.min.js"></script>
    <script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admin/js/charts-home.js"></script>
    <script src="admin/js/front.js"></script>
</body>

</html>
