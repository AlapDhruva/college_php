<?php
require('header.php');
?>

<body>
    <div class="container">
<header>
    <h1>Result</h1>
</header>
<?php
require('nav.php');
?>
 <?php  $user_search = $_GET['search'];
 $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gcc200420045', 'gcc200420045', 'AgoSOp0j7a');
  
 echo "<p> You searched for the following : $user_search </p>"; 
  
 // break it apart with the explode function 
 
  $search_words = explode(' ', $user_search); 
  
  //build our query 
  //let's build the first part and store in a variable called query 
  $query = "SELECT * FROM userinfo WHERE "; 
  
  //start to build the second part of our query 
  $where = ""; 
  
  foreach($search_words as $word) {
    $where = $where . "name LIKE '%$word%' OR "; 
  }
  //gets rid of the final four characters in last iteration of loop
  $where = substr($where, 0, strlen($where) - 4);
  
  $final_sql = $query . $where; 
  
  //echo "<p> $final_sql </p>";
  
  $cmd = $conn->prepare($final_sql); 
  $cmd->execute(); 
  
  $results = $cmd->fetchAll();
  
  //set up a table and loop through the results 
  
  echo "<table>
        <thead>
          <th>Name</th>
          <th>Email</th>
          <th>City</th>
          <th>Skills</th>
          </thead>
          <tbody>";
  
  foreach($results as $result) {
    echo "<tr>"; 
    echo "<td>" . $result['name'] . "</td>";
    echo "<td>" . $result['email'] . "</td>"; 
    echo "<td>" . $result['city'] . "</td>"; 
    echo "<td>" . $result['skills'] . "</td>"; 
    echo "</tr>";  
  }
  
  echo "</tbody></table>"; 
  $cmd->closeCursor(); 

?>
<?php
require('footer.php');
?>