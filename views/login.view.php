<?php
include views("/partials/header.php");
include views("/partials/nav.php");
?>
<div style="height: 120px;" class="gap"></div>

<div style="display: block" class="addComments" id="login">
    <p class="pop" style="font-size: x-large;">



    <p class="pop" style="font-size: x-large;">Login to your account</p>
    <?php

    if (isset($error['email'])) {
        echo '<p class="pop" style="font-size: large;color:red;">' . $error['email'] . '</p>';
        $errorEmail = 'red';
        $errorEmailColor = 'red';
    } else {
        $errorEmail = 'green';
        $errorEmailColor = 'green';
    }

    if (isset($error['password'])) {
        echo '<p class="pop" style="font-size: large;color:red;">' . $error['password'] . '</p>';
        $erroPassword = 'red';
        $errorPasswordColor = 'red';
    } else {
        $erroPassword = 'white';
        $errorPasswordColor = 'green';
    }
    ?>


    </p>
    <form method="post" enctype="multipart/form-data" class="form">
        <label>
            <input style="border: solid 1px  <?= $errorEmail ?>;color:<?= $errorEmailColor ?>;" type="text" value="<?= $_POST['email'] ?>" name="email" placeholder=" Email">

        </label>

        <label style="display: flex; border: solid 1px  <?= $erroPassword ?>;height: 40px;">
            <input id="password" style="color:<?= $errorPasswordColor ?>" type="password" value="<?= $_POST['password'] ?>" name="password" placeholder="Password">
            <button id="btn" type="button" onclick="showPassword()" style="height: 40px;border: none;background-color: white;">show</button>

        </label>


        <input class="commBtn" type="submit" name="login" value="LOGIN"><br>
        <p style="text-align: right;color:grey;">
            Don't have an account? <a style="text-decoration: none;color:#000;" href="register">
                SIGNUP</a>
        </p>

    </form>
</div>
<?php include 'views/partials/footer.php' ?>