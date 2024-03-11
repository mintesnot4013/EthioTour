<?php include views('/admin//header.php');
?>

<body class="g-sidenav-show  bg-gray-200">
    <?php include views('/admin/sidenav.php'); ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php include views('/admin//nav.php');


        ?>


        <!-- End Navbar -->
        <?php foreach ($hotels as $hotel) :   ?>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Edit <?= $hotel['name']  ?> </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">


                                    <tbody>




                                        <form method="post">



                                            <?php
                                                $config = include views("/config.php");
                                                $class = new Database($config['database']);

                                                $honame = $hotel['name'];
                                                $hoId = $hotel['id'];
                                                
                                                $query = "SELECT * FROM `facility` WHERE `hotelId` = '$hoId'";
                                                $facilitys = $class->query($query)->fetchAll();


                                                foreach ($facilitys as $facility) {
                                                }


                                                ?>


                                            <?php if (!isset($facility['facility1'])) : ?>

                                            <div class="px-2 py-1 d-block">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p> facility</p>
                                                </div>


                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="facility1" value="FREE WIFI">

                                                            <input type="hidden" name="hotelId"
                                                                value="<?= $hotel['id'] ?>">
                                                            <label class="form-check-label">
                                                                FREE WIFI
                                                            </label>
                                                <tr>
                                                    <td>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="facility2"
                                                    value="SPA">
                                                <label class="form-check-label">
                                                    SPA
                                                </label>
                                            </div>
                                            </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="facility3"
                                                            value="PARKING">
                                                        <label class="form-check-label">
                                                            PARKING
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="facility4"
                                                            value="SWIMMING">
                                                        <label class="form-check-label">
                                                            SWIMMING
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="facility5"
                                                            value="TRAVEL">
                                                        <label class="form-check-label">
                                                            TRAVEL
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="facility6"
                                                            value="PLACE">
                                                        <label class="form-check-label">
                                                            PLACE
                                                        </label>
                                                    </div>
                                            </tr>
                                            </td>
                            </div>

                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <button name="add_facility" class="btn btn-success" type="submit">
                                            Update</button>
                                    </div>
                                </td>

                            </tr>
                            </form>


                        </div>





                        <?php else : ?>


                        <tr>
                            <td class="d-flex ">



                                <?php foreach ($facilitys as $facility) {
                                                    }

                                                    if ($facility['facility1'] == '0') {
                                                        $facility1 = null;
                                                        $fac1 = null;
                                                    } else {
                                                        $facility1 = $facility['facility1'];
                                                        $fac1 = '<button class="btn btn-outline-success">' . $facility1 . '</button>';
                                                    }
                                                    if ($facility['facility2'] == '0') {
                                                        $facility2 = null;
                                                    } else {
                                                        $facility2 = $facility['facility2'];
                                                        $fac2 = '<button class="btn btn-outline-success">' . $facility2 . '</button>';
                                                    }
                                                    if ($facility['facility3'] == '0') {
                                                        $facility3 = null;
                                                    } else {
                                                        $facility3 = $facility['facility3'];
                                                        $fac3 = '<button class="btn btn-outline-success">' . $facility3 . '</button>';
                                                    }
                                                    if ($facility['facility4'] == '0') {
                                                        $facility4 = null;
                                                    } else {
                                                        $facility4 = $facility['facility4'];
                                                        $fac4 = '<button class="btn btn-outline-success">' . $facility4 . '</button>';
                                                    }
                                                    if ($facility['facility5'] == '0') {
                                                        $facility5 = null;
                                                    } else {
                                                        $facility5 = $facility['facility5'];
                                                        $fac5 = '<button class="btn btn-outline-success">' . $facility5 . '</button>';
                                                    }
                                                    if ($facility['facility6'] == '0') {
                                                        $facility6 = null;
                                                    } else {
                                                        $facility6 = $facility['facility6'];
                                                        $fac6 = '<button class="btn btn-outline-success">' . $facility6 . '</button>';
                                                    }
                                    ?>


                                <?php


                                                    echo $fac1;
                                                    echo $fac2;
                                                    echo $fac3;
                                                    echo $fac4;
                                                    echo $fac5;
                                                    echo $fac6;



                                    ?>






                            </td>
                        </tr>

                        <tr class="d-block >
                            <td ">



                            <?php foreach ($facilitys as $facility) {
                                                    }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <button type="button" class="btn btn-success"> Edit facility </button>
                            </td>
                        </tr>
                        <?php endif ?>


                        <form class="form" method="post" enctype="multipart/form-data">


                            <tr>

                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="assets/img/hotels/<?= $hotel['image'] ?> "
                                                class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <input class="form-control" type="file" name="image" id=""
                                                value="<?= $hotel['image1'] ?> ">
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="assets/img/hotels/<?= $hotel['image1'] ?> "
                                                class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <input class="form-control" type="file" name="image1" id=""
                                                value="<?= $hotel['image1'] ?> ">
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="assets/img/hotels/<?= $hotel['image2'] ?> "
                                                class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <input class="form-control" type="file" name="image2" id=""
                                                value="<?= $hotel['image2'] ?> ">
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="assets/img/hotels/<?= $hotel['image3'] ?> "
                                                class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <input class="form-control" type="file" name="image3" id=""
                                                value="<?= $hotel['image3'] ?> ">
                                        </div>
                                    </div>
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="assets/img/hotels/<?= $hotel['image4'] ?> "
                                                class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <input class="form-control" type="file" name="image4" id=""
                                                value="<?= $hotel['image4'] ?> ">
                                        </div>
                                    </div>
                                </td>

                            </tr>


                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <button name="imageUpdate" class="btn btn-success" type="submit">
                                            Update</button> </button>
                                    </div>
                                </td>

                            </tr>

                        </form>


                        <form class="form" method="post">

                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <p> name</p> </a>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <input style="border: solid 1px;" class="form-control border-primary"
                                                    type="text" name="name" value="<?= $hotel['name'] ?> ">
                                            </div>
                                        </div>
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <p> email</p> </a>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <input style="border: solid 1px;" class="form-control border-primary"
                                                    type="text" name="email" value="<?= $hotel['email'] ?> ">
                                            </div>
                                        </div>
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>

                                            <div class="d-flex flex-column justify-content-center">
                                                <p>description</p>
                                                <textarea style="border: solid 1px;" cols="50" rows="10"
                                                    class="form-control border-primary w-200" type="text"
                                                    name="description"><?= $hotel['description'] ?></textarea>
                                            </div>
                                        </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <p> Web address</p> </a>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <input style="border: solid 1px;" class="form-control border-primary"
                                                    type="text" name="url" value="<?= $hotel['url'] ?> ">
                                            </div>
                                        </div>
                                </td>

                            </tr>

                            <tr title="hotel address ">
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>

                                            <div class="d-flex flex-column justify-content-center">
                                                <p>hotel address</p>
                                                <input style="border: solid 1px;"
                                                    value="<?= $hotel['placeAddressURL'] ?> "
                                                    class="form-control border-primary w-100 " type="text"
                                                    name="hotelAddress">
                                            </div>
                                        </div>
                                </td>
                            </tr>



                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <button name="update" class="btn btn-success" type="submit">
                                            Update</button> </button>
                                    </div>
                                </td>
                            </tr>

                        </form>
                        <?php endforeach;  ?>

                        <td class="align-middle"> </td>
                        <td class="align-middle"></td>

                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>

        </form>
        </div>
    </main>
    <?php include "setting.php"; ?>
</body>

</html>