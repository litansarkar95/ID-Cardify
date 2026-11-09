<!doctype html>
<html lang="bn">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>IDGen – অনলাইনে আইডি কার্ড তৈরি ও প্রিন্ট করুন</title>
        <link
            href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap"
            rel="stylesheet"
        />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
            rel="stylesheet"
        />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.css" rel="stylesheet">
       <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    </head>
    <body id="top">
        <!-- ===== TOP BAR ===== -->
        <div class="topbar">
            <div class="container d-flex justify-content-between align-items-center flex-wrap gap-1">
                <div class="tb-left">
                    <a href="mailto:support@yourdomain.com"><i class="bi bi-envelope me-1"></i>support@yourdomain.com</a
                    ><a href="tel:+880 1700-000000"><i class="bi bi-telephone me-1"></i>+880 1700-000000</a>
                </div>
                <div class="tb-right">
                    <span class="tb-soc"
                        ><a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a
                        ><a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a
                        ><a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a
                    ></span>
                    <span class="sep"></span><a href="<?= base_url() ?>login">সাইন ইন</a><span class="sep"></span
                    ><a href="<?= base_url() ?>register">অ্যাকাউন্ট খুলুন</a>
                </div>
            </div>
        </div>

      <?php include(APPPATH . 'views/frontend/layouts/sidebar.php'); ?>

        <?php
             if(isset($content)){
               echo $content;
             }
             
             ?>
        <!-- ===== FOOTER ===== -->
        <div class="greenstrip">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="fs-4">বিনামূল্যে শুরু করুন</div>
                        <div class="fs-3 fw-semibold">কোনো ক্রেডিট কার্ড লাগবে না</div>
                        <i class="bi bi-gift"></i>
                    </div>
                    <div class="col-md-4">
                        <div class="fs-4">সাথে সাথে তৈরি</div>
                        <div class="fs-3 fw-semibold">প্রিন্ট-রেডি কার্ড</div>
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                    <div class="col-md-4">
                        <div class="fs-4">কোনো ন্যূনতম সংখ্যা নেই</div>
                        <div class="fs-3 fw-semibold">যত খুশি কার্ড</div>
                        <i class="bi bi-infinity"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="darkstrip">
            <div class="container">
                <div class="row g-3">
                    <div class="col-6 col-lg-3 d-flex align-items-center">
                        <i class="bi bi-link-45deg"></i>
                        <div><b>ফর্ম লিংক</b><br /><small>প্রতিটি প্রতিষ্ঠানের আলাদা লিংক</small></div>
                    </div>
                    <div class="col-6 col-lg-3 d-flex align-items-center">
                        <i class="bi bi-phone"></i>
                        <div><b>মোবাইল ফ্রেন্ডলি</b><br /><small>ফোন থেকেই ফর্ম পূরণ</small></div>
                    </div>
                    <div class="col-6 col-lg-3 d-flex align-items-center">
                        <i class="bi bi-headset"></i>
                        <div><b>সাপোর্ট</b><br /><small>support@yourdomain.com</small></div>
                    </div>
                    <div class="col-6 col-lg-3 d-flex align-items-center">
                        <i class="bi bi-file-earmark-spreadsheet"></i>
                        <div><b>এক্সপোর্ট</b><br /><small>CSV ও প্রিন্ট সুবিধা</small></div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="foot" id="contact">
            <div class="container">
                <div class="row g-4">
                    <div class="col-6 col-md-3">
                        <h6>রিসোর্স</h6>
                        <a href="about.html">আমাদের সম্পর্কে</a><a href="templates.html">ডিজাইন টেমপ্লেট</a
                        ><a href="services.html">সেবাসমূহ</a><a href="faq.html">সাধারণ প্রশ্ন</a
                        ><a href="contact.html">যোগাযোগ</a>
                    </div>
                    <div class="col-6 col-md-3">
                        <h6>অ্যাকাউন্ট</h6>
                        <a href="login.html">লগইন</a><a href="register.html">নতুন অ্যাকাউন্ট</a
                        ><a href="form.html">আইডি ফর্ম</a>
                    </div>
                    <div class="col-md-6">
                        <h6>যোগাযোগ</h6>
                        <div class="mb-1"><i class="bi bi-clock me-2"></i>শনি – বৃহস্পতি / সকাল ১০টা – সন্ধ্যা ৬টা</div>
                        <div class="mb-1"><i class="bi bi-envelope me-2"></i>support@yourdomain.com</div>
                        <div class="mb-1"><i class="bi bi-telephone me-2"></i>+880 1700-000000</div>
                        <div><i class="bi bi-geo-alt me-2"></i>ঢাকা, বাংলাদেশ</div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="copy">
            <div class="container">
                <div class="row align-items-center gy-2">
                    <div class="col-md-4 text-center text-md-start">
                        <span class="soc"
                            ><a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a
                            ><a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a
                            ><a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a
                        ></span>
                    </div>
                    <div class="col-md-4 text-center">© 2026 IDGen. সর্বস্বত্ব সংরক্ষিত।</div>
                    <div class="col-md-4 text-center text-md-end copy-links">
                        <a href="privacy.html">গোপনীয়তা নীতি</a><span>|</span><a href="terms.html">শর্তাবলী</a
                        ><span>|</span><a href="contact.html">যোগাযোগ</a>
                    </div>
                </div>
            </div>
        </div>

        <a href="#top" class="totop" aria-label="উপরে যান"><i class="bi bi-arrow-up"></i></a>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/l10n/bn.js"></script>
<script src="<?php echo base_url(); ?>assets/js/forms.js"></script>
    </body>
</html>
