<div class="container my-4 my-md-5 reg-wrap">
    <h1 class="page-title mb-3">নতুন অ্যাকাউন্ট তৈরি করুন</h1>
    <form class="panel" action="<?= base_url(); ?>register/store" method="post"  enctype="multipart/form-data">
    
        <h6>প্রতিষ্ঠানের তথ্য</h6>
        <div class="row g-3 mb-4">
            <div class="col-12 col-md-6 col-lg-4">
                <label class="form-label">প্রতিষ্ঠানের নাম (ইংরেজিতে)<span class="text-danger">*</span></label
                ><input class="form-control" type="text" name="org_en" value="<?php echo set_value('org_en'); ?>"  required />
                <?php echo form_error('org_en', '<div class="text-danger small mt-1">', '</div>'); ?>
            </div>
             <div class="col-12 col-md-6 col-lg-4">
                <label class="form-label">প্রতিষ্ঠানের নাম (বাংলায়)<span class="text-danger">*</span></label
                ><input class="form-control" type="text" name="org_bn" value="<?php echo set_value('org_bn'); ?>"  required />
                    <?php echo form_error('org_bn', '<div class="text-danger small mt-1">', '</div>'); ?>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <label class="form-label">প্রতিষ্ঠানের ধরন</label
                ><select class="form-select" name="type" >
                    <option>স্কুল / কলেজ / মাদ্রাসা</option>
                    <option>অফিস / কোম্পানি</option>
                    <option>হাসপাতাল / ক্লিনিক</option>
                    <option>এনজিও / ক্লাব</option>
                    <option>অন্যান্য</option>
                </select>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <label class="form-label">মোবাইল নম্বর <span class="text-danger">*</span></label>
                <input class="form-control" type="tel" name="mobile_no" value="<?php echo set_value('mobile_no'); ?>"  required />
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <label class="form-label">ওয়েবসাইট </label
                ><input class="form-control" type="text" name="website"  value="<?php echo set_value('website'); ?>" />
            </div>
          <div class="col-12 col-md-6 col-lg-4">
                <label class="form-label">ইমেইল </label
                ><input class="form-control" type="email" name="email" value="<?php echo set_value('email'); ?>"  />
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <label class="form-label">পাসওয়ার্ড <span class="text-danger">*</span></label
                ><input class="form-control" type="password" name="password" required minlength="6" />
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <label class="form-label">পাসওয়ার্ড আবার দিন <span class="text-danger">*</span></label
                ><input class="form-control" type="password" name="confirm" required />
            </div>
        </div>

        <!-- সাইন-ইন তথ্য -->
        <h6>যোগাযোগ</h6>
        <div class="row g-3">
           <div class="col-12 col-md-6 col-lg-4">
                <label class="form-label">ঠিকানা  </label
                ><textarea class="form-control" id="address" name="address" rows="4"><?php echo set_value('address'); ?></textarea>
            </div>
            
        
      
 
    <div class="col-12 col-md-2 col-lg-2">
            <div class="sf-photo">
                        <div id="photo-icon-container">
                <i class="bi bi-person-bounding-box fs-3 d-block mb-1" id="default-icon"></i>
          
            <img id="image-preview" src="#" alt="Preview" class="img-fluid rounded d-none"  />
          </div>   </div></div>
    <div class="col-12 col-md-4 col-lg-4">
      <label class="form-label" for="photo">ফাইল সিলেক্ট করুন <span class="text-danger">*</span></label>
      <input class="form-control" type="file" id="photo" name="photo" accept="image/*" onchange="previewImage(event)"  >
      <div class="form-text"> ছবি দিন (JPG / PNG, সর্বোচ্চ ২ MB)। ব্যাকগ্রাউন্ড সাদা বা হালকা হলে ভালো।</div>
    
  </div>

      <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="t" required /><label
                        class="form-check-label"
                        for="t"
                        >আমি শর্তাবলীতে সম্মত।</label
                    >
                </div>
            </div>
  </div>
        <div class="mt-4 d-flex gap-3 align-items-center flex-wrap">
            <button class="btn btn-g">অ্যাকাউন্ট তৈরি করুন</button>
            <span class="text-muted">আগে থেকেই অ্যাকাউন্ট আছে? <a href="login.html" class="text-g">লগইন করুন</a></span>
        </div>
    </form>
</div>
<script>
function previewImage(event) {
    const fileInput = event.target;
    const previewImg = document.getElementById('image-preview');
    const defaultIcon = document.getElementById('default-icon');

    // যদি ইউজার ফাইল সিলেক্ট করে থাকে
    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            // প্রিভিউ ট্যাগটিতে ছবির সোর্স যুক্ত করা
            previewImg.src = e.target.result;
            // প্রিভিউ ইমেজ দৃশ্যমান করা এবং আইকন লুকিয়ে ফেলা
            previewImg.classList.remove('d-none');
            if (defaultIcon) {
                defaultIcon.classList.add('d-none');
            }
        }

        // ফাইলটি ডাটা ইউআরএল (Data URL) হিসেবে রিড করা
        reader.readAsDataURL(fileInput.files[0]);
    }
}
            </script>