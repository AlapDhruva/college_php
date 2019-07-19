<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saving photo</title>
</head>
<body>
    <?php
use function PHPSTORM_META\elementType;


    //require helper file
    require_once('appbar.php');
    require_once('db.php');

    if(isset($_POST['submit']))
    {
        $description = $_POST['description'];
        //using file
        $photo = $_FILES['photo']['name'];
        $photo = $_FILES['photo']['type'];
        $photo = $_FILES['photo']['size'];

        if(!empty($description) && !empty($photo))
        {
            if((($photo_type== 'image/gif') || ($photo_type== 'image/png') || ($photo_type== 'image/jpg') || ($photo_type== 'image/jpeg')) && ($photo_size <= MAXFILESIZE))
            {
                if($_FILES['photo']['error'] === 0)
                {
                    $target = UPLOADPATH.$photo;

                    move_uploaded_file($_FILES['photo']['tmp_name'], $target);

                    $sql = "INSERT INTO pictures (picture_description, photo) VALUES (:description, :photo)";

                    $cmd = $conn -> prepare($sql);

                    $cmd-> bindParam(':description', $description);
                    $cmd-> bindParam('photo',$photo);

                    $cmd->execute();


                    $cmd->closeCursor();

                    header('location:index1.php');

                }
                else
                {
                    echo"<p>There was a proble with your upload</p>";
                }
            }
            else
            {
                echo"<p>You must submit the either a gif, png, jpg and jpeg and it cant exceed 32kb</p>";
            }
        }
        else
        {
            echo"please provide all information";
        }
    }

    ob_flush();
    ?>
</body>
</html>