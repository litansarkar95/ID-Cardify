     <!-- ===== MAIN ROW: লোগো | মেনু | বাটন ===== -->
        <nav class="mainnav">
            <div class="container d-flex align-items-center gap-3">
                <a class="logo logo-sm" href="<?= base_url() ?>"><i>ID</i><span>Cardify</span></a>
                <ul class="dnav d-none d-lg-flex">
                    <li><a href="<?= base_url() ?>">হোম</a></li>
                    <li><a href="<?= base_url() ?>about-us">আমাদের সম্পর্কে</a></li>
                    <li class="has-sub">
                        <a href="templates.html">ডিজাইন টেমপ্লেট</a>
                        <ul class="sub">
                            <li><a href="templates.html#school">স্কুল / কলেজ কার্ড</a></li>
                            <li><a href="templates.html#office">অফিস / কর্মচারী কার্ড</a></li>
                            <li><a href="templates.html#hospital">হাসপাতাল / স্টাফ কার্ড</a></li>
                            <li><a href="templates.html#club">ক্লাব / এনজিও কার্ড</a></li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="services.html">সেবাসমূহ</a>
                        <ul class="sub">
                            <li><a href="form">তথ্য ফর্ম</a></li>
                            <li><a href="staff-form.html">স্টাফ / স্টুডেন্ট ফর্ম</a></li>
                            <li><a href="services.html#print">কার্ড ডিজাইন ও প্রিন্ট</a></li>
                            <li><a href="services.html#qr">QR কোড কার্ড</a></li>
                            <li><a href="services.html#csv">CSV / এক্সেল এক্সপোর্ট</a></li>
                        </ul>
                    </li>
                    <li><a href="index.html#how">কীভাবে কাজ করে</a></li>
                    <li class="has-sub">
                        <a href="faq.html">সহায়তা</a>
                        <ul class="sub">
                            <li><a href="faq.html">সাধারণ প্রশ্ন</a></li>
                            <li><a href="privacy.html">গোপনীয়তা নীতি</a></li>
                            <li><a href="terms.html">শর্তাবলী</a></li>
                            <li><a href="register.html">নতুন অ্যাকাউন্ট</a></li>
                            <li><a href="login.html">লগইন</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url() ?>contact">যোগাযোগ</a></li>
                </ul>
                <a href="<?= base_url() ?>register" class="btn btn-g ms-auto d-none d-lg-inline-block"
                    ><i class="bi bi-plus-circle me-1"></i>ফর্ম লিংক তৈরি করুন</a
                >
                <button
                    class="btn btn-g ms-auto d-lg-none"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#mnav"
                    aria-label="মেনু"
                >
                    <i class="bi bi-list fs-4"></i>
                </button>
            </div>
        </nav>

        <!-- ===== MOBILE FULL-SCREEN MENU ===== -->
        <div class="offcanvas offcanvas-start mobile-full" tabindex="-1" id="mnav">
            <div class="offcanvas-header">
                <a class="logo" href="<?= base_url() ?>"><i>ID</i><span>GEN</span></a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="বন্ধ করুন"></button>
            </div>
            <div class="offcanvas-body mnav">
                <a href="<?= base_url() ?>">হোম</a><a href="<?= base_url() ?>abou">আমাদের সম্পর্কে</a>
                <details>
                    <summary>ডিজাইন টেমপ্লেট</summary>
                    <a href="templates.html#school">স্কুল / কলেজ কার্ড</a
                    ><a href="templates.html#office">অফিস / কর্মচারী কার্ড</a
                    ><a href="templates.html#hospital">হাসপাতাল / স্টাফ কার্ড</a
                    ><a href="templates.html#club">ক্লাব / এনজিও কার্ড</a>
                </details>
                <details>
                    <summary>সেবাসমূহ</summary>
                    <a href="form.html">তথ্য ফর্ম</a><a href="staff-form.html">স্টাফ / স্টুডেন্ট ফর্ম</a
                    ><a href="services.html#print">কার্ড ডিজাইন ও প্রিন্ট</a><a href="services.html#qr">QR কোড কার্ড</a
                    ><a href="services.html#csv">CSV / এক্সেল এক্সপোর্ট</a>
                </details>
                <a href="index.html#how">কীভাবে কাজ করে</a>
                <details>
                    <summary>সহায়তা</summary>
                    <a href="faq.html">সাধারণ প্রশ্ন</a><a href="privacy.html">গোপনীয়তা নীতি</a
                    ><a href="terms.html">শর্তাবলী</a><a href="register.html">নতুন অ্যাকাউন্ট</a
                    ><a href="<?= base_url() ?>login">লগইন</a>
                </details>
                <a href="<?= base_url() ?>contact">যোগাযোগ</a>
                <div class="d-grid gap-2 mt-4">
                    <a href="<?= base_url() ?>register" class="btn btn-g btn-lg">অ্যাকাউন্ট খুলুন</a
                    ><a href="<?= base_url() ?>login" class="btn btn-outline-light btn-lg">লগইন</a>
                </div>
            </div>
        </div>