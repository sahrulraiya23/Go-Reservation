<section id="blog" class="blog">
    <div class="container">
        <div class="section-header">
            <h2>Gallery</h2>
            <p></p>
        </div><!--/.section-header-->
        <div class="blog-content">
            <div class="row">
                @foreach ($gallery as $gallery)
                    <div class="col-md-4 col-sm-6">
                        <div class="single-blog-item">
                            <div class="single-blog-item-img">
                                <img src="/gallary/{{ $gallery->image }}" alt="blog image" class="img-fluid">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div><!--/.container-->
</section>
<style>
    .single-blog-item-img img {
        width: 100%;
        /* Memastikan gambar mengisi lebar kolom */
        height: 200px;
        /* Menentukan tinggi gambar tetap */
        object-fit: cover;
        /* Memastikan gambar tidak terdistorsi dan mengisi area dengan proporsional */
    }
</style>
