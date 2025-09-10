<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

require_once '../config/database.php';

// Filter
$filter_status = isset($_GET['status']) ? $_GET['status'] : 'all';
$search = isset($_GET['search']) ? clean_input($_GET['search']) : '';

// Query dengan filter
$where_clause = "WHERE 1=1";
$params = array();
$param_types = "";

if ($filter_status != 'all') {
    $where_clause .= " AND status = ?";
    $params[] = $filter_status;
    $param_types .= "s";
}

if (!empty($search)) {
    $where_clause .= " AND (nama_lengkap LIKE ? OR no_pendaftaran LIKE ? OR nisn LIKE ?)";
    $search_param = "%$search%";
    $params[] = $search_param;
    $params[] = $search_param;
    $params[] = $search_param;
    $param_types .= "sss";
}

$sql = "SELECT * FROM pendaftaran $where_clause ORDER BY tanggal_daftar DESC";
$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($param_types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pendaftaran - MTS Buya Hamka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            min-height: 100vh;
            color: white;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-radius: 8px;
            margin: 5px 0;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255,255,255,0.1);
            color: white;
        }
        .main-content {
            padding: 20px;
        }
        .table-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .btn-sm {
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 p-0">
                <div class="sidebar p-3">
                    <div class="text-center mb-4">
                        <h5><i class="fas fa-school me-2"></i>MTS Buya Hamka</h5>
                        <small>Admin Panel</small>
                    </div>
                    
                    <nav class="nav flex-column">
                        <a class="nav-link" href="dashboard.php">
                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                        </a>
                        <a class="nav-link active" href="kelola_pendaftaran.php">
                            <i class="fas fa-users me-2"></i>Kelola Pendaftaran
                        </a>
                        <a class="nav-link" href="logout.php">
                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                        </a>
                    </nav>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-lg-10">
                <div class="main-content">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Kelola Pendaftaran</h2>
                        <a href="dashboard.php" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                    
                    <!-- Filter dan Search -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="GET" class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label">Filter Status</label>
                                    <select name="status" class="form-select">
                                        <option value="all" <?= $filter_status == 'all' ? 'selected' : '' ?>>Semua Status</option>
                                        <option value="pending" <?= $filter_status == 'pending' ? 'selected' : '' ?>>Pending</option>
                                        <option value="diterima" <?= $filter_status == 'diterima' ? 'selected' : '' ?>>Diterima</option>
                                        <option value="ditolak" <?= $filter_status == 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Cari</label>
                                    <input type="text" name="search" class="form-control" 
                                           placeholder="Nama, No. Pendaftaran, atau NISN..." 
                                           value="<?= htmlspecialchars($search) ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">&nbsp;</label>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search me-2"></i>Cari
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Tabel Pendaftaran -->
                    <div class="table-container">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Pendaftaran</th>
                                        <th>Nama Lengkap</th>
                                        <th>NISN</th>
                                        <th>Asal Sekolah</th>
                                        <th>Nilai</th>
                                        <th>Status</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($result->num_rows > 0): ?>
                                        <?php $no = 1; while($row = $result->fetch_assoc()): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><strong><?= $row['no_pendaftaran'] ?></strong></td>
                                                <td><?= $row['nama_lengkap'] ?></td>
                                                <td><?= $row['nisn'] ?></td>
                                                <td><?= $row['asal_sekolah'] ?></td>
                                                <td><?= $row['nilai_ijazah'] ?></td>
                                                <td>
                                                    <?php
                                                    $badge_class = '';
                                                    switch($row['status']) {
                                                        case 'pending': $badge_class = 'bg-warning text-dark'; break;
                                                        case 'diterima': $badge_class = 'bg-success'; break;
                                                        case 'ditolak': $badge_class = 'bg-danger'; break;
                                                    }
                                                    ?>
                                                    <span class="badge <?= $badge_class ?>"><?= ucfirst($row['status']) ?></span>
                                                </td>
                                                <td><?= date('d/m/Y', strtotime($row['tanggal_daftar'])) ?></td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-info btn-sm" 
                                                                onclick="viewDetail(<?= $row['id'] ?>)">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <?php if($row['status'] == 'pending'): ?>
                                                            <button type="button" class="btn btn-success btn-sm" 
                                                                    onclick="updateStatus(<?= $row['id'] ?>, 'diterima')">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm" 
                                                                    onclick="updateStatus(<?= $row['id'] ?>, 'ditolak')">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="9" class="text-center py-4">
                                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                                <p class="text-muted">Tidak ada data pendaftaran</p>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="modalContent">
                    <div class="text-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function viewDetail(id) {
            const modal = new bootstrap.Modal(document.getElementById('detailModal'));
            modal.show();
            
            // Load detail via AJAX
            fetch('get_detail.php?id=' + id)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('modalContent').innerHTML = data;
                })
                .catch(error => {
                    document.getElementById('modalContent').innerHTML = 
                        '<div class="alert alert-danger">Error loading data</div>';
                });
        }

        function updateStatus(id, status) {
            const statusText = status === 'diterima' ? 'menerima' : 'menolak';
            
            if (confirm(`Apakah Anda yakin akan ${statusText} pendaftaran ini?`)) {
                // Show loading
                const button = event.target;
                const originalText = button.innerHTML;
                button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                button.disabled = true;
                
                // Update status via AJAX
                const formData = new FormData();
                formData.append('id', id);
                formData.append('status', status);
                formData.append('action', 'update_status');
                
                console.log('Sending data:', {id: id, status: status, action: 'update_status'});
                
                fetch('proses_admin.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    console.log('Response status:', response.status);
                    return response.text(); // Get as text first
                })
                .then(text => {
                    console.log('Raw response:', text);
                    try {
                        const data = JSON.parse(text);
                        console.log('Parsed data:', data);
                        
                        if (data.success) {
                            alert('Status berhasil diupdate: ' + data.message);
                            location.reload();
                        } else {
                            alert('Error: ' + data.message);
                            if (data.debug) {
                                console.error('Debug info:', data.debug);
                            }
                        }
                    } catch (e) {
                        console.error('JSON parse error:', e);
                        console.error('Response was:', text);
                        alert('Invalid response from server. Check console for details.');
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    alert('Network error: ' + error.message);
                })
                .finally(() => {
                    // Restore button
                    button.innerHTML = originalText;
                    button.disabled = false;
                });
            }
        }
    </script>
</body>
</html>