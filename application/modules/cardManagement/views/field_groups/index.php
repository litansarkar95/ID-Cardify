
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <div>
            <h1 class="page-title mb-1">Groups List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 small">
                    <li class="breadcrumb-item">Groups Management</li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </nav>
        </div>
        <a href="<?php echo base_url()."cardManagement/fieldgroups/create" ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Create Group</a>
    </div>

    <div class="card">
        <div class="card-body border-bottom">
            <label class="form-label">Filter by</label>
            <div class="row g-3">
                <div class="col-md-6 col-xl-3">
                    <select class="form-select" multiple data-placeholder="Status">
                        <option>Active</option>
                        <option>Pending print</option>
                        <option>Expired</option>
                        <option>Suspended</option>
                    </select>
                </div>
                <div class="col-md-6 col-xl-3">
                    <select class="form-select" data-placeholder="Card type" data-clear="1">
                        <option></option>
                        <option>Employee</option>
                        <option>Student</option>
                        <option>Medical</option>
                        <option>Visitor</option>
                    </select>
                </div>
                <div class="col-md-6 col-xl-3">
                    <select class="form-select" data-placeholder="Design" data-clear="1">
                        <option></option>
                        <option>Employee Badge 2026</option>
                        <option>Student ID – Grade 8</option>
                        <option>Doctor ID</option>
                        <option>Visitor Pass</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body pb-3 d-flex flex-wrap justify-content-between gap-2">
            <div class="d-flex flex-wrap gap-2 align-items-center">
                <select class="form-select form-select-sm" style="width: 75px">
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                </select>
                <div class="btn-group">
                    <button class="btn btn-light border btn-sm">Export</button
                    ><button class="btn btn-light border btn-sm">Mass actions</button
                    ><button class="btn btn-light border btn-sm"><i class="bi bi-arrow-repeat"></i></button>
                </div>
            </div>
            <div class="input-group" style="width: 220px">
                <span class="input-group-text bg-white"><i class="bi bi-search"></i></span
                ><input type="text" class="form-control" placeholder="Search" />
            </div>
        </div>
        <div class="table-responsive">
            <table class="table mb-0" id="cardTable" style="min-width: 900px">
                <thead>
                    <tr>
                        <th style="width: 44px">#</th>
                        <th>Code </th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Issued</th>
                        <th>Status</th>
                        <th class="text-end act-col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=1;
                    if (!empty($allPdt)): ?>
            <?php foreach ($allPdt as $row): ?>
                    <tr data-name="CRD-000123">
                        <td> <?php echo $i;$i++; ?></td>
                        <td><a href="card-create.html"><?php echo $row->code_no; ?></a></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                              
                            <?php echo $row->title; ?>
                            </div>
                        </td>
                        <td> <?php echo $row->description; ?></td>
                        <td><?php echo date("d-m-Y",$row->issue_date); ?></td>
                        
                        <td>
                          <?php if ($row->status == 1): ?>
                        <span class="badge-soft success">Active</span>
                        <?php else: ?>
                            <span class="badge-soft secondary">Inactive</span>
                        <?php endif; ?>

                        </td>
                        <td class="act-col text-end">
                            <div class="act-group">
                                <a
                                href="<?php echo base_url()."cardManagement/fieldSettings/create/$row->id" ?>"
                                    class="act-btn print"
                                    type="button"
                                    title="Settings"
                                    aria-label="Print"
                                    data-print-row
                                >
                                    <i class="icon bi bi-gear-fill"></i>
                        </a>
       <button type="button" class="act-btn copy" title="Copy Slug" aria-label="Copy Slug" onclick="copySlug('<?php echo  $row->short_url; ?>')">
    <i class="bi bi-files"></i>
</button>
                                <a class="act-btn edit" href="card-create.html" title="Edit" aria-label="Edit"
                                    ><i class="bi bi-pencil-square"></i
                                ></a>
                                <button
                                    class="act-btn del"
                                    type="button"
                                    title="Delete"
                                    aria-label="Delete"
                                    data-bs-toggle="modal"
                                    data-bs-target="#delCard"
                                    data-del
                                >
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                       <?php endforeach; ?>
                        <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-2">
            <span class="text-muted">Show  <?= (int) $start; ?> to <?= (int) $end; ?></b> of <b><?= (int) $total_rows; ?></b> <?= html_escape($label); ?>  </span>
           
          <form action="<?php echo site_url('cardManagement/fieldgroups'); ?>" method="post" id="globalPaginationForm">
    
    <input type="hidden" name="page" value="<?php echo isset($current_page) ? $current_page : 1; ?>">
    <input type="hidden" name="per_page" value="<?php echo isset($per_page) ? $per_page : 10; ?>">

    <?= $pagination; ?>

</form>
        </div>
    </div>
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right", 
        "timeOut": "4000" 
    };

    <?php if($this->session->flashdata('success')): ?>
        toastr.success("<?php echo $this->session->flashdata('success'); ?>");
    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>
        toastr.error("<?php echo $this->session->flashdata('error'); ?>");
    <?php endif; ?>

    <?php if($this->session->flashdata('warning')): ?>
        toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
    <?php endif; ?>

    function copySlug(slugText) {
        navigator.clipboard.writeText(slugText).then(function() {
            toastr.success('Slug Copied: ' + slugText, 'Success!');
        }).catch(function(err) {
            console.error('Failed to copy text: ', err);
            toastr.error('Failed to copy slug!', 'Error!');
        });
    }
</script>