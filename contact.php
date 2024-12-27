<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL Melissa - LIÊN HỆ</title>
    <?php require('inc/links.php'); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


</head>
<body class="bg-light">
<?php require('inc/header.php'); ?>

<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">Liên Hệ Với Chúng Tôi</h2>
  <div class="h-line bg-dark"></div>
  <p class="text-center mt-3">Melissa Hotel Nha Trang là một khách sạn nằm trong khu vực an ninh, toạ lạc tại Lộc Thọ. Quầy tiếp tân 24 giờ
  luôn sẵn sàng phục vụ quý khách từ thủ tục nhận phòng đến trả phòng hay bất kỳ yêu cầu nào.</p>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4">
            <iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50862.8311230685!2d105.66635328703731!3d18.6459238821255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139cddf0bf20f23%3A0x86154b56a284fa6d!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBWaW5o!5e0!3m2!1svi!2s!4v1732034193253!5m2!1svi!2s" loading="lazy"></iframe>
              <h5>Địa chỉ</h5>
        <a href="<?php echo $contact_r['pn1']?>" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
          <i class="bi bi-geo-alt-fill"></i>  <?php echo $contact_r['address']?>
        </a>
    
        <h5 class="mt-4">Call us</h5>
          <a href="tel:+<?php echo $contact_r['address']?>" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i> <?php echo $contact_r['pn1']?>
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

          <h5 class="mt-4">Email</h5>
          <a href="mailto: <?php echo $contact_r['email']?>" class="d-inline-block text-decoration-none text-dark">
          <i class="bi bi-envelope-fill"></i> <?php echo $contact_r['email']?>
          </a>

          <h5 class="mt-4">Follow us</h5>
          <?php
          if($contact_r['tw']!=''){
            echo<<<data
              <a href="$contact_r[tw]" class="d-inline-block text-dark fs-5 me-2">
                <i class="bi bi-twitter me-1"></i> 
              </a>
            data;
          }
          ?>
          <
          <a href="<?php echo $contact_r['fb']?>" class="d-inline-block text-dark fs-5 me-2">
              <i class="bi bi-facebook me-1"></i>
          </a>
          <a href="<?php echo $contact_r['insta']?>" class="d-inline-block text-dark fs-5">
          <i class="bi bi-instagram me-1"></i> 
          </a>
        </div>
      </div>

    <div class="col-lg-6 col-md-6 px-4">
      <div class="bg-white rounded shadow p-4">
              <form method="POST">
                <h5>Gửi Tin Nhắn</h5>
                <div class="mt-3">
                  <label class="form-label" style="font-weight: 500">Tên</label>
                 <input name="name" required type="text" class="form-control shadow-none">
                </div>

                <div class="mt-3">
                  <label class="form-label" style="font-weight: 500">Email</label>
                 <input name="email" required type="email" class="form-control shadow-none">
                </div>

                <div class="mt-3">
                  <label class="form-label" style="font-weight: 500">Subject</label>
                 <input name="subject" required type="text" class="form-control shadow-none">
                </div>


                <div class="mt-3">
                  <label class="form-label" style="font-weight: 500">Tin Nhắn</label>
                 <textarea name="message" required class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
                </div>
                <button type="submit" name="send" class="btn text-white custom-bg mt-3">Gửi Chúng Tôi</button>
              </form>
      </div>
    </div>
  </div>
</div>

<?php

    if(isset($_POST['send']))
    {
      $frm_data = filteration($_POST);

      $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
      $values = [$frm_data['name'],$frm_data['email'],$frm_data['subject'],$frm_data['message']];

      $res = insert($q,$values,'ssss');
      if($res==1){
        alert('success','đã được gửi!');
      }
      else{
          alert('error','Máy chủ đang gặp sự cố! Vui lòng thử lại sau.' );
        }
    }
?>

 <?php require('inc/footer.php'); ?>


</body>
</html>