<?php
require views('/partials/header.php');
require views('/partials/nav.php');
?>





<div class="gap"></div>
<div class="conteinerGallery">
    <div class="title-text">

        <h1>Trending destinations
            <p>
                These popular destinations have a lot to offer
            </p>
        </h1>
        <hr>
    </div>
    <div class="filteGallery">
        <?php foreach ($hotels as $hotel) : {
            } ?>
            <div class="gallerys">
                <?php include "views/star.php"; ?>

                <div class="hover">
                    <p> <?= $rate ?> Reviews </p>
                </div>
                <img src="assets/img/hotels/<?= $hotel['image'] ?> " alt="">
                <?php $hoId = $hotel['placeId'];
                $query = "select * from place where id =  $hoId";
                $places = $class->query($query)->fetchAll();
                foreach ($places as $place) {
                }
                ?>
                <h5> <a style="text-transform: uppercase;" href="place?id=<?= $hoId ?>">
                        <?php
                        $regionsName = $class->query('select * from region where id = :id', ['id' => $place['regionId']])->fetchAll();
                        foreach ($regionsName as $regions) {
                            echo $regions['name'];
                        }
                        ?> </a></h5>
                <small> <?= $rate ?> Reviews</small>
                <div class="gallerys_body">
                    <h1 class="gallerys_title"> <a style="text-transform: uppercase;" href="hotel?id=<?= $hotel['id'] ?>">
                            <?= $hotel['name'] ?> </a>
                    </h1>
                    <hr>
                    <p class="gallerys_txt"><?= $regions['distance'] ?> km from Addis Ababa</p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>