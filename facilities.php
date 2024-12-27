<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL - CƠ SỞ VẬT CHẤT</title>
    <?php require('inc/links.php'); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <style>
      .pop:hover{
        border-top-color: var(--teal) !important;
        transform: scale(1.03);
        transition: all 0.3s;
      }
    </style>
</head>
<body class="bg-light">
<?php require('inc/header.php'); ?>

<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">CƠ SỞ VẬT CHẤT</h2>
  <div class="h-line bg-dark"></div>
  <p class="text-center mt-3">Melissa Hotel Nha Trang là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Lộc Thọ. Quầy tiếp tân 24 giờ
  luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào.</p>
</div>

<div class="container">
  <div class="row">
    <?php
      $res = selectAll('facilities');
      $path = FACILITIES_IMG_PATH;

      while($row = mysqli_fetch_assoc($res)){
        echo<<<data
          <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
              <div class="d-flex align-items-center mb-2">
              <img src="$path$row[icon]" width="40px">
              <h5 class="m-0 ms-3">$row[name]</h5>
              </div>
              <p>$row[description]</p>
            </div>
          </div>
        data;
      }
    ?>
    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex align-items-center mb-2">
        <img src="images/facilities/IMG_43553.svg" width="40px">
        <h5 class="m-0 ms-3">Wifi</h5>
        </div>
        <p>Melissa Hotel Nha Trang là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Lộc Thọ. Quầy tiếp tân 24 giờ luôn </p>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex align-items-center mb-2">
        <img src="images/facilities/IMG_27079.svg" width="40px">
        <h5 class="m-0 ms-3">Nóng Lạnh</h5>
        </div>
        <p>Melissa Hotel Nha Trang là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Lộc Thọ. Quầy tiếp tân 24 giờ luôn </p>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex align-items-center mb-2">
        <img src="images/facilities/IMG_41622.svg" width="40px">
        <h5 class="m-0 ms-3">T.V</h5>
        </div>
        <p>Melissa Hotel Nha Trang là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Lộc Thọ. Quầy tiếp tân 24 giờ luôn </p>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex align-items-center mb-2">
        <img src="images/facilities/IMG_47816.svg" width="40px">
        <h5 class="m-0 ms-3">Spa</h5>
        </div>
        <p>Melissa Hotel Nha Trang là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Lộc Thọ. Quầy tiếp tân 24 giờ luôn </p>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex align-items-center mb-2">
        <img src="images/facilities/IMG_96423.svg" width="40px">
        <h5 class="m-0 ms-3">Điều Hòa</h5>
        </div>
        <p>Melissa Hotel Nha Trang là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Lộc Thọ. Quầy tiếp tân 24 giờ luôn </p>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
        <div class="d-flex align-items-center mb-2">
        <img src="images/facilities/shopping-svgrepo-com.svg" width="40px">
        <h5 class="m-0 ms-3">Mua Sắm</h5>
        </div>
        <p>Melissa Hotel Nha Trang là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Lộc Thọ. Quầy tiếp tân 24 giờ luôn </p>
      </div>
    </div>
  </div>
</div>

 <?php require('inc/footer.php'); ?>


</body>
</html>