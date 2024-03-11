<?php

use Core\Database;

include views('/admin/header.php'); ?>

<body class="g-sidenav-show  bg-gray-200">
    <?php include views('/admin/sidenav.php'); ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include views('/admin/nav.php');
        ?>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Places table</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                places</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Upload date</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                region </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($places as $place) :   ?>

                                            <tr title="<?= $place['name'] ?>">
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="assets/img/places/<?= $place['image1'] ?> " class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <a href="placeProfile?id=<?= $place['id'] ?>" class="mb-0 text-sm"><?= $place['name'] ?></a>
                                                            <p class="text-xs text-secondary mb-0">
                                                                <?php
                                                                $id = $place['id'] ?></p>

                                                        </div>
                                                    </div>
                                                </td>


                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs  font-weight-bold"><?= $place['date'] ?></span>
                                                </td>


                                                <td title="region" class="align-middle text-center">

                                                    <span class="text-secondary text-xs text-uppercase font-weight-bold">
                                                        <a href="#"> <?php


                                                                        $config = include views("/config.php");
                                                                        $class = new Database($config['database']);


                                                                        $regionsName = $class->query('select * from region where id = :id', ['id' => $place['regionId']])->fetchAll();
                                                                        foreach ($regionsName as $regions) {
                                                                            echo $regions['name'];
                                                                        }

                                                                        ?></a></span>

                                                </td>

                                                <td class="align-middle">
                                                    <a href="editPlace?id=<?= $place['id'] ?>">
                                                        <button title="edit" class="badge border-0  badge-sm bg-gradient-success"> Edit
                                                        </button>
                                                    </a>
                                                </td>

                                                <td class="align-middle">

                                                    <form class="align-middle" method="post" enctype="multipart/form-data" action="delete">
                                                        <input type="hidden" name="placeId" value="<?= $place['id'] ?>">
                                                        <button title="Delete '<?= $place['name'] ?>'" class="badge border-0  badge-sm bg-gradient-danger" type="submit" name="deletePlace"> Delete
                                                        </button>
                                                    </form>


                                                </td>

                                            </tr>
                                        <?php endforeach;  ?>
                                        <td class="align-middle"> </td>
                                        <td class="align-middle " title="add a new place"> <a href="createPlace" style="margin-left: -100px;" class="fs-2 fw-bold">
                                                +</a>
                                        </td>
                                        <td class="align-middle"></td>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>
</body>

</html>