<?php
session_start();

// Cek apakah sudah login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

require_once '../config/database.php';

// Ambil statistik
$stats = array();

// Total pendaftaran
$result = $conn->query("SELECT COUNT(*) as total FROM pendaftaran");
$stats['total'] = $result->fetch_assoc()['total'];

// Pending
$result = $conn->query("SELECT COUNT(*) as pending FROM pendaftaran WHERE status = 'pending'");
$stats['pending'] = $result->fetch_assoc()['pending'];

// Diterima
$result = $conn->query("SELECT COUNT(*) as diterima FROM pendaftaran WHERE status = 'diterima'");
$stats['diterima'] = $result->fetch_assoc()['diterima'];

// Ditolak
$result = $conn->query("SELECT COUNT(*) as ditolak FROM pendaftaran WHERE status = 'ditolak'");
$stats['ditolak'] = $result->fetch_assoc()['ditolak'];

// Pendaftaran terbaru
$recent_sql = "SELECT no_pendaftaran, nama_lengkap, asal_sekolah, tanggal_daftar, status 
               FROM pendaftaran 
               ORDER BY tanggal_daftar DESC 
               LIMIT 5";
$recent_result = $conn->query($recent_sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - MTS Buya Hamka</title>
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
        .stat-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .main-content {
            padding: 20px;
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
                        <a class="nav-link active" href="dashboard.php">
                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                        </a>
                        <a class="nav-link" href="kelola_pendaftaran.php">
                            <i class="fas fa-users me-2"></i>Kelola Pendaftaran
                        </a>
                        <a class="nav-link" href="logout.php">
                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                        </a>
                    </nav>
                    
                    <div class="mt-auto pt-4">
                        <div class="text-center">
                            <small>Selamat datang,<br><strong><?= $_SESSION['admin_nama'] ?></strong></small>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-lg-10">
                <div class="main-content">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Dashboard Admin</h2>
                        <div>
                            <span class="text-muted">
                                <i class="fas fa-calendar me-2"></i><?= date('d F Y') ?>
                            </span>
                        </div>
                    </div>
                    
                    <!-- Statistik Cards -->
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card stat-card bg-primary text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h3 class="card-title"><?= $stats['total'] ?></h3>
                                            <p class="card-text">Total Pendaftaran</p>
                                        </div>
                                        <div>
                                            <i class="fas fa-users fa-3x opacity-50"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card stat-card bg-warning text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h3 class="card-title"><?= $stats['pending'] ?></h3>
                                            <p class="card-text">Menunggu Verifikasi</p>
                                        </div>
                                        <div>
                                            <i class="fas fa-clock fa-3x opacity-50"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card stat-card bg-success text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h3 class="card-title"><?= $stats['diterima'] ?></h3>
                                            <p class="card-text">Diterima</p>
                                        </div>
                                        <div>
                                            <i class="fas fa-check-circle fa-3x opacity-50"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card stat-card bg-danger text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h3 class="card-title"><?= $stats['ditolak'] ?></h3>
                                            <p class="card-text">Ditolak</p>
                                        </div>
                                        <div>
                                            <i class="fas fa-times-circle fa-3x opacity-50"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pendaftaran Terbaru -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="fas fa-list me-2"></i>Pendaftaran Terbaru
                            </h5>
                            <a href="kelola_pendaftaran.php" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye me-2"></i>Lihat Semua
                            </a>
                        </div>
                        <div class="card-body">
                            <?php if($recent_result->num_rows > 0): ?>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No. Pendaftaran</th>
                                                <th>Nama Lengkap</th>
                                                <th>Asal Sekolah</th>
                                                <th>Tanggal Daftar</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($row = $recent_result->fetch_assoc()): ?>
                                                <tr>
                                                    <td><?= $row['no_pendaftaran'] ?></td>
                                                    <td><?= $row['nama_lengkap'] ?></td>
                                                    <td><?= $row['asal_sekolah'] ?></td>
                                                    <td><?= date('d/m/Y H:i', strtotime($row['tanggal_daftar'])) ?></td>
                                                    <td>
                                                        <?php
                                                        $badge_class = '';
                                                        switch($row['status']) {
                                                            case 'pending': $badge_class = 'bg-warning'; break;
                                                            case 'diterima': $badge_class = 'bg-success'; break;
                                                            case 'ditolak': $badge_class = 'bg-danger'; break;
                                                        }
                                                        ?>
                                                        <span class="badge <?= $badge_class ?>"><?= ucfirst($row['status']) ?></span>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else: ?>
                                <div class="text-center py-4">
                                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada pendaftaran</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>