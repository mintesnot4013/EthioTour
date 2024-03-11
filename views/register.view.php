<?php
include views("/partials/header.php");
include views("/partials/nav.php");
?><div class="gap"></div>
<div class="gap"></div>
<div class="gap"></div>
<div class="addComments" id="signup">
    <p class="pop" style="font-size: x-large;">
    <p class="pop" style="font-size: x-large;">Regester a new account</p>



    <?php
    if (isset($error['name'])) {
        echo '<p class="pop" style="font-size: large;color:red;">' . $error['name'] . '</p>';
        $errorBGCColor = 'red';
        $errorColor = 'red';
    } else {
        $errorBGCColor = 'green';
        $errorColor = 'green';
    }
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
        $errorPasswordColor = 'black';
    }
    ?>


    </p>

    <form method="post" enctype="multipart/form-data" class="form">


        <label>
            <input style="border: solid 1px  <?= $errorBGCColor ?>;color:<?= $errorColor ?>;" type="text" name="name"
                value="<?= $name ?>" placeholder="User Name">
        </label>

        <?php

        if (isset($_GET['backbooking'])) {
            echo '<input type="hidden" name="backbooking" value="0">';
        } else {
            echo '';
        }

        ?>
        <label>
            <input style="border: solid 1px  <?= $errorEmail ?>;color:<?= $errorEmailColor ?>;" type="text" name="email"
                value="<?= $_POST['email'] ?>" placeholder="Email">
        </label>

        <label style="display: flex; border: solid 1px  <?= $erroPassword ?>;height: 40px;">
            <input id="password" style="color:<?= $errorPasswordColor ?>;" type="password" name="password"
                value="<?= $password ?>" placeholder="Password">
            <button id="btn" type="button" onclick="showPassword()"
                style="height: 40px;border: none;background-color: white;">show</button>
        </label>
        <label style="display:flex; width:150px;height:10px;margin-bottom: 23px;">

            <input style="width: 20px; border: none;border-radius: 5px; " type="checkbox" name="hotel"
                value="Amin Hotel">

            <p>Regester as hotel</p>
        </label>
        <input class="commBtn" type="submit" name="submit" value="SIGNUP"><br>
        <p style="text-align: right;color:grey;">
            Already have an account? <a style="text-decoration: none;color:#000;" href="login">LOGIN</a>
        </p>

    </form>
</div>