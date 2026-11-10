<section class="page-hero">
    <div class="container">
        <h1>যোগাযোগ</h1>
        <p class="mb-2">যেকোনো প্রশ্ন বা পরামর্শে আমাদের জানান</p>
        <nav class="crumb"><a href="<?= base_url() ?>">হোম</a><span>/</span>যোগাযোগ</nav>
    </div>
</section>
<section class="feat">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-5">
                <div class="info-card">
                    <i class="bi bi-geo-alt"></i>
                    <div>
                        <h6>ঠিকানা</h6>
                        <p class="mb-0">ঢাকা, বাংলাদেশ</p>
                    </div>
                </div>
                <div class="info-card">
                    <i class="bi bi-telephone"></i>
                    <div>
                        <h6>ফোন</h6>
                        <p class="mb-0"><a href="tel:+880 1540-701151">+880 1540-701151</a></p>
                    </div>
                </div>
                <div class="info-card">
                    <i class="bi bi-envelope"></i>
                    <div>
                        <h6>ইমেইল</h6>
                        <p class="mb-0"><a href="mailto:labibait4@gmail.com">labibait4@gmail.com</a></p>
                    </div>
                </div>
                <div class="info-card">
                    <i class="bi bi-clock"></i>
                    <div>
                        <h6>অফিস সময়</h6>
                        <p class="mb-0">শনি – বৃহস্পতি<br />সকাল ১০টা – সন্ধ্যা ৬টা</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <form class="panel" action="#" method="post">
                    <h6>আমাদের বার্তা পাঠান</h6>
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">আপনার নাম <span class="text-danger">*</span></label
                                ><input class="form-control" type="text" name="name" required />
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">মোবাইল নম্বর</label
                                ><input class="form-control" type="tel" name="phone" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">ইমেইল <span class="text-danger">*</span></label
                                ><input class="form-control" type="email" name="email" required />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">বিষয় <span class="text-danger">*</span></label
                                ><input class="form-control" type="text" name="subject" required />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">বার্তা <span class="text-danger">*</span></label
                                ><textarea class="form-control" name="message" rows="5" required></textarea>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-g btn-lg w-100">বার্তা পাঠান</button>
                </form>
            </div>
        </div>
    </div>
</section>
