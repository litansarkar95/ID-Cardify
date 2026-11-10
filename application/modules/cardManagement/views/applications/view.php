<div class="mx-auto" style="max-width:980px">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="page-title">Edit Field Values</h1>
        <a href="<?php echo base_url()."cardManagement/applications"; ?>" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

 

    <form class="card" action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <?php if (isset($entity_field)): ?>
                <div class="mb-4 pb-3 border-bottom">
                    <p class="mb-0"><strong>Application ID:</strong> <?php echo htmlspecialchars($entity_field->application_id); ?></p>
                </div>
            <?php endif; ?>

            <div class="row g-3">
                <?php if (!empty($field_values)): ?>
                    <?php foreach ($field_values as $row): ?>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">
                                <?php echo htmlspecialchars($row->field_label_en, ENT_QUOTES, 'UTF-8'); ?>
                            </label>
                            
                            <?php if ($row->field_type == 'select'): ?>
                                <?php 
                                    $institution_id = isset($entity_field->institution_id) ? $entity_field->institution_id : 0;
                                    $options = $this->main_model->get_dropdown_options($institution_id, $row->field_key); 
                                ?>
                                <select name="field_values[<?php echo $row->id; ?>]" class="form-select">
                                    <option value="">Select <?php echo $row->field_label_en; ?></option>
                                    <?php if (!empty($options)): ?>
                                        <?php foreach ($options as $opt): ?>
                                            <option value="<?php echo html_escape($opt->option_value); ?>" 
                                                <?php echo ($row->field_value == $opt->option_value) ? 'selected' : ''; ?>>
                                                <?php echo html_escape($opt->option_label); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>

                         <?php elseif ($row->field_type == 'image' || $row->field_type == 'file'): ?>
                                                <div class="input-group">
                                                <input type="file" name="file_values[<?php echo $row->id; ?>]" class="form-control">
                                                </div>
                                                <?php if (!empty($row->field_value)): ?>
                                                <div class="mt-2">
                                                            <?php if ($row->field_type == 'image'): ?>
                                                            <img src="<?php echo base_url($row->field_value); ?>" alt="Preview" class="img-thumbnail" style="height: 60px;">
                                                            <?php else: ?>
                                                            <a href="<?php echo base_url($row->field_value); ?>" target="_blank" class="small text-primary">View Current File</a>
                                                            <?php endif; ?>
                                                </div>
                                                <?php endif; ?>
                                                 <?php elseif ($row->field_type == 'textarea'): ?>
                                <textarea name="field_values[<?php echo $row->id; ?>]" class="form-control" rows="3" placeholder="Enter <?php echo $row->field_label_en; ?>"><?php echo htmlspecialchars($row->field_value, ENT_QUOTES, 'UTF-8'); ?></textarea>

                            <?php elseif ($row->field_type == 'date'): ?>
                                <input type="date" name="field_values[<?php echo $row->id; ?>]" class="form-control" value="<?php echo htmlspecialchars($row->field_value, ENT_QUOTES, 'UTF-8'); ?>">

                            <?php else: ?>
                                <input type="text" 
                                       name="field_values[<?php echo $row->id; ?>]" 
                                       class="form-control" 
                                       placeholder="Enter <?php echo $row->field_label_en; ?>"
                                       value="<?php echo htmlspecialchars($row->field_value, ENT_QUOTES, 'UTF-8'); ?>">
                            <?php endif; ?>

                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <p class="text-muted">No values found for this entry.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="card-footer bg-white text-end py-3">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check2"></i> Update Changes
            </button>
        </div>
    </form>
</div>