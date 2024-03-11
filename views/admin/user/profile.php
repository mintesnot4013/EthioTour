<?php include views('/admin/header.php'); ?>

<body class="g-sidenav-show  bg-gray-200">

    <?php include views('/admin/sidenav.php'); ?>


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php
        include views('/admin/nav.php');

        ?>
        <?php foreach ($users as $user) :   ?>
            <?php
            if ($user['phone'] == 0) {
                $phone = 'has no phone number';
            } else {
                $phone = $user['phone'];
            }

            $uId = $user['id'];
            $query = "select * from hotel where adminId = $uId";

            $hotelAdmin = $class->query($query)->fetchAll();

            ?>


            <div class="container-fluid px-2 px-md-4">
                <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                    <span class="mask  bg-dark-blue  opacity-6"></span>
                </div>
                <div class="card card-body mx-3 mx-md-4 mt-n6">
                    <div class="row gx-4 mb-2">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="assets/img/user/<?= $user['profileImage']; ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    <?php echo $user['name'];
                                    $hoId = $user['hotelId'] ?>
                                </h5>
                                <p class="mb-0 font-weight-normal text-sm">
                                    <?php echo $user['email'] ?> </p>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>

                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Profile Information</h6>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="javascript:;">
                                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-sm">
                                Profile Information </p>
                            <hr class="horizontal gray-light my-4">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full
                                        Name:</strong> <?= $user['name'] ?> </li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:
                                    </strong> <?= $user['email'] ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Phone:
                                    </strong> <?= $phone ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Registered
                                        Date:
                                    </strong> <?= $user['date'] ?></li>
                                <?php $userId = $user['id'] ?>

                                <?php





                                $rates = $class->query("SELECT SUM(rate) FROM `comment` WHERE userId = $userId")->fetchAll();


                                foreach ($rates as $rate) : {
                                    } ?>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Total rates
                                            :
                                        </strong> <?= $rate['SUM(rate)'] ?></li>

                                <?php endforeach; ?>

                            </ul>
                        </div>
                    </div>
                </div>

                <?php if ($hotelAdmin) : {
                    } ?>
                    <p>created hotel</p>
                    <?php

                    foreach ($hotelAdmin as $hotelAdmins) : {
                        }
                    ?>
                        <table class="table align-items-center mb-0">

                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        uploaded Date
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                <tr title="<?= $hotelAdmins['name'] ?>">
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="assets/img/hotels/<?= $hotelAdmins['image1'] ?> " class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="hotelProfile?Hotelid=<?= $hotelAdmins['id'] ?>" class="mb-0 text-sm"><?= $hotelAdmins['name'] ?></a>
                                                <p class="text-xs text-secondary mb-0">

                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <?= $hotelAdmins['date'] ?> </td>
                                </tr>
                            </tbody>
                        </table>
                    <?php endforeach ?>
                <?php endif ?>

                <p>comment</p>
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Hotels
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Commented Date
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Comments
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Rates
                            </th>

                        </tr>
                    </thead>

                    <?php


                    $comments = $class->query("SELECT * FROM `comment` WHERE userId = $userId")->fetchAll();

                    foreach ($comments as $comment) : {
                        }
                    ?>
                        <?php $hotelId = $comment['hotelId'] ?>
                        <?php


                        $hotels = $class->query("SELECT * FROM `hotel` WHERE id = $hotelId")->fetchAll();






                        foreach ($hotels as $hotel) :
                        ?>


                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="assets/img/hotels/<?= $hotel['image'] ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <a href="hotelProfile?Hotelid=<?= $hotel['id'] ?>"" class=" mb-0 text-sm"><?= $hotel['name'] ?></a>
                                            <p class="text-xs text-secondary mb-0">
                                                <?= $hotel['email'] ?></p>

                                        </div>
                                    </div>
                                </td>

                                <td class="align-middle text-center text-sm">
                                    <?= $comment['date'] ?> </td>
                                <td class="align-middle text-center text-sm">
                                    <?= $comment['comment'] ?> </td>

                                <td class="align-middle text-center ">
                                    <?= $comment['rate'] ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>


                    </tbody>
                </table>

                <p>booking</p>

                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Hotel name
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Booking Date
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Cheke in date
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                cheke out date
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Room type </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Adult </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                children </th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php


                        $bookings = $class->query("SELECT * FROM `booking` WHERE userId = $userId")->fetchAll();

                        foreach ($bookings as $booking) : {
                            }
                        ?>
                            <?php $hotelId = $booking['hotelId'] ?>
                            <?php


                            $hotels = $class->query("SELECT * FROM `hotel` WHERE id = $hotelId")->fetchAll();
                            foreach ($hotels as $hotel) :
                            ?>


                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="assets/img/hotels/<?= $hotel['image'] ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="hotelProfile?Hotelid=<?= $hotel['id'] ?>"" class=" mb-0 text-sm"><?= $hotel['name'] ?></a>
                                                <p class="text-xs text-secondary mb-0">
                                                    <?= $hotel['email'] ?></p>

                                            </div>
                                        </div>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <?= $booking['bookingDate'] ?> </td>
                                    <td class="align-middle text-center text-sm">
                                        <?= $booking['dateIn'] ?> </td>

                                    <td class="align-middle text-center ">
                                        <?= $booking['dateOut'] ?>
                                    </td>
                                    <td class="align-middle text-center ">
                                        <?= $booking['roomType'] ?>
                                    </td>
                                    <td class="align-middle text-center ">
                                        <?= $booking['adult'] ?>
                                    </td>
                                    <td class="align-middle text-center ">
                                        <?= $booking['children'] ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endforeach; ?>


                    </tbody>
                </table>

                </div>
            </div>
            </div>
            </div>
            <?php include "views/admin/setting.php"; ?>
</body>

</html>