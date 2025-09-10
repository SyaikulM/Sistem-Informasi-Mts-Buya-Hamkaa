<?php
session_start();
header('Content-Type: application/json');

// Enable error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log semua request untuk debugging
error_log("PPDB Admin Action: " . print_r($_POST, true));

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo json_encode([
        'success' => false, 
        'message' => 'Session expired. Please login again.',
        'debug' => 'Session check failed'
    ]);
    exit();
}

require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    
    // Log action untuk debugging
    error_log("Processing action: " . $action);
    
    switch ($action) {
        case 'update_status':
            $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
            $status = isset($_POST['status']) ? clean_input($_POST['status']) : '';
            
            // Debugging info
            error_log("Update Status - ID: $id, Status: $status");
            
            // Validasi input
            if ($id <= 0) {
                echo json_encode([
                    'success' => false, 
                    'message' => 'ID tidak valid',
                    'debug' => "ID received: $id"
                ]);
                break;
            }
            
            if (!in_array($status, ['pending', 'diterima', 'ditolak'])) {
                echo json_encode([
                    'success' => false, 
                    'message' => 'Status tidak valid',
                    'debug' => "Status received: $status"
                ]);
                break;
            }
            
            // Cek apakah record ada
            $check_sql = "SELECT id, nama_lengkap FROM pendaftaran WHERE id = ?";
            $check_stmt = $conn->prepare($check_sql);
            
            if (!$check_stmt) {
                echo json_encode([
                    'success' => false, 
                    'message' => 'Database prepare error: ' . $conn->error,
                    'debug' => 'Check statement preparation failed'
                ]);
                break;
            }
            
            $check_stmt->bind_param("i", $id);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();
            
            if ($check_result->num_rows == 0) {
                echo json_encode([
                    'success' => false, 
                    'message' => 'Data pendaftaran tidak ditemukan',
                    'debug' => "No record found for ID: $id"
                ]);
                break;
            }
            
            $record = $check_result->fetch_assoc();
            error_log("Found record: " . $record['nama_lengkap']);
            
            // Update status
            $sql = "UPDATE pendaftaran SET status = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            
            if (!$stmt) {
                echo json_encode([
                    'success' => false, 
                    'message' => 'Database prepare error: ' . $conn->error,
                    'debug' => 'Update statement preparation failed'
                ]);
                break;
            }
            
            $stmt->bind_param("si", $status, $id);
            
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    error_log("Status updated successfully for ID: $id");
                    echo json_encode([
                        'success' => true, 
                        'message' => "Status berhasil diupdate menjadi '$status'",
                        'debug' => "Affected rows: " . $stmt->affected_rows
                    ]);
                } else {
                    echo json_encode([
                        'success' => false, 
                        'message' => 'Tidak ada perubahan data',
                        'debug' => 'No rows affected'
                    ]);
                }
            } else {
                error_log("Execute error: " . $stmt->error);
                echo json_encode([
                    'success' => false, 
                    'message' => 'Gagal mengupdate status: ' . $stmt->error,
                    'debug' => 'Execute failed'
                ]);
            }
            
            $stmt->close();
            $check_stmt->close();
            break;
            
        case 'delete':
            $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
            
            if ($id > 0) {
                $sql = "DELETE FROM pendaftaran WHERE id = ?";
                $stmt = $conn->prepare($sql);
                
                if ($stmt) {
                    $stmt->bind_param("i", $id);
                    
                    if ($stmt->execute()) {
                        echo json_encode([
                            'success' => true, 
                            'message' => 'Data berhasil dihapus'
                        ]);
                    } else {
                        echo json_encode([
                            'success' => false, 
                            'message' => 'Gagal menghapus data: ' . $stmt->error
                        ]);
                    }
                    $stmt->close();
                } else {
                    echo json_encode([
                        'success' => false, 
                        'message' => 'Database prepare error: ' . $conn->error
                    ]);
                }
            } else {
                echo json_encode([
                    'success' => false, 
                    'message' => 'ID tidak valid'
                ]);
            }
            break;
            
        default:
            echo json_encode([
                'success' => false, 
                'message' => 'Action tidak valid: ' . $action,
                'debug' => 'Unknown action received'
            ]);
            break;
    }
} else {
    echo json_encode([
        'success' => false, 
        'message' => 'Method tidak diizinkan',
        'debug' => 'Not POST request'
    ]);
}

$conn->close();
?>