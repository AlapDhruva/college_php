
    <?php
    require('header.php');
    ?>


<body>
    <div class="container">
<header>
    <h1>User Search</h1>
</header>

<?php
require('nav.php');
?>
<main>
<form action="searchfind.php" method="get">
    <input type="text" name="search" placeholder="Search for Employee" required>
    <input type="submit" value="SEARCH IT!">
  </form>
</main>

<?php
    require('footer.php');
    ?>
    
