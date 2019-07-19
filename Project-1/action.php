<?php
require('header.php');
?>

<body>
    <div class="container">
        <header>
            <h1>All User Information</h1>
        </header>

        <?php
require('nav.php');
?>

    <main>
<?php
$name = filter_input(INPUT_POST,'name');
$email =  filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
$city = filter_input(INPUT_POST,'city');
$skill = filter_input(INPUT_POST,'skill');

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
    $sql = "INSERT INTO userinfo (name, email, city, skills) VALUES (:name,
    :email, :city, :skill)";

    // set up a command object
    $cmd = $conn->prepare($sql);

    // fill the placeholders with the 4 input variables
    $cmd->bindParam(':name', $name);
    $cmd->bindParam(':email', $email);
    $cmd->bindParam(':city', $city);
    $cmd->bindParam(':skill', $skill);


    // execute the insert
    $cmd->execute();

    // show message
    echo "User data is Saved";

    $sql = "SELECT * FROM userinfo;";
        
        //prepare the query
        $cmd = $conn -> prepare($sql);

        #execute the query
        $cmd-> execute();

        $info = $cmd->fetchAll();

        echo "<table class=\"table table-striped\">
        <thead>
        <th>Name</th>
        <th>Email</th>
        <th>City</th>
        <th>Skills</th>
        </thead>
        <tbody>";

        //loop throught the data

        foreach($info as $mo)
        {
            echo "<tr>
            <td>".$mo['name']."</td>
            <td>".$mo['email']."</td>
            <td>".$mo['city']."</td>
            <td>".$mo['skills']."</td>
            </tr>";
        }

        echo "</tbody></table>";
        
        


    // disconnecting
    $cmd->closeCursor();



}
}
catch(Exception $e) {
    //send an email to the app admin 
    mail('jessicagilfillan@gmail', 'cant enter the record', $e); 
    // send user to error.php page
    header('location:404error.php'); 
  }

?>

    </main>

<?php
require('footer.php');
?>