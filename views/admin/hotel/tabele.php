<?php

use Core\Database;

include views('/admin/header.php'); ?>

<body class="g-sidenav-show  bg-gray-200">
    <?php include views('/admin/sidenav.php'); ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include views('/admin//nav.php');
        ?>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Hotel table</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Hotels</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Upload date</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                by who </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                active
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($hotels as $hotel) :   ?>

                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="assets/img/hotels/<?= $hotel['image'] ?> "
                                                            class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href="hotelProfile?Hotelid=<?= $hotel['id'] ?>"
                                                            title="<?= $hotel['name'] ?>"
                                                            class="mb-0 text-sm"><?= $hotel['name'] ?></a>
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

                                            <td class="align-middle text-center">

                                                <?php


                                                    $config = include views("/config.php");
                                                    $class = new Database($config['database']);


                                                    $userId = $hotel['adminId'];
                                                    $user = $class->query("SELECT * FROM `user` where id = $userId")->fetch(PDO::FETCH_ASSOC);
                                                    ?> <a href="userprofile?id=<?= $user['id'] ?>"
                                                    title="<?= $user['name'] ?>">
                                                    <div>
                                                        <img src="assets/img/user/<?= $user['profileImage'] ?>"
                                                            class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                    </div>
                                                </a>


                                            </td>
                                            <?php

                                                if ($hotel['active'] == 1) {
                                                    $active =  'active';
                                                    $activeColor = 'success';
                                                    $activeHotel = 0;
                                                } else {
                                                    $active =  'disactive';
                                                    $activeColor = 'secondary';
                                                    $activeHotel = 1;
                                                }
                                                ?>
                                            <td class="align-middle">
                                                <form method="post">
                                                    <input type="hidden" name="active" value="<?= $activeHotel ?>">
                                                    <input type="hidden" name="hoId" value="<?= $hotel['id'] ?>">
                                                    <button type="submit" name="activeBtn"
                                                        class=" badge border-0 badge-sm bg-gradient-<?= $activeColor ?>">
                                                        <?= $active ?>
                                                    </button>
                                                </form>

                                            </td>
                                            <td class="align-middle">
                                                <a class="" href="editHotel?id=<?= $hotel['id'] ?>">
                                                    <button title="Edit '<?= $hotel['name'] ?>'" class=" badge border-0
                                                        badge-sm bg-gradient-success"> Edit
                                                    </button></a>
                                            </td>

                                            <td class="align-middle">

                                                <form class="align-middle" method="post" enctype="multipart/form-data"
                                                    action="delete">
                                                    <input type="hidden" name="hotelId" value="<?= $hotel['id'] ?>">
                                                    <button title="Delete '<?= $hotel['name'] ?>' "
                                                        class="badge border-0  badge-sm bg-gradient-danger"
                                                        type="submit" name="deleteHotel"> Delete
                                                    </button>
                                                </form>
                                        </tr>
                                        <?php endforeach;  ?>
                                        <td class="align-middle"> </td>
                                        <td class="align-middle "> <a href="createHotel" style="margin-right:-120px ;"
                                                title="creat a hotel" class="fs-2 fw-bold">
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
    <?php include "views/admin//setting.php"; ?>
</body>

</html>