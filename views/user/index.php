<?php
include views("/partials/header.php");
include views("/partials/nav.php");
?>


<?php

foreach ($users as $user) {
    $id = $user['id'];
    $name = $user['name'];
    $email = $user['email'];
    $image = $user['profileImage'];
    $phone = $user['phone'];
}
$comments = $class->query("SELECT * FROM `comment` where userId =  '$id'")->fetchAll();

if ($phone == 0) {
    $phoneChake  = '<p> add phone number </p>';
    $phoneCha  = 'add phone number ';
} else {
    $phoneChake =  '<p>' .  $phone . '</p>';
    $phoneCha = '';
}


if ($phone == 0) {

    $color = '#f04949';
    $alert = '<div style="position:absolute;width:10px;height:10;border-radius:5px;background:red;"></div>';
} else {
    $alert =  '<div> </div>';
    $color = '';
}




?>



<div class="user_container">
    <div class="head">

        <div class="user_card" style="z-index: 20;">
            <center>

                <img src="assets/img//user/<?= $image ?>">
                <br>
                <br>
                <button onclick="let edit = document.getElementById('userEditor')
            edit.style.opacity = '1';

            edit.style.top = '7%';
            edit.style.left = '0';
            edit.style.position = 'absolute';
            " title="<?= $phoneCha ?>">
                    <?= $alert ?>
                    Edit profile </button>

                <div class="text">

                    <h1 style="text-transform: uppercase;"><?= $name ?></h1>
                    <p><?= $email ?></p>
                    <p> <?= $phoneChake; ?></p>
                </div>

            </center>

        </div>
        <br>
    </div>
    <center>

        <div id="userEditor">
            <div class="user_card">
                <a href="user">&times;</a>

                <form enctype="multipart/form-data" method="post">
                    <label for="pp">

                        <img title="change profile image" src="assets/img//user/<?= $image ?>">
                    </label>
                    <input style="display: none;" type="file" name="image" id="pp">
                    <button name="uploadImage">upload</button>
                </form>
            </div>

            <form method="post" id="userEdit">
                <input type="text" name="name" value="<?= $name ?>">
                <br>
                <input type="email" name="email" value="<?= $email ?>">
                <br>
                <input type="password" name="password" value="<?= $user['password'] ?>">
                <br>
                <input name="phone" style="background-color: <?= $color ?> ;" type="tel" value="<?= $user['phone'] ?>">
                <br>
                <br>
                <button name="EditProfile" type="submit"> upload </button>
                <br>
                <br>

            </form>
            <form method="post" action="logout">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <input style="color: red;border:0; padding:10px;border-radius: 5px;font-size: 18px;cursor: pointer;" type="submit" name="deleteUser" value="Delete this account">
            </form>
    </center>




    <?php

    $bookings = $class->query("SELECT * FROM `booking` where userId =  '$id'")->fetchAll();

    foreach ($bookings as $booking) : {
            $userIdBooking =  $booking['userId'];
            $hotelIdBooking =  $booking['hotelId'];

            $hotelBooks = $class->query("SELECT * FROM `hotel` where id =  ' $hotelIdBooking'")->fetchAll();
            foreach ($hotelBooks as $hotelBook) {
                $nameBookinHotel = $hotelBook['name'];
                $imageBookingHotel = $hotelBook['image'];
                $idBookingHotel = $hotelBook['id'];
            }
        }
    ?>
        <main>

            <div onclick="document.querySelector('#option').style.display = 'block'" class="barcontainer" class="barcontainer" title="more action">
                <div class="Userbar"></div>
                <div class="Userbar"></div>
                <div class="Userbar"></div>
            </div>

            <div id="option">
                <form>

                </form>
                <button onclick="document.getElementById('booking').style.display = 'block';document.querySelector('.booking').style.display = 'none';">Edit
                </button>

                <form method="post">
                    <input type="hidden" value="<?= $booking['id'] ?>" name="Bookingid">
                    <button type="submit" name="deleteBooking"> Delete </button>
                </form>

            </div>

            <img src="assets/img//hotels/<?= $imageBookingHotel ?>" alt="">
            <div class="text">
                <a href="hotel?id=<?= $idBookingHotel ?>"><?= $nameBookinHotel ?></a>
            </div>
            <div class="booking">

                <table>
                    <thead>

                        <tr>
                            <th> check-in date</th>
                            <th>check-out date</th>
                            <th>booking date</th>
                            <th>room</th>
                            <th>room type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $booking['dateIn']; ?></td>
                            <td><?= $booking['dateOut']; ?></td>
                            <td><?= $booking['bookingDate']; ?></td>
                            <td><?= $booking['room']; ?></td>
                            <td><?= $booking['roomType']; ?></td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </main>

        <div style="display: none;" id="booking" class='booking'>

            <form method="post" id='vis' action="booking" class="bookingForm">
                <div>
                    <input value="<?= $booking['dateIn'] ?>" style="opacity: 1;" type="date" id="dataIn" name="dateIn" onclick="this.style.opacity='1';let lablein = document.querySelector('.labelIn'); lablein.style.position = 'absolute'; lablein.style.marginTop = '-22px'; lablein.style.backgroundColor = 'transparent'; lablein.style.padding = '10px'; lablein.style.transition = '.1s'" ;>
                </div>
                <div>
                    <input value="<?= $booking['dateOut'] ?>" style="opacity: 1;" type="date" id="dataOut" name="dateOut" onclick="this.style.opacity='1';let lableout = document.querySelector('.labelOut'); lableout.style.position = 'absolute'; lableout.style.marginTop = '-22px'; lableout.style.backgroundColor = 'transparent'; lableout.style.padding = '10px'; lableout.style.transition = '.1s'" ;>
                </div>
                <div>

                    <select name="roomType" class="select">
                        <option name="roomType" value="Standard Room" title=" A basic room with essential amenities, suitable for budget-conscious travelers.">
                            Standard Room</option>
                        <option name="roomType" value="Family Room" title="A room specifically designed to accommodate families, with larger spaces and additional bedding options.">
                            Family Room</option>
                        <option name="roomType" value="Suite" title="A luxurious and often larger accommodation that may include separate living and sleeping areas, a kitchenette, and premium amenities.">
                            Suite</option>
                        <option name="roomType" value="Deluxe Room" title="A more spacious and well-appointed room with additional amenities, offering a higher level of comfort">
                            Deluxe Room</option>

                    </select>
                </div>
                <div>
                    <input style="opacity: 1;" type="number" name="adult" id="adult" class="adultInput" value="<?= $booking['adult']; ?>" onclick="this.style.opacity='1';let adult = document.querySelector('.adult'); adult.style.position = 'absolute'; adult.style.marginTop = '-22px'; adult.style.backgroundColor = 'transparent'; adult.style.padding = '10px'; adult.style.transition = '.1s'" ;>
                </div>
                <div>
                    <input style="opacity: 1;" value="<?= $booking['children']; ?>" type="number" name="children" id="children" onclick="this.style.opacity='1';let children = document.querySelector('.children'); children.style.position = 'absolute'; children.style.marginTop = '-22px'; children.style.backgroundColor = 'transparent'; children.style.padding = '10px'; children.style.transition = '.1s'" ;>
                    <input type="hidden" name="hotelId" value="<?= $idBookingHotel ?>" ;>
                    <input type="hidden" name="userId" value="<?= $id ?>" ;>
                </div>
                <div>
                    <input name="uploadBooking" class="bookingBtn" type="submit" value="book">
                </div>
            </form>

        </div>

    <?php endforeach; ?>
    <?php foreach ($comments as $comment) : {
        } ?>

        <?php
        $hotelsId = $comment['hotelId'];
        $rate =  $comment['rate'];


        $hotels = $class->query("SELECT * FROM `hotel` where id =  '$hotelsId'")->fetchAll();

        foreach ($hotels as $hotel) {


            $hotelName = $hotel['name'];
            $image =  $hotel['image'];
            $id =  $hotel['id'];
        } ?>
        <main class="comments">

            <div onclick="document.querySelector('.option').style.display = 'block'" class="barcontainer" title="more action">
                <div class="Userbar"></div>
                <div class="Userbar"></div>
                <div class="Userbar"></div>
            </div>



            <div id="option">

                <form method="post">

                    <input name="id" type="hidden" value="<?= $comment['id']; ?>">
                    <button id="deleteOption" name="deletecomment" type="submit" title="Delete this comment"> Delete
                    </button>
                </form>
            </div>

            <img src="assets/img//hotels/<?= $image ?>" alt="">

            <div class="text">
                <a href="hotel?id=<?= $id ?>"><?= $hotelName ?></a>
            </div>
            <div class="comment">
                <p><?= $comment['comment'] ?> and <?= $comment['rate'] ?> rate</p>
            </div>
        </main>
    <?php endforeach; ?>
</div>