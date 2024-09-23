<?php
session_start();
require('db.php');
require('pdf/fpdf.php');
require('pdf/font/THSarabunNew.php');

$phone = $conn->real_escape_string($_SESSION['phone']);

$sql_phone = "SELECT * FROM `job_general` WHERE `phone` = '$phone'";
$rs_sql_phone = mysqli_query($conn, $sql_phone);

$result = mysqli_fetch_assoc($rs_sql_phone);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->SetFont('THSarabunNew', '', 16);

$pdf->Image('uploads/register_kwt.jpg', 1, 1, 210, 297);

$pdf->Image('uploads/'.$result['image'],161,47,26,33);

$pdf->SetXY(55,90); //ตำแหน่งงาน
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['positions']),0,1,);

$pdf->SetXY(45,105); //คำนำหน้า
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['pf']),0,1,);

$pdf->SetXY(85,105); //ชื่อ
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['name']),0,1,);

$pdf->SetXY(160,105); //เพศ
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['sex']),0,1,);

$pdf->SetXY(55,112); //วันเกิด
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['birthday']),0,1,);

$pdf->SetXY(105,112); //อายุ
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['agg']),0,1,);

$pdf->SetXY(150,112); //สถานะภาพ
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['status']),0,1,);

$pdf->SetXY(45,120); //สัญชาติ
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['nationality']),0,1,);

$pdf->SetXY(105,120); //เชื้อชาติ
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['ethnicity']),0,1,);

$pdf->SetXY(150,120); //ศาสนา
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['religion']),0,1,);

$pdf->SetXY(40,127); //ที่อยู่
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['address']),0,1,);

$pdf->SetXY(40,134); //อีเมล
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['email']),0,1,);

$pdf->SetXY(125,134); //โทรสับ
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['phone']),0,1,);

$pdf->SetXY(55,149); //วุฒิการศึกษา
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['edu']),0,1,);

$pdf->SetXY(128,149); //ชื่อวุฒิการศึกษา
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['degree']),0,1,);

$pdf->SetXY(55,156); //ชื่อสถานศึกษา
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['nameedu']),0,1,);

$pdf->SetXY(70,164); //วันที่สำเร็จการศึกษา
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['ex']),0,1,);

$pdf->SetXY(160,164); //เกรด
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['gpa']),0,1,);

$pdf->SetXY(100,171); //คนรู้จัก
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['personal']),0,1,);

$pdf->SetXY(108,171); //ชื่อคนรู้จัก
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['personal_firstname']),0,1,);

$pdf->SetXY(120,171); //สกุลคนรู้จัก
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['personal_surname']),0,1,);

$pdf->SetXY(65,179); //เกี่ยวข้องเป็น
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['personal_relation']),0,1,);

$pdf->SetXY(125,179); //เบอรคนรู้จัก
$pdf->Cell(0,8,iconv('UTF-8','cp874',$result['personal_tel']),0,1,);

$pdf->Output('D', 'Register.pdf');
?>
