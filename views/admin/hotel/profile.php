<?php include views('/admin//header.php'); ?>

<body class="g-sidenav-show bg-gray-200">
    <?php include views('/admin//sidenav.php'); ?>

    <div class="main-content position-relative max-height-vh-100 h-100">
        <!-- Navbar -->

        <?php include views('/admin//nav.php');

        ?>




        <?php foreach ($hotels as $hotel) :   ?>




            <div class="container-fluid px-2 px-md-4">
                <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                    <span class="mask  bg-dark-blue  opacity-6"></span>
                </div>
                <div class="card card-body mx-3 mx-md-4 mt-n6">
                    <div class="row gx-4 mb-2">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="assets/img/hotels/<?= $hotel['image'] ?> " alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    <?php echo $hotel['name']  ?>
                                </h5>
                                <p class="mb-0 font-weight-normal text-sm">
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-xl-4">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-0"> Description </h6>
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
                                    <?php echo $hotel['description'] ?>
                                </p>

                            </div>
                        </div>
                    </div>

                    <div class="card-body p-3">
                        <p class="text-sm">
                            Hotel Information
                        </p>
                        <hr class="horizontal gray-light my-4">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Name:</strong>
                                <?php echo $hotel['name'] ?> </li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email: </strong>
                                <?php echo $hotel['email'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Web Address :
                                </strong> <?php echo $hotel['url'] ?>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location :
                                </strong> <?php echo $hotel['placeAddressURL'] ?>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"> Upload
                                    Date</strong> :
                                </strong> <?php echo $hotel['date'] ?>
                            </li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"> Total
                                    Rates</strong> :
                                </strong>




                                <?php
                                $hotelId = $hotel['id'];

                                $query = "SELECT SUM(rate) FROM `comment` where `hotelId` = $hotelId";
                                $commentsRate = $class->query($query)->fetchAll();



                                foreach ($commentsRate as $res) {
                                    echo $res['SUM(rate)'];
                                }
                                ?>




                            </li>
                        </ul>

                    </div>
                    <pre>

</pre>


                    <div class="mb-5 ps-3">
                        <h6 class="mb-1">Images</h6>
                    </div>
                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                            <div class="card card-blog card-plain">
                                <div class="card-header p-0 mt-n4 mx-3">
                                    <a class="d-block shadow-xl border-radius-xl">
                                        <img src="assets/img/hotels/<?= $hotel['image'] ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                    </a>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-3 mt-3 col-md-6 mb-xl-0 mb-4">
                            <div class="card card-blog card-plain">
                                <div class="card-header p-0 mt-n4 mx-3">
                                    <a class="d-block shadow-xl border-radius-xl">
                                        <img src="assets/img/hotels/<?= $hotel['image1'] ?> " alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-3 mt-3 col-md-6 mb-xl-0 mb-4">
                            <div class="card card-blog card-plain">
                                <div class="card-header p-0 mt-n4 mx-3">
                                    <a class="d-block shadow-xl border-radius-xl">
                                        <img src="assets/img/hotels/<?= $hotel['image3'] ?> " alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                    </a>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-3 mt-3 col-md-6 mb-xl-0 mb-4">
                            <div class="card card-blog card-plain">
                                <div class="card-header p-0 mt-n4 mx-3">
                                    <a class="d-block shadow-xl border-radius-xl">
                                        <img src="assets/img/hotels/<?= $hotel['image4'] ?> " alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                    </a>
                                </div>

                            </div>
                        </div>
                        <pre></pre>

                        <div class="card-body">
                            <h4 class="card-title">Booking Table</h4>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                User
                                            </th>
                                            <th>
                                                User name
                                            </th>

                                            <th>
                                                Cheke in date
                                            </th>
                                            <th>
                                                Cheke out date
                                            </th>
                                            <th>
                                                Room Type
                                            </th>
                                            <th>
                                                Booking date
                                            </th>
                                            <th>
                                                Adult and childeren
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody> <?php



                                            $query = "SELECT * FROM `booking` WHERE hotelId = $hotelId";
                                            $bookings = $class->query($query)->fetchAll();



                                            foreach ($bookings as $booking) : {
                                                    $userIdBooking =  $booking['userId'];
                                                }
                                            ?>
                                            <?php

                                                $query = "SELECT * FROM `user` WHERE id = $userIdBooking";
                                                $usersBooker = $class->query($query)->fetchAll();



                                                foreach ($usersBooker as $bookingUser) : {
                                                    }
                                            ?>
                                                <tr>

                                                    <td class="py-1">
                                                        <img width="30px" style="border-radius: 50%;" src="assets/img/user/<?= $bookingUser['profileImage']; ?>" alt="image">
                                                    </td>
                                                    <td>

                                                        <a href="userprofile?id=<?= $bookingUser['id'] ?>">
                                                            <?= $bookingUser['name']; ?></a>

                                                    </td>

                                                    <td>
                                                        <?= $booking['dateIn'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $booking['dateOut'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $booking['roomType'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $booking['bookingDate'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $booking['adult'] ?>
                                                        adult and <?= $booking['children'] ?>
                                                        childeren
                                                    </td>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                                </tr>

                                                </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>



                        <div class="col-12 col-xl-4">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">Comments and Rates</h6>
                                </div>




                                <?php

                                $query = "SELECT * FROM `comment` WHERE hotelId = $hotelId";
                                $comments = $class->query($query)->fetchAll();




                                foreach ($comments as $use) : {
                                    }
                                ?>
                                    <?php $userIdComm = $use['userId'] ?>

                                    <?php
                                    $query = "SELECT * FROM `user` WHERE id = $userIdComm";
                                    $bookingComm = $class->query($query)->fetchAll();




                                    foreach ($bookingComm as $users) : {
                                        }
                                    ?>

                                        <div class="card-body p-3">
                                            <ul class="list-group">
                                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                                                    <div class="avatar me-3">
                                                        <img src="assets/img/user/<?= $users['profileImage']; ?>" alt="kal" class="border-radius-lg shadow">
                                                    </div>
                                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                            <a href="userprofile?id=<?= $users['id'] ?>"><?= $users['name'] ?></a>
                                                        </h6>
                                                        <p class="mb-0 text-xs">
                                                            <?= 'comment: ' . $use['comment'] ?>
                                                        </p>
                                                        <p class="mb-0 text-xs ">
                                                            <?= 'rates: ' . $use['rate'] ?>
                                                        </p>
                                                    </div>

                                                </li>

                                            </ul>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <?php include "views/admin//setting.php"; ?>
</body>

</html>