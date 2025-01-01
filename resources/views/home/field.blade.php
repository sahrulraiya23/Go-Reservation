<section id="explore" class="explore">
    <div class="container">
        <div class="section-header">
            <h2>Explore</h2>
            <p>Explore New place, food, culture around the world and many more</p>
        </div><!--/.section-header-->
        <div class="explore-content">
            <div class="row">
                @foreach ($field as $fields)
                    <div class="col-md-4 col-sm-6">
                        <div class="single-explore-item">
                            <div class="single-explore-img">
                                <img class="img-fluid" src="fotolapang/{{ $fields->image }}" alt="explore image">
                                <div class="single-explore-img-info">
                                    <button onclick="window.location.href='#'">Open</button>
                                    <div class="single-explore-image-icon-box">
                                        <ul>
                                            <li>
                                                <div class="single-explore-image-icon">
                                                    <i class="fa fa-arrows-alt"></i>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="single-explore-image-icon">
                                                    <i class="fa fa-bookmark-o"></i>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-explore-txt bg-theme-2">
                                <h2><a href="#">{{ $fields->name }}</a></h2>
                                <p class="explore-rating-price">
                                    <span class="explore-rating">4.5</span>
                                    <a href="#">8 ratings</a>
                                    <span class="explore-price-box">
                                        Harga
                                        <span class="explore-price">{{ $fields->price }}</span>
                                    </span>
                                    <a href="#">{{ $fields->type }}</a>
                                </p>
                                <div class="explore-person">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="explore-person-img">
                                                <a href="#">
                                                    <img src="assets/images/explore/person.png" alt="explore person">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <p>
                                                {{ $fields->address }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="explore-open-close-part">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <a class="close-btn open-btn"
                                                href="{{ url('field_details', $fields->id) }}">Book now</a>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="explore-map-icon">
                                                <a href="#"><i data-feather="map-pin"></i></a>
                                                <a href="#"><i data-feather="upload"></i></a>
                                                <a href="#"><i data-feather="heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
            <div class="pagination-wrapper">

                {{ $field->appends(['search' => request('search')])->links() }}
            </div>
        </div>
    </div><!--/.container-->
</section>
<!-- Section Title -->
<style>
    .pagination-wrapper {
        text-align: center;
        /* Memusatkan pagination */
    }

    .pagination-wrapper a {
        color: green;
        /* Memberikan warna hijau pada teks pagination */
    }

    .pagination-wrapper .active a {
        color: white;
        /* Warna teks saat halaman aktif */
        background-color: green;
        /* Background hijau untuk halaman aktif */
    }

    .single-explore-img {
        display: flex;
        justify-content: center;
        /* Memusatkan gambar secara horizontal */
        align-items: center;
        /* Memusatkan gambar secara vertikal */
        height: 220px;
        /* Menentukan tinggi tetap untuk gambar */
        width: 100%;
        /* Memastikan gambar mengisi lebar kontainer */
        overflow: hidden;
        /* Menyembunyikan bagian gambar yang melebihi kontainer */
    }

    .single-explore-img img {
        object-fit: cover;
        /* Memastikan gambar tidak terdistorsi dan mengisi kontainer */
        width: 100%;
        /* Memastikan gambar mengisi lebar kontainer */
        height: 100%;
        /* Memastikan gambar mengisi tinggi kontainer */
    }
</style>
