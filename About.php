<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL Melissa - VỀ CHÚNG TÔi</title>
    <?php require('inc/links.php'); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        .box{
          border-top-color:var(--teal) !important;
          width: 310px;

        }
    </style>
</head>
<body class="bg-light">
<?php require('inc/header.php'); ?>

<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">VỀ CHÚNG TÔI</h2>
  <div class="h-line bg-dark"></div>
  <p class="text-center mt-3">Melissa Hotel Nha Trang là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Lộc Thọ. Quầy tiếp tân 24 giờ <br> luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. </p>
</div>


<div class="container">
  <div class="row justify-content-betweeen align-items-center">
    <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
      <h3 class="mb-3">Melissa Hotel Nha Trang</h3>
      <p>
        Melissa Hotel Nha Trang là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Lộc
        Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào. Nếu cần giúp đỡ xin hãy liên hệ đội ngũ tiếp tân, chúng tôi luôn sẵn sàng hỗ trợ quý khách
      </p>
    </div>
    <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
        <img src="images/about/about.jpg" class="w-100">
    </div>
  </div>
</div>


<div class="container mt-5">
  <div class="row">
    <div class="col-lg-3 mol-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box ">
        <img src="images/about/hotel.svg" width="70px">
        <h4 class="mt-3">50+ Phòng</h4>
      </div>
    </div>



    <div class="col-lg-3 mol-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box ">
        <img src="images/about/customers.svg" width="70px">
        <h4 class="mt-3">9 Khách Hàng</h4>
      </div>
    </div>




    <div class="col-lg-3 mol-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box ">
        <img src="images/about/rating.svg" width="70px">
        <h4 class="mt-3">100+ Đánh Giá</h4>
      </div>
    </div>





    <div class="col-lg-3 mol-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box ">
        <img src="images/about/staff.svg" width="70px">
        <h4 class="mt-3">50 Nhân Viên</h4>
      </div>
    </div>
  </div>
</div>

    <h3 class="my-5 fw-bold h-font text-center">NHÓM QUẢN LÝ</h3>
    <div class="container px-4">
    <div class="swiper mySwiper">
    <div class="swiper-wrapper mb-5">
    <?php
          $about_r = selectAll('team_details');
          $path=ABOUT_IMG_PATH;
          while ($row = mysqli_fetch_assoc($about_r)){
            echo<<<data
              <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="$path$row[picture]" class="W-100">
                <h5 class="mt-2">$row[name]</h5>
              </div>
            data;
          }

        ?>

      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="images/about/ava5.jpg" class="w-100">
        <h5 class="mt-2">VĂN LINH</h5>
      </div>


      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="images/about/ava5.jpg" class="w-100">
        <h5 class="mt-2">VĂN LINH</h5>
      </div>

      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="images/about/ava5.jpg" class="w-100">
        <h5 class="mt-2">VĂN LINH</h5>
      </div>

      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="images/about/ava5.jpg" class="w-100">
        <h5 class="mt-2">VĂN LINH</h5>
      </div>

      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="images/about/ava5.jpg" class="w-100">
        <h5 class="mt-2">VĂN LINH</h5>
      </div>

      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="images/about/ava5.jpg" class="w-100">
        <h5 class="mt-2">VĂN LINH</h5>
      </div>

      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="images/about/ava5.jpg" class="w-100">
        <h5 class="mt-2">VĂN LINH</h5>
      </div>


    </div>
    <div class="swiper-pagination"></div>
  </div>

    </div>


 <?php require('inc/footer.php'); ?>
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  var swiper = new Swiper(".mySwiper", {
    spaceBetween: 40,
    pagination: {
      el: ".swiper-pagination",
    },
    breakpoints:{
        320: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 3,
        },
        1024: {
          slidesPerView: 3,
        },
      }
  });
</script>

</body>
</html>