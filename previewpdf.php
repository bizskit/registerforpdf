<?php
// previewpdf.php
require('db.php');

if (isset($_GET['file'])) {
  $file = $_GET['file'];
  $filePath = 'uploads/' . $file;

  if (file_exists($filePath)) {
    $fileUrl = htmlspecialchars($filePath, ENT_QUOTES, 'UTF-8');
  } else {
    die('ไม่พบไฟล์ PDF ที่ต้องการ');
  }
} else {
  die('ไม่ได้ระบุไฟล์ PDF ที่ต้องการ');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Preview PDF</title>
  <style>
    body,
    html {
      margin: 0;
      padding: 0;
      height: 100%;
      width: 100%;
      overflow: hidden;
    }

    .pdf-container {
      height: 100%;
      width: 100%;
    }
  </style>
</head>

<body>
  <div class="pdf-container">
    <embed src="<?= $fileUrl ?>" width="100%" height="100%">
  </div>
</body>

</html>