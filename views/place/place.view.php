<?php
require views('partials/header.php');
require views('partials/nav.php');

?>

<?php foreach ($places as $place) : {
    }
?>


<div class="containerVis">



    <div style="background-image: url('assets/img/places/<?= $place['image1'] ?>')" class="placeContainer">


    </div>

    <div class="gap"></div>
    <div class="filterable_cards">

        <div class="card">
            <img src="assets/img/places/<?= $place['image2'] ?> " ">

            </div>
            <div class=" card">
            <img src="assets/img/places/<?= $place['image3'] ?> " ">
            </div>
           
    <div class=" card">
            <img src="assets/img/places/<?= $place['image4'] ?> " ">

            </div> 
            
            <div class=" mapp">
            <iframe style=" width: 400px; height: 210px; " src="<?= $place['placeAddressURL'] ?>">
            </iframe> <button onclick="showFullmap()" class="mappButton">show map</button>
            <div class="mapFull">
                <button onclick="closeFullmap()">x</button>
                <iframe src="<?= $place['placeAddressURL'] ?>"></iframe>
            </div>
        </div>
        <div class="placeText">
            <span> </span>
            <h1> <?= $place['name'] ?></h1>
            <hr>
            <p>
                <?= $place['description'] ?>
            </p>
            <small style="float: right;"> its located in <span style="color:#009669">
                    <?php
                        $regionsName = $class->query('select * from region where id = :id', ['id' => $place['regionId']])->fetchAll();
                        foreach ($regionsName as $regions) {
                            echo  $regions['name'];
                        }
                        ?></span></small>
            <a target="_blank" href="<?= $place['additionalUrl'] ?>"> <button>show more</button></a>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class=" Wramp_container">

        <h2>
            Hotels close to <span style="color:#009669;"> <?= $place['name'] ?></span> <br>
        </h2>


        <button onclick="prevSlide()" style="opacity: 0;" id="returnBtn" class="btn"> &#10094</button>

        <div class="flex">

            <?php
                $placeId = $place['id'];
                $query = "SELECT * FROM `hotel` where placeId = $placeId and active = 1";

                $hotels = $class->query($query)->fetchAll();
                foreach ($hotels as $hotel) : {
                    } ?>

            <div class="gallery">
                <?php include "views/star.php"; ?>

                <img src="assets/img/hotels/<?= $hotel['image'] ?> " alt="">
                <a style="text-decoration: none;" href="hotel?id=<?= $hotel['id'] ?>">
                    <?= $hotel['name'] ?>
                </a>
                <p> <?php

                            $regionsName = $class->query('select * from region where id = :id', ['id' => $place['regionId']])->fetchAll();
                            foreach ($regionsName as $regions) {
                                echo $regions['distance'];
                            }

                            ?>km from Addis Ababa <small>
                        <?= $rate ?> Reviews
                    </small></p>
            </div>
            <?php endforeach; ?>
            <?php endforeach; ?>

        </div>

        <button onclick="nextSlide()" id="btnPlus" class="btn"> &#10095</button>
    </div>







</div>


<div class="gap"></div>
<?php require views('partials/footer.php') ?>