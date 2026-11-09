<main class="container my-4 my-md-5 reg-wrap">
<h1 class="page-title mb-1"><?php echo htmlspecialchars($form->title); ?></h1>
<p class="text-muted mb-3"><?php echo nl2br(htmlspecialchars($form->description)); ?></p>

  <?php if($this->session->flashdata('error_message')): ?>
        <div class="alert alert-danger alert-dismissible fade show rounded-4 shadow-sm mb-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <div><?php echo $this->session->flashdata('error_message'); ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>


<form class="panel sf" action="<?php echo base_url('FormPortal/submit'); ?>" method="POST" enctype="multipart/form-data">

  <input type="hidden" name="institution_id" value="<?php echo $company->id; ?>">
            <input type="hidden" name="form_group_id" value="<?php echo $form->id; ?>">

            <?php 
            $lang = isset($form->form_language) ? $form->form_language : 'bn';
            $old_data = $this->session->flashdata('old_input');
            ?>

            <?php if (!empty($grouped_fields)): ?>
                <?php foreach ($grouped_fields as $group): ?>

                    <h6> <?php 
                            if ($lang == 'en') {
                                echo html_escape($group['category_info']->category_name_en);
                            } elseif ($lang == 'both') {
                                echo html_escape($group['category_info']->category_name_bn) . ' (' . html_escape($group['category_info']->category_name_en) . ')';
                            } else {
                                echo html_escape($group['category_info']->category_name_bn);
                            }
                            ?></h6>
  <div class="row g-3 mb-4">
      <?php foreach ($group['fields'] as $field): 
                           
                            $label = ($lang == 'en') ? $field['field_label_en'] : $field['field_label_bn'];
                            if ($lang == 'both') {
                                $label = $field['field_label_bn'] . ' (' . $field['field_label_en'] . ')';
                            }

                          $show_ph = isset($form->show_placeholder) ? $form->show_placeholder : 1;
                            $placeholder_text = ($show_ph == 1) ? htmlspecialchars($label) : '';

                            $field_val = isset($old_data[$field['field_key']]) ? $old_data[$field['field_key']] : '';
                        ?>

    <div class="col-12 col-md-6 col-lg-4">
        <label class="form-label" for="field_<?php echo $field['field_key']; ?>" > <?php echo htmlspecialchars($label); ?> 
                                    <?php if ($field['is_required'] == 1): ?>
                                        <span class="text-danger">*</span>
                                    <?php endif; ?> </label>

                                    <!-- 1. dropdown -->

                                     <?php if ($field['field_type'] == 'select'): 
                                    $options = $this->main_model->get_dropdown_options($company->id, $field['field_key']);
                                ?>
                                <select class="form-select js-select2" name="custom_fields[<?php echo $field['field_key']; ?>]" id="field_<?php echo $field['field_key']; ?>" <?php echo ($field['is_required'] == 1) ? 'required' : ''; ?> >
                                    <option value="">Select</option>
                                   <?php foreach ($options as $opt): ?>
                                            <option value="<?php echo html_escape($opt->option_value); ?>" <?php echo ($field_val == $opt->option_value) ? 'selected' : ''; ?>>
                                                <?php echo html_escape($opt->option_label); ?>
                                            </option>
                                        <?php endforeach; ?>
                            </select>
                                     <!-- 2. Photo, File, Image -->
                                      
                                <?php elseif ($field['field_type'] == 'file' || $field['field_type'] == 'image'): ?>
                                    <input class="form-control form-control-sm py-2 shadow-none" type="file" id="field_<?php echo $field['field_key']; ?>" name="custom_fields[<?php echo $field['field_key']; ?>]" accept="image/*,.pdf" <?php echo ($field['is_required'] == 1 && empty($field_val)) ? 'required' : ''; ?>>
                                    <div class="form-text text-muted" style="font-size: 10px;">ফাইল বা ছবি দিন (সর্বোচ্চ ২ MB)</div>
                                   
                                <!--  3.textarea -->
                                <?php elseif ($field['field_type'] == 'textarea'): ?>
                               
                                    <textarea class="form-control" id="field_<?php echo $field['field_key']; ?>"  name="custom_fields[<?php echo $field['field_key']; ?>]" rows="4" placeholder="<?php echo $placeholder_text; ?>" <?php echo ($field['is_required'] == 1) ? 'required' : ''; ?>><?php echo html_escape($field_val); ?></textarea>
                                <!-- 4.date -->
                                <?php elseif ($field['field_type'] == 'date'): ?>
                                    <div class="input-group js-date">
                                    <input class="form-control" type="text" id="field_<?php echo $field['field_key']; ?>" name="custom_fields[<?php echo $field['field_key']; ?>]" data-input placeholder="d-m-Y" autocomplete="off" value="<?php echo html_escape($field_val); ?>" <?php echo ($field['is_required'] == 1) ? 'required' : ''; ?>>
                                <button class="btn btn-cal" type="button" data-toggle aria-label="ক্যালেন্ডার খুলুন"><i class="bi bi-calendar3"></i></button></div>

                                    <!-- End -->
                                      <?php else: ?>
                                    <input class="form-control" type="text" id="field_<?php echo $field['field_key']; ?>" name="custom_fields[<?php echo $field['field_key']; ?>]" value="<?php echo html_escape($field_val); ?>" placeholder="<?php echo $placeholder_text; ?>" <?php echo ($field['is_required'] == 1) ? 'required' : ''; ?>>
                                <?php endif; ?>

   
    </div>


   
    <?php endforeach; ?>

</div>

   <?php endforeach; ?>
            <?php endif; ?>
  <!-- ছবি -->
  <!-- <h6>ছবি</h6>
  <div class="row g-3 mb-4 align-items-center">
    <div class="col-12 col-md-4 col-lg-3"><div class="sf-photo"><i class="bi bi-person-bounding-box"></i><span>পাসপোর্ট সাইজ ছবি</span></div></div>
    <div class="col-12 col-md-8 col-lg-9">
      <label class="form-label" for="photo">ফাইল সিলেক্ট করুন <span class="text-danger">*</span></label>
      <input class="form-control" type="file" id="photo" name="photo" accept="image/*" required>
      <div class="form-text">পরিষ্কার মুখের ছবি দিন (JPG / PNG, সর্বোচ্চ ২ MB)। ব্যাকগ্রাউন্ড সাদা বা হালকা হলে ভালো।</div>
    </div>
  </div> -->


  <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="ok" required><label class="form-check-label" for="ok">আমি নিশ্চিত করছি যে দেওয়া সব তথ্য সঠিক। <span class="text-danger">*</span></label></div>
  <div class="d-flex gap-2 flex-wrap sf-actions"><button class="btn btn-g" type="submit"><i class="bi bi-send me-1"></i>তথ্য জমা দিন</button><button class="btn btn-outline-secondary" type="reset">মুছে ফেলুন</button></div>


</form>
</main>

