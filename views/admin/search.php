<?php include views('/admin//header.php'); ?>

<body class="g-sidenav-show  bg-gray-200">

    <?php include views('/admin/sidenav.php'); ?>


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php include views('/admin/nav.php');
        ?>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Search table</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Search</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Upload date</th>
                                            <th class="text-secondary opacity-7"></th>
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
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $place['date'] ?></span>
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

                                        <?php foreach ($hotels as $hotel) :   ?>

                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="assets/img/hotels/<?= $hotel['image'] ?> " class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <a href="hotelProfile?Hotelid=<?= $hotel['id'] ?>" title="<?= $hotel['name'] ?>" class="mb-0 text-sm"><?= $hotel['name'] ?></a>
                                                            <p class="text-xs text-secondary mb-0">
                                                                <?= $hotel['email'] ?>
                                                            </p>

                                                        </div>
                                                    </div>
                                                </td>


                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        <?= $hotel['date'] ?>
                                                    </span>
                                                </td>
                                                <td class="align-middle">
                                                    <a class="" href="editHotel?id=<?= $hotel['id'] ?>">
                                                        <button title="Edit '<?= $hotel['name'] ?>'" class=" badge border-0
                                                        badge-sm bg-gradient-success"> Edit
                                                        </button></a>
                                                </td>
                                                <td class="align-middle">

                                                    <form class="align-middle" method="post" enctype="multipart/form-data" action="delete">
                                                        <input type="hidden" name="hotelId" value="<?= $hotel['id'] ?>">
                                                        <button title="Delete '<?= $hotel['name'] ?>' " class="badge border-0  badge-sm bg-gradient-danger" type="submit" name="deleteHotel"> Delete
                                                        </button>
                                                    </form>
                                            </tr>
                                        <?php endforeach;  ?>
                                        <?php foreach ($users as $user) : ?>

                                            <?php
                                            if ($user['admin'] == 1) {
                                                $admin = 'admin';
                                                $color = 'secondary';
                                                $detete = 'admin';
                                                $cursor = " not-allowed ";
                                                $delete = "userTable";
                                            } elseif ($user['admin'] == 2) {
                                                $admin = 'Hotel admin';
                                                $color = 'success';
                                                $detete = 'Delete';
                                                $cursor = " not-allowed ";
                                                $delete = "delete";
                                            } else {
                                                $admin = 'offline';
                                                $detete = 'Delete';
                                                $color = 'danger';
                                                $cursor = "pointer";
                                                $delete = "delete";
                                            }

                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="assets/img/user/<?= $user['profileImage']; ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <a href="userprofile?id=<?= $user['id'] ?>" class="mb-0 text-sm"><?= $user['name'] ?></a>
                                                            <p class="text-xs text-secondary mb-0">
                                                                <?= $user['email'] ?></p>

                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-secondary"><?= $admin ?></span>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $user['date'] ?></span>
                                                </td>
                                                <td class="align-middle">


                                                    <form class="align-middle" method="post" action="<?= $delete ?>" enctype="multipart/form-data">

                                                        <input type="hidden" name="userId" value="<?= $user['id'] ?>">

                                                        <button style="cursor:<?= $cursor ?>;" class="badge border-0  badge-sm bg-gradient-<?= $color ?>" type="submit" name="deleteUser"> <?= $detete ?>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>
    <?php include "setting.php"; ?>
</body>

</html>