<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    
    <form method="POST" action="{{ route('register.process') }}">
        @csrf
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="fav_categories">Favorite Categories</label><br>
            <input type="checkbox" name="fav_categories[]" value="nasional"> Nasional <br>
            <input type="checkbox" name="fav_categories[]" value="internasional"> Internasional <br>
            <input type="checkbox" name="fav_categories[]" value="ekonomi"> Ekonomi <br>
            <input type="checkbox" name="fav_categories[]" value="olahraga"> Olahraga <br>
            <input type="checkbox" name="fav_categories[]" value="teknologi"> Teknologi <br>
            <input type="checkbox" name="fav_categories[]" value="hiburan"> Hiburan <br>
            <input type="checkbox" name="fav_categories[]" value="gaya-hidup"> Gaya Hidup <br>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</body>
</html>