<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
</head>
<body>
<main class="container">
        <header>
            <h1>Add a new pic!</h1>
            <a href="">View all the pics</a>
        </header>

        <?php
        ob_start();
        require_once('db.php');
        require_once('appbar.php');

        $sql="select * from pictures;";

        $cmd = $conn->prepare($sql);

        $pictures = $cmd->fetchAll();

        echo '<div class="photocontainer">';

        foreach($pictures as $picture)
        {
            echo '<div><img sec="' . UPLOADPATH . $picture['photo'] . '"><p>'
            .$picture['description'].'</p></div>';
        }
        echo ' </div>';
        ob_flush();
        ?>

</main>
</body>
</html>