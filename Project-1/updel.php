<?php
require('header.php');
?>

<body>
    <div class="container">
<header>
    <h1>User Information</h1>
</header>

<?php
require('nav.php');
?>


<?php
try
{
// connecting to the database
$conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gcc200420045', 'gcc200420045', 'AgoSOp0j7a');


    if(isset($_GET['user_id']))
    {

    
            $user_id = $_GET['user_id'];
            $sql = "delete FROM userinfo where user_id= :user_id;";
            $cmd = $conn -> prepare($sql);

            $cmd->bindParam(':user_id', $user_id );
        #execute the query
        $cmd-> execute();

       
    }

    header('location:record.php');
}
catch(Exception $e) {
    //send an email to the app admin 
    mail('alap.dhruva2@gmail.com', 'Something went wrong', $e); 
    // send user to error.php page
    header('location:404error.php'); 
  }
?>


<?php
require('footer.php');
?>