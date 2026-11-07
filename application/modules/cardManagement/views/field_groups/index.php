
      
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                    <div>
                        <h1 class="page-title mb-1">Create Card</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 small">
                                <li class="breadcrumb-item">Card Management</li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="cards.html" class="btn btn-light border"><i class="bi bi-list-ul"></i> Card List</a>
                </div>

                <form id="cardForm" onsubmit="return false">
                    <div class="row g-3">
                        <div class="col-xl-12">
                            <div class="card mb-3">
                                <div class="card-header">Card information</div>
                                <div class="card-body">
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label"><span class="req">*</span>Cardholder</label>
                                            <select
                                                class="form-select"
                                                id="module_id"
                                                data-placeholder="Select "
                                                data-search="1"
                                            >
                                                <option></option>
                                               <?php foreach ($allMou as $cat): ?>
                                   <option value="<?= $cat->id ?>" data-title="<?= $cat->module_name ?>"  <?= set_select('module_id', $cat->id); ?> ><?= $cat->module_name ?></option>
                                 <?php endforeach; ?>
                                                
                                            </select>
                                        </div>
                                      
                                        <!-- <div class="col-md-6">
                                            <label class="form-label"><span class="req">*</span>Card number</label>
                                            <div class="input-group">
                                                <span class="input-group-text">CRD-</span
                                                ><input type="text" class="form-control" id="cNo" value="000124" />
                                            </div>
                                        </div> -->
                                   
                                        <div class="col-md-4">
                                            <label class="form-label"><span class="req">*</span>Issue date</label>
                                            <div class="input-group">
                                                <input
                                                    type="text"
                                                    class="form-control datepicker"
                                                    id="cIssue"
                                                    value="2026-11-07"
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
                                        </div>
 <div class="mb-3">
                                        <label class="form-label" for="description">Description</label
                                        ><textarea
                                            class="form-control" name="description"  id="description"
                                            rows="3" value="<?= set_value('description') ?>"
                                         
                                        ></textarea>
                                    </div>

                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Status</label>
                                            <select class="form-select">
                                                <option value="1" selected>Active</option>
                                                <option value="0">Deactive</option>
                                               
                                            </select>
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
     