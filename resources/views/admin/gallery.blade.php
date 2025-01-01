<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
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
                    <center>
                        <h1 style="font-size: 40px;font-weight:bold;color:white">Gallery</h1>
                        <div class="row">
                            @foreach ($gallery as $gallery)
                                <div class="col-md-4">
                                    <img style="height:200px!important;width:300px!important;margin-top:15px"
                                        src="/gallary/{{ $gallery->image }}" alt="">
                                    <a style="margin-top:10px" class="btn btn-danger"
                                        href="{{ url('delete_gallery', $gallery->id) }}">Delete image</a>
                                </div>
                            @endforeach
                        </div>
                        <form action="{{ url('upload_gallery') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div style="margin-top:30px">
                                <label for="image">
                                    Upload</label>
                                <input type="file" name="image" id="image">
                                <input class="btn btn-success" type="submit" value="Add Image">
                            </div>


                        </form>

                    </center>
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
