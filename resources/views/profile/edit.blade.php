<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('news.beranda') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('news.berita') }}">Berita</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('profile.edit') }}">Profile</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="nav-link">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Profile Edit Section -->
    <div class="container my-5">
        <h2 class="mb-4">Edit Profile</h2>

        <!-- Flash Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Profile Form -->
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <!-- Favorite Categories -->
            <div class="mb-3">
                <label class="form-label">Favorite Categories</label><br>
                @php
                    $categories = $user->fav_categories;
                @endphp

                <input type="checkbox" name="fav_categories[]" value="nasional" {{ in_array('nasional', $categories) ? 'checked' : '' }}> Nasional <br>
                <input type="checkbox" name="fav_categories[]" value="internasional" {{ in_array('internasional', $categories) ? 'checked' : '' }}> Internasional <br>
                <input type="checkbox" name="fav_categories[]" value="ekonomi" {{ in_array('ekonomi', $categories) ? 'checked' : '' }}> Ekonomi <br>
                <input type="checkbox" name="fav_categories[]" value="olahraga" {{ in_array('olahraga', $categories) ? 'checked' : '' }}> Olahraga <br>
                <input type="checkbox" name="fav_categories[]" value="teknologi" {{ in_array('teknologi', $categories) ? 'checked' : '' }}> Teknologi <br>
                <input type="checkbox" name="fav_categories[]" value="hiburan" {{ in_array('hiburan', $categories) ? 'checked' : '' }}> Hiburan <br>
                <input type="checkbox" name="fav_categories[]" value="gaya-hidup" {{ in_array('gaya-hidup', $categories) ? 'checked' : '' }}> Gaya Hidup <br>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; {{ date('Y') }} Portal Berita. Semua Hak Dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
