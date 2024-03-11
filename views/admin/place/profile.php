<?php include views('/admin//header.php'); ?>

<body class="g-sidenav-show bg-gray-200">
    <?php include views('/admin//sidenav.php'); ?>

    <div class="main-content position-relative max-height-vh-100 h-100">
        <!-- Navbar -->

        <?php include views('/admin//nav.php');

        ?>




        <?php foreach ($places as $place) :   ?>



        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-dark-blue  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="assets/img/places/<?= $place['image1'] ?> " alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                <?php echo $place['name']  ?>
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                            </p>
                        </div>
                    </div>

                </div>
                <?php endforeach; ?>
                <a href="editPlace?id=<?= $place['id'] ?>">
                    <button title="edit" class="badge border-0  badge-sm bg-gradient-success"> Edit
                    </button>
                </a>
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0"> Description </h6>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="javascript:;">
                                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit Profile"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-sm">
                                <?php echo $place['description'] ?>
                            <form>
                                <input class="inp" style="display: none;" type="text"
                                    value=" <?php echo $place['description'] ?>">
                            </form>
                            <a href="javascript:;">
                                <i onclick="document.querySelector('.inp').style.display = 'block'"
                                    class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Edit Description"></i>
                            </a>
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
                            <?php echo $place['name'] ?> </li>

                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"> Upload
                                Date</strong> :
                            </strong> <?php echo $place['date'] ?>
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"> Additional
                                Information </strong> :
                            </strong> <?php echo $place['additionalUrl'] ?>
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"> Additional
                                Information </strong> :
                            </strong> <?php echo $place['placeAddressURL'] ?>
                        </li>
                    </ul>

                </div>
                <pre></pre>



                <div class="mb-5 ps-3">
                    <h6 class="mb-1">Images</h6>
                </div>
                <div class="row">

                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="card-header p-0 mt-n4 mx-3">
                                <a class="d-block shadow-xl border-radius-xl">
                                    <img src="assets/img/places/<?= $place['image1'] ?> " alt="img-blur-shadow"
                                        class="img-fluid shadow border-radius-xl">
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-3 mt-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="card-header p-0 mt-n4 mx-3">
                                <a class="d-block shadow-xl border-radius-xl">
                                    <img src="assets/img/places/<?= $place['image2'] ?> " alt="img-blur-shadow"
                                        class="img-fluid shadow border-radius-xl">
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 mt-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="card-header p-0 mt-n4 mx-3">
                                <a class="d-block shadow-xl border-radius-xl">
                                    <img src="assets/img/places/<?= $place['image3'] ?> " alt="img-blur-shadow"
                                        class="img-fluid shadow border-radius-xl">
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-3 mt-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="card-header p-0 mt-n4 mx-3">
                                <a class="d-block shadow-xl border-radius-xl">
                                    <img src="assets/img/places/<?= $place['image4'] ?> " alt="img-blur-shadow"
                                        class="img-fluid shadow border-radius-xl">
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "setting.php"; ?>
</body>

</html>