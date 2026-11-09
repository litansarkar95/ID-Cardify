<main class="container my-5 py-lg-4 status-wrap">
  <div class="status-card text-center">
    <div class="status-ok"><i class="bi bi-check-lg"></i></div>
    <h1 class="status-title">ধন্যবাদ! আপনার তথ্য জমা হয়েছে</h1>
    <p class="text-muted mb-4">আমরা আপনার তথ্য পেয়েছি। কোনো তথ্য ভুল থাকলে প্রতিষ্ঠানের দায়িত্বপ্রাপ্ত ব্যক্তি আপনার সাথে যোগাযোগ করবেন।</p>
     <?php if(isset($application_id) && !empty($application_id)): ?>
            <div class="bg-light border rounded-3 p-3 mb-4 d-inline-block mx-auto" style="min-width: 280px;">
                <span class="small text-muted d-block mb-1">আপনার ইউনিক আবেদন আইডি (Application ID)</span>
                <span class="fs-5 fw-bold text-primary tracking-wide font-monospace"><?php echo htmlspecialchars($application_id); ?></span>
            </div>
        <?php endif; ?>
   
    <div class="d-flex gap-2 justify-content-center flex-wrap">
      <a href="" class="btn btn-g"><i class="bi bi-plus-circle me-1"></i>আরেকটি ফর্ম পূরণ করুন</a>
      <a href="<?= base_url() ?>" class="btn btn-outline-g"><i class="bi bi-house me-1"></i>হোম পেইজ</a>
    </div>
  </div>
</main>

