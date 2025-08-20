<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>School Admin Dashboard</title>
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <!-- Bootstrap 5.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <!-- Simple DataTables (optional) -->
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3/dist/style.css" rel="stylesheet" />
  <style>
    :root{
      --bg: #0b172a;
      --bg-soft: #0f1f3a;
      --primary: #2e90ff; /* school blue */
      --primary-600:#1d6fd6;
      --accent: #22c55e; /* success green */
      --text:#0f172a;
      --muted:#64748b;
      --card:#ffffff;
      --border:#e5e7eb;
      --ring: rgba(46,144,255,.25);
    }
    [data-theme="dark"]{
      --bg: #0b1220;
      --bg-soft:#0e1628;
      --card:#0f1b34;
      --text:#e5e7eb;
      --muted:#93a3b8;
      --border:#22314f;
    }
    html,body{height:100%}
    body{
      font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, 'Apple Color Emoji', 'Segoe UI Emoji';
      background: linear-gradient(180deg, var(--bg) 0%, var(--bg-soft) 100%);
      color: var(--text);
    }
    .app{
      display:grid;
      grid-template-columns: 280px 1fr;
      min-height: 100vh;
    }
    .sidebar{
      background: rgba(255,255,255,.04);
      border-right: 1px solid var(--border);
      backdrop-filter: blur(10px);
      position: sticky; top:0; height: 100vh;
    }
    .sidebar .brand{
      display:flex; align-items:center; gap:.75rem; padding:1rem 1rem; border-bottom:1px solid var(--border);
    }
    .brand-logo{
      width:40px; height:40px; border-radius:12px; display:grid; place-items:center; color:#fff; font-weight:800; background:linear-gradient(135deg, var(--primary), var(--accent));
      box-shadow: 0 10px 30px rgba(46,144,255,.35);
    }
    .menu{ padding: .75rem; }
    .menu .title{ font-size:.8rem; letter-spacing:.08em; color: var(--muted); padding:.75rem 1rem; text-transform:uppercase; }
    .menu a{ text-decoration:none; color:inherit; }
    .menu .item{ display:flex; align-items:center; gap:.75rem; padding:.75rem 1rem; border-radius:12px; color: var(--muted); }
    .menu .item:hover{ background: rgba(46,144,255,.08); color:#fff; }
    .menu .item.active{ background: linear-gradient(135deg, rgba(46,144,255,.18), rgba(34,197,94,.18)); color:#fff; box-shadow: inset 0 0 0 1px rgba(255,255,255,.06); }

    .main{
      display:flex; flex-direction:column; min-width:0; /* fix overflow */
    }
    .topbar{
      position: sticky; top:0; z-index: 20; backdrop-filter: blur(8px);
      background: rgba(255,255,255,.05); border-bottom:1px solid var(--border);
    }
    .topbar .search{ max-width:520px; }
    .form-control:focus{ box-shadow: 0 0 0 .25rem var(--ring); border-color: var(--primary); }

    .content{ padding: 1.25rem; }
    .card{ background: var(--card); border:1px solid var(--border); border-radius: 1.25rem; }
    .card-header{ background: transparent; border-bottom:1px dashed var(--border); }
    .stat{
      display:grid; grid-template-columns:auto 1fr; gap:.75rem; align-items:center;
    }
    .stat .icon{
      width:46px;height:46px;border-radius:12px;display:grid;place-items:center;
      background: rgba(46,144,255,.12); color: var(--primary);
    }
    .btn-primary{ background: var(--primary); border-color: var(--primary-600); }
    .btn-primary:hover{ background: var(--primary-600); border-color: var(--primary-600); }

    .badge-soft{ background: rgba(46,144,255,.12); color: var(--primary); }

    .table thead th{ color: var(--muted); font-weight:600; }

    /* Sidebar toggle (mobile) */
    .sidebar{ transition: transform .3s ease; }
    .sidebar.closed{ transform: translateX(-100%); }
    .sidebar-toggle{ display:none; }

    @media (max-width: 991.98px){
      .app{ grid-template-columns: 0 1fr; }
      .sidebar{ position: fixed; left:0; top:0; width: 260px; z-index: 40; }
      .sidebar-toggle{ display:inline-flex; }
    }
  </style>
</head>
<body>
  <div class="app">
    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar">
      <div class="brand">
        <div class="brand-logo">SU</div>
        <div>
          <div class="fw-bold text-white">Scholaro Admin</div>
          <div class="small text-secondary">School Management</div>
        </div>
      </div>
      <nav class="menu">
        <div class="title">overview</div>
        <a href="#" class="item active"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a>
        <a href="#" class="item"><i class="fa-solid fa-user-graduate"></i><span>Students</span></a>
        <a href="#" class="item"><i class="fa-solid fa-chalkboard-user"></i><span>Teachers</span></a>
        <a href="#" class="item"><i class="fa-solid fa-timeline"></i><span>Classes</span></a>
        <a href="#" class="item"><i class="fa-solid fa-clipboard-check"></i><span>Attendance</span></a>
        <a href="#" class="item"><i class="fa-solid fa-clipboard-list"></i><span>Grades</span></a>
        <a href="#" class="item"><i class="fa-solid fa-sack-dollar"></i><span>Fees & Billing</span></a>
        <a href="#" class="item"><i class="fa-solid fa-book"></i><span>Library</span></a>
        <a href="#" class="item"><i class="fa-solid fa-chart-column"></i><span>Reports</span></a>
        <div class="title">system</div>
        <a href="#" class="item"><i class="fa-solid fa-gear"></i><span>Settings</span></a>
        <a href="#" class="item" id="btn-logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
      </nav>
    </aside>

    <!-- Main -->
    <div class="main">
      <!-- Topbar -->
      <div class="topbar">
        <div class="container-fluid py-2">
          <div class="d-flex align-items-center gap-2">
            <button class="btn btn-outline-light sidebar-toggle" id="toggleSidebar" aria-label="Toggle sidebar"><i class="fa-solid fa-bars"></i></button>
            <form class="search flex-grow-1" role="search" onsubmit="event.preventDefault()">
              <div class="input-group">
                <span class="input-group-text bg-transparent border-end-0"><i class="fa-solid fa-magnifying-glass text-secondary"></i></span>
                <input class="form-control border-start-0" type="search" placeholder="Search students, teachers, classes..." aria-label="Search">
              </div>
            </form>
            <button class="btn btn-outline-light" id="themeToggle" title="Toggle dark mode"><i class="fa-solid fa-moon"></i></button>
            <button class="btn btn-outline-light position-relative" title="Notifications">
              <i class="fa-regular fa-bell"></i>
              <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"><span class="visually-hidden">New alerts</span></span>
            </button>
            <div class="dropdown">
              <button class="btn btn-outline-light dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown">
                <img src="https://i.pravatar.cc/40?img=12" class="rounded-circle" width="32" height="32" alt="avatar"/>
                <span class="d-none d-md-inline">Admin</span>
              </button>
              <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Preferences</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="#" id="btn-logout-2">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Page Content -->
      <main class="content container-fluid">
        <!-- Hero / Breadcrumbs -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
          <div class="d-flex align-items-center gap-3">
            <div class="p-3 rounded-3" style="background:rgba(34,197,94,.12); color:var(--accent);"><i class="fa-solid fa-school fa-xl"></i></div>
            <div>
              <h1 class="h3 mb-0 text-white">Dashboard</h1>
              <div class="text-secondary">Academic Year 2025–2026 • Term 1</div>
            </div>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal"><i class="fa-solid fa-user-plus me-2"></i>Add Student</button>
            <button class="btn btn-outline-light"><i class="fa-solid fa-file-export me-2"></i>Export</button>
          </div>
        </div>

        <!-- Stats -->
        <div class="row g-3 mb-3">
          <div class="col-12 col-sm-6 col-xl-3">
            <div class="card h-100">
              <div class="card-body">
                <div class="stat">
                  <div class="icon"><i class="fa-solid fa-user-graduate"></i></div>
                  <div>
                    <div class="text-secondary small">Total Students</div>
                    <div class="fs-4 fw-bold" id="statStudents">1,248</div>
                  </div>
                </div>
                <div class="mt-3 small text-secondary"><span class="badge badge-soft"><i class="fa-solid fa-arrow-trend-up me-1"></i>+3.2%</span> vs last term</div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-xl-3">
            <div class="card h-100">
              <div class="card-body">
                <div class="stat">
                  <div class="icon" style="background:rgba(34,197,94,.12); color:var(--accent)"><i class="fa-solid fa-chalkboard-user"></i></div>
                  <div>
                    <div class="text-secondary small">Teachers</div>
                    <div class="fs-4 fw-bold" id="statTeachers">82</div>
                  </div>
                </div>
                <div class="mt-3 small text-secondary"><span class="badge badge-soft" style="color:var(--accent); background:rgba(34,197,94,.12)"><i class="fa-solid fa-user-plus me-1"></i>+4</span> new this term</div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-xl-3">
            <div class="card h-100">
              <div class="card-body">
                <div class="stat">
                  <div class="icon" style="background:rgba(250,204,21,.15); color:#eab308"><i class="fa-solid fa-timeline"></i></div>
                  <div>
                    <div class="text-secondary small">Active Classes</div>
                    <div class="fs-4 fw-bold" id="statClasses">156</div>
                  </div>
                </div>
                <div class="mt-3 small text-secondary">Across K–12 & College</div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-xl-3">
            <div class="card h-100">
              <div class="card-body">
                <div class="stat">
                  <div class="icon" style="background:rgba(244,63,94,.15); color:#f43f5e"><i class="fa-solid fa-clipboard-check"></i></div>
                  <div>
                    <div class="text-secondary small">Attendance Today</div>
                    <div class="fs-4 fw-bold" id="statAttendance">94.2%</div>
                  </div>
                </div>
                <div class="mt-3 small text-secondary">Updated 10 mins ago</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Charts -->
        <div class="row g-3 mb-3">
          <div class="col-12 col-xl-8">
            <div class="card h-100">
              <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                  <div class="fw-semibold">Attendance Trend</div>
                  <div class="small text-secondary">Daily rate (last 30 school days)</div>
                </div>
                <div>
                  <div class="btn-group btn-group-sm" role="group">
                    <button class="btn btn-outline-secondary active" data-range="30">30d</button>
                    <button class="btn btn-outline-secondary" data-range="90">90d</button>
                    <button class="btn btn-outline-secondary" data-range="365">1y</button>
                  </div>
                </div>
              </div>
              <div class="card-body"><canvas id="attendanceChart" height="120"></canvas></div>
            </div>
          </div>
          <div class="col-12 col-xl-4">
            <div class="card h-100">
              <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                  <div class="fw-semibold">Enrollment by Grade</div>
                  <div class="small text-secondary">Current term</div>
                </div>
                <span class="badge text-bg-light">K–12</span>
              </div>
              <div class="card-body"><canvas id="gradeChart" height="120"></canvas></div>
            </div>
          </div>
        </div>

        <div class="row g-3 mb-3">
          <div class="col-12 col-xl-4">
            <div class="card h-100">
              <div class="card-header"><div class="fw-semibold">Fees Breakdown</div><div class="small text-secondary">Paid vs Outstanding</div></div>
              <div class="card-body"><canvas id="feesChart" height="160"></canvas></div>
            </div>
          </div>
          <div class="col-12 col-xl-8">
            <div class="card h-100">
              <div class="card-header d-flex align-items-center justify-content-between">
                <div>
                  <div class="fw-semibold">Recent Enrollments</div>
                  <div class="small text-secondary">Showing 10 of 1,248</div>
                </div>
                <div class="d-flex gap-2">
                  <input id="tableSearch" class="form-control form-control-sm" placeholder="Search table" />
                  <button class="btn btn-sm btn-primary" id="btnAddRow"><i class="fa-solid fa-plus me-1"></i>Quick Add</button>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="studentsTable" class="table align-middle mb-0">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Grade</th>
                        <th>Section</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- sample rows -->
                      <tr>
                        <td>1001</td>
                        <td>Anne Cruz</td>
                        <td>Grade 10</td>
                        <td>Ruby</td>
                        <td><span class="badge text-bg-success">Enrolled</span></td>
                        <td>
                          <button class="btn btn-sm btn-outline-secondary me-1"><i class="fa-solid fa-pen"></i></button>
                          <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>1002</td>
                        <td>John Dela Cruz</td>
                        <td>Grade 11</td>
                        <td>STEM A</td>
                        <td><span class="badge text-bg-warning">Pending</span></td>
                        <td>
                          <button class="btn btn-sm btn-outline-secondary me-1"><i class="fa-solid fa-pen"></i></button>
                          <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>1003</td>
                        <td>Maria Santos</td>
                        <td>Grade 7</td>
                        <td>Jade</td>
                        <td><span class="badge text-bg-success">Enrolled</span></td>
                        <td>
                          <button class="btn btn-sm btn-outline-secondary me-1"><i class="fa-solid fa-pen"></i></button>
                          <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Footer -->
        <div class="text-center text-secondary small mt-4">© <span id="year"></span> Scholaro Admin • Built with Bootstrap 5</div>
      </main>
    </div>
  </div>

  <!-- Add Student Modal -->
  <div class="modal fade" id="addStudentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addStudentForm">
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">First Name</label>
                <input class="form-control" name="first" required />
              </div>
              <div class="col-md-6">
                <label class="form-label">Last Name</label>
                <input class="form-control" name="last" required />
              </div>
              <div class="col-md-6">
                <label class="form-label">Grade Level</label>
                <select class="form-select" name="grade" required>
                  <option value="">Choose...</option>
                  <option>Grade 7</option>
                  <option>Grade 8</option>
                  <option>Grade 9</option>
                  <option>Grade 10</option>
                  <option>Grade 11</option>
                  <option>Grade 12</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Section</label>
                <input class="form-control" name="section" placeholder="e.g., Ruby" required />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3/dist/umd/simple-datatables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>

  <script>
    // Year
    document.getElementById('year').textContent = new Date().getFullYear();

    // Sidebar toggle (mobile)
    const sidebar = document.getElementById('sidebar');
    const toggleSidebar = document.getElementById('toggleSidebar');
    const mq = window.matchMedia('(max-width: 991.98px)');
    function syncSidebar(){
      if(mq.matches){ sidebar.classList.add('closed'); } else { sidebar.classList.remove('closed'); }
    }
    syncSidebar(); mq.addEventListener('change', syncSidebar);
    toggleSidebar?.addEventListener('click', ()=> sidebar.classList.toggle('closed'));

    // Theme toggle with localStorage
    const themeToggle = document.getElementById('themeToggle');
    const root = document.documentElement;
    const savedTheme = localStorage.getItem('theme');
    if(savedTheme){ root.setAttribute('data-theme', savedTheme); }
    themeToggle?.addEventListener('click', ()=>{
      const next = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
      root.setAttribute('data-theme', next);
      localStorage.setItem('theme', next);
    });

    // Charts (dummy data)
    const ctxA = document.getElementById('attendanceChart');
    const ctxG = document.getElementById('gradeChart');
    const ctxF = document.getElementById('feesChart');

    const days = Array.from({length:30}, (_,i)=> new Date(Date.now() - (29-i)*864e5)).map(d=>`${d.getMonth()+1}/${d.getDate()}`);
    const attendance = days.map(()=> 90 + Math.round(Math.random()*10));

    new Chart(ctxA, {
      type: 'line',
      data: { labels: days, datasets: [{ label: 'Attendance %', data: attendance, tension:.35, fill:true, backgroundColor: 'rgba(46,144,255,.12)', borderColor: 'rgba(46,144,255,1)', pointRadius:0, borderWidth:2 }]},
      options: { responsive:true, maintainAspectRatio:false, scales:{ y:{ beginAtZero:false, suggestedMin:80, suggestedMax:100, ticks:{ callback:v=>v+'%' } } }, plugins:{ legend:{ display:false } } }
    });

    new Chart(ctxG, {
      type: 'bar',
      data: { labels:['G7','G8','G9','G10','G11','G12'], datasets:[{ label:'Students', data:[180,200,210,205,220,233] }]},
      options: { responsive:true, maintainAspectRatio:false, plugins:{ legend:{ display:false } } }
    });

    new Chart(ctxF, {
      type: 'doughnut',
      data: { labels:['Paid','Outstanding'], datasets:[{ data:[72,28] }]},
      options: { responsive:true, maintainAspectRatio:false }
    });

    // Table -> Simple-DataTables (search, sort, paginate)
    let dt = new simpleDatatables.DataTable('#studentsTable', {
      searchable: true,
      fixedHeight: true,
      perPage: 5
    });
    document.getElementById('tableSearch').addEventListener('input', (e)=> dt.search(e.target.value));

    // Add Student Modal -> Quick append to table + toast
    document.getElementById('addStudentForm').addEventListener('submit', function(e){
      e.preventDefault();
      const fd = new FormData(this);
      const id = Math.floor(Math.random()*9000) + 1000;
      const name = fd.get('first') + ' ' + fd.get('last');
      const grade = fd.get('grade');
      const section = fd.get('section');
      dt.rows().add([[id, name, grade, section, '<span class="badge text-bg-warning">Pending</span>', `\n        <button class=\"btn btn-sm btn-outline-secondary me-1\"><i class=\"fa-solid fa-pen\"></i></button>\n        <button class=\"btn btn-sm btn-outline-danger\"><i class=\"fa-solid fa-trash\"></i></button>`]]);

      const modal = bootstrap.Modal.getInstance(document.getElementById('addStudentModal'));
      modal.hide(); this.reset();

      Swal.fire({
        title: 'Student Added',
        text: `${name} (${grade} - ${section}) added to table.`,
        icon: 'success',
        timer: 1800,
        showConfirmButton: false,
        toast: true,
        position: 'top-end'
      });
    });

    // Quick Add button (demo)
    document.getElementById('btnAddRow').addEventListener('click', ()=>{
      const id = Math.floor(Math.random()*9000) + 1000;
      dt.rows().add([[id, 'New Student', 'Grade 9', 'Topaz', '<span class="badge text-bg-warning">Pending</span>', `\n        <button class=\"btn btn-sm btn-outline-secondary me-1\"><i class=\"fa-solid fa-pen\"></i></button>\n        <button class=\"btn btn-sm btn-outline-danger\"><i class=\"fa-solid fa-trash\"></i></button>`]]);
    });

    // Logout demo
    const doLogout = ()=> Swal.fire({ title:'Logged out', text:'You have been signed out.', icon:'success', timer:1400, showConfirmButton:false });
    document.getElementById('btn-logout').addEventListener('click', doLogout);
    document.getElementById('btn-logout-2').addEventListener('click', doLogout);
  </script>
</body>
</html>
