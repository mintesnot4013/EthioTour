<?php
require views('partials/header.php');
require views('partials/nav.php');
?>


<?php foreach ($hotels as $hotel) : {
    } ?>


<div style=" background-image: url('assets/img/hotels/<?= $hotel['image'] ?>');" class="profileContainer">
    <div class="description">
        <?php include "views/star.php"; ?>


        <div class="descrioText">
            <a style="text-transform: uppercase;font-size: 30px;"> <?= $hotel['name'] ?>
            </a> <br>
            <span>
                <p><?= $rate ?> Reviews</p>
            </span>

            <hr>
            <p> <?= $hotel['name'] ?>


                <?php $hoId = $hotel['placeId'];
                    $query = "select * from place where id =  $hoId";
                    $places = $class->query($query)->fetchAll();
                    foreach ($places as $place) {
                    }
                    ?>
                is located in <small style="text-transform: uppercase; margin:0;" href="place?id=<?= $hoId ?>">
                    <?php
                        $regionsName = $class->query('select * from region where id = :id', ['id' => $place['regionId']])->fetchAll();
                        foreach ($regionsName as $regions) {
                            echo  $regions['name'];
                        }
                        ?> </small>
                <span class="gallerys_txt"><?= $regions['distance'] ?> km from Addis Ababa</span>

            </p>

        </div>

    </div>
</div>
<br>
<?php
    $hotelId = $hotel['id'];
    $query = "SELECT * FROM `booking` WHERE `hotelId` = '$hotelId' and `userId` = '$userId'";
    $bookings = $class->query($query)->fetchAll();
    ?>
<?php
    if ($bookings) :
    ?>
<?php
        foreach ($bookings as $booking) : {
                $userIdBooking =  $booking['userId'];
            }
        ?>

<table>
    <thead>

        <tr>
            <th>check-in date</th>
            <th>check-out date</th>
            <th>booking date</th>
            <th>guests</th>
            <th>room</th>
            <th>room type</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $booking['dateIn']; ?></td>
            <td><?= $booking['dateOut']; ?></td>
            <td><?= $booking['bookingDate']; ?></td>
            <td><?= $booking['guest']; ?></td>
            <td><?= $booking['room']; ?></td>
            <td><?= $booking['roomType']; ?></td>
            <td>
                <div title="booking successfully" class="dialog">
                    <span>&#9989</span>
                </div>
            </td>
        </tr>
    </tbody>
</table>


<?php endforeach; ?>



<?php elseif (!$booking) : ?>

<?php if (isset($_SESSION['user'])) {
            $sendAction = 'booking';
        } else {
            $sendAction = 'regester?backbooking';
        } ?>

<div class="booking">
    <form method="post">
        <label for="hotel">
            <span> &#9783 hotel</span>
            <input id="hotel" value="<?= $hotel['name'] ?>" type="text">
            <input name="hotelId" value="<?= $hotel['id'] ?>" type="hidden">
            <input name="userId" value="<?= $userId ?>" type="hidden">
        </label>
        <label for="dateIn">
            <span> &#10064 check-in-date</span>
            <input id="dateIn" name="dateIn" type="date">
        </label>
        <label for="dateOut">
            <span> &#10064 check-out-date</span>
            <input id="dateOut" name="dateOut" type="date">
        </label>
        <label for="">
            <span> guests</span>
            <input id value="1" name="guest" min="1" max="10" type="number">
        </label>
        <label for="">
            <span> &#9783 room</span>
            <input value="1" min="1" max="5" name="room" type="number">
        </label>
        <input type="submit" name="book" value="check avaliable">
    </form>

</div>

<?php endif; ?>



<div class="underBooking">
</div>




<div class="conteinerGallery">
    <div class="filteGallery">
        <?php foreach ($hotels as $hotel) : {
                } ?>
        <div class="gallerys">
            <img src="assets/img/hotels/<?= $hotel['image1'] ?> " alt="">

        </div>
        <div class="gallerys">
            <img src="assets/img/hotels/<?= $hotel['image2'] ?> " alt="">

        </div>




    </div>


    <?php endforeach; ?>
</div>

<br>
<br>

<div class="Wramp_container">

    <div class="flex">

        <?php foreach ($hotels as $hotel) : {
                } ?>

        <div class="gallery">

            <img src="assets/img/hotels/<?= $hotel['image'] ?> " alt="">

        </div>
        <div class="gallery">
            <img src="assets/img/hotels/<?= $hotel['image1'] ?> " alt="">

        </div>
        <div class="gallery">
            <img src="assets/img/hotels/<?= $hotel['image2'] ?> " alt="">
        </div>
        <div class="gallery">
            <img src="assets/img/hotels/<?= $hotel['image3'] ?> " alt="">
        </div>
        <div class="gallery">
            <img src="assets/img/hotels/<?= $hotel['image4'] ?> " alt="">
        </div>

        <?php endforeach; ?>

    </div>

</div>

<div class="conteinerGallery">
    <div class="filteGallery">
        <iframe src="<?= $hotel['placeAddressURL'] ?>" width="600" height="420" style="border:0;" allowfullscreen=""
            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>



