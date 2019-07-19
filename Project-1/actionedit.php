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
$name = filter_input(INPUT_POST,'name');
$email =  filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
$city = filter_input(INPUT_POST,'city');
$skill = filter_input(INPUT_POST,'skill');
$user_id = filter_input(INPUT_POST,'user_id');
//set up a flag veriable &set to true initially
$ok = true;

if(empty($name))
{
    $ok = false;
    echo"<p>Name is Required</p>";
}

if(empty($email))
{
    $ok = false;
    echo"<p>Email is Required</p>";   
}

if(empty($city))
{
    $ok = false;
    echo"<p>city is Required</p>";   
}


if(empty($skill))
{
    $ok = false;
    echo"<p>skill is Required</p>";   
}

//checkthe email is properlly formated email

if($email=== false)
{
    $ok = false;
    echo"<p>You need properly formated email address..!!</p>";   
}

try
{

  if($ok === true)
{
    // connecting to the database
    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gcc200420045', 'gcc200420045', 'AgoSOp0j7a');
    // set up an SQL command to save the new game
    $sql = "update userinfo set name=:name,email=:email,city=:city,skills=:skill where user_id = :user_id";

    // set up a command object
    $cmd = $conn->prepare($sql);

    // fill the placeholders with the 4 input variables
    $cmd->bindParam(':name', $name);
    $cmd->bindParam(':email', $email);
    $cmd->bindParam(':city', $city);
    $cmd->bindParam(':skill', $skill);
    $cmd->bindParam(':user_id', $user_id);


    // execute the insert
    $cmd->execute();

    // show message
    

    $cmd->closeCursor();

    header('location:record.php');
}
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