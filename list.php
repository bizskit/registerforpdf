<?php

require('db.php');

$sql = "SELECT * FROM job_general";
$result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ระบบสมัครสอบลูกจ้างชั่วคราว รพ.ค่ายวีรวัฒน์โยธิน</title>

  <!-- AdminLTE -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
    });
  </script>
</head>

<body>
  <div class="row">
    <div class="col-md-12">
      <div class="card" style="margin: 50px 50px 50px 50px;">

        <div class="card-header">
          <h3 class="card-title">รายชื่อผู้สมัครสอบ</h3>
        </div>

        <div class="card-body">
          <table id="example" class="table table-bordered table-striped">
            <thead>
              <tr class="bg-primary">
                <th class="text-center">ลำดับ</th>
                <th class="text-center">คำนำหน้า</th>
                <th class="text-center">ชื่อ-สกุล</th>
                <th class="text-center">อายุ</th>
                <th class="text-center">เพศ</th>
                <th class="text-center">ที่อยู่</th>
                <th class="text-center">ระดับการศึกษา</th>
                <th class="text-center">เบอร์โทรศัพท์</th>
                <th class="text-center">อีเมล์ผู้สมัคร</th>
                <th class="text-center">ตำแหน่งที่สมัคร</th>
                <!-- <th class="text-center">แก้ไข</th>
                <th class="text-center">ลบ</th> -->
                <th class="text-center">เรียกดูใบสมัคร</th>
                <th class="text-center">เรียกดูวุฒิ</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td class="text-center"><?php echo $row["id"]; ?></td>
                  <td class="text-center"><?php echo $row["pf"]; ?></td>
                  <td class="text-center"><?php echo $row["name"]; ?></td>
                  <td class="text-center"><?php echo $row["agg"]; ?></td>
                  <td class="text-center"><?php echo $row["sex"]; ?></td>
                  <td class="text-center"><?php echo $row["address"]; ?></td>
                  <td class="text-center"><?php echo $row["edu"]; ?></td>
                  <td class="text-center"><?php echo $row["phone"]; ?></td>
                  <td class="text-center"><?php echo $row["email"]; ?></td>
                  <td class="text-center"><?php echo $row["positions"]; ?></td>
                  <!-- <td class="text-center"><a href="admin_Editform.php?id=<?php echo $row["id"]; ?>" class="btn btn-warning btn-sm">แก้ไช</td>
                  <td class="text-center"><a href="deledata.php?idemp=<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('ต้องการลบข้อมูลใช่หรือไม่')">ลบ</td> -->
                  <td class="text-center"><a href="lookpdf.php?id=<?= $row["id"];?>" class="btn btn-warning btn-sm">ดาวน์โหลด</td>
                  <!-- <td class="text-center"><a href="uploads/<?= $row["resume"];?>" download="<?= $row["resume"];?>" class="btn btn-warning btn-sm">คลิก</td> -->
                  <td class="text-center">
                  <a href="previewpdf.php?file=<?= $row["resume"]; ?>" class="btn btn-warning btn-sm mb-2">พรีวิว</a> 
                  <a href="uploads/<?= $row["resume"]; ?>" download="<?= $row["resume"]; ?>" class="btn btn-warning btn-sm">ดาวน์โหลด</a>
                  </td>
                </tr>
              <?php } ?>

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</body>

</html>