<?php


require 'partials/header.php';
require 'partials/nav.php';
?>

<div class="container">
    <div class="center_content">
        <div class="h2">

            <h2>discover the
                <h2 style="color: #009669;">colorful</h2>
                <h2> world</h2>
            </h2>
        </div>
        <div class="h1">

            <h1 style="color: #009669; margin-right:20px;">
                Ethio
                <h1>Tour</h1>
            </h1>
        </div>

        <a href="#card"> <button>VIST NOW</button></a>
    </div>
</div>


<div class="gap"></div>

<form id="search" method="post" action="search">
    <input name="search" placeholder="search" type="text">
    <button><img src="assets/img/search.png" alt=""></button>


</form>

<div id="card" class="gap"></div>

<div class="Wramp_container">
    <div class="title-text">
        <h1>Explore Ethiopia <p>
                Most popular choices for travelers from Ethiopia
            </p>
        </h1>

    </div>
    <button onclick="prevSlide()" style="opacity: 0;" id="returnBtn" class="btn"> &#10094</button>

    <div class="flex">

        <?php foreach ($places as $place) : {
            } ?>

            <div class="gallery">
                <img src="assets/img/places/<?= $place['image1'] ?> " alt="">
                <a style="text-decoration: none;" href="place?id=<?= $place['id'] ?>">
                    <?= $place['name'] ?>
                </a>
                <p> <?php

                    $regionsName = $class->query('select * from region where id = :id', ['id' => $place['regionId']])->fetchAll();
                    foreach ($regionsName as $regions) {
                        echo $regions['distance'];
                    }

                    ?>km from Addis Ababa </p>
            </div>
        <?php endforeach; ?>

    </div>

    <button onclick="nextSlide()" id="btnPlus" class="btn"> &#10095</button>
</div>


<br><br>
<div class="conteinerGallery">
    <div class="title-text">

        <h1>Trending destinations
            <p>
                Most popular choices for travelers from Ethiopia
            </p>
        </h1>
    </div>
    <hr>
    <div class="filteGallery">
        <?php
        foreach ($limitPlaces as $limitPlace) :
        ?>
            <div class="gallerys" data-name="Flower">
                <img src="assets/img/places/<?= $limitPlace['image1'] ?> " alt="">
                <h5>
                    <?php

                    $regionsName = $class->query('select * from region where id = :id', ['id' => $limitPlace['regionId']])->fetchAll();
                    foreach ($regionsName as $regions) {
                        echo $regions['name'];
                    }

                    ?>
                </h5>

                <small> Must Popular</small>
                <div class="gallerys_body">
                    <h1 class="gallerys_title"> <a style="text-transform: uppercase;" href="place?id=<?= $limitPlace['id'] ?>"> <?= $limitPlace['name'] ?>
                        </a>
                    </h1>
                    <hr>
                    <p class="gallerys_txt"><?= $regions['distance'] ?> km from Addis Ababa</p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="gap">
</div>
<hr>
<script>
    var ProImage = document.getElementById('ProImage');
    var count = 0;
    var imageSours = ['assets/img/places/<?= $placeIds['image1'] ?> ',
        'assets/img/places/<?= $placeIds['image2'] ?> ',
        'assets/img/places/<?= $placeIds['image3'] ?> ',
        'assets/img/places/<?= $placeIds['image4'] ?> '
    ];


    function next() {
        count++;
        ProImage.src = imageSours[count];
        if (count >= imageSours.length) {
            count = -1;
        }

    }

    function pre() {
        count--;
        ProImage.src = imageSours[count];
        if (count <= 0) {
            count = imageSours.length;
        }


    }
</script>

<div style="height: 180px;" class="gap"></div>
</div>

<?php if (!$_SESSION['user']) : ?>

    <div class="dialogContainer">
        <button onclick="document.querySelector('.dialogContainer').style.display='none'" class="diaBtnX">x</button>
        <h1>Sign in, save money
        </h1>
        <p>You could save 10% or more at this property when you sign in
        </p>
        <div class="auth">
            <a href="login">
                <button>Sign in </button>
            </a>
            <a href="register">create an account</a>
        </div>
    </div>

<?php endif; ?>


<?php require 'partials/footer.php' ?>