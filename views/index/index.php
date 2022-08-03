<!DOCTYPE html>
<html class="no-js" lang="en">
<?php
include "head.php";
// Information received from server side when loading page
$category = $data[1];
$username = $data[2];
?>
<body>
<!--<><><><><> header <><><><><>-->
<header>
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <div class="user-info">
                <div class="row">
                    <div class="col-4">
                        <button class="sign-out-user"><i class="fas fa-sign-out-alt"></i></button>
                    </div>
                    <div class="col-8 d-flex align-items-center">
                        <?=$username?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- <><><><><>  select section <><><><><> -->
<section class="main-sec">
    <div class="main-side col-md-4">
        <!-- <><><><><>  title <><><><><> -->
        <h1 class="page-title text-center mb-3 mb-md-5">Get data and change it using RestAPI</h1>
        <!-- <><><><><>  select section <><><><><> -->
        <div class="row mb-3 mb-md-5">
            <div class="col-12">
                <div class="select">
                    <select name="categoryBox" id="categoryBox" tabindex="1">\
                        <?php foreach ($category as $value) { ?>
                            <option value="<?= $value['id'] ?>">category <?= $value['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <!-- <><><><><> END  select section <><><><><> -->
        <!-- <><><><><>  counter section <><><><><> -->
        <div class="row mt-2 mt-md-5">
            <div class="col-12 d-flex ">

                <div class="counter">
                    <button class="decrease"><i class="fas fa-minus"></i></button>
                    <input type="number" class="num" value="<?= $category[0]['number'] ?>">
                    <button class="increase"><i class="fas fa-plus"></i></button>
                </div>
            </div>
        </div>
        <!-- <><><><><> END  counter section <><><><><> -->
    </div>
</section>
<!-- <><><><><> END  select section <><><><><> -->
</body>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="public/js/jquery.selectbox-0.2.min.js"></script>
<script type="text/javascript" src="public/js/js.js"></script>
</html>