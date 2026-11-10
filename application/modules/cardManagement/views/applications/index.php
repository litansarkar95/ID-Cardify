
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <div>
            <h1 class="page-title mb-1">Applications List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 small">
                    <li class="breadcrumb-item">Applications</li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </nav>
        </div>
      
    </div>

    <div class="card">
        <div class="card-body border-bottom">
               <label class="form-label">Filter by</label>
    
  
    <form action="<?php echo base_url('cardManagement/applications'); ?>" method="POST">
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Application ID</label>
                <input type="text" name="search_app_id" class="form-control" placeholder="Enter Application ID" 
                       value="<?php echo isset($search_app_id) ? htmlspecialchars($search_app_id, ENT_QUOTES, 'UTF-8') : ''; ?>">
            </div>

        
            <div class="col-md-4">
                <label class="form-label">Group Title (Field Groups)</label>
                <select name="search_group_id" class="form-select">
                    <option value="">Select Group Title</option>
                    <?php if (!empty($groups)): ?>
                        <?php foreach ($groups as $group): ?>
                            <option value="<?php echo $group->id; ?>" 
                                <?php echo (isset($search_group_id) && $search_group_id == $group->id) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($group->title, ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary me-2">
                    <i class="bi bi-search"></i> Search
                </button>
                <a href="<?php echo base_url('cardManagement/applications/reset_search'); ?>" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-counterclockwise"></i> Reset
                </a>
            </div>
        </div>
    </form>
        
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
                        <th>Date</th>
                        <th class="text-end act-col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=1;
                    if (!empty($allPdt)): ?>
            <?php foreach ($allPdt as $row): ?>
                    <tr data-name="CRD-000123">
                          <td><?php echo $i++; ?></td>
                            <td><?php echo htmlspecialchars($row->group_title); ?></td>
                            <td><?php echo htmlspecialchars($row->application_id); ?></td>
                            <td><?php echo date("d-m-Y",$row->created_at); ?></td>
                           
                        <td class="act-col text-end">
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
<a href="<?php echo base_url("cardManagement/applications/delete/$row->id"); ?>" 
   class="act-btn del" 
   onclick="return confirm('Are you sure you want to delete this record along with its files?');">
      
                                    <i class="bi bi-trash"></i>
</a>
      
                               
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
           
          <form action="<?php echo site_url('cardManagement/applications'); ?>" method="post" id="globalPaginationForm">
    
    <input type="hidden" name="page" value="<?php echo isset($current_page) ? $current_page : 1; ?>">
    <input type="hidden" name="per_page" value="<?php echo isset($per_page) ? $per_page : 10; ?>">

    <?= $pagination; ?>

</form>
        </div>
    </div>
