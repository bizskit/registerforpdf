<?php 
require('db.php');
require('pdf/fpdf.php');
require('pdf/font/THSarabunNew.php');

// if (isset($_GET['id'])) {
//   $id = intval($_GET['id']);
//   echo $id;
// }else{
//   echo 'No have';
// }
  
//   $stmt = $conn->prepare("SELECT `resume` FROM `job_general` WHERE id = ?");
//   $stmt->bind_param("i", $id);
//   $stmt->execute();
//   $stmt->bind_result($fileName);
//   $stmt->fetch();
  
//   if ($fileName) {
//       header('Content-Type: application/pdf');
//       header('Content-Disposition: inline; filename="' . htmlspecialchars($fileName, ENT_QUOTES, 'UTF-8') . '"');
//       @readfile($fileName);
//   } else {
//       echo "ไม่พบไฟล์ PDF ที่ต้องการ";
//   }
  
//   $stmt->close();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    echo 'No have';
    exit;
}

// เตรียมและรันคำสั่ง SQL เพื่อดึงข้อมูลไฟล์ PDF จากฐานข้อมูล
$stmt = $conn->prepare("SELECT `resume` FROM `job_general` WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($filePath);
$stmt->fetch();

if ($filePath) {
    // ตรวจสอบว่าไฟล์มีอยู่จริงและสามารถเข้าถึงได้
    if (file_exists($filePath)) {
        // แสดงไฟล์ PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . htmlspecialchars(basename($filePath), ENT_QUOTES, 'UTF-8') . '"');
        
        // ปิดการส่งเนื้อหาก่อนหน้า
        ob_clean();
        flush();

        // อ่านและส่งไฟล์ PDF ไปยังเบราว์เซอร์
        readfile($filePath);
    } else {
        echo "ไม่พบไฟล์ PDF ที่ต้องการหรือไม่สามารถเข้าถึงไฟล์ได้";
    }
} else {
    echo "ไม่พบไฟล์ PDF ที่ต้องการ";
}

$stmt->close();
$conn->close();

?>