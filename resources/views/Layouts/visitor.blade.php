<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Kami - Artikel Terbaru')</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-bg: #f8fafc;
            --navbar-bg: #1e293b;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --badge-bg: #e0f2fe;
            --badge-text: #0284c7;
            --btn-success-bg: #10b981;
            --btn-success-hover: #059669;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            --transition-speed: 0.25s;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: var(--primary-bg);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-column;
            flex-direction: column;
        }

        .navbar-custom {
            background-color: var(--navbar-bg);
            padding: 1.25rem 2rem;
            border-bottom: 4px solid var(--btn-success-bg);
        }

        .navbar-custom .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: -0.025em;
            color: #ffffff;
        }

        .navbar-custom .navbar-brand:hover {
            color: #ffffff;
        }

        .navbar-custom .nav-link {
            color: rgba(255, 255, 255, 0.7);
            font-weight: 500;
            font-size: 0.925rem;
            transition: color var(--transition-speed);
            padding: 0.5rem 1rem;
        }

        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active {
            color: #ffffff !important;
        }

        .main-wrapper {
            flex: 1 0 auto;
        }

        .footer-custom {
            background-color: var(--navbar-bg);
            color: rgba(255, 255, 255, 0.6);
            padding: 1.5rem 0;
            font-size: 0.875rem;
            margin-top: auto;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Standard custom styles for cards and hover effects */
        .blog-card {
            background: #ffffff;
            border: none;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            transition: transform var(--transition-speed), box-shadow var(--transition-speed);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .blog-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -4px rgba(0, 0, 0, 0.05);
        }

        .blog-card-img {
            width: 100%;
            height: 380px;
            object-fit: cover;
        }

        .blog-badge {
            background-color: var(--badge-bg);
            color: var(--badge-text);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.35rem 0.85rem;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 0.025em;
            display: inline-block;
            text-decoration: none;
        }

        .blog-badge:hover {
            opacity: 0.9;
        }

        .blog-title {
            color: var(--text-dark);
            font-weight: 700;
            line-height: 1.3;
            letter-spacing: -0.01em;
            text-decoration: none;
            transition: color var(--transition-speed);
        }

        .blog-title:hover {
            color: var(--btn-success-bg);
        }

        .blog-meta {
            font-size: 0.875rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .author-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: #2563eb;
            color: #ffffff;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            text-transform: uppercase;
            object-fit: cover;
        }

        .btn-read-more {
            background-color: var(--btn-success-bg);
            color: #ffffff;
            font-weight: 600;
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            border: none;
            transition: background-color var(--transition-speed), transform var(--transition-speed);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            text-decoration: none;
        }

        .btn-read-more:hover {
            background-color: var(--btn-success-hover);
            color: #ffffff;
            transform: translateX(2px);
        }

        .widget-card {
            background: #ffffff;
            border: none;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .widget-title {
            font-weight: 700;
            font-size: 1.15rem;
            color: var(--text-dark);
            margin-bottom: 1.25rem;
            border-left: 4px solid var(--btn-success-bg);
            padding-left: 0.75rem;
        }

        /* Custom list style for category items */
        .category-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .category-item-link {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: background-color var(--transition-speed), color var(--transition-speed);
            margin-bottom: 0.5rem;
        }

        .category-item-link:hover {
            background-color: #f1f5f9;
            color: var(--text-dark);
        }

        .category-item-link.active {
            background-color: #e8f5e9;
            color: #2e7d32;
            font-weight: 600;
        }

        .category-badge-count {
            background-color: #f1f5f9;
            color: var(--text-muted);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.6rem;
            border-radius: 50px;
            min-width: 24px;
            text-align: center;
            transition: background-color var(--transition-speed), color var(--transition-speed);
        }

        .category-item-link.active .category-badge-count {
            background-color: #2e7d32;
            color: #ffffff;
        }

        /* Breadcrumb styling */
        .breadcrumb-custom {
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
        }
        
        .breadcrumb-custom a {
            color: var(--btn-success-bg);
            text-decoration: none;
            transition: color var(--transition-speed);
        }

        .breadcrumb-custom a:hover {
            color: var(--btn-success-hover);
        }

        .breadcrumb-custom span {
            color: var(--text-muted);
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <header class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container-fluid d-flex flex-column flex-lg-row align-items-lg-center justify-content-lg-between">
            <div class="mb-3 mb-lg-0 text-center text-lg-start">
                <a href="{{ route('blog.index') }}" class="navbar-brand d-block m-0">Blog Kami</a>
                <span style="font-size: 0.8rem; color: #94a3b8; font-weight: 400;">Artikel terbaru seputar teknologi dan pemrograman</span>
            </div>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#visitorNavbar" aria-controls="visitorNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-end" id="visitorNavbar">
                <div class="navbar-nav gap-2 gap-lg-3 text-center text-lg-start mt-2 mt-lg-0">
                    <a href="{{ route('blog.index') }}" class="nav-link {{ request()->routeIs('blog.index') && !request('kategori') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ route('blog.index') }}" class="nav-link {{ request()->routeIs('blog.index') ? 'active' : '' }}">Artikel</a>
                    <a href="{{ route('blog.index') }}" class="nav-link">Kategori</a>
                    <a href="#" class="nav-link">Tentang</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-wrapper py-4 py-md-5">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer-custom">
        <div class="container text-center">
            <p class="mb-0">&copy; 2026 Blog Kami. Seluruh hak cipta dilindungi.</p>
        </div>
    </footer>

    <!-- Bootstrap 5.3 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
