<?php
require('header.php');
?>

<?php

    $user_id = $_GET['user_id'];

?>

<body>
    <div class="container">
        <header>
            <h1>Edit Information</h1>
        </header>

        <?php
require('nav.php');
?>

        <main>
            <form action="actionedit.php" method="post" class="was-validated">
            <div class="form-group">
                    <input type="hidden" class="form-control" id="user_id" value="<?php echo $user_id ?>" name="user_id">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" id="city" placeholder="Enter city" name="city" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <div class="form-group">
                    <label for="Skill">Skills:</label>
                    <input type="textarea" class="form-control" id="skill" placeholder="Enter skills" name="skill" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </main>

    <?php
    require('footer.php');
    ?>