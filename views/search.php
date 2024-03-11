<?php
require 'partials/header.php';
require 'partials/nav.php';
if (isset($_POST['search'])) {
}


?>
<p class="pop">Search </p>
<p style="font-size: 20px;" class="pop">
    <?php

    if (empty($search)) {
        header("location:/#card");
    }
    if ($places  == false and $hotels == false) {
        echo 'you search <i style="color:black;">' . $search . '</i> Did not match any place or hotel  ';
    } elseif ($places  == false) {
        echo 'you search <i style="color:black;">' . $search . '</i> Did not match any place   ';
    } elseif ($hotels == false) {
        $notFound =  '<p class="pop" style="font-size:20px;">you search <i style="color:black;">' . $search . '</i> Did not match any hotels  ';
    } elseif ($places); {
    } ?>
</p>

<div class="conteinerGallery">
    <h1><?php


        if (($places)) {
            echo '<hr>places';
        } ?></h1>
    <div class="filteGallery">
        <?php
        foreach ($places as $place) : {
            }
        ?>
            <div class="gallerys" data-name="Flower">
                <img src="assets/img/places/<?= $place['image1'] ?> " alt="">
                <h5>
                    <?php

                    $regionsName = $class->query('select * from region where id = :id', ['id' => $place['id']])->fetchAll();
                    foreach ($regionsName as $regions) {
                        echo $regions['name'];
                    }

                    ?>
                </h5>

                <small> Must Popular</small>
                <div class="gallerys_body">
                    <h1 class="gallerys_title"> <a style="text-transform: uppercase;" href="place?id=<?= $place['id'] ?>">
                            <?= $place['name'] ?>
                        </a>
                    </h1>
                    <hr>
                    <p class="gallerys_txt"><?= $regions['distance'] ?> km from Addis Ababa</p>
                </div>
            </div>
        <?php endforeach; ?>



    </div>
</div>
<?= $notFound ?>
<p class="pop">


</p>



<div class="conteinerGallery">

    <h1> <?php
            if (($hotels)) {
                echo
                '<hr>hotels';
            }
            ?></h1>
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