<section id="home" class="welcome-hero">
    <div class="container">
        <div class="welcome-hero-txt">
            <h2>best place to find and explore <br> that all you need </h2>
            <p>
                Find Best Sports Venues, Basketball, Soccer, and More in Just One Click!
            </p>
        </div>
        <div class="welcome-hero-serch-box">
            <form action="{{ url('/') }}" method="GET" class="search-form">
                <div class="welcome-hero-form">
                    <div class="single-welcome-hero-form">
                        <h3>Lapangan</h3>
                        <input type="text" name="search" class="form-control" placeholder="Cari lapangan..."
                            value="{{ request('search') }}">
                        <div class="welcome-hero-form-icon">
                            <i class="flaticon-list-with-dots"></i>
                        </div>
                    </div>
                </div>
                <div class="welcome-hero-search">
                    <button class="welcome-hero-btn" type="submit">
                        Cari <i data-feather="search"></i>
                    </button>
                </div>
            </form>

        </div>
    </div>

</section>
