<html>

    <?php include "views/admin//header.php"; ?>
    <?php include "views/admin//nav.php"; ?>

    <link href="assets/css/style.css" rel="stylesheet" />

    <body>
        <div class="containerad">
            <div class="userpost">
                <div class="input-group input-group-outline my-3">

                    <form method="post" enctype="multipart/form-data" role="form" class="text-start">

                        <p style="color: red;"> <?= $error['name'] ?> </p>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for="tourName">tour place name</label>
                            <input type="text" name="name" id="tourName" class="form-control">
                        </div>

                        <p style="color: red;"> <?= $error['location'] ?> </p>

                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for="tourLocation">tour place Location</label>
                            <input type="url" name="location" id="tourLocation" class="form-control">
                        </div>

                        <p style="color: red;"> <?= $error['addition'] ?> </p>

                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for="refrainsAddress"> additional information </label>
                            <input type="url" name="addition" id="refrainsAddress" class="form-control">
                        </div>

                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for="image"> </label>
                            <input type="file" name="image" id="image" class="form-control">
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
                            <select title="Region" name="region" class="form-control">
                                <?php $query = "SELECT * FROM `region`";
                            $regions = $class->query($query)->fetchAll();
                            foreach ($regions as $region) :
                            ?>
                                <option value="<?= $region['id'] ?>"> <?= $region['name'] ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <p style="color: red;"> <?= $error['description'] ?> </p>

                        <div class="input-group input-group-outline my-3">
                            <label class="form-label" for="TDescription"> </label>
                            <textarea name="description" placeholder="Descriotion" id="TDescription"
                                class="form-control"
                                oninput="document.querySelector('.type').innerHTML = this.value "><?php if (isset($_POST['name'])) {
                                                                                                                                                                                            echo $_POST['description'];
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo '';
                                                                                                                                                                                        } ?></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="create" class="btn bg-gradient-success w-100 my-4 mb-2">
                                upload
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
            <script async defer src="https://buttons.github.io/buttons.js"></script>
            <script src="assets/js/material-dashboard.min.js?v=3.1.0"></script>


    </body>

</html>