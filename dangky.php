<?php
  require('admin/inc/db_config.php');
  require('admin/inc/essentials.php');
// Giả sử bạn đã kết nối với cơ sở dữ liệu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $password = $_POST['password'];


    // Chuẩn bị câu truy vấn để lưu dữ liệu vào cơ sở dữ liệu
    $query = "INSERT INTO users (name, email, phone_number, address, birthdate, password)
              VALUES ('$name', '$email', '$phone_number', '$address', '$birthdate', '$password')";

     // Thực thi câu truy vấn
     if (mysqli_query($con, $query)) {
        // Hiển thị alert bằng JavaScript
        echo "<script>
                alert('Đăng ký thành công!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Lỗi: " . mysqli_error($con) . "');
              </script>";
    }
}
?>
