<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL</title>
    <?php require('inc/links.php'); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>

      .availability-form{
        margin-top:-50px ;
        z-index: 2;
        position: relative;
      }

      @media screen and (max-width: 575px) {
        .availability-form{
        margin-top:25 px ;
        padding: 0 35px;

      }
      }
    </style>

</head>
<body class="bg-light">
<?php require('inc/header.php'); ?>

<?php
// Lấy danh sách các phòng
$query = "
    SELECT 
        r.id, 
        r.room_name, 
        r.room_dientich, 
        r.room_price, 
        r.room_img, 
        r.customer_adults, 
        r.customer_children, 
        r.feature_id, 
        r.facility_id
    FROM 
        hotel_rooms r
";

$result = mysqli_query($con, $query);
$rooms = [];

while ($row = mysqli_fetch_assoc($result)) {
    // Lấy danh sách chức năng theo feature_id
    $feature_ids = explode(',', $row['feature_id']);
    $features_query = "SELECT name FROM features WHERE id IN (" . implode(',', $feature_ids) . ")";
    $features_result = mysqli_query($con, $features_query);
    $features = [];
    while ($feature_row = mysqli_fetch_assoc($features_result)) {
        $features[] = $feature_row['name'];
    }

    // Lấy danh sách cơ sở vật chất theo facility_id
    $facility_ids = explode(',', $row['facility_id']);
    $facilities_query = "SELECT name FROM facilities WHERE id IN (" . implode(',', $facility_ids) . ")";
    $facilities_result = mysqli_query($con, $facilities_query);
    $facilities = [];
    while ($facility_row = mysqli_fetch_assoc($facilities_result)) {
        $facilities[] = $facility_row['name'];
    }

    // Gán dữ liệu
    $rooms[] = [
        'id' => $row['id'],
        'room_name' => $row['room_name'],
        'room_dientich' => $row['room_dientich'],
        'room_price' => $row['room_price'],
        'room_img' => $row['room_img'],
        'customer_adults' => $row['customer_adults'],
        'customer_children' => $row['customer_children'],
        'features' => $features,
        'facilities' => $facilities,
    ];
}
?>

<div class="container-fluid px-lg-4 mt-4">
    <div class="swiper swiper-container">
        <div class="swiper-wrapper">
          <?php
            $res = selectAll('carousel');
            while ($row = mysqli_fetch_assoc($res)) 
            {
                $path = CAROUSEL_IMG_PATH;
                echo <<<data
                <div class="swiper-slide">
                <img src="$path$row[image]" class="w-100 d-block">
                  </div>
                data;
            }
          ?>
        </div>
    </div>
</div>

<!-- check -->
<?php require('inc/search.php'); ?>


<!-- Phòng -->
 <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font ">CÁC LOẠI PHÒNG</h2>
 <div class="container">
    <div class="row">
        <?php foreach ($rooms as $room): ?>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                  <a href="">
                    <img src="images/uploads/rooms/<?php echo $room['room_img']; ?>" class="card-img-top">
                  </a>
                    <div class="card-body">
                        <a href="room-detail.php?id=<?php echo $room['id'] ?>" style="text-decoration:none; color:black">
                          <h5><?php echo $room['room_name']; ?></h5>
                        </a>
                        <h6 class="mb-4"><?php echo number_format($room['room_price'], 0, ',', '.') . ' VNĐ một đêm'; ?></h6>

                        <div class="features mb-4">
                            <h6 class="mb-1">Chức Năng</h6>
                            <?php foreach ($room['features'] as $feature): ?>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    <?php echo $feature; ?>
                                </span>
                            <?php endforeach; ?>
                        </div>

                        <div class="facilities mb-4">
                            <h6 class="mb-1">Cơ Sở Vật Chất</h6>
                            <?php foreach ($room['facilities'] as $facility): ?>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    <?php echo $facility; ?>
                                </span>
                            <?php endforeach; ?>
                        </div>

                        <div class="guests mb-4">
                            <h6 class="mb-1">Khách Hàng</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <?php echo $room['customer_adults']; ?> Người Lớn
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <?php echo $room['customer_children']; ?> Trẻ Em
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<!-- dịch vụ -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font ">CÁC LOẠI DỊCH VỤ</h2>
<div class="container">
  <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">

      <?php
      $sql = "SELECT * FROM facilities";
      $result = $con->query($sql);

      // Hiển thị dữ liệu
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo '
              <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                  <img src="images/facilities/' . htmlspecialchars($row['icon']) . '" width="80px">
                  <h5 class="mt-3">' . htmlspecialchars($row['name']) . '</h5>
              </div>
              ';
          }
      } else {
          echo "<p>Không có dữ liệu nào trong bảng facilities.</p>";
      }
      ?>
      <div class="col-lg-12 text-center mt-5">
        <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Xem Thêm</a>
      </div>
  </div>
