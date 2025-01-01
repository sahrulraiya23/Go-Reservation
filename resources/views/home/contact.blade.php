<section id="contact" class="contact-section py-5">
    <div class="container">
        <div class="section-header text-center mb-4">
            <h2 class="text-uppercase font-weight-bold">Contact Me</h2>
            <p class="lead">Feel free to reach out to me. I'll get back to you as soon as possible.</p>
        </div><!--/.section-header-->
        <div class="row">
            <!-- Formulir Kontak di sebelah kiri -->
            <div class="col-md-6 mb-4 mb-md-0">
                <div style="margin-top:0" class="explore-content bg-light p-5 rounded shadow-sm">
                    <form action="{{ url('contact') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="font-weight-semibold">Your Name</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name"
                                placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-weight-semibold">Your Email</label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email"
                                placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="font-weight-semibold">Your Phone</label>
                            <input type="tel" class="form-control form-control-lg" id="phone" name="phone"
                                placeholder="Enter your phone number" required>
                        </div>
                        <div class="form-group">
                            <label for="message" class="font-weight-semibold">Your Message</label>
                            <textarea class="form-control form-control-lg" id="message" name="message" rows="5"
                                placeholder="Enter your message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg btn-block">Send Message</button>
                    </form>
                </div>
            </div>

            <!-- Peta di sebelah kanan -->
            <div class="col-md-6">
                <!-- Embed Google Map -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63678.96740957682!2d122.43754148483275!3d-4.033592476444975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d988df2b5edb723%3A0x23226a67995c1bc8!2sKolam%20Retensi%20Boulevard%20%26%20Sarana%20Olahraga!5e0!3m2!1sid!2sid!4v1735399740814!5m2!1sid!2sid"
                    referrerpolicy="no-referrer-when-downgrade" width="100%" height="400" style="border:0;"
                    allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div><!--/.row-->
    </div><!--/.container-->
</section>
