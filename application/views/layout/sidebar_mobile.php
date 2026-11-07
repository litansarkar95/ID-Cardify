      <div class="menu-page" id="menu">
            <div class="menu-head">
                <div class="row1">
                    <div class="ttl"><i class="bi bi-grid-3x3-gap-fill"></i>All Menus</div>
                    <a class="close-btn" href="#" aria-label="Close menu"><i class="bi bi-x-lg"></i></a>
                </div>
            </div>
            <div class="menu-body">
                <!-- <div class="menu-user">
                    <a class="mu-id" href="#"
                        ><div class="avatar"><?php 
            $name = $this->session->userdata('name');
            $initial = !empty($name) ? strtoupper(mb_substr($name, 0, 1)) : 'A';
            
            echo $initial;
        ?></div>
                        <div><b><?php echo htmlspecialchars($this->session->userdata('name'), ENT_QUOTES, 'UTF-8'); ?></b><br /><small><?=  active_branch_name(); ?> &middot; View profile</small></div></a
                    >
                    <a class="out" href="<?php echo base_url(); ?>logout"><i class="bi bi-box-arrow-right"></i>Logout</a>
                </div> -->
                <!-- <div class="sec-lbl">Quick access</div>
                <div class="quick-tiles">
                    <a href="dashboard.html"><i class="bi bi-speedometer2"></i>Dashboard</a>
                    <a href="purchase-create.html"><i class="bi bi-plus-circle"></i>New GRN</a>
                    <a href="purchase-list.html"><i class="bi bi-card-list"></i>Purchases</a>
                    <a class="hot" href="pos.html"><i class="bi bi-cash-stack"></i>New Sale</a>
                </div> -->
                <div class="sec-lbl">Modules</div>
                  <div class="acc-item" id="menu-sales">
                    <input type="checkbox" class="acc-chk" id="chk-sales" /><label class="acc-label" for="chk-sales"
                        ><span class="ic"><i class="bi bi-cash-coin"></i></span><span>Sales</span
                        ><i class="bi bi-chevron-down chev"></i
                    ></label>
                    <div class="acc-links">
                        <a href="<?=  base_url(); ?>sales/create"><i class="bi bi-cart-plus"></i>New Sale</a
                        ><a href="<?=  base_url(); ?>sales"><i class="bi bi-receipt"></i>Sales List</a
                        ><a href="<?php echo base_url(); ?>purchase/returns"><i class="bi bi-clipboard-check"></i>POS Sale</a
                        ><a href="<?php echo base_url(); ?>purchase/returns"><i class="bi bi-arrow-return-left"></i>Sales Returns</a
                        ><a href="<?php echo base_url(); ?>purchase/returns"><i class="bi bi-file-earmark-ruled"></i>Quotations</a
                        ><a href="<?php echo base_url(); ?>purchase/returns"><i class="bi bi-file-earmark"></i>Drafts</a>
                       <a href="<?php echo base_url(); ?>purchase/returns"><i class="bi bi-cash-coin"></i>Installment Collection</a>
                    </div>
                </div>

             
                <div class="acc-item" id="menu-purchase">
                    <input type="checkbox" class="acc-chk" id="chk-purchase" /><label
                        class="acc-label"
                        for="chk-purchase"
                        ><span class="ic"><i class="bi bi-bag"></i></span><span>Purchases</span
                        ><i class="bi bi-chevron-down chev"></i
                    ></label>
                    <div class="acc-links">
                        <a href="<?php echo base_url(); ?>purchase/create"><i class="bi bi-plus-circle"></i>New Purchase</a
                        ><a href="<?php echo base_url(); ?>purchase"><i class="bi bi-card-list"></i>Purchase List</a
                        ><a href="<?php echo base_url(); ?>purchase/returns"><i class="bi bi-arrow-return-left"></i>Purchase Returns</a
                        ><a href="<?php echo base_url(); ?>purchase/drafts"><i class="bi bi-file-earmark"></i>Drafts List</a>
                    </div>
                </div>
                <div class="acc-item" id="menu-inventory">
                    <input type="checkbox" class="acc-chk" id="chk-inventory" /><label
                        class="acc-label"
                        for="chk-inventory"
                        ><span class="ic"><i class="bi bi-boxes"></i></span><span>Inventory</span
                        ><i class="bi bi-chevron-down chev"></i
                    ></label>
                    <div class="acc-links">
                        <a href="<?=  base_url(); ?>inventory/stock/overview"><i class="bi bi-tag"></i>Items</a
                        ><a href="stock.html"><i class="bi bi-bar-chart-line"></i>Stock Overview</a
                        ><a href="<?=  base_url(); ?>inventory/stock/barcode_tracker"><i class="bi bi-box-seam"></i>Stock Barcode</a
                        ><a href="<?=  base_url(); ?>inventory/stock/transfers"><i class="bi bi-arrow-left-right"></i>Stock Transfer</a>
                        ><a href="<?php echo base_url(); ?>purchase/returns"><i class="bi bi-sliders"></i>Stock Adjustment</a>
                        ><a href="<?php echo base_url(); ?>purchase/returns"><i class="bi bi-house-gear"></i>Warehouses</a>
                        ><a href="<?=  base_url(); ?>inventory/stock/stock_count"><i class="bi bi-clipboard2-check"></i>Stock Count</a>
                        ><a href="<?=  base_url(); ?>inventory/stock/low_stock"><i class="bi bi-exclamation-triangle"></i>Low Stock</a>
                        ><a href="<?=  base_url(); ?>inventory/stock/ledger"><i class="bi bi-journal-text"></i>Stock Ledger</a>
                    </div>
                </div>
                <div class="acc-item" id="menu-base">
                    <input type="checkbox" class="acc-chk" id="chk-base" /><label class="acc-label" for="chk-base"
                        ><span class="ic"><i class="bi bi-question-circle "></i></span><span>Setup</span
                        ><i class="bi bi-chevron-down chev"></i
                    ></label>
                    <div class="acc-links">
                        <a href="<?php echo base_url(); ?>main/products"><i class="bi bi-box-seam"></i>Products</a
                        ><a href="<?php echo base_url(); ?>main/brands"><i class="bi bi-tags"></i>Brands</a
                        ><a href="<?php echo base_url(); ?>main/categories"><i class="bi bi-grid"></i>Categories</a
                        ><a href="<?php echo base_url(); ?>main/partners"><i class="bi bi-people"></i>Partners</a
                        ><a href="<?php echo base_url(); ?>main/units"><i class="bi bi-rulers"></i>Units</a>
                    </div>
                </div>
                <div class="acc-item" id="menu-accounts">
                    <input type="checkbox" class="acc-chk" id="chk-accounts" /><label
                        class="acc-label"
                        for="chk-accounts"
                        ><span class="ic"><i class="bi bi-journal-bookmark"></i></span><span>Accounts</span
                        ><i class="bi bi-chevron-down chev"></i
                    ></label>
                    <div class="acc-links">
                        <a href="#"><i class="bi bi-wallet2"></i>Accounts Overview</a
                        ><a href="#"><i class="bi bi-diagram-2"></i>Chart of Accounts</a
                        ><a href="#"><i class="bi bi-journal-text"></i>Journal Entries</a
                        ><a href="#"><i class="bi bi-credit-card"></i>Payments</a
                        ><a href="#"><i class="bi bi-receipt-cutoff"></i>Receipts</a
                        ><a href="#"><i class="bi bi-bank"></i>Cash & Bank</a
                        ><a href="#"><i class="bi bi-graph-up-arrow"></i>Income</a
                        ><a href="#"><i class="bi bi-cash-stack"></i>Expenses</a
                        ><a href="#"><i class="bi bi-journal-bookmark"></i>General Ledger</a>
                        ><a href="#"><i class="bi bi-calculator"></i>Trial Balance</a>
                    </div>
                </div>
                 <div class="acc-item" id="menu-payroll">
                    <input type="checkbox" class="acc-chk" id="chk-payroll" /><label class="acc-label" for="chk-payroll"
                        ><span class="ic"><i class="bi bi-people"></i></span><span>HR & Payroll</span
                        ><i class="bi bi-chevron-down chev"></i
                    ></label>
                    <div class="acc-links">
                        <a href="#"><i class="bi bi-people"></i>Employees</a
                        ><a href="#"><i class="bi bi-diagram-3"></i>Departments</a
                        ><a href="#"><i class="bi bi-person-badge"></i>Designations</a
                        ><a href="#"><i class="bi bi-calendar-check"></i>Attendance</a
                        ><a href="#"><i class="bi bi-clock"></i>Shifts</a
                        ><a href="#"><i class="bi bi-calendar2-minus"></i>Leave Management</a
                        ><a href="#"><i class="bi bi-cash-stack"></i>Payroll</a>
                        <a href="#"><i class="bi bi-wallet"></i>Salary Advance</a>
                    </div>
                </div>
                <div class="acc-item" id="menu-reports">
                    <input type="checkbox" class="acc-chk" id="chk-reports" /><label class="acc-label" for="chk-reports"
                        ><span class="ic"><i class="bi bi-graph-up-arrow"></i></span><span>Reports</span
                        ><i class="bi bi-chevron-down chev"></i
                    ></label>
                    <div class="acc-links">
                        <a href="#"><i class="bi bi-graph-up"></i>Sales Report</a
                        ><a href="#"><i class="bi bi-graph-down"></i>Purchase Report</a
                        ><a href="#"><i class="bi bi-clipboard-data"></i>Stock Report</a
                        ><a href="#"><i class="bi bi-pie-chart"></i>Profit &amp; Loss</a>
                        <a href="#"><i class="bi bi-person-lines-fill"></i>Customer Report</a
                        ><a href="#"><i class="bi bi-truck"></i>Supplier Report</a
                        ><a href="#"><i class="bi bi-receipt"></i>Expense Report</a>
                        <a href="#"><i class="bi bi-credit-card"></i>Payment Report</a>
                        <a href="#"><i class="bi bi-people"></i>Employee Report</a>
                        
                       
                    </div>
                </div>
                <div class="acc-item" id="menu-help">
                    <input type="checkbox" class="acc-chk" id="chk-help" /><label class="acc-label" for="chk-help"
                        ><span class="ic"><i class="bi bi-gear"></i></span><span>Settings</span
                        ><i class="bi bi-chevron-down chev"></i
                    ></label>
                    <div class="acc-links">
                        <a href="#"><i class="bi bi-people"></i>User Management</a
                        ><a href="#"><i class="bi bi-shield-lock"></i>Roles & Permissions</a>
                        <a href="#"><i class="bi bi-receipt"></i>Invoice Settings</a>
                        <a href="#"><i class="bi bi-bell"></i>Notifications</a>
                        <a href="#"><i class="bi bi-headset"></i>Support</a>
                    </div>
                </div>
            </div>
        </div>