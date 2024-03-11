<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php
    include 'nav.php';



    ?>

    <body class="g-sidenav-show  bg-gray-100">
        <main class="main-content border-radius-lg ">
            <div class="container-fluid py-4">
                <h6>Hello <?= $user['name'] ?> Welcome back your dashboard
                </h6>
                <div class="row">
                    <div class="col-lg-7 position-relative z-index-2">
                        <div class="card card-plain mb-4">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="d-flex flex-column h-100">
                                            <h2 class="font-weight-bolder mb-0">General Statistics</h2>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-5 col-sm-5">
                                <div class="card  mb-2">
                                    <div class="card-header p-3 pt-2">
                                        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 w-25 position-absolute ">
                                            <i>
                                                <a href="placeTable" style="color: white;" title="places">Places</a>
                                            </i>
                                        </div>
                                        <div class="text-end pt-1">
                                            <p class="text-sm mb-0 text-capitalize">place</p>
                                            <h4 class="mb-0"><?php foreach ($places as $place) {
                                                                    echo $place['COUNT(*)'];
                                                                }  ?></h4>
                                        </div>
                                    </div>
                                    <hr class="dark horizontal my-0">
                                </div>
                            </div>

                            <div class="col-lg-5 col-sm-5">
                                <div class="card  mb-2">
                                    <div class="card-header p-3 pt-2">
                                        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 w-25 position-absolute ">
                                            <i> <a href="hotelTable" title="hotels" style="color: white;"> Hotels
                                                </a> </i>
                                        </div>
                                        <div class="text-end pt-1">
                                            <p class="text-sm mb-0 text-capitalize">hotel</p>
                                            <h4 class="mb-0"><?php foreach ($hotels as $hotel) {
                                                                    echo $hotel['COUNT(*)'];
                                                                }  ?></h4>
                                        </div>
                                    </div>
                                    <hr class="dark horizontal my-0">
                                </div>
                            </div>


                            <div class="col-lg-5 col-sm-5">
                                <div class="card  mb-2">
                                    <div class="card-header p-3 pt-2">
                                        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4  w-25 position-absolute">
                                            <i> <a href="userTable" style="color: white;">Users </a></i>
                                        </div>
                                        <div class="text-end pt-1">
                                            <p class="text-sm mb-0 text-capitalize  " title="user">Users</p>
                                            <h4 class="mb-0">
                                                <?php foreach ($users as $user) {
                                                    echo $usenum = $user['COUNT(*)'];
                                                }  ?></h4>
                                        </div>
                                    </div>
                                    <hr class="dark horizontal my-0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include "setting.php"; ?>
    </body>

</main>