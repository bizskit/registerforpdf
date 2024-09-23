<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js "></script>
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css " rel="stylesheet">

<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $pf = $_POST['pf'];
  $name = $_POST['name'];
  $sex = $_POST['sex'];
  $birthday = $_POST['birthday'];
  $agree = $_POST['agree'];
  $agg = $_POST['agg'];
  $nationality = $_POST['nationality'];
  $ethnicity = $_POST['ethnicity'];
  $address = $_POST['address'];
  $religion = $_POST['religion'];
  $phone = $_POST['phone'];
  $status = $_POST['status'];
  $degree = $_POST['degree'];
  $nameedu = $_POST['nameedu'];
  $edu = $_POST['edu'];
  $ex = $_POST['ex'];
  $gpa = $_POST['gpa'];
  $personal = $_POST['personal'];
  $positions = $_POST['positions'];
  $personal_firstname = $_POST['personal_firstname'];
  $personal_surname = $_POST['personal_surname'];
  $personal_relation = $_POST['personal_relation'];
  $personal_tel = $_POST['personal_tel'];
  $email = $_POST['email'];


  // Handle image file upload (if provided)
  $upload_dir = __DIR__ . '/uploads/';

  // Create the directory if it doesn't exist
  if (!is_dir($upload_dir)) {
    if (mkdir($upload_dir, 0777, true)) {
      echo "Directory created successfully.";
    } else {
      die("Failed to create directory.");
    }
  }

  // Upload image
  if (is_uploaded_file($_FILES['image']['tmp_name'])) {
    $new_image_name = 'image_' . uniqid() . "." . pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
    $image_upload_path = $upload_dir . $new_image_name;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $image_upload_path)) {
      // echo "Image uploaded successfully to: " . $image_upload_path;
    } else {
      die("Failed to move uploaded file. Check permissions and path.");
    }
  } else {
    $new_image_name = "";
    echo "No image uploaded.";
  }

  // Upload pdf
  if (is_uploaded_file($_FILES['resume']['tmp_name'])) {
    $new_resume_name = 'resume_' . uniqid() . "." . pathinfo(basename($_FILES['resume']['name']), PATHINFO_EXTENSION);
    $resume_upload_path = $upload_dir . $new_resume_name;

    if (move_uploaded_file($_FILES['resume']['tmp_name'], $resume_upload_path)) {
      // echo "Image uploaded successfully to: " . $image_upload_path;
    } else {
      die("Failed to move uploaded file. Check permissions and path.");
    }
  } else {
    $new_resume_name = "";
    echo "No image uploaded.";
  }

  // Insert data into the database
  $sql_insert_register = "INSERT INTO `job_general`(`name`, `sex`, `pf`, `birthday`, `agg`, `nationality`, `ethnicity`, `religion`, `address`, `phone`, `email`, `image`, `edu`, `positions`, `status`, `degree`, `nameedu`, `ex`, `gpa`, `personal`, `personal_firstname`, `personal_surname`, `personal_relation`, `personal_tel`, `resume`) 
    VALUES ('$name','$sex','$pf','$birthday','$agg','$nationality','$ethnicity','$religion','$address','$phone','$email','$new_image_name','$edu','$positions','$status','$degree','$nameedu','$ex','$gpa','$personal','$personal_firstname','$personal_surname','$personal_relation','$personal_tel','$new_resume_name')";

  if (mysqli_query($conn, $sql_insert_register)) {
    $_SESSION['phone'] = $phone;
  }

  echo "<script>
  $(document).ready(function() {
    Swal.fire({
      title: 'บันทึกข้อมูลเรียบร้อย',
      text: 'กดปุ่มเพื่อพิมพ์ใบสมัคร',
      icon: 'success',
      timer: 5000,
      didClose: () => {
        window.location.href = 'prinf.php';
      }
    });
  });
</script>";
} else {
  echo "<script>
        $(document).ready(function() {
          Swal.fire({
            title: 'ผิดผลาด',
            text: 'มีบางอย่างไม่ถูกต้อง',
            icon: 'error',
            timer: '5000',
          });
        });
        </script>";
  header('url=register.php');
}
