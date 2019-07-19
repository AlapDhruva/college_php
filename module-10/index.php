<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <main class="container">
        <header>
            <h1>Add a new pic!</h1>
            <a href="">View all the pics</a>
        </header>

        <form enctype="multipart/form-data" method="post" action="process-image.php">
        <div class="form-group">
            <input type="text" name="description" class="form-control" placeholder="Tell us About your Image">
        </div>

        <div class="form-group">
            <label for="photo">Photo :</label>
            <input type="file" name="photo" class="form-control" id="photo">
        </div>

        <input type="submit" name="submit" value="Add an Image">
</form>
    </main>
    
</body>
</html>