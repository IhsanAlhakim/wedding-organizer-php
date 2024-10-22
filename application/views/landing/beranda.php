<!-- Hero Start -->
<div class="container-fluid bg-light py-6 my-6 mt-0"
    style="background-image: url('<?= base_url('assets/landing/') ?>img/hero_wedding.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7 col-md-12">
                <small
                    class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-4 animated bounceInDown">Welcome
                    to Wedding JeWePe</small>
                <h1 class="display-1 mb-4 animated bounceInDown" style="">Wujudkan
                    Mimpi <span class="text-primary">Pernikahan</span>Anda Menjadi Kenyataan</h1>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- About Start -->
<div class="container-fluid py-6">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                <img src="<?= base_url('assets/landing/') ?>img/about_wedding.jpg" class="img-fluid rounded" alt="">
            </div>
            <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                <small
                    class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">About
                    Us</small>
                <h1 class="display-5 mb-4">Dipercaya oleh lebih dari 200 Klien</h1>
                <p class="mb-4">Kami adalah tim profesional yang berdedikasi untuk mewujudkan hari istimewa Anda menjadi
                    sebuah acara yang tak terlupakan. Dengan pengalaman bertahun-tahun dalam industri pernikahan, kami
                    menawarkan berbagai layanan yang dirancang khusus untuk memenuhi kebutuhan dan keinginan Anda. Mulai
                    dari perencanaan konsep, dekorasi, hingga koordinasi pada hari-H, kami siap memberikan yang terbaik
                    untuk memastikan setiap detail berjalan sempurna. Komitmen kami adalah memberikan pelayanan yang
                    personal dan penuh perhatian, sehingga Anda dapat menikmati setiap detik dari perayaan cinta Anda.
                    Bersama kami, biarkan mimpi pernikahan Anda menjadi nyata.</p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Service Start -->
<div class="container-fluid service py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small
                class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our
                Services</small>
            <h1 class="display-5 mb-5">Paket Pernikahan</h1>
        </div>
        <div class="row g-4">
            <?php
            foreach ($getAllKatalog as $row):
                ?>
                <div class="col-lg-4 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-icon text-center">
                                <img src="<?= base_url('assets/files/katalog/') . $row->image; ?>" alt=""
                                    class="mb-3 img-fluid rounded">
                                <h4 class="mb-3"><?= $row->package_name; ?></h4>
                                <h3 class="mb-3">Rp. <?= number_format($row->price, 2, ",", "."); ?></h3>
                                <p class="mb-4"><?= word_limiter(strip_tags($row->description), 20); ?></p>
                                <a href="<?= base_url('Beranda/detail?id=') . $row->catalogue_id; ?>"
                                    class="btn btn-primary px-4 py-2 rounded-pill">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- Service End -->