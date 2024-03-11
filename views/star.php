<? include "partials/header.php"; ?>
<div class="star">

    <?php
    $idnd = $value['id'];
    $swl = "SELECT SUM(rate) FROM `comment` WHERE hotelId = $idnd";
    foreach ($red as $va) {
        $rate = $va['SUM(rate)'];
        if (empty($rate) or $rate < 10) {
            echo '';
        } elseif ($rate < 20) {
            echo '☆';
        } elseif ($rate < 30) {
            echo '☆☆';
        } elseif ($rate < 40) {
            echo '☆☆☆';
        } elseif ($rate < 50) {
            echo '☆☆☆☆';
        } elseif ($rate < 60) {
            echo '☆☆☆☆☆';
        }
    }
    ?>
    <div class="hover">
        <p> <?= $rate ?> Reviews </p>
    </div>
</div>