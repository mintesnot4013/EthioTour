<?php include views('/admin//header.php');
?>

<body class="g-sidenav-show  bg-gray-200">
    <?php include views('/admin//sidenav.php'); ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php include views('/admin//nav.php');
        ?>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Places Edit</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">


                                    <tbody>



                                        <form class="form" method="post">
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <?php foreach ($places as $place) {
                                                            $regiId = $place['regionId'];
                                                        }
                                                        foreach ($regionsName as $regions) {
                                                            echo $regions['name'];
                                                        }

                                                        ?>

                                                    </div>
                                                </div>
                                            </td>

                                            <tr>
                                                <td>
                                                    <div class="input-group input-group-outline my-3">

                                                        <select title="Region" name="region" class="form-control">

                                                            <?php
                                                            $config = include views("/config.php");
                                                            $class = new Database($config['database']);

                                                            $regions = $class->query("SELECT * FROM `region`")->fetchAll();

                                                            foreach ($regions as $region) :
                                                            ?>
                                                                <option value="<?= $region['id'] ?>"> <?= $region['name'] ?>
                                                                </option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div> <button name="updateToRegion" class="btn btn-success" type="submit">
                                                        Update region</button>
                                                </td>

                                            </tr>




                                        </form>


                                        <?php foreach ($places as $place) : ?>

                                            <form class="form" method="post" enctype="multipart/form-data">

                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <img src="assets/img/places/<?= $place['image1'] ?> " class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <input class="form-control" type="file" name="image1" id="" value="<?= $place['image1'] ?> ">
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <img src="assets/img/places/<?= $place['image2'] ?> " class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <input class="form-control" type="file" name="image2" id="" value="<?= $place['image2'] ?> ">
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <img src="assets/img/places/<?= $place['image3'] ?> " class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <input class="form-control" type="file" name="image3" id="" value="<?= $place['image3'] ?> ">
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <img src="assets/img/places/<?= $place['image4'] ?> " class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <input class="form-control" type="file" name="image4" id="" value="<?= $place['image4'] ?> ">
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>



                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <button name="imageUpdate" style="border: none;border-radius: 10px; padding:5px;background-color: #009669; color:white;" type="submit">
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
                                                                    <input style="border: solid 1px;" class="form-control border-primary" type="text" name="name" value="<?= $place['name'] ?> ">
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
                                                                    <textarea style="border: solid 1px;" cols="50" rows="10" class="form-control border-primary w-200" type="text" name="description"><?= $place['description'] ?></textarea>
                                                                </div>
                                                            </div>
                                                    </td>
                                                </tr>

                                                <tr title="place address ">
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>

                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <p>place address</p>
                                                                    <input style="border: solid 1px;resize: horizontal;" value="<?= $place['placeAddressURL'] ?><" class="form-control border-primary w-100 " type="text" name="placeAddress">
                                                                </div>
                                                            </div>
                                                    </td>
                                                </tr>

                                                <tr title="additiona information ">
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>

                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <p>additional information</p>
                                                                    <input style="border: solid 1px;" value="<?= $place['additionalUrl'] ?>" class="form-control border-primary w-100 " type="text" name="additionaInformation">
                                                                </div>
                                                            </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <button name="update" style="border: none;border-radius: 10px; padding:5px;background-color: #009669; color:white;" type="submit">
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