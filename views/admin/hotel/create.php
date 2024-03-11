<?php include views("/admin/header.php"); ?>
<?php include views ("/admin/nav.php"); ?>
<html>

    <head>

        <link href="./assets/css/style.css" rel="stylesheet" />
        <title>hotel</title>
    </head>

    <body>
        <div class="containerad">


            <div class="userpost">
                <div class="input-group input-group-outline my-3">
                    <p class="text-red text-xs" style="color:red; ">
                        <?= $error['erorr'] ?></p>

                    <form method="post" enctype="multipart/form-data" role="form" class="text-start">

                        <p class="text-red text-xs" style="color:red; ">
                            <?= $error['hotelName'] ?></p>

                        <div class=" input-group input-group-outline my-3">
                            <label class="form-label" for="hoteName">Hotel Name</label>
                            <input type="text" name="hotelName" id="tourName" value="<?= $_POST['hotelName'] ?>"
                                class="form-control">
                        </div>

                        <p class="text-red text-xs" style="color:red; ">
                            <?= $error['email'] ?></p>

                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="email" id="email" value="<?= $_POST['email'] ?>"
                                class="form-control">
                        </div>
                        <p class="text-red text-xs" style="color:red; ">
                            <?= $error['location'] ?></p>

                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for="location">Location</label>
                            <input type="url" name="location" id="location" value="<?= $_POST['location'] ?>"
                                class="form-control">
                        </div>
                        <p class="text-red text-xs" style="color:red; ">
                            <?= $error['url'] ?></p>

                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for="URL"> Hotel URL </label>
                            <input type="url" value="<?= $_POST['url'] ?>" name="url" id="URL" class="form-control">
                        </div>

                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for="image"> </label>
                            <input type="file" name="image" accept="image/png" id="image" class="form-control">
                        </div>

                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for="image"> </label>
                            <input type="file" name="image1" id="image" class="form-control">
                        </div>

                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for="image"> </label>
                            <input type="file" name="image2" id="image" class="form-control">
                        </div>

                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for="image"> </label>
                            <input type="file" name="image3" id="image" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for="image"> </label>
                            <input type="file" name="image4" id="image" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <select name="placelId" class="form-control">
                                <?php foreach ($places as $place) : {
                                } ?>
                                <option value="<?= $place['id'] ?>"><?= $place['name'] ?></option>
                                <?php endforeach; ?>
                            </select>


                        </div>

                        <p class="text-red text-xs" style="color:red; ">
                            <?= $error['Description'] ?></p>

                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for="Description"> </label>
                            <textarea name="Description" id="Description" placeholder="Description"
                                class="form-control"></textarea>
                        </div>
                        <button type="submit" name="hotelUpload" class="btn bg-gradient-success w-100 my-4 mb-2"> upload
                        </button>
                </div>


                </form>
            </div>
        </div>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="assets/js/material-dashboard.min.js?v=3.1.0"></script>
    </body>

</html>