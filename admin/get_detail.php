<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo '<div class="alert alert-danger">Unauthorized access</div>';
    exit();
}

require_once '../config/database.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $sql = "SELECT * FROM pendaftaran WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        ?>
        <div class="row">
            <div class="col-md-6">
                <h6 class="text-primary">Data Pribadi</h6>
                <table class="table table-borderless table-sm">
                    <tr>
                        <td width="40%"><strong>No. Pendaftaran</strong></td>
                        <td>: <?= $data['no_pendaftaran'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nama Lengkap</strong></td>
                        <td>: <?= $data['nama_lengkap'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>NISN</strong></td>
                        <td>: <?= $data['nisn'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Tempat, Tanggal Lahir</strong></td>
                        <td>: <?= $data['tempat_lahir'] ?>, <?= date('d F Y', strtotime($data['tanggal_lahir'])) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Jenis Kelamin</strong></td>
                        <td>: <?= $data['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                    </tr>
                    <tr>
                        <td><strong>Agama</strong></td>
                        <td>: <?= $data['agama'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Alamat</strong></td>
                        <td>: <?= $data['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>No. HP</strong></td>
                        <td>: <?= $data['no_hp'] ?></td>
                    </tr>
                </table>
                
                <h6 class="text-primary mt-3">Data Pendidikan</h6>
                <table class="table table-borderless table-sm">
                    <tr>
                        <td width="40%"><strong>Asal Sekolah</strong></td>
                        <td>: <?= $data['asal_sekolah'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nilai Ijazah</strong></td>
                        <td>: <?= $data['nilai_ijazah'] ?></td>
                    </tr>
                </table>
            </div>
            
            <div class="col-md-6">
                <h6 class="text-primary">Data Orang Tua</h6>
                <table class="table table-borderless table-sm">
                    <tr>
                        <td width="40%"><strong>Nama Ayah</strong></td>
                        <td>: <?= $data['nama_ayah'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nama Ibu</strong></td>
                        <td>: <?= $data['nama_ibu'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Pekerjaan Ayah</strong></td>
                        <td>: <?= $data['pekerjaan_ayah'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Pekerjaan Ibu</strong></td>
                        <td>: <?= $data['pekerjaan_ibu'] ?></td>
                    </tr>
                </table>
                
                <h6 class="text-primary mt-3">Status Pendaftaran</h6>
                <table class="table table-borderless table-sm">
                    <tr>
                        <td width="40%"><strong>Status</strong></td>
                        <td>: 
                            <?php
                            $badge_class = '';
                            switch($data['status']) {
                                case 'pending': $badge_class = 'bg-warning text-dark'; break;
                                case 'diterima': $badge_class = 'bg-success'; break;
                                case 'ditolak': $badge_class = 'bg-danger'; break;
                            }
                            ?>
                            <span class="badge <?= $badge_class ?>"><?= ucfirst($data['status']) ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Daftar</strong></td>
                        <td>: <?= date('d F Y H:i:s', strtotime($data['tanggal_daftar'])) ?></td>
                    </tr>
                </table>
                
                <?php if($data['status'] == 'pending'): ?>
                <div class="mt-3">
                    <h6 class="text-primary">Aksi</h6>
                    <div class="d-grid gap-2">
                        <button class="btn btn-success" onclick="updateStatus(<?= $data['id'] ?>, 'diterima')">
                            <i class="fas fa-check me-2"></i>Terima Pendaftaran
                        </button>
                        <button class="btn btn-danger" onclick="updateStatus(<?= $data['id'] ?>, 'ditolak')">
                            <i class="fas fa-times me-2"></i>Tolak Pendaftaran
                        </button>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    } else {
        echo '<div class="alert alert-warning">Data tidak ditemukan</div>';
    }
} else {
    echo '<div class="alert alert-danger">ID tidak valid</div>';
}
?>