<?php
require 'partials/header.php';
require 'partials/nav.php';

?>

<div class="conteinerGallery">
    <div class="title-text">

        <h1>Top destinations
            <p>
                Most popular choices for travelers from Ethiopia</p>
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
<div class=" gap">
</div>