</div>





<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font ">ĐÁNH GIÁ</h2>
<?php

// Lấy ID từ URL
$room_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Truy vấn danh sách bình luận
$sql = "SELECT * FROM comments";
$stmt = $con->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="container mt-5">
    <div class="swiper swiper-testimonials">
        <div class="swiper-wrapper mb-5">
            <?php
            if ($result->num_rows > 0) {
                // Lặp qua từng bình luận
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="swiper-slide bg-white p-4">
                        <div class="profile d-flex align-items-center mb-3">
                            <img src="images/features/rocket-spaceship-start-svgrepo-com.svg" width="70px">
                            <h6 class="m-0 ms-2"><?= htmlspecialchars($row['name']) ?></h6>
                        </div>
                        <p><?= nl2br(htmlspecialchars($row['comment'])) ?></p>
                    </div>
                    <?php
                }
            } else {
                echo "<p>Chưa có bình luận nào cho phòng này.</p>";
            }
            ?>
        </div>  
        <div class="swiper-pagination"></div>
    </div>
    <div class="col-lg-12 text-center mt-5">
        <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Xem Thêm</a>
    </div>
</div>



<!-- Liên hệ -->

<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font ">LIÊN HỆ VỚI CHÚNG TÔI</h2>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-8 order-lg-1 p-5 mb-lg-0 mb-3 bg-white rounded">
      <iframe width="100%" height="400px" class="rounded" src="<?php echo $contact_r['iframe'] ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
      
   <div class="col-lg-4 col-md-4 ">
    <div class="bg-white p-4 rounded mb-4">
      <h5>Call us</h5>
      <a href="tel:+<?php echo $contact_r['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
        <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn1'] ?>
      </a>
      <br>
      <?php
        if($contact_r['pn2']!=''){
          echo<<<data
          <a href="tel:+$contact_r[pn2]" class="d-inline-block text-decoration-none text-dark">
             <i class="bi bi-telephone-fill"></i> +$contact_r[pn2]
          </a>
          data;
        }
      ?> 
    </div>

      <div class="bg-white p-4 rounded mb-4">
        <h5>Follow us</h5>

      <?php
        if($contact_r['tw']!=''){
          echo<<<data
           <a href="$contact_r[tw]" class="d-inline-block mb-3">
             <span class="badge bg-light text-dark fs-6 p-2">
             <i class="bi bi-twitter me-1"></i> Twitter
              </span>
             </a>
           <br>
          data;
        }
      ?>

        <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block mb-3">
          <span class="badge bg-light text-dark fs-6 p-2">
            <i class="bi bi-facebook me-1"></i> Facebook
          </span>
        </a>
        <br>
        <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block">
          <span class="badge bg-light text-dark fs-6 p-2">
            <i class="bi bi-instagram me-1"></i> Instagram
          </span>
        </a>
      </div>
    </div>
  </div>
</div>




 <?php require('inc/footer.php'); ?>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop:true,
        autoplay:{
          delay: 3500,
          disableOnInteraction: false,
        }
    });


    var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView:"3",
      loop: true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
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
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      }
    });
</script>

</body>
</html>