<?php endforeach; ?>
<div onmouseleave="leaveFacility()" class="facilityContainer">

    <h1>Facilites</h1>
    <br>

    <ul>


        <?php


            $honame = $hotel['name'];
            $hoId = $hotel['id'];
            $query = "SELECT * FROM `facility` WHERE `hotelId` = '$hoId'";
            $facilitys = $class->query($query)->fetchAll();
            foreach ($facilitys as $facility) {
            }



            ?>

        <?php if (isset($facility['facility1'])) : ?>

        <?php
                if ($facility['facility1'] == '0') {
                    $facility1 = null;
                    $fac1 = null;
                } else {
                    $facility1 = $facility['facility1'];
                    $fac1 = '<li id="list-Items">' . $facility1 . '</li>';
                }
                if ($facility['facility2'] == '0') {
                    $facility2 = null;
                } else {
                    $facility2 = $facility['facility2'];
                    $fac2 = '<li id="list-Items">' . $facility2 . '</li>';
                }
                if ($facility['facility3'] == '0') {
                    $facility3 = null;
                } else {
                    $facility3 = $facility['facility3'];
                    $fac3 = '<li id="list-Items">' . $facility3 . '</li>';
                }
                if ($facility['facility4'] == '0') {
                    $facility4 = null;
                } else {
                    $facility4 = $facility['facility4'];
                    $fac4 = '<li id="list-Items">' . $facility4 . '</li>';
                }
                if ($facility['facility5'] == '0') {
                    $facility5 = null;
                } else {
                    $facility5 = $facility['facility5'];
                    $fac5 = '<li id="list-Items">' . $facility5 . '</li>';
                }
                if ($facility['facility6'] == '0') {
                    $facility6 = null;
                } else {
                    $facility6 = $facility['facility6'];
                    $fac6 = '<li id="list-Items">' . $facility6 . '</li>';
                } ?>

        <?php


                echo $fac1;
                echo $fac2;
                echo $fac3;
                echo $fac4;
                echo $fac5;
                echo $fac6;

                ?>

        <?php else : ?>
        <?php endif ?>
    </ul>
    <div class="facilityImage">
        <img id="facilityImage" src="admin/-5876294389926572076_120.jpg" alt="">
    </div>
</div>



<div class="filterable_cards" id="vis1" style="width:70%;">
    <?php foreach ($ure as $value) : {
            } ?>
    <div class="card">
        <img src="assets/img/hotels/<?= $value['image'] ?>">
        <div class="text">


            <a>
                <p><?= $value['name'] ?></h1>
            </a>
            <p><?= $value['price'] ?>$ </p>
            <p><?= $value['description'] ?></p>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php foreach ($selected as $val) {
        $userId = $val['id'];
    } ?>

<div class="gap"></div>


<?php if (isset($_SESSION['user'])) : ?>
<div style="display: block" class="addComments" id="signup">
    <form method="post" enctype="multipart/form-data" action="update" class="form">
        <input type="hidden" name="hotelId" value="<?= $_GET['id'] ?>">
        <input type="hidden" name="userId" value="<?= $user['id'] ?>">

        <label>
            <textarea name="comment" cols="35"> your comments</textarea>
        </label>

        <div class="txt-center">
            <div class="rating">
                <input id="star5" name="star" type="radio" value="5" class="radio-btn hide" />
                <label for="star5">☆</label> <input id="star4" name="star" type="radio" value="4"
                    class="radio-btn hide" />
                <label for="star4">☆</label> <input id="star3" name="star" type="radio" value="3"
                    class="radio-btn hide" />
                <label for="star3">☆</label> <input id="star2" name="star" type="radio" value="2"
                    class="radio-btn hide" />
                <label for="star2">☆</label> <input id="star1" name="star" type="radio" value=' 1'
                    class="radio-btn hide" />
                <label for="star1">☆</label>
            </div>
        </div>

        <input class="commBtn" type="submit" name="submit" value="comment"><br>
    </form>
</div>

<?php endif; ?>

<p class="pop" id="pop">
    comments</p>

<div id="down"
    style="margin:auto;width:25px;transform: rotate(90deg);height:50px;cursor:pointer;color:black; font-size:35px;"
    onclick="showComment()" onmousedown="closeComment()">
    &#10092 </div>


<div class="commFlex" id="comments" style="opacity: 0;transform: translateY(20%) ;transition: .5s ;position:fixed;">
    <?php
        $hotelId = $hotel['id'];
        $query = "SELECT * FROM `comment`  where hotelId = $hotelId";
        $comments = $class->query($query)->fetchAll();


        ?>


    <?php foreach ($comments as $comment) : {
            } ?>

    <?php
            $id = $comment['userId'];
            $query = "SELECT * FROM `user`  where id = $id";
            $users = $class->query($query)->fetchAll();
            ?>
    <?php foreach ($users as $user) : {
                } ?>
    <div class="commCard">

        <img src="assets/img/user/<?= $user['profileImage']; ?>">
        <div class="text">

            <a href="./message.php?id= <?= $user['userId']; ?>">
                <h1 class="h1"><?= $user['name']; ?></h1>
            </a>
            <pre></pre>


            <p class="p"><?= htmlspecialchars($comment['comment']); ?> </p>
        </div>

    </div>


    <?php endforeach; ?>
    <?php endforeach; ?>

</div>
<div class="gap"></div>



<?php require views('/partials/footer.php') ?>