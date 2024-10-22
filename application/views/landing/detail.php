<!-- Detail Start -->
<div class="container-fluid py-6">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                <img src="<?= base_url('assets/files/katalog/') . $detailKatalog->image; ?>" class="img-fluid rounded"
                    alt="">
            </div>
            <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                <?= $this->session->flashdata('message') ?>
                <h1 class="display-5 mb-4"><?= $detailKatalog->package_name; ?></h1>
                <p class="mb-4"><?= $detailKatalog->description; ?></p>
                <h4 class="display-5 mb-4">Rp.<?= number_format($detailKatalog->price, 2, ",", "."); ?></h4>

            </div>
        </div>
    </div>
</div>
<!-- Detail End -->

<!-- Book Us Start -->
<div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-0">
            <div class="col-1">
                <img src="<?= base_url('assets/landing/') ?>img/background-site.jpg"
                    class="img-fluid h-100 w-100 rounded-start" style="object-fit: cover; opacity: 0.7;" alt="">
            </div>
            <div class="col-10">
                <div class="border-bottom border-top border-primary bg-light py-5 px-4">
                    <div class="text-center">
                        <h1 class="display-5 mb-5">Apakah Anda Tertarik? Pesan Sekarang!</h1>
                    </div>
                    <form action="<?= base_url('Beranda/pesan'); ?>" method="post">
                        <input type="hidden" name="id" value="<?= $this->input->get('id'); ?>">
                        <div class="row g-4 form">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="name" class="form-control border-primary p-2"
                                        placeholder="Enter Your Name" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control border-primary p-2"
                                        placeholder="Enter Your Email" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="phoneNumber">Nomor Telepon</label>
                                    <input type="number" class="form-control border-primary p-2"
                                        placeholder="Enter Your Phone Number" id="phoneNumber" name="phone_number"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="date">Tanggal Pernikahan</label>
                                    <input type="date" class="form-control border-primary p-2" placeholder="Select Date"
                                        id="date" name="wedding_date" required>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill">Submit Now</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-1">
            <img src="<?= base_url('assets/landing/') ?>img/background-site.jpg"
                class="img-fluid h-100 w-100 rounded-end" style="object-fit: cover; opacity: 0.7;" alt="">
        </div>
    </div>
</div>
</div>
<!-- Book Us End -->