<form action="<?php echo site_url('cardManagement/fieldSettings/insert'); ?>" method="post"> 
    <input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
    <div class="card"> 
        
    <div class="card-body pb-3 d-flex flex-wrap justify-content-between gap-2"> 
         <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
           <i class="bi bi-arrow-repeat"></i> Configure Fields & Settings 
                </div>
        <div class="d-flex flex-wrap gap-2 align-items-center"> 
            
            <button type="submit" class="btn btn-primary ms-auto"><i class="bi bi-check2"></i> Save </button> 
        </div> 
    </div> 
    <div class="table-responsive"> 
        <table class="table mb-0" style="min-width: 900px" id="cuTable"> 
            <thead> 
                <tr> 
                    <th>#</th> 
                    <th>Field Name</th> 
                    <th>Required</th> 
                    <th>Sort Order</th> 
                </tr> 
            </thead> 
            <tbody> 
                <?php foreach ($fields as$field): 
                    $is_checked = (!empty($field['assigned_group'])) ? true : false; 
                    $is_required = ($field['is_required'] == 1) ? true : false; 
                    $sort_order = isset($field['sort_order']) ?$field['sort_order'] : 1; 
                ?> 
                <tr> 
                    <td> 
                        <div class="form-check form-switch"> 
                            <input class="form-check-input" type="checkbox" id="q_<?php echo $field['id']; ?>" name="fields[<?php echo $field['id']; ?>][selected]" value="1" <?php echo $is_checked ? 'checked' : ''; ?>> 
                            <label class="form-check-label" for="q_<?php echo $field['id']; ?>"></label> 
                        </div>
                    </td> 
                    <td> 
                        <div class="d-flex align-items-center gap-2"> 
                            <div> 
                                <span class="fw-semibold"><?php echo html_escape($field['field_label_en']); ?></span> 
                                <div class="small text-muted"><?php echo html_escape($field['field_label_bn']); ?></div> 
                            </div> 
                        </div> 
                    </td> 
                    <td> 
                        <div class="form-check form-switch"> 
                            <input class="form-check-input" type="checkbox" id="req_<?php echo $field['id']; ?>" name="fields[<?php echo $field['id']; ?>][is_required]" value="1" <?php echo $is_required ? 'checked' : ''; ?>> 
                            <label class="form-check-label" for="req_<?php echo $field['id']; ?>"></label> 
                        </div>
                    </td> 
                    <td> 
                        <div class="input-group"> 
                            <input type="text" class="form-control" name="fields[<?php echo $field['id']; ?>][sort_order]" value="<?php echo $sort_order; ?>" placeholder="0"> 
                        </div> 
                    </td> 
                </tr> 
                <?php endforeach; ?> 
            </tbody> 
        </table> 
    </div> 
    <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-2"> 
        <button type="submit" class="btn btn-primary"><i class="bi bi-check2"></i> Save</button> 
    </div> 
</div>
</form>