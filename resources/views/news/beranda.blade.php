<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Portal Berita</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('news.beranda') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link " href="{{ route('news.berita') }}">Berita</a></li>
                    <li class="nav-item"><a class="nav-link " href="{{ route('profile.edit') }}">Profile</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="nav-link" href="#contact">Logout</a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-light text-center py-5">
        <h1>Selamat Datang di Portal Berita</h1>
        <p class="lead">Berita terkini dan terpercaya hanya untuk Anda.</p>
    </div>

    <!-- News Section -->
    <div id="news" class="container my-5">
        <h2 class="mb-4">Berita Terkini</h2>
        <div class="row">
            @foreach ($news as $item)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ $item['image']['small'] }}" class="card-img-top" alt="Gambar Berita">
                        <div class="card-body">
                            <p class="text-muted">{{ \Carbon\Carbon::parse($item['isoDate'])->translatedFormat('d F Y, H:i') }}</p>
                            <h5 class="card-title">{{ $item['title'] }}</h5>
                            <p class="card-text">{{ Str::limit($item['contentSnippet'], 100, '...') }}</p>
                            <a href="{{ $item['link'] }}" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; {{ date('Y') }} Portal Berita. Semua Hak Dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
