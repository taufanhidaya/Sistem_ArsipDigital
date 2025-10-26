
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">📝 Daftar Tugas</h2>
            <p class="text-secondary">Kelola semua tugas dan deadline Anda</p>
        </div>
        <div class="d-flex gap-2">
            <select class="form-select" style="width: auto;">
                <option>Semua Status</option>
                <option>Belum Dikerjakan</option>
                <option>Dalam Progress</option>
                <option>Selesai</option>
                <option>Terlambat</option>
            </select>
            <select class="form-select" style="width: auto;">
                <option>Semua Mata Pelajaran</option>
                <option>Matematika</option>
                <option>Bahasa Inggris</option>
                <option>Kimia</option>
                <option>Fisika</option>
                <option>Ekonomi</option>
            </select>
        </div>
    </div>

    <!-- Stats Summary -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="stat-card orange">
                <div class="stat-icon orange">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="stat-value">3</div>
                <div class="stat-label">Mendesak</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card blue">
                <div class="stat-icon blue">
                    <i class="fas fa-hourglass-half"></i>
                </div>
                <div class="stat-value">5</div>
                <div class="stat-label">Dalam Progress</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card green">
                <div class="stat-icon green">
                    <i class="fas fa-check-double"></i>
                </div>
                <div class="stat-value">24</div>
                <div class="stat-label">Selesai Bulan Ini</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card" style="border-left-color: #ef4444;">
                <div class="stat-icon" style="background: rgba(239, 68, 68, 0.1); color: #ef4444;">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-value">2</div>
                <div class="stat-label">Terlambat</div>
            </div>
        </div>
    </div>

    <!-- Task List with Filter Tabs -->
    <div class="dashboard-card">
        <ul class="nav nav-tabs mb-4" id="taskTabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#allTasks">Semua (32)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#pendingTasks">Pending (8)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#completedTasks">Selesai (24)</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="allTasks">
                <!-- Daftar tugas lengkap seperti di dashboard -->
                <div class="task-list">
                    <!-- Repeat task cards... -->
                </div>
            </div>
        </div>
    </div>