
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <div>
            <h1 class="page-title mb-1">Entity Field List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 small">
                    <li class="breadcrumb-item">Groups Management</li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </nav>
        </div>
        <a href="<?php echo base_url()."cardManagement/fieldgroups" ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i>  Group List</a>
    </div>

    <div class="card">
        <div class="card-body border-bottom">
    <h2 class="mb-3"><?php echo isset($group->title) ? htmlspecialchars($group->title, ENT_QUOTES, 'UTF-8') : ''; ?></h2>
    
    <form action="" method="post">
        <div class="row g-3">
            <div class="col-md-1 col-xl-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Enter Application ID" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="bi bi-search"></i> Search
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
    
        <div class="table-responsive">
            <table class="table mb-0" id="cardTable" style="min-width: 900px">
                <thead>
                    <tr>
                        <th style="width: 44px">#</th>
                        <th>application_id</th>
                        <th>Date</th>
                        <th >Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=1;
                    if (!empty($allPdt)): ?>
            <?php foreach ($allPdt as $row): ?>
                    <tr data-name="CRD-000123">
                        <td> <?php echo $i;$i++; ?></td>
        <td><?php echo $row->application_id; ?></td>
                        <td><?php echo date("d-m-Y",$row->created_at); ?></td>
                        
                      
                        <td >
                            <div class="act-group">
                             
                             <a
    href="<?php echo base_url()."cardManagement/applications/view/$row->id" ?>"
    class="act-btn view"
    type="button"
    title="View"
    aria-label="View"
    data-print-row
>
    <i class="icon bi bi-eye"></i>
</a>
    
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
