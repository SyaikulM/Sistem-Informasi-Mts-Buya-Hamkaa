<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran - MTS Buya Hamka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #06b6d4;
            --accent-color: #f59e0b;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --dark-color: #1f2937;
            --light-bg: #f8fafc;
            --card-bg: #ffffff;
            --border-color: #e5e7eb;
            --text-primary: #111827;
            --text-secondary: #6b7280;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            min-height: 100vh;
            font-size: 14px;
            line-height: 1.6;
        }

        /* Navbar Styles */
        .navbar {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: var(--shadow-sm);
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
            font-size: 1.25rem;
        }

        .navbar-brand i {
            color: var(--accent-color);
        }

        /* Main Container */
        .main-container {
            padding: 2rem 0;
            min-height: calc(100vh - 76px);
            display: flex;
            align-items: center;
        }

        .form-container {
            background: var(--card-bg);
            border-radius: 24px;
            box-shadow: var(--shadow-xl);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(20px);
            position: relative;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color), var(--accent-color));
        }

        /* Header Styles */
        .form-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 3rem 2.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .form-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: shimmer 3s ease-in-out infinite;
        }

        @keyframes shimmer {
            0%, 100% { transform: translateX(-20px) translateY(-20px); }
            50% { transform: translateX(20px) translateY(20px); }
        }

        .form-header h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 2;
        }

        .form-header p {
            font-size: 1rem;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }

        /* Form Body */
        .form-body {
            padding: 3rem 2.5rem;
        }

        /* Section Styles */
        .form-section {
            margin-bottom: 2.5rem;
            padding: 2rem;
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.02) 0%, rgba(6, 182, 212, 0.02) 100%);
            border-radius: 16px;
            border: 1px solid rgba(79, 70, 229, 0.1);
            position: relative;
            transition: all 0.3s ease;
        }

        .form-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }

        .form-section:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .section-title {
            color: var(--primary-color);
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid rgba(79, 70, 229, 0.1);
        }

        .section-title i {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-right: 0.5rem;
        }

        /* Form Controls */
        .form-label {
            color: var(--text-primary);
            font-weight: 500;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .form-control, .form-select {
            border: 2px solid var(--border-color);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
            background: rgba(255, 255, 255, 1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        /* Checkbox Styles */
        .form-check {
            background: rgba(79, 70, 229, 0.05);
            border: 2px solid rgba(79, 70, 229, 0.1);
            border-radius: 12px;
            padding: 1.5rem;
            margin: 1.5rem 0;
        }

        .form-check-input {
            width: 1.25rem;
            height: 1.25rem;
            margin-right: 0.75rem;
            border: 2px solid var(--primary-color);
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .form-check-label {
            font-size: 0.875rem;
            line-height: 1.5;
            color: var(--text-primary);
        }

        /* Button Styles */
        .btn {
            font-weight: 600;
            border-radius: 12px;
            padding: 0.875rem 2rem;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            box-shadow: var(--shadow-md);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            background: linear-gradient(135deg, #3730a3 0%, #0891b2 100%);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-outline-secondary {
            border: 2px solid var(--border-color);
            color: var(--text-secondary);
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        .btn-outline-secondary:hover {
            background: var(--text-secondary);
            border-color: var(--text-secondary);
            color: white;
            transform: translateY(-2px);
        }

        .btn-lg {
            padding: 1rem 2.5rem;
            font-size: 1rem;
        }

        /* Alert Styles */
        .alert {
            border-radius: 12px;
            border: none;
            padding: 1rem 1.5rem;
            margin-bottom: 2rem;
            backdrop-filter: blur(10px);
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger-color);
            border-left: 4px solid var(--danger-color);
        }

        /* Required asterisk */
        .required {
            color: var(--danger-color);
            font-weight: 600;
        }

        /* Animations */
        .form-container {
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Progress indicators */
        .progress-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
            padding: 0 1rem;
        }

        .progress-step {
            flex: 1;
            height: 4px;
            background: rgba(79, 70, 229, 0.2);
            border-radius: 2px;
            margin: 0 0.25rem;
            position: relative;
        }

        .progress-step.active {
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-container {
                padding: 1rem 0;
            }
            
            .form-header {
                padding: 2rem 1.5rem;
            }
            
            .form-header h2 {
                font-size: 1.5rem;
            }
            
            .form-body {
                padding: 2rem 1.5rem;
            }
            
            .form-section {
                padding: 1.5rem;
                margin-bottom: 2rem;
            }
            
            .section-title {
                font-size: 1.125rem;
            }
        }

        /* Loading animation */
        .btn-primary:disabled {
            position: relative;
            color: transparent;
        }

        .btn-primary:disabled::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin: -10px 0 0 -10px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-graduation-cap me-2"></i>
                MTS Buya Hamka
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-home me-2"></i>Beranda
                </a>
            </div>
        </div>
    </nav>

    <div class="container main-container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="form-container">
                    <div class="form-header">
                        <h2><i class="fas fa-user-graduate me-3"></i>Form Pendaftaran PPDB</h2>
                        <p class="mb-0">Lengkapi formulir berikut dengan data yang akurat dan valid</p>
                    </div>
                    
                    <div class="form-body">
                        <!-- Progress Indicator -->
                        <div class="progress-indicator">
                            <div class="progress-step active"></div>
                            <div class="progress-step active"></div>
                            <div class="progress-step active"></div>
                            <div class="progress-step active"></div>
                        </div>

                        <!-- Success/Error Messages -->
                        <div id="alertContainer">
                            <!-- Alerts will be inserted here by PHP -->
                        </div>

                        <form action="proses_daftar.php" method="POST" id="formPendaftaran">
                            <!-- Data Pribadi -->
                            <div class="form-section" data-section="1">
                                <h4 class="section-title">
                                    <i class="fas fa-user"></i>Data Pribadi Siswa
                                </h4>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Lengkap <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="nama_lengkap" required placeholder="Masukkan nama lengkap">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">NISN <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="nisn" required placeholder="Nomor Induk Siswa Nasional">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tempat Lahir <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="tempat_lahir" required placeholder="Kota/Kabupaten lahir">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Lahir <span class="required">*</span></label>
                                        <input type="date" class="form-control" name="tanggal_lahir" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Jenis Kelamin <span class="required">*</span></label>
                                        <select class="form-select" name="jenis_kelamin" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Agama <span class="required">*</span></label>
                                        <select class="form-select" name="agama" required>
                                            <option value="">Pilih Agama</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat Lengkap <span class="required">*</span></label>
                                    <textarea class="form-control" name="alamat" rows="3" required placeholder="Jalan, RT/RW, Kelurahan, Kecamatan, Kota"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">No. HP/Telepon <span class="required">*</span></label>
                                    <input type="tel" class="form-control" name="no_hp" required placeholder="08xxxxxxxxxx">
                                </div>
                            </div>

                            <!-- Data Orang Tua -->
                            <div class="form-section" data-section="2">
                                <h4 class="section-title">
                                    <i class="fas fa-users"></i>Data Orang Tua/Wali
                                </h4>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Ayah <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="nama_ayah" required placeholder="Nama lengkap ayah">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Ibu <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="nama_ibu" required placeholder="Nama lengkap ibu">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Pekerjaan Ayah <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="pekerjaan_ayah" required placeholder="Pekerjaan/profesi ayah">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Pekerjaan Ibu <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="pekerjaan_ibu" required placeholder="Pekerjaan/profesi ibu">
                                    </div>
                                </div>
                            </div>

                            <!-- Data Pendidikan -->
                            <div class="form-section" data-section="3">
                                <h4 class="section-title">
                                    <i class="fas fa-school"></i>Data Pendidikan Sebelumnya
                                </h4>
                                <div class="row">
                                    <div class="col-md-8 mb-3">
                                        <label class="form-label">Asal Sekolah <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="asal_sekolah" required placeholder="Nama sekolah dasar/MI sebelumnya">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Nilai Rata-rata Ijazah <span class="required">*</span></label>
                                        <input type="number" class="form-control" name="nilai_ijazah" 
                                               min="0" max="100" step="0.01" required placeholder="0.00">
                                    </div>
                                </div>
                            </div>

                            <!-- Pernyataan -->
                            <div class="form-section" data-section="4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="pernyataan" required>
                                    <label class="form-check-label" for="pernyataan">
                                        <strong>Pernyataan Kebenaran Data</strong><br>
                                        Saya menyatakan bahwa semua data yang telah saya isi dalam formulir ini adalah benar dan dapat dipertanggungjawabkan. Apabila dikemudian hari terbukti ada data yang tidak benar, saya siap menerima sanksi sesuai dengan ketentuan yang berlaku.
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid gap-3">
                                <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Pendaftaran
                                </button>
                                <a href="index.php" class="btn btn-outline-secondary btn-lg">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Beranda
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Form validation and interaction
        document.getElementById('formPendaftaran').addEventListener('submit', function(e) {
            const pernyataan = document.getElementById('pernyataan');
            const submitBtn = document.getElementById('submitBtn');
            
            if (!pernyataan.checked) {
                e.preventDefault();
                showAlert('Anda harus menyetujui pernyataan kebenaran data terlebih dahulu!', 'danger');
                pernyataan.focus();
                return;
            }

            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
        });

        // Enhanced form interactions
        const formInputs = document.querySelectorAll('.form-control, .form-select');
        formInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.closest('.form-section').style.transform = 'translateY(-2px)';
                this.closest('.form-section').style.boxShadow = '0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)';
            });

            input.addEventListener('blur', function() {
                this.closest('.form-section').style.transform = 'translateY(0)';
                this.closest('.form-section').style.boxShadow = 'none';
            });
        });

        // Phone number formatting
        const phoneInput = document.querySelector('input[name="no_hp"]');
        phoneInput?.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.startsWith('0')) {
                value = '0' + value.slice(1);
            }
            e.target.value = value;
        });

        // NISN validation (10 digits)
        const nisnInput = document.querySelector('input[name="nisn"]');
        nisnInput?.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 10) {
                value = value.slice(0, 10);
            }
            e.target.value = value;
        });

        // Show alert function
        function showAlert(message, type = 'info') {
            const alertContainer = document.getElementById('alertContainer');
            const alertId = 'alert_' + Date.now();
            
            const alertHtml = `
                <div class="alert alert-${type} alert-dismissible fade show" id="${alertId}" role="alert">
                    <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'danger' ? 'exclamation-triangle' : 'info-circle'} me-2"></i>
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
            
            alertContainer.innerHTML = alertHtml;
            
            // Auto dismiss after 5 seconds
            setTimeout(() => {
                const alert = document.getElementById(alertId);
                if (alert) {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }
            }, 5000);
        }

        // Smooth scroll to first error field
        function scrollToFirstError() {
            const firstInvalid = document.querySelector(':invalid');
            if (firstInvalid) {
                firstInvalid.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'center' 
                });
                firstInvalid.focus();
            }
        }

        // Real-time validation feedback
        formInputs.forEach(input => {
            input.addEventListener('invalid', function(e) {
                e.preventDefault();
                this.classList.add('is-invalid');
                scrollToFirstError();
            });

            input.addEventListener('input', function() {
                if (this.checkValidity()) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                } else {
                    this.classList.remove('is-valid');
                }
            });
        });

        // Initialize animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate form sections on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.form-section').forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(30px)';
                section.style.transition = 'all 0.6s ease';
                observer.observe(section);
            });
        });

        // Handle URL parameters for success/error messages
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('success')) {
            const noPendaftaran = urlParams.get('no_pendaftaran');
            showAlert(`Pendaftaran berhasil! Nomor pendaftaran Anda: <strong>${noPendaftaran}</strong>`, 'success');
        }
        if (urlParams.has('error')) {
            const errorMessage = urlParams.get('error');
            showAlert(decodeURIComponent(errorMessage), 'danger');
        }
    </script>
</body>
</html>