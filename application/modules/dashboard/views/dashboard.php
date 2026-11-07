 
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                    <h1 class="page-title mb-0">Dashboard</h1>
                    <a href="badge-maker.html" class="btn btn-primary"><i class="bi bi-plus-lg"></i> New Badge</a>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card stat-card">
                            <div class="stat-icon bg-soft-blue"><i class="bi bi-collection"></i></div>
                            <div>
                                <h3>24</h3>
                                <p>Saved designs</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card stat-card">
                            <div class="stat-icon bg-soft-green"><i class="bi bi-people"></i></div>
                            <div>
                                <h3>1,280</h3>
                                <p>Cardholders</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card stat-card">
                            <div class="stat-icon bg-soft-purple"><i class="bi bi-printer"></i></div>
                            <div>
                                <h3>3,945</h3>
                                <p>Cards printed</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card stat-card">
                            <div class="stat-icon bg-soft-orange"><i class="bi bi-hourglass-split"></i></div>
                            <div>
                                <h3>6</h3>
                                <p>Orders in progress</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-lg-8">
                        <div class="card h-100">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                Recent orders <a href="orders.html" class="btn btn-light border btn-sm">View all</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table plain mb-0" style="min-width: 560px">
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Customer</th>
                                            <th>Items</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="orders.html">#1045</a></td>
                                            <td>Acme Corp</td>
                                            <td>Employee ID cards × 50</td>
                                            <td>$189.00</td>
                                            <td><span class="badge-soft info">Processing</span></td>
                                        </tr>
                                        <tr>
                                            <td><a href="orders.html">#1044</a></td>
                                            <td>Greenfield School</td>
                                            <td>Student ID cards × 300</td>
                                            <td>$642.00</td>
                                            <td><span class="badge-soft warning">Printed</span></td>
                                        </tr>
                                        <tr>
                                            <td><a href="orders.html">#1043</a></td>
                                            <td>City Hospital</td>
                                            <td>Doctor ID cards × 40 + Lanyards</td>
                                            <td>$258.50</td>
                                            <td><span class="badge-soft primary">Shipped</span></td>
                                        </tr>
                                        <tr>
                                            <td><a href="orders.html">#1042</a></td>
                                            <td>Riverdale Church</td>
                                            <td>Volunteer badges × 80</td>
                                            <td>$164.00</td>
                                            <td><span class="badge-soft success">Delivered</span></td>
                                        </tr>
                                        <tr>
                                            <td><a href="orders.html">#1041</a></td>
                                            <td>Metro Press Club</td>
                                            <td>Press passes × 25</td>
                                            <td>$96.00</td>
                                            <td><span class="badge-soft success">Delivered</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card h-100">
                            <div class="card-header">Quick actions</div>
                            <div class="list-group list-group-flush">
                                <a
                                    href="badge-maker.html"
                                    class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3"
                                    ><span
                                        class="stat-icon bg-soft-blue"
                                        style="
                                            width: 40px;
                                            height: 40px;
                                            font-size: 18px;
                                            border-radius: 10px;
                                            display: grid;
                                            place-items: center;
                                        "
                                        ><i class="bi bi-person-vcard"></i></span
                                    ><span
                                        ><strong>Design a badge</strong><br /><small class="text-muted"
                                            >Start from scratch</small
                                        ></span
                                    ></a
                                >
                                <a
                                    href="templates.html"
                                    class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3"
                                    ><span
                                        class="stat-icon bg-soft-purple"
                                        style="
                                            width: 40px;
                                            height: 40px;
                                            font-size: 18px;
                                            border-radius: 10px;
                                            display: grid;
                                            place-items: center;
                                        "
                                        ><i class="bi bi-grid-1x2"></i></span
                                    ><span
                                        ><strong>Browse templates</strong><br /><small class="text-muted"
                                            >Employee, school, doctor…</small
                                        ></span
                                    ></a
                                >
                                <a
                                    href="bulk-import.html"
                                    class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3"
                                    ><span
                                        class="stat-icon bg-soft-green"
                                        style="
                                            width: 40px;
                                            height: 40px;
                                            font-size: 18px;
                                            border-radius: 10px;
                                            display: grid;
                                            place-items: center;
                                        "
                                        ><i class="bi bi-file-earmark-arrow-up"></i></span
                                    ><span
                                        ><strong>Import cardholders</strong><br /><small class="text-muted"
                                            >Upload a CSV file</small
                                        ></span
                                    ></a
                                >
                                <a
                                    href="accessories.html"
                                    class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3"
                                    ><span
                                        class="stat-icon bg-soft-orange"
                                        style="
                                            width: 40px;
                                            height: 40px;
                                            font-size: 18px;
                                            border-radius: 10px;
                                            display: grid;
                                            place-items: center;
                                        "
                                        ><i class="bi bi-shop"></i></span
                                    ><span
                                        ><strong>Order accessories</strong><br /><small class="text-muted"
                                            >Lanyards, holders, blanks</small
                                        ></span
                                    ></a
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-lg-5">
                        <div class="card h-100">
                            <div class="card-header">Cards by type</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span>Employee</span><span>42%</span>
                                    </div>
                                    <div class="progress mt-1">
                                        <div class="progress-bar bg-primary" style="width: 42%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span>Student</span><span>31%</span>
                                    </div>
                                    <div class="progress mt-1">
                                        <div class="progress-bar bg-success" style="width: 31%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span>Medical</span><span>14%</span>
                                    </div>
                                    <div class="progress mt-1">
                                        <div class="progress-bar bg-danger" style="width: 14%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <span>Visitor &amp; other</span><span>13%</span>
                                    </div>
                                    <div class="progress mt-1">
                                        <div class="progress-bar bg-secondary" style="width: 13%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card h-100">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                Recent designs <a href="designs.html" class="btn btn-light border btn-sm">My Designs</a>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="id-card t-blue" data-code="qr">
                                            <div class="hd">
                                                <span class="lg"><i class="bi bi-building"></i></span
                                                ><b class="v-co">Acme Corp</b><span class="kind v-kind">Employee</span>
                                            </div>
                                            <div class="bd">
                                                <div class="ph"><i class="bi bi-person-fill"></i></div>
                                                <div class="info">
                                                    <div class="nm v-nm">John Carter</div>
                                                    <div class="tt v-tt">Software Engineer</div>
                                                    <div class="rw">
                                                        ID: <span class="v-id">EMP-10234</span><br /><span class="v-dp"
                                                            >Engineering</span
                                                        ><br />Valid: <span class="v-vl">12/2027</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <i class="bi bi-qr-code code"></i>
                                            <div class="bar-sm bars"></div>
                                            <div class="ft"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="id-card t-green" data-code="qr">
                                            <div class="hd">
                                                <span class="lg"><i class="bi bi-building"></i></span
                                                ><b class="v-co">Greenfield School</b
                                                ><span class="kind v-kind">Student</span>
                                            </div>
                                            <div class="bd">
                                                <div class="ph"><i class="bi bi-person-fill"></i></div>
                                                <div class="info">
                                                    <div class="nm v-nm">Emma Davis</div>
                                                    <div class="tt v-tt">Grade 8 Student</div>
                                                    <div class="rw">
                                                        ID: <span class="v-id">STU-2210</span><br /><span class="v-dp"
                                                            >Class 8-B</span
                                                        ><br />Valid: <span class="v-vl">06/2027</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <i class="bi bi-qr-code code"></i>
                                            <div class="bar-sm bars"></div>
                                            <div class="ft"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          