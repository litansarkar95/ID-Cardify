
    <div class="mx-auto" style="max-width: 980px">
        <h1 class="page-title">Configure Form Fields</h1>
        <form class="card" action="<?php echo site_url('cardManagement/fieldSettings/insert'); ?>" method="post"  enctype="multipart/form-data">
             <input type="hidden" name="group_id" value="<?php echo $group_id; ?>"> 
            <ul class="nav nav-tabs" role="tablist">

              <?php 
                $i = 0;
                foreach ($grouped_fields as $group): 
                    $active_class = ($i == 0) ? 'active' : '';
                    $tab_id = 'cat_' . $group['category_info']->id;
                ?>
                    <li class="nav-item" >
                         <button class="nav-link <?php echo $active_class; ?>" data-bs-toggle="tab" data-bs-target="#s-<?php echo $tab_id; ?>" type="button">
                        <?php echo html_escape($group['category_info']->category_name_en); ?> 
                         <?php //echo count($group['fields']); ?>
                    </button>
                    </li>
                <?php 
                    $i++;
                endforeach; 
                ?>

              
            </ul>
            <div class="card-body tab-content">
                  <?php 
                $j = 0;
                foreach ($grouped_fields as $group): 
                    $show_active = ($j == 0) ? 'show active' : '';
                    $tab_id = 'cat_' . $group['category_info']->id;
                ?>
                <div class="tab-pane fade show <?php echo $show_active; ?>" id="s-<?php echo $tab_id; ?>">
                  
            <div class="table-responsive">
                <table class="table plain mb-0" style="min-width:520px">
                    <thead>
                        <tr>
                            <th style="width:140px">Enable</th>
                            <th>Field Name</th>
                            <th>Required</th>
                            <th style="width:240px">Sort Order</th>
                        </tr>
                    </thead>
                        <tbody>
                             <?php foreach ($group['fields'] as $field): 
                                        $is_checked = (!empty($field['assigned_group'])) ? true : false; 
                                        $is_required = ($field['is_required'] == 1) ? true : false; 
                                        $sort_order = isset($field['sort_order']) ? $field['sort_order'] : 0; 
                                    ?>
              <tr>
                <td><div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="q_<?php echo $field['id']; ?>" name="fields[<?php echo $field['id']; ?>][selected]" value="1" <?php echo $is_checked ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="q_<?php echo $field['id']; ?>"></label>
                
                  </div></td>
              

                  <?php
                $badge_colors = [
                    'text'     => '#3b82f6', 
                    'select'   => '#10b981',
                    'date'     => '#8b5cf6', 
                    'textarea' => '#f59e0b',
                    'file'     => '#083a9c', 
                    'image'    => '#ec4899', 
                ];

                $current_type = $field['field_type'];
                $badge_bg = $badge_colors[$current_type] ?? '#2563eb';
                ?>

        <td>
            <div class="d-flex align-items-center gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge text-white fw-semibold text-uppercase" style="background: <?php echo $badge_bg; ?>; font-size: 8px; padding: 3px 5px; border-radius: 4px; line-height: 1; display: inline-flex; align-items: center; justify-content: center;">
                        <?php echo $field['field_type']; ?>
                    </span> 
                    <div>
                        <a class="fw-semibold text-decoration-none"><?php echo html_escape($field['field_label_en']); ?></a>
                        <div class="small text-muted"><?php echo html_escape($field['field_label_bn']); ?></div>
                    </div>
                </div>
            </div>
        </td>
                <td>  <div class="form-check form-switch d-inline-block">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="req_<?php echo $field['id']; ?>" name="fields[<?php echo $field['id']; ?>][is_required]" value="1" <?php echo $is_required ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="req_<?php echo $field['id']; ?>"></label>
                                                </div></td>
                <td>
                      <input type="number" class="form-control " name="fields[<?php echo $field['id']; ?>][sort_order]" value="<?php echo $sort_order; ?>" placeholder="0">
            </td>
               <?php endforeach; ?>
                </tr>
            
            </tbody></table></div>


                </div>
                 <?php 
                    $j++;
                endforeach; 
                ?>
                   
             
                
            </div>
            <div class="card-footer bg-white text-end py-3">
                <button type="button" class="btn btn-light border me-2">Cancel</button
                ><button type="submit" class="btn btn-primary"><i class="bi bi-check2"></i> Save changes</button>
            </div>
        </form>
    </div>

