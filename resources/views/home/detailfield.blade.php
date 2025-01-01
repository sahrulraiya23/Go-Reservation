<!doctype html>
<html class="no-js" lang="en">
<base href="/public">
@include('home.css')

<body>
    @include('home.navbar')
    @include('home.navigasi')

    <section id="explore" class="explore" style="margin-top:-140px; ">
        <div class="container">
            <div class="center-top-container" style="margin-top:30px;">
                <img src="{{ asset('assets/images/Gova.png') }}" alt="Foto" class="img-fluid">
            </div>
            <div class="explore-content">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-sm-6">
                        <div class="single-explore-item text-center">
                            <img class="img-fluid" src="/fotolapang/{{ $field->image }}" alt="explore image"
                                style="height: 200px; width: 350px; object-fit: cover; border-radius: 8px; margin-top: 20px;">
                            <div class="single-explore-txt bg-theme-2 mt-4">
                                <h3 class="product-name">{{ $field->name }}</h3>
                                <p class="product-price">Harga: {{ $field->price }}</p>
                                <p class="product-type">Jenis: {{ $field->type }}</p>
                                <p class="product-type">Alamat: {{ $field->address }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-explore-item text-center">
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-bs-dismiss="alert">x</button>
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            @if ($errors)
                                @foreach ($errors->all() as $errors)
                                    <li style="color:red">
                                        {{ $errors }}
                                    </li>
                                @endforeach
                            @endif
                            <form action="{{ url('checkout', $field->id) }}" method="POST" style="margin-top:20px;"
                                class="booking-form">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name"
                                            @if (Auth::id()) value="{{ Auth::user()->name }}" @endif
                                            id="name" class="form-control" style="padding: 8px;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" id="email"
                                            @if (Auth::id()) value="{{ Auth::user()->email }}" @endif
                                            class="form-control" style="padding: 8px;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            @if (Auth::id()) value="{{ Auth::user()->phone }}" @endif
                                            style="padding: 8px;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date" class="col-sm-3 col-form-label">Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="date" id="date" class="form-control"
                                            style="padding: 8px;" min="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="start" class="col-sm-3 col-form-label">Start</label>
                                    <div class="col-sm-10" style="margin-left: 30px;">
                                        <div class="time-picker-buttons">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="setStartTime('08:00')" id="startBtn01">08:00</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="setStartTime('09:00')" id="startBtn02">09:00</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="setStartTime('10:00')" id="startBtn03">10:00</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="setStartTime('11:00')" id="startBtn04">11:00</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="setStartTime('12:00')" id="startBtn05">12:00</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="setStartTime('13:00')" id="startBtn06">13:00</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="setStartTime('14:00')" id="startBtn06">14:00</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="setStartTime('15:00')" id="startBtn06">15:00</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="setStartTime('16:00')" id="startBtn06">16:00</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="setStartTime('17:00')" id="startBtn06">17:00</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="setStartTime('18:00')" id="startBtn06">18:00</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="setStartTime('19:00')" id="startBtn06">19:00</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="setStartTime('20:00')" id="startBtn06">20:00</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="setStartTime('21:00')" id="startBtn06">21:00</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="setStartTime('22:00')" id="startBtn06">22:00</button>

                                        </div>
                                        <input type="hidden" name="start" id="start" class="form-control"
                                            style="padding: 8px;">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-8">
                                        <div class="time-picker-buttons">
                                            <!-- End buttons will be hidden because time is automatically calculated -->
                                            <input type="hidden" name="end" id="end" class="form-control"
                                                style="padding: 8px;">
                                        </div>
                                    </div>
                                </div>

                                <style>
                                    .btn-outline-primary {
                                        padding: 10px 20px;
                                        font-size: 14px;
                                        margin: 5px;
                                        transition: all 0.3s ease;
                                    }

                                    .btn-outline-primary:focus {
                                        outline: 2px solid blue !important;
                                        box-shadow: 0 0 5px rgba(0, 0, 255, 0.5);
                                    }

                                    .time-picker-buttons button {
                                        margin: 5px;
                                    }

                                    .btn:focus {
                                        box-shadow: 0 0 5px rgba(0, 0, 255, 0.5);
                                        border: 2px solid blue;
                                    }
                                </style>

                                <script>
                                    // Fungsi untuk mengatur waktu Start dan otomatis mengatur waktu End 1 jam setelahnya
                                    function setStartTime(time) {
                                        document.getElementById('start').value = time;

                                        // Menghitung waktu End (1 jam setelah Start)
                                        var endTime = getEndTime(time);
                                        document.getElementById('end').value = endTime;

                                        // Highlight tombol yang dipilih
                                        highlightButton('start', time);
                                    }

                                    // Fungsi untuk menghitung waktu End (1 jam setelah Start)
                                    function getEndTime(startTime) {
                                        var hours = parseInt(startTime.split(':')[0]);
                                        var minutes = parseInt(startTime.split(':')[1]);

                                        // Tambah 1 jam
                                        hours = (hours + 1) % 24;

                                        // Format waktu End
                                        return (hours < 10 ? '0' : '') + hours + ':' + (minutes < 10 ? '0' : '') + minutes;
                                    }

                                    // Fungsi untuk memberi highlight pada tombol yang diklik
                                    function highlightButton(type, time) {
                                        // Reset semua tombol
                                        var buttons = document.querySelectorAll('.' + type + '-picker-buttons button');
                                        buttons.forEach(function(button) {
                                            button.classList.remove('btn-primary');
                                            button.classList.add('btn-outline-primary');
                                        });

                                        // Beri highlight pada tombol yang dipilih
                                        var selectedButton = document.getElementById(type + 'Btn' + time.replace(':', ''));
                                        selectedButton.classList.remove('btn-outline-primary');
                                        selectedButton.classList.add('btn-primary');
                                    }
                                </script>



                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Book"></input>

                                </div>

                            </form>
                            <!-- Modal -->


                        </div>
                    </div>
                </div>
            </div><!--/.explore-content-->
        </div><!--/.container-->
    </section><!-- Section Explore -->

    <!-- Include all js compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootsnav.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>
