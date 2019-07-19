<?php
include('header.php');
?>

<body>
    <div class="container">
<header>
    <h1>User Information</h1>
</header>

<?php
require('nav.php');
?>
<main>
<?php
 // connecting to the database
 $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gcc200420045', 'gcc200420045', 'AgoSOp0j7a');

$sql = "SELECT * FROM userinfo;";
        
//prepare the query
$cmd = $conn -> prepare($sql);

#execute the query
$cmd-> execute();

$info = $cmd->fetchAll();
echo '<div class="container">';
echo "<table class=\"table table-striped\">
<thead>
<th>Name</th>
<th>Email</th>
<th>City</th>
<th>Skills</th>
<th>Action</th>
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
    <td>
    <a name=\"edit\"  href=\"edit.php?user_id=".$mo['user_id']."\"class=\"btn btn-primary\">Edit</a>
    <a name=\"delete\" href=\"updel.php?user_id=".$mo['user_id']."\"class=\"btn btn-danger\">Delete</a>
    </td>
    </tr>";
}

echo "</tbody></table>";

echo '</div>';


// disconnecting
$cmd->closeCursor();

?>

</main>

<?php
include('footer.php');
?>