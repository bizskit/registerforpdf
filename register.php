<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <title>ระบบสมัครสอบ รพ.ค่ายวีรวัฒน์โยธิน</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="container mt-5">

    <form action="insert_register.php" id="" method="post" enctype="multipart/form-data">

      <h4 class="btn btn-success">&nbsp;ตำแหน่งที่ท่านต้องการสมัคร</h4>

      <div class="mb-3">
        <lable for="positions" class="form-lable"><strong><span style="color:red;font-size:15px;">*</span>ตำแหน่งที่ต้องการสมัคร :</strong></lable>
        <select name="positions" class="form-control" required>
          <option value="">::โปรดเลือกตำแหน่งที่ต้องการสมัคร::</option>
          <option value="โปรแกรมเมอร์">::โปรแกรมเมอร์::</option>
        </select>
      </div>

      <div class="card mt-4">
        <h4 class="bg-success">&nbsp;ข้อมูลส่วนบุคคลของผู้สมัครสอบ</h4>
        <div class="card-body">
          <div class="form-row">

            <div class="mb-3">
              <label for="pf"><strong><span style="color:red;font-size:15px;">*</span>คำนำหน้า</strong></label>
              <select class="custom-select" id="" name="pf" onchange="hide_validate(this.value,this.id);otherPrefix(this.value);" required>
                <option value="" selected="selected">::โปรดเลือก::</option>
                <option value="นาย">นาย</option>
                <option value="นาง">นาง</option>
                <option value="นางสาว">นางสาว</option>
                <option value="อื่นๆ">อื่นๆ</option>
              </select>
            </div>

            <div class="form-group col-md-4">
              <label for="name"><strong><span style="color:red;font-size:15px;">*</span>ชื่อ-สกุล :</strong></label>
              <input type="text" class="form-control" id="name" name="name" required placeholder="กรอกชื่อ-นามสกุล โดยใส่คำนำหน้าชื่อด้วย">
            </div>

            <div class="md-3">
              <label for="sex"><strong><span style="color:red;font-size:15px;">*</span>เลือกเพศ :</strong></label>
              <select class="custom-select" id="" name="sex" onchange="hide_validate(this.value,this.id);otherPrefix(this.value);" required>
                <option value="" selected="selected">::โปรดเลือก::</option>
                <option value="ชาย">ชาย</option>
                <option value="หญิง">หญิง</option>
              </select>
            </div>

            <div class="form-group col-md-4">
              <label for="birthday"><strong><span style="color:red;font-size:15px;">*</span>วัน/เดือน/ปีเกิด :</strong></label>
              <input type="date" class="form-control" id="birthday" name="birthday" required>
            </div>

            <div class="mb-3">
              <label for="agg"><strong><span style="color:red;font-size:15px;">*</span>อายุ :</strong></label>
              <input type="text" class="form-control" id="agg" name="agg" maxlength="2" onkeypress="return isCharacterKey(event);" required placeholder="กรอกอายุ">
            </div>

            <div class="form-group col-md-4">
              <label for="status"><strong><span style="color:red;font-size:15px;">*</span>เลือกสถานภาพ :</strong></label>
              <select class="custom-select" id="" name="status" onchange="hide_validate(this.value,this.id);otherPrefix(this.value);" required>
                <option value="" selected="selected">::โปรดเลือก::</option>
                <option value="โสด">โสด</option>
                <option value="สมรส">สมรส</option>
                <option value="หย่าร้าง">หย่าร้าง</option>
                <option value="แยกกันอยู่">แยกกันอยู่</option>
                <option value="อื่นๆ">อื่นๆ</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="nationality"><strong><span style="color:red;font-size:15px;">*</span>สัญชาติ :</strong></label>
              <input type="text" class="form-control" id="nationality" name="nationality" onkeypress="return isCharacterKey(event);" value="ไทย" readonly="">
            </div>

            <div class="form-group col-md-4">
              <label for="ethnicity"><strong><span style="color:red;font-size:15px;">*</span>เชื้อชาติ :</strong></label>
              <input type="text" class="form-control" id="ethnicity" name="ethnicity" value="" onkeypress="return isCharacterKey(event);" required placeholder="ระบุเชื้อชาติ">
            </div>

            <div class="mb-3">
              <label for="religion"><strong><span style="color:red;font-size:15px;">*</span>เลือกศาสนา :</strong></label>
              <select class="custom-select" id="" name="religion" onchange="hide_validate(this.value,this.id);otherPrefix(this.value);">
                <option value="" selected="selected">::โปรดเลือก::</option>
                <option value="พุทธ">พุทธ</option>
                <option value="คริสต์">คริสต์</option>
                <option value="อิสลาม">อิสลาม</option>
                <option value="อื่นๆ">อื่นๆ</option>
              </select>
            </div>

            <div class="form-group col-md-4">
              <label for="address"><strong><span style="color:red;font-size:15px;">*</span>ที่อยู่ :</strong></label>
              <input type="text" class="form-control" id="address" name="address" value="" onkeypress="return isCharacterKey(event);" required placeholder="ระบุที่อยู่ตามทะเบียนบ้าน">
            </div>

            <div class="form-group col-md-4">
              <label for="email"><strong><span style="color:red;font-size:15px;">*</span>อีเมล์ผู้สมัคร :</strong></label>
              <input type="email" class="form-control" id="email" name="email" required placeholder="กรอกที่อยู่อีเมล์">
            </div>

            <div class="mb-3">
              <label for="phone"><strong><span style="color:red;font-size:15px;">*</span>เบอร์โทรศัพท์ :</strong></label>
              <input type="text" class="form-control" id="phone" name="phone" maxlength="10" onkeypress="return isCharacterKey(event);" required placeholder="ระบุเบอร์โทรศัพท์">
            </div>

            <div class="mb-3">
              <label for="image" class="form-label">อัพโหลดภาพถ่าย </label>
              <input type="file" class="form-control" id="image" name="image" required">
              <span style="color:red;font-size:15px;"> (อัพโหลดภาพถ่ายหน้าตรงขนาด 1.5 นิ้ว)</span>
            </div>

          </div>
        </div>
      </div>


      <div class="card mt-4">
        <h4 align="left" class="bg-success">&nbsp;ข้อมูลการศึกษาของผู้สมัครสอบ</h4>
        <div class="card-body">
          <div class="form-row">

            <div class="mb-3">
              <label for="edu"><strong><span style="color:red;font-size:15px;">*</span>วุฒิการศึกษา</strong></label>
              <select class="custom-select" id="" name="edu" onchange="hide_validate(this.value,this.id);otherPrefix(this.value);" required>
                <option value="" selected="selected">::โปรดเลือก::</option>
                <option value="มัธยมศึกษาตอนต้น">มัธยมศึกษาตอนต้น</option>
                <option value="มัธยมศึกษาตอนปลาย">มัธยมศึกษาตอนปลาย</option>
                <option value="ระดับ ปวช.">ระดับ ปวช.</option>
                <option value="ระดับ ปวส.หรือเทียบเท่า">ระดับ ปวส.หรือเทียบเท่า</option>
                <option value="ปริญญาตรี">ปริญญาตรี</option>
                <option value="ปริญญาโท">ปริญญาโท</option>
                <option value="ปริญญาเอก">ปริญญาเอก</option>
              </select>
            </div>

            <div class="form-group col-md-4">
              <label for="degree"><strong><span style="color:red;font-size:15px;">*</span>ชื่อวุฒิการศึกษา :</strong></label>
              <input type="text" class="form-control" id="degree" name="degree" required placeholder="เช่น วิทยาศาสตรบัณฑิต, บัญชีบัณฑิต ,สาขาอิเล็กทรอนิกส์">
            </div>

            <div class="form-group col-md-4">
              <label for="nameedu"><strong><span style="color:red;font-size:15px;">*</span>ชื่อสถานศึกษา :</strong></label>
              <input type="text" class="form-control" id="nameedu" name="nameedu" required placeholder="ระบุชื่อสถานศึกษา">
            </div>

            <div class="mb-3">
              <label for="ex"><strong><span style="color:red;font-size:15px;">*</span>วันที่สำเร็จการศึกษา :</strong></label>
              <input type="date" class="form-control" id="ex" name="ex" required>
              <span style="color:red;font-size:15px;"> (นับถึงวันที่ปิดรับสมัคร)</span>
            </div>

            <div class="form-group col-md-4">
              <label for="gpa"><strong><span style="color:red;font-size:15px;">*</span>คะแนนเฉลี่ยสะสม :</strong></label>
              <input type="text" class="form-control" id="gpa" name="gpa" required placeholder="ระบุเกรดเฉลี่ยสะสม">
            </div>
            <br>
            <div class="mb-3">
              <label for="resume" class="form-label"><span style="color:red;font-size:15px;">*</span>อัพโหลดวุฒิการศึกษาเป็นไฟล์ PDF</label>
              <input type="file" class="form-control" id="resume" name="resume" accept=".pdf" required>
            </div>
            <!-- <div class="mb-3">
              <label for="resume" class="form-label">Resume (PDF only)</label>
              <input type="file" class="form-control" id="resume" name="resume" accept=".pdf" required>
            </div> -->
            </br>
          </div>
        </div>
      </div>

      <div class="card mt-4">
        <h4 aligh="left" class="bg-success">&nbsp;บุคคลที่สามารถติดต่อได้ในกรณีฉุกเฉิน</h4>
        <div class="card-body">

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="personal"><strong><span style="color:red;font-size:15px;">*</span>คำนำหน้า :</strong></label>
              <select class="custom-select" id="personal" name="personal" onchange="hide_validate(this.value,this.id);otherPrefix(this.value);" required>
                <option value="" selected="selected">::โปรดเลือก::</option>
                <option value="นาย">นาย</option>
                <option value="นาง">นาง</option>
                <option value="นางสาว">นางสาว</option>
                <option value="อื่นๆ">อื่นๆ</option>
              </select>
            </div>
            <div class="form-group col-md-4" id="div_personal_free_cols" style="display:none;"></div>
            <div class="form-group col-md-4">
              <label for="personal_firstname"><strong><span style="color:red;font-size:15px;">*</span>ชื่อ :</strong></label>
              <input type="text" class="form-control" id="personal_firstname" name="personal_firstname" value="" maxlength="30" onkeypress="return isCharacterKey(event);" required placeholder="ระบุชื่อ">
            </div>
            <div class="form-group col-md-4">
              <label for="personal_surname"><strong><span style="color:red;font-size:15px;">*</span>นามสกุล :</strong></label>
              <input type="text" class="form-control" id="personal_surname" name="personal_surname" value="" maxlength="30" onkeypress="return isCharacterKey(event);" required placeholder="ระบุนามสกุล">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="personal_relation"><strong><span style="color:red;font-size:15px;">*</span>เกี่ยวข้องเป็น :</strong></label>
              <input type="text" class="form-control" id="personal_relation" name="personal_relation" onkeypress="return isCharacterKey(event);" maxlength="50" value="" required placeholder="ระบุความเกี่ยวข้อง">
            </div>
            <div class="form-group col-md-4">
              <label for="personal_tel"><strong><span style="color:red;font-size:15px;">*</span>โทรศัพท์ :</strong></label>
              <input type="text" class="form-control" id="personal_tel" name="personal_tel" maxlength="10" onkeypress="return isNumberKey1(event)" onchange="sameNumber()" value="" required placeholder="ระบุเบอร์โทรศัพท์">
              <span style="display: none;" id="personal_tel-error" class="error invalid-feedback">โปรดระบุหมายเลขโทรศัพท์อื่น</span>
            </div>
          </div>

        </div>
      </div>

      <div class="card-body">
        <div class="form-row">
          <div class="col-md-12" style="background-color:#FFFFFF;">
            <div class="form-row mt-2">
              <div class="col-md-12 mb-3">
                <dv>
                  <label><span style="color: rgb(0, 0, 0);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1) ข้าพเจ้าขอรับรองว่า ข้อความดังกล่าวข้างต้นเป็นความจริงทุกประการ และข้าพเจ้าเป็นผู้มีคุณสมบัติครบถ้วนตามประกาศรับสมัครสอบหาก ปรากฎว่าเป็นความเท็จ หรือเอกสารหลักฐานใดไม่ถูกต้องครบถ้วน หรือไม่ปฎิบัติตามที่โรงพยาบาลค่ายวีรวัฒน์โยธิน โดยคณะกรรมการดำเนินงานสอบฯกำหนด ให้ถือว่าข้าพเจ้าสละสิทธิ์ในการสอบครั้งนี้ และจะไม่เรียกร้องสิทธิ์ใดๆทั้งสิ้น และหากมีการปลอมแปลงเอกสารหลักฐานใดๆ ต่อเจ้าหน้าที่ ข้าพเจ้ายินยอมให้ทางราชการดำเนินคดีตามกฎหมาย</span><br><span style="color: rgb(0, 0, 0);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2) ข้าพเจ้าได้ศึกษาและทำความเข้าใจพระราชบัญญัติคุ้มครองข้อมูลส่วนบุคคล พ.ศ. 2562 ตลอดจนประกาศและระเบียบที่เกี่ยวข้องโดยละเอียดครบถ้วนแล้ว ข้าพเจ้าขอแสดงความยินยอมให้หน่วยงานหรือบุคคลที่เกี่ยวข้องกับการดำเนินการสรรหา สามารถเก็บ รวบรวม ใช้ และเปิดเผยข้อมูลส่วนบุคคลที่เกี่ยวข้องกับข้าพเจ้า เพื่อประโยชน์ของทางราชการตามกฎหมายที่เกี่ยวข้อง</span></label>
                </dv>
                <div class="custom-control custom-checkbox" align="center">
                  <br>
                  <input type="checkbox" class="custom-control-input" id="agree" name="agree" value="ยอมรับ" required>
                  <label class="custom-control-label" for="agree"><b>ข้าพเจ้าขอให้คำรับรองและแสดงความยินยอมตามเงื่อนไขทุกประการ</b></label>
                </div>
              </div>
            </div>
          </div>

          <dท  ำ+iv class="mb-3">
            <input type="submit" value="บันทึกข้อมูล" class="btn btn-success" onclick="return confirm('ตรวจสอบความถูกต้องของข้อมูล และต้องการบันทึกข้อมูลใช่หรือไม่')">
            &nbsp;<input type="reset" value="รีเซ็ตข้อมูล" class="btn btn-warning">
            &nbsp;<a href="index.php" class="btn btn-danger">ยกเลิก</a>
          </div>
    </form>
  </div>

</body>

</html>
</div>