
      
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                    <div>
                        <h1 class="page-title mb-1">Create Field Groups</h1>
                        <!-- <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 small">
                                <li class="breadcrumb-item">Field Groups Settings</li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </nav> -->
                    </div>
                    <a href="<?= base_url(); ?>cardManagement/fieldgroups" class="btn btn-light border"><i class="bi bi-list-ul"></i> All List</a>
                </div>
            <form id="cardForm" action="<?= base_url(); ?>cardManagement/fieldgroups/insert" method="post"  enctype="multipart/form-data">
                
                    <div class="row g-3">
                        <div class="col-xl-12">
                            <div class="card mb-3">
                                <div class="card-header">Basic Information</div>
                                <div class="card-body">
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label"><span class="req">*</span>Module</label>
                                            <select
                                                class="form-select"
                                                id="module_id" name="module_id"
                                                data-placeholder="Select "
                                                data-search="1"
                                            >
                                                <option></option>
                                               <?php foreach ($allMou as $cat): ?>
                                   <option value="<?= $cat->id ?>" data-title="<?= $cat->module_name ?>"  <?= set_select('module_id', $cat->id); ?> ><?= $cat->module_name ?></option>
                                 <?php endforeach; ?>
                                                
                                            </select>
                                            <?php echo form_error('module_id', '<div class="text-danger small mt-1">', '</div>'); ?>
                                        </div>
                                      
                                        <?php 
   
                                    $random_code = mt_rand(100000, 999999); 
                                ?>

                                <div class="col-md-4">
                                    <label class="form-label"><span class="req">*</span>Code</label>
                                    <div class="input-group">
                                        <span class="input-group-text">CRD-</span>
                                        <input type="text" class="form-control" id="cNo" name="code_no" value="<?php echo $random_code; ?>" />
                                    </div>
                                </div>
                                                                
                                        <div class="col-md-4">
                                            <label class="form-label"><span class="req">*</span>Issue date</label>
                                            <div class="input-group">
                                                <input
                                                    type="text"
                                                    class="form-control datepicker"
                                                    id="issue_date" name="issue_date"
                                                    value="<?php echo date("d-m-Y")?>"
                                                /><button class="btn btn-icon" type="button">
                                                    <i class="bi bi-calendar3"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Title</label>
                                            <div class="input-group">
                                                <input
                                                    type="text"
                                                    class="form-control "
                                                    id="title" name="title"
                                                    value="<?= set_value('title') ?>"
                                                />
                                            
                                            </div>
                                                <?php echo form_error('title', '<div class="text-danger small mt-1">', '</div>'); ?>
                                        </div>
                                  
                                        <div class="col-md-4">
                                            <label class="form-label">Status</label>
                                            <select class="form-select" name="status">
                                                <option value="1" selected>Active</option>
                                                <option value="0">Deactive</option>
                                               
                                            </select>
                                        </div>
                                        
                                
                                        <div class="mb-3">
                                        <label class="form-label" for="description">Description</label
                                        ><textarea
                                            class="form-control" name="description"  id="description"
                                            rows="3" value=""
                                         
                                        ><?= set_value('description') ?></textarea>
                                    </div>

                                    </div>
                                   
                                </div>
                                 <div class="card mt-3">
                        <div class="card-body d-flex flex-wrap justify-content-end gap-2 py-3">
                            <a href="" class="btn btn-light border">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check2"></i> Save 
                            </button>
                        </div>
                    </div>

                            </div>


                    </div>
  </div>
                   
                </form>
     