<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTS Buya Hamka - Sistem Informasi Madrasah Terpadu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --secondary: #06b6d4;
            --accent: #f59e0b;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --dark: #111827;
            --light: #f8fafc;
            --white: #ffffff;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-600: #4b5563;
            --gray-800: #1f2937;
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-accent: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --gradient-gold: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
            --border-radius: 16px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.7;
            color: var(--dark);
            background: var(--white);
            overflow-x: hidden;
        }

        html {
            scroll-behavior: smooth;
        }

        /* Logo Styles */
        .school-logo {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: 800;
            margin-right: 15px;
            box-shadow: var(--shadow-lg);
        }

        /* Navbar Styles */
        .navbar {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95) !important;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            padding: 0.5rem 0;
            box-shadow: var(--shadow-lg);
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--primary) !important;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .navbar-brand .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .brand-main {
            font-size: 1.3rem;
            font-weight: 800;
        }

        .brand-sub {
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--gray-600);
        }

        .navbar-nav .nav-link {
            font-weight: 600;
            color: var(--gray-600) !important;
            margin: 0 0.5rem;
            padding: 0.8rem 1.5rem !important;
            border-radius: var(--border-radius);
            transition: all 0.3s ease;
            position: relative;
        }

        .navbar-nav .nav-link::before {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            bottom: 0;
            left: 50%;
            background: var(--gradient-primary);
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .navbar-nav .nav-link:hover::before,
        .navbar-nav .nav-link.active::before {
            width: 80%;
            left: 10%;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--primary) !important;
            background: rgba(79, 70, 229, 0.1);
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero-section {
            background: var(--gradient-primary);
            position: relative;
            padding: 120px 0 80px;
            overflow: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
            text-align: center;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #ffffff 0%, #e0e7ff 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            opacity: 0.95;
        }

        .hero-description {
            font-size: 1.25rem;
            margin-bottom: 3rem;
            opacity: 0.9;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-hero {
            background: var(--gradient-gold);
            border: none;
            color: white;
            padding: 1rem 3rem;
            font-size: 1.1rem;
            font-weight: 700;
            border-radius: 50px;
            box-shadow: var(--shadow-xl);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            margin: 0 10px;
        }

        .btn-hero:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 25px 50px -12px rgba(245, 158, 11, 0.5);
            color: white;
        }

        /* Floating Elements */
        .floating-shape {
            position: absolute;
            opacity: 0.15;
            animation: float 6s ease-in-out infinite;
            color: white;
        }

        .floating-shape:nth-child(1) {
            top: 15%;
            left: 8%;
            animation-delay: 0s;
        }

        .floating-shape:nth-child(2) {
            top: 55%;
            right: 12%;
            animation-delay: 2s;
        }

        .floating-shape:nth-child(3) {
            bottom: 25%;
            left: 15%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }

        /* Stats Section */
        .stats-section {
            background: white;
            padding: 4rem 0;
            margin-top: -50px;
            position: relative;
            z-index: 3;
        }

        .stats-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 2.5rem;
            text-align: center;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--gray-100);
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient-primary);
        }

        .stats-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }

        .stats-number {
            font-size: 3.5rem;
            font-weight: 800;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        .stats-label {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--gray-600);
        }

        .stats-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Section Styles */
        .section-padding {
            padding: 6rem 0;
        }

        .section-title {
            font-size: 3rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.25rem;
            color: var(--gray-600);
            margin-bottom: 4rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Card Styles */
        .modern-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 2.5rem;
            height: 100%;
            border: none;
            box-shadow: var(--shadow-lg);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .modern-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient-primary);
        }

        .modern-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .card-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
            background: var(--gradient-primary);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-align: center;
            color: var(--dark);
        }

        .card-text {
            color: var(--gray-600);
            line-height: 1.8;
            text-align: center;
        }

        /* History Section */
        .history-section {
            background: var(--light);
        }

        .history-content {
            display: flex;
            align-items: center;
            gap: 4rem;
        }

        .history-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--gray-600);
        }

        .history-image {
            position: relative;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow-xl);
        }

        /* Prestasi Section */
        .prestasi-section {
            background: white;
        }

        .prestasi-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
        }

        .prestasi-card:hover {
            transform: translateY(-8px) scale(1.02);
        }

        .prestasi-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .prestasi-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .prestasi-year {
            font-size: 0.9rem;
            opacity: 0.8;
            font-weight: 500;
        }

        /* Teacher Profile Section */
        .teacher-section {
            background: var(--light);
        }

        .teacher-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 0;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s ease;
            overflow: hidden;
            height: 100%;
        }

        .teacher-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-xl);
        }

        .teacher-image {
            height: 250px;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 4rem;
            position: relative;
        }

        .teacher-info {
            padding: 1.5rem;
            text-align: center;
        }

        .teacher-name {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .teacher-position {
            color: var(--gray-600);
            font-weight: 500;
            margin-bottom: 1rem;
        }

        .teacher-qualification {
            font-size: 0.9rem;
            color: var(--gray-600);
        }

        /* Documentation Section */
        .documentation-section {
            background: white;
        }

        .documentation-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .doc-card {
            position: relative;
            border-radius: var(--border-radius);
            overflow: hidden;
            height: 300px;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .doc-card:hover {
            transform: scale(1.05);
        }

        .doc-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            color: white;
            padding: 2rem;
            transform: translateY(100%);
            transition: all 0.3s ease;
        }

        .doc-card:hover .doc-overlay {
            transform: translateY(0);
        }

        /* Contact Section */
        .contact-section {
            background: var(--dark);
            color: white;
        }

        .contact-card {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius);
            padding: 2rem;
            text-align: center;
            height: 100%;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .contact-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-5px);
        }

        .contact-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Footer */
        .footer {
            background: var(--dark);
            color: white;
            padding: 4rem 0 2rem;
        }

        .footer h5 {
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: white;
        }

        .footer p {
            color: #9ca3af;
            line-height: 1.7;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50%;
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            margin-top: 2rem;
            text-align: center;
            color: #9ca3af;
        }

        /* Prestasi Card Image Fix */
        .prestasi-card img {
            width: 100%;
            max-height: 220px;
            object-fit: contain;
            background: #f3f4f6;
            border-radius: 12px;
            display: block;
            margin: 0 auto 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .history-content {
                flex-direction: column;
                gap: 2rem;
            }
            
            .navbar-brand .brand-text {
                display: none;
            }
            
            .school-logo {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
        }

        /* Back to Top Button */
        #backToTop {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: none;
            z-index: 1000;
            box-shadow: var(--shadow-lg);
            border: none;
            background: var(--gradient-primary);
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        #backToTop:hover {
            transform: scale(1.1);
            box-shadow: var(--shadow-xl);
        }

        /* Loading Animation */
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <div class="school-logo">
                    <i class="fas fa-mosque"></i>
                </div>
                <div class="brand-text">
                    <div class="brand-main">MTS Buya Hamka</div>
                    <div class="brand-sub">Madrasah Terpadu Modern</div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">
                            <i class="fas fa-home me-2"></i>Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pendaftaran.php">
                            <i class="fas fa-user-graduate me-2"></i>PPDB
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/login.php">
                            <i class="fas fa-cog me-2"></i>Admin
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">
                            <i class="fas fa-envelope me-2"></i>Kontak
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="floating-shape">
            <i class="fas fa-book fa-3x"></i>
        </div>
        <div class="floating-shape">
            <i class="fas fa-graduation-cap fa-4x"></i>
        </div>
        <div class="floating-shape">
            <i class="fas fa-mosque fa-2x"></i>
        </div>
        
        <div class="container">
            <div class="hero-content" data-aos="fade-up">
                <h1 class="hero-title">MTS Buya Hamka</h1>
                <h2 class="hero-subtitle">Madrasah Tsanawiyah Modern Terpadu</h2>
                <p class="hero-description">
                    Membangun generasi Qur'ani yang cerdas, berkarakter, dan siap menghadapi tantangan masa depan dengan landasan iman yang kuat dan teknologi modern yang terintegrasi dalam setiap aspek pembelajaran.
                </p>
                <div class="hero-cta">
                    <a href="pendaftaran.php" class="btn btn-hero">
                        <i class="fas fa-user-plus me-2"></i>Daftar PPDB 2025
                    </a>
                    <a href="#profil" class="btn btn-hero" style="background: rgba(255,255,255,0.2); backdrop-filter: blur(10px);">
                        <i class="fas fa-info-circle me-2"></i>Profil Sekolah
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="stats-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="stats-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stats-number">850+</div>
                        <div class="stats-label">Siswa Aktif</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="stats-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="stats-number">45+</div>
                        <div class="stats-label">Guru Berkualitas</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="stats-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="stats-number">98%</div>
                        <div class="stats-label">Tingkat Kelulusan</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="stats-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="stats-number">25+</div>
                        <div class="stats-label">Tahun Berpengalaman</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Profil Sekolah -->
    <section class="section-padding" id="profil" style="background: var(--light);">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Profil Sekolah</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                Mengenal lebih dekat MTS Buya Hamka sebagai lembaga pendidikan Islam modern
            </p>
            
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="modern-card" data-aos="fade-right">
                        <div class="card-icon" style="background: var(--gradient-primary);">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h5 class="card-title">Visi Sekolah</h5>
                        <p class="card-text">
                            ” Terwujudnya Pelajar Islam yang berakhlaqul karimah, berpengetahuan luas, berprestasi dan berbudaya lingkungan.”
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="modern-card" data-aos="fade-left">
                        <div class="card-icon" style="background: var(--gradient-accent);">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h5 class="card-title">Misi Sekolah</h5>
                        <div class="card-text">
                            <ul style="text-align: left; margin: 0;">
                                <li>1.	Mendidik pelajar muslim yang bertaqwa kepada Alloh SWT, beramal sholih dan memiliki sikap akhlakul karimah dalam bermasyarakat.</li>
                                <li>2.	Membentuk generasi muslim yang menguasai ilmu pengetahuan dan teknologi, terampil dan dinamis.</li>
                                <li>3.	Berprestasi dalam bidang ilmu pengetahuan dan teknologi baik di tingkat daerah maupun Nasional.</li>
                                <li>4.	Membentuk generasi muslim yang memiliki kesadaran dalam melestarikan lingkungan sekitar.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sejarah -->
    <section class="section-padding history-section" id="sejarah">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Sejarah Sekolah</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                Perjalanan panjang dalam membangun pendidikan Islam berkualitas
            </p>
            
            <div class="history-content">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="history-text">
                        <h4 style="color: var(--primary); margin-bottom: 1rem;">Awal Berdirinya (1998)</h4>
                        <p>MTS Buya Hamka didirikan pada tahun 1998 atas prakarsa tokoh-tokoh masyarakat yang peduli terhadap pendidikan Islam. Bermula dari keinginan untuk menciptakan lembaga pendidikan yang mampu memadukan ilmu agama dan umum secara seimbang.</p>
                        
                        <h4 style="color: var(--primary); margin-bottom: 1rem; margin-top: 2rem;">Perkembangan (2000-2010)</h4>
                        <p>Periode ini merupakan masa konsolidasi dan pertumbuhan. Sekolah mulai menerapkan kurikulum terintegrasi dan membangun fasilitas pendukung yang memadai. Prestasi akademik dan non-akademik mulai menunjukkan hasil yang membanggakan.</p>
                        
                        <h4 style="color: var(--primary); margin-bottom: 1rem; margin-top: 2rem;">Era Modern (2010-Sekarang)</h4>
                        <p>Memasuki era digital, MTS Buya Hamka bertransformasi menjadi madrasah modern dengan mengintegrasikan teknologi dalam pembelajaran. Kini menjadi salah satu rujukan pendidikan Islam terbaik di wilayah ini.</p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="history-image">
                        <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Gedung MTS Buya Hamka" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Prestasi -->
    <section class="section-padding prestasi-section" id="prestasi">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Prestasi Sekolah</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                Pencapaian membanggakan yang telah diraih siswa dan sekolah
            </p>
            
            <div class="row g-4">
                <!-- Prestasi 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="prestasi-card" data-aos="zoom-in" data-aos-delay="100">
                        <img src="assets/prestasi 1.jpeg" alt="Juara 2 Pidato Bahasa Indonesia" class="img-fluid rounded mb-3" style="height:180px;object-fit:cover;width:100%;">
                        <div class="prestasi-title">Juara 2 Pidato Bahasa Indonesia</div>
                        <div class="prestasi-year">PORSENI Mts Kementerian Agama Ponorogo 2023</div>
                    </div>
                </div>
                <!-- Prestasi 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="prestasi-card" data-aos="zoom-in" data-aos-delay="200">
                        <img src="assets/prestasi 2.jpeg" alt="Juara 2 MTQ Nasional" class="img-fluid rounded mb-3" style="height:180px;object-fit:cover;width:100%;">
                        <div class="prestasi-title">Juara 2 MTQ Nasional</div>
                        <div class="prestasi-year">Tingkat Nasional 2024</div>
                    </div>
                </div>
                <!-- Prestasi 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="prestasi-card" data-aos="zoom-in" data-aos-delay="300">
                        <img src="assets/prestasi3.jpg" alt="Sekolah Adiwiyata" class="img-fluid rounded mb-3" style="height:180px;object-fit:cover;width:100%;">
                        <div class="prestasi-title">Sekolah Adiwiyata</div>
                        <div class="prestasi-year">Tingkat Provinsi 2023</div>
                    </div>
                </div>
                <!-- Tambahkan prestasi lain sesuai kebutuhan -->
            </div>
        </div>
    </section>

    <!-- Profil Guru -->
    <section class="section-padding teacher-section" id="guru">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Profil Guru</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                Tenaga pendidik profesional dan berpengalaman
            </p>
            <div class="row g-4">
                <!-- Guru 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="teacher-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="teacher-image">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">Hartono, S.H.I</h5>
                            <p class="teacher-position">Alquran Hadist</p>
                            <p class="teacher-qualification">Sarjana Hukum Islam</p>
                        </div>
                    </div>
                </div>
                <!-- Guru 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="teacher-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="teacher-image">
                            <i class="fas fa-female"></i>
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">Warsita, S.Pd.I</h5>
                            <p class="teacher-position">Guru Bahasa Arab</p>
                            <p class="teacher-qualification">Sarjana Pendidikan Islam</p>
                        </div>
                    </div>
                </div>
                <!-- Guru 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="teacher-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="teacher-image">
                            <i class="fas fa-calculator"></i>
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">Nuryono, S.Pd.I</h5>
                            <p class="teacher-position">Guru Fiqih</p>
                            <p class="teacher-qualification">Sarjana Pendidikan Islam</p>
                        </div>
                    </div>
                </div>
                <!-- Guru 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="teacher-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="teacher-image">
                            <i class="fas fa-flask"></i>
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">Sugiono, S.Kom</h5>
                            <p class="teacher-position">Guru Informatika & Bahasa Arab</p>
                            <p class="teacher-qualification">Sarjana Komputer</p>
                        </div>
                    </div>
                </div>
                <!-- Guru 5 -->
                <div class="col-lg-3 col-md-6">
                    <div class="teacher-card" data-aos="fade-up" data-aos-delay="500">
                        <div class="teacher-image">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">Ikal Saifudin,S.Pd</h5>
                            <p class="teacher-position">Guru IPS</p>
                            <p class="teacher-qualification">Sarjana Pendidikan</p>
                        </div>
                    </div>
                </div>
                <!-- Guru 6 -->
                <div class="col-lg-3 col-md-6">
                    <div class="teacher-card" data-aos="fade-up" data-aos-delay="600">
                        <div class="teacher-image">
                            <i class="fas fa-book-quran"></i>
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">Ninin Rusmawati, S.Pd</h5>
                            <p class="teacher-position">Guru Bahasa Inggris</p>
                            <p class="teacher-qualification">Sarjana Pendidikan</p>
                        </div>
                    </div>
                </div>
                <!-- Guru 7 -->
                <div class="col-lg-3 col-md-6">
                    <div class="teacher-card" data-aos="fade-up" data-aos-delay="700">
                        <div class="teacher-image">
                            <i class="fas fa-flag-usa"></i>
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">Ika Fitria Lestari, S.Pd</h5>
                            <p class="teacher-position">Guru Bahasa Indonesia</p>
                            <p class="teacher-qualification">Sarjana Pendidikan</p>
                        </div>
                    </div>
                </div>
                <!-- Guru 8 -->
                <div class="col-lg-3 col-md-6">
                    <div class="teacher-card" data-aos="fade-up" data-aos-delay="800">
                        <div class="teacher-image">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">Winarsih, S.Pd</h5>
                            <p class="teacher-position">Guru Matematika</p>
                            <p class="teacher-qualification">Sarjana Pendidikan</p>
                        </div>
                    </div>
                </div>
                <!-- Guru 9-17 (template kosong, silakan isi sendiri) -->
                <div class="col-lg-3 col-md-6">
                    <div class="teacher-card" data-aos="fade-up" data-aos-delay="900">
                        <div class="teacher-image">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">Eka Yuliana, S.Pd </h5>
                            <p class="teacher-position">Guru PKN</p>
                            <p class="teacher-qualification">Sarjana Pendidikan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="teacher-card" data-aos="fade-up" data-aos-delay="1000">
                        <div class="teacher-image">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">Ezfa Dewi Susanti S.Pd</h5>
                            <p class="teacher-position">Guru Akidah Akhlak</p>
                            <p class="teacher-qualification">Sarjana Pendidikan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="teacher-card" data-aos="fade-up" data-aos-delay="1100">
                        <div class="teacher-image">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">Zainal Arifin S.Ag</h5>
                            <p class="teacher-position">Guru SKI</p>
                            <p class="teacher-qualification">Sarjana Agama</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="teacher-card" data-aos="fade-up" data-aos-delay="1200">
                        <div class="teacher-image">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">Umi Khoiriah, S.Pd</h5>
                            <p class="teacher-position">Guru IPA</p>
                            <p class="teacher-qualification">Sarjana Pendidikan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="teacher-card" data-aos="fade-up" data-aos-delay="1300">
                        <div class="teacher-image">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">Diki Nur Avian Azhari</h5>
                            <p class="teacher-position">Guru Olahraga</p>
                            <p class="teacher-qualification">Sarjana Olahraga</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="teacher-card" data-aos="fade-up" data-aos-delay="1400">
                        <div class="teacher-image">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">Tyas Winantu Pambagya</h5>
                            <p class="teacher-position">Guru SBK</p>
                            <p class="teacher-qualification">Sarjana Seni</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="teacher-card" data-aos="fade-up" data-aos-delay="1500">
                        <div class="teacher-image">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="teacher-info">
                            <h5 class="teacher-name">Supriyanto, S.Pd</h5>
                            <p class="teacher-position">Bahasa Jawa</p>
                            <p class="teacher-qualification">Sarjana Pendidikan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dokumentasi -->
    <section class="section-padding documentation-section" id="dokumentasi">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Dokumentasi Sekolah</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                Momen-momen berkesan dalam perjalanan pendidikan
            </p>
            
            <div class="documentation-grid">
                <div class="doc-card" data-aos="zoom-in" data-aos-delay="100">
                    <i class="fas fa-graduation-cap"></i>
                    <div class="doc-overlay">
                        <h5>Wisuda Angkatan 2024</h5>
                        <p>Ceremony kelulusan siswa kelas IX dengan tingkat kelulusan 98%</p>
                    </div>
                </div>
                <div class="doc-card" data-aos="zoom-in" data-aos-delay="200" style="background: var(--gradient-accent);">
                    <i class="fas fa-trophy"></i>
                    <div class="doc-overlay">
                        <h5>Prestasi Olimpiade</h5>
                        <p>Moment penyerahan piala juara olimpiade matematika tingkat provinsi</p>
                    </div>
                </div>
                <div class="doc-card" data-aos="zoom-in" data-aos-delay="300" style="background: var(--gradient-secondary);">
                    <i class="fas fa-mosque"></i>
                    <div class="doc-overlay">
                        <h5>Kegiatan Ramadhan</h5>
                        <p>Aktivitas spiritual selama bulan suci Ramadhan dengan berbagai program</p>
                    </div>
                </div>
                <div class="doc-card" data-aos="zoom-in" data-aos-delay="400" style="background: var(--gradient-gold);">
                    <i class="fas fa-seedling"></i>
                    <div class="doc-overlay">
                        <h5>Program Adiwiyata</h5>
                        <p>Kegiatan pelestarian lingkungan dan program sekolah hijau</p>
                    </div>
                </div>
                <div class="doc-card" data-aos="zoom-in" data-aos-delay="500" style="background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);">
                    <i class="fas fa-futbol"></i>
                    <div class="doc-overlay">
                        <h5>Olahraga & Seni</h5>
                        <p>Kompetisi olahraga dan festival seni budaya tingkat sekolah</p>
                    </div>
                </div>
                <div class="doc-card" data-aos="zoom-in" data-aos-delay="600" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                    <i class="fas fa-microscope"></i>
                    <div class="doc-overlay">
                        <h5>Laboratorium</h5>
                        <p>Fasilitas laboratorium modern untuk mendukung pembelajaran sains</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section-padding contact-section" id="contact">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up" style="color: white;">Hubungi Kami</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100" style="color: rgba(255,255,255,0.8);">
                Informasi lengkap kontak dan lokasi sekolah
            </p>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h5 style="color: white; margin-bottom: 1rem;">Alamat Sekolah</h5>
                        <p style="color: rgba(255,255,255,0.8);">
                            Jl. Pendidikan Raya No. 123<br>
                            Kelurahan Pendidikan<br>
                            Ponorogo, Jawa Timur 63411
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h5 style="color: white; margin-bottom: 1rem;">Telepon & WhatsApp</h5>
                        <p style="color: rgba(255,255,255,0.8);">
                            <strong>Telepon:</strong><br>
                            +62 852-3035-3501 (WARSITA, S.Pd.I)
                            +62 822-3467-0596 (HARTONO, S.H.I)<br>
                            <strong>WhatsApp:</strong><br>
                            +62 852-3035-3501 (WARSITA, S.Pd.I)
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h5 style="color: white; margin-bottom: 1rem;">Email & Website</h5>
                        <p style="color: rgba(255,255,255,0.8);">
                            <strong>Email:</strong><br>
                            info@mtsbuya hamka.sch.id<br>
                            <strong>Website:</strong><br>
                            www.mtsbuya hamka.sch.id
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h5 style="color: white; margin-bottom: 1rem;">Jam Operasional</h5>
                        <p style="color: rgba(255,255,255,0.8);">
                            <strong>Senin - Jumat:</strong> 07:00 - 16:00 WIB<br>
                            <strong>Sabtu:</strong> 07:00 - 12:00 WIB<br>
                            <strong>Minggu:</strong> Libur
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact-card" data-aos="fade-up" data-aos-delay="500">
                        <div class="contact-icon">
                            <i class="fas fa-share-alt"></i>
                        </div>
                        <h5 style="color: white; margin-bottom: 1rem;">Media Sosial</h5>
                        <div style="display: flex; gap: 1rem; justify-content: center; margin-top: 1rem;">
                            <a href="https://facebook.com/namasekolah" class="social-link" target="_blank" rel="noopener">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://instagram.com/namasekolah" class="social-link" target="_blank" rel="noopener">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://youtube.com/@namasekolah" class="social-link" target="_blank" rel="noopener">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="https://wa.me/6285230353501" class="social-link" target="_blank" rel="noopener">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5><i class="fas fa-mosque me-2"></i>MTS Buya Hamka</h5>
                    <p>Madrasah Tsanawiyah modern yang menggabungkan pendidikan agama dan umum berkualitas tinggi. Membangun generasi Qur'ani yang cerdas, berkarakter, dan siap menghadapi tantangan masa depan.</p>
                    <div class="social-links">
                        <a href="https://www.facebook.com/mts.b.cepoko" class="social-link" target="_blank" rel="noopener" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/mtsbuyahamkaofficial/" class="social-link" target="_blank" rel="noopener" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://youtube.com/@namasekolah" class="social-link" target="_blank" rel="noopener" title="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="https://wa.me/6285230353501" class="social-link" target="_blank" rel="noopener" title="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5><i class="fas fa-link me-2"></i>Menu Utama</h5>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="#home" style="color: #9ca3af; text-decoration: none; line-height: 2;">Beranda</a></li>
                        <li><a href="#profil" style="color: #9ca3af; text-decoration: none; line-height: 2;">Profil Sekolah</a></li>
                        <li><a href="#sejarah" style="color: #9ca3af; text-decoration: none; line-height: 2;">Sejarah</a></li>
                        <li><a href="#prestasi" style="color: #9ca3af; text-decoration: none; line-height: 2;">Prestasi</a></li>
                        <li><a href="#guru" style="color: #9ca3af; text-decoration: none; line-height: 2;">Profil Guru</a></li>
                        <li><a href="#dokumentasi" style="color: #9ca3af; text-decoration: none; line-height: 2;">Dokumentasi</a></li>
                        <li><a href="pendaftaran.php" style="color: #9ca3af; text-decoration: none; line-height: 2;">PPDB 2025</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5><i class="fas fa-info-circle me-2"></i>Informasi PPDB</h5>
                    <div style="background: rgba(255,255,255,0.1); padding: 1.5rem; border-radius: var(--border-radius); margin-bottom: 1rem;">
                        <h6 style="color: var(--accent); margin-bottom: 1rem;">Pendaftaran 2025 Dibuka!</h6>
                        <p style="color: #9ca3af; margin-bottom: 1rem;">
                            <i class="fas fa-calendar me-2"></i>Gelombang I: 1 Jan - 31 Mar 2025<br>
                            <i class="fas fa-calendar me-2"></i>Gelombang II: 1 Apr - 30 Jun 2025
                        </p>
                        <a href="pendaftaran.php" class="btn btn-hero" style="padding: 0.8rem 2rem; font-size: 0.9rem;">
                            <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 MTS Buya Hamka. Hak Cipta Dilindungi. Sistem Informasi Madrasah Terpadu - Dibuat dengan <i class="fas fa-heart text-danger"></i> untuk pendidikan Islam yang lebih baik.</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="btn btn-primary">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            const backToTop = document.getElementById('backToTop');
            
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
                backToTop.style.display = 'block';
            } else {
                navbar.classList.remove('scrolled');
                backToTop.style.display = 'none';
            }
        });

        // Back to top functionality
        document.getElementById('backToTop').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth scrolling for nav links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.offsetTop - 80;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Active nav link on scroll
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            
            let current = 'home';
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionHeight = section.clientHeight;
                if (pageYOffset >= sectionTop && pageYOffset < sectionTop + sectionHeight) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        });

        // Counter animation for stats
        function animateCounters() {
            const counters = document.querySelectorAll('.stats-number');
            
            counters.forEach(counter => {
                const target = parseInt(counter.textContent.replace(/\D/g, ''));
                const suffix = counter.textContent.replace(/\d/g, '');
                let current = 0;
                const increment = target / 100;
                
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target + suffix;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.ceil(current) + suffix;
                    }
                }, 30);
            });
        }

        // Trigger counter animation when stats section is visible
        const statsSection = document.querySelector('.stats-section');
        let statsAnimated = false;

        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !statsAnimated) {
                    animateCounters();
                    statsAnimated = true;
                }
            });
        });

        if (statsSection) {
            statsObserver.observe(statsSection);
        }

        // Enhanced card hover effects
        document.querySelectorAll('.modern-card, .stats-card, .teacher-card, .prestasi-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transition = 'all 0.3s ease';
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Documentation card hover effects
        document.querySelectorAll('.doc-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05) rotateY(5deg)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1) rotateY(0deg)';
            });
        });

        // Loading animation for buttons
        document.querySelectorAll('.btn-hero').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (this.getAttribute('href') && this.getAttribute('href').startsWith('#')) {
                    return; // Don't add loading for anchor links
                }
                
                if (!this.getAttribute('href') || this.getAttribute('href') === '#') {
                    e.preventDefault();
                    
                    const originalText = this.innerHTML;
                    this.innerHTML = '<div class="loading-spinner"></div> Memproses...';
                    this.disabled = true;
                    
                    setTimeout(() => {
                        this.innerHTML = originalText;
                        this.disabled = false;
                    }, 2000);
                }
            });
        });

        // Parallax effect for hero section
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('.hero-section');
            const speed = scrolled * 0.3;
            
            if (parallax && scrolled < window.innerHeight) {
                parallax.style.transform = `translateY(${speed}px)`;
            }
        });

        // Enhanced mobile menu
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.querySelector('.navbar-collapse');

        if (navbarToggler) {
            navbarToggler.addEventListener('click', function() {
                setTimeout(() => {
                    if (navbarCollapse.classList.contains('show')) {
                        navbarCollapse.style.backdropFilter = 'blur(20px)';
                        navbarCollapse.style.background = 'rgba(255, 255, 255, 0.98)';
                    }
                }, 100);
            });
        }

        // Auto-hide mobile menu when clicking on nav links
        document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
            link.addEventListener('click', function() {
                if (navbarCollapse.classList.contains('show')) {
                    navbarToggler.click();
                }
            });
        });

        // Dynamic year update
        document.addEventListener('DOMContentLoaded', function() {
            const currentYear = new Date().getFullYear();
            const footerYear = document.querySelector('.footer-bottom p');
            if (footerYear && currentYear > 2025) {
                footerYear.innerHTML = footerYear.innerHTML.replace('2025', currentYear);
            }
        });

        // Add ripple effect to buttons
        document.querySelectorAll('.btn, .social-link, .nav-link').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.3);
                    transform: scale(0);
                    animation: ripple-animation 0.6s linear;
                    pointer-events: none;
                `;
                
                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);
                
                setTimeout(() => {
                    if (ripple.parentNode) {
                        ripple.remove();
                    }
                }, 600);
            });
        });

        // Add CSS for ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple-animation {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
            
            .navbar-brand:hover .school-logo {
                transform: rotateY(360deg);
                transition: transform 0.6s ease;
            }
            
            .floating-shape {
                animation-play-state: running;
            }
            
            @media (prefers-reduced-motion: reduce) {
                .floating-shape {
                    animation: none;
                }
                
                .hero-section {
                    transform: none !important;
                }
            }
            
            /* Custom scrollbar */
            ::-webkit-scrollbar {
                width: 8px;
            }
            
            ::-webkit-scrollbar-track {
                background: var(--gray-100);
            }
            
            ::-webkit-scrollbar-thumb {
                background: var(--gradient-primary);
                border-radius: 4px;
            }
            
            ::-webkit-scrollbar-thumb:hover {
                background: var(--primary-dark);
            }
            
            /* Smooth focus styles */
            .btn:focus,
            .nav-link:focus {
                outline: 2px solid var(--accent);
                outline-offset: 2px;
            }
            
            /* Loading states */
            .btn.loading {
                position: relative;
                color: transparent;
            }
            
            .btn.loading::after {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 20px;
                height: 20px;
                border: 2px solid rgba(255,255,255,0.3);
                border-top: 2px solid #fff;
                border-radius: 50%;
                animation: spin 1s linear infinite;
            }
            
            /* Enhanced hover animations */
            .teacher-card:hover .teacher-image {
                transform: scale(1.1);
                transition: transform 0.3s ease;
            }
            
            .prestasi-card:hover .prestasi-icon {
                transform: rotateY(180deg);
                transition: transform 0.5s ease;
            }
            
            /* Progressive enhancement for better performance */
            @media (min-width: 768px) {
                .modern-card:hover {
                    box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.25);
                }
                
                .doc-card:hover {
                    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
                }
            }
        `;
        document.head.appendChild(style);

        // Lazy loading for performance
        if ('IntersectionObserver' in window) {
            const lazyElements = document.querySelectorAll('[data-aos]');
            
            const lazyObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const element = entry.target;
                        element.classList.add('aos-animate');
                        lazyObserver.unobserve(element);
                    }
                });
            }, {
                rootMargin: '50px'
            });

            lazyElements.forEach(element => {
                lazyObserver.observe(element);
            });
        }

        // Accessibility improvements
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                // Close mobile menu if open
                if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                    navbarToggler.click();
                }
            }
        });

        // Performance optimization: Throttle scroll events
        function throttle(func, limit) {
            let inThrottle;
            return function() {
                const args = arguments;
                const context = this;
                if (!inThrottle) {
                    func.apply(context, args);
                    inThrottle = true;
                    setTimeout(() => inThrottle = false, limit);
                }
            }
        }

        // Apply throttling to scroll events
        window.addEventListener('scroll', throttle(function() {
            // Existing scroll handlers are already defined above
        }, 16)); // ~60fps

        // Add loading state to PPDB buttons
        document.querySelectorAll('a[href="pendaftaran.php"]').forEach(link => {
            link.addEventListener('click', function() {
                this.classList.add('loading');
                const originalText = this.innerHTML;
                
                setTimeout(() => {
                    this.classList.remove('loading');
                }, 1000);
            });
        });

        // Toast notification system (optional enhancement)
        function showToast(message, type = 'info') {
            const toast = document.createElement('div');
            toast.className = `toast-notification toast-${type}`;
            toast.textContent = message;
            toast.style.cssText = `
                position: fixed;
                top: 100px;
                right: 20px;
                background: var(--${type === 'success' ? 'success' : type === 'error' ? 'danger' : 'primary'});
                color: white;
                padding: 1rem 1.5rem;
                border-radius: var(--border-radius);
                box-shadow: var(--shadow-lg);
                z-index: 10000;
                transform: translateX(400px);
                transition: transform 0.3s ease;
            `;
            
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.style.transform = 'translateX(0)';
            }, 100);
            
            setTimeout(() => {
                toast.style.transform = 'translateX(400px)';
                setTimeout(() => {
                    if (toast.parentNode) {
                        toast.remove();
                    }
                }, 300);
            }, 3000);
        }

        // Initialize everything when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            console.log('MTS Buya Hamka - Sistem Informasi Sekolah Loaded Successfully');
            
            // Optional: Show welcome message
            // showToast('Selamat datang di MTS Buya Hamka!', 'success');
        });

        // Error handling for images
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('error', function() {
                this.style.display = 'none';
                console.warn('Image failed to load:', this.src);
            });
        });
    </script>
</body>
</html>