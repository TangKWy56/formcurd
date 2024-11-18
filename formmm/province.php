<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลผู้ส่งและผู้รับจดหมาย</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">ข้อมูลผู้ส่งจดหมาย</h2>
        <form class="row g-3 needs-validation" novalidate id="senderForm" action="save_mail_info.php" method="POST">
            <div class="col-md-6">
                <label for="senderFirstName" class="form-label">name</label>
                <input type="text" class="form-control" id="senderFirstName" name="senderFirstName" required>
                <div class="invalid-feedback">กรุณากรอกชื่อ</div>
            </div>
            <div class="col-md-6">
                <label for="senderLastName" class="form-label">surname</label>
                <input type="text" class="form-control" id="senderLastName" name="senderLastName" required>
                <div class="invalid-feedback">กรุณากรอกsurname</div>
            </div>
            <div class="col-md-4">
                <label for="senderHouseNumber" class="form-label">house number</label>
                <input type="text" class="form-control" id="senderHouseNumber" name="senderHouseNumber" required pattern="[0-9]+" title="กรุณากรอกเฉพาะตัวเลข">
                <div class="invalid-feedback">กรุณากรอกhouse number (เฉพาะตัวเลข)</div>
            </div>
            <div class="col-md-4">
                <label for="senderVillage" class="form-label">village</label>
                <input type="text" class="form-control" id="senderVillage" name="senderVillage" required>
                <div class="invalid-feedback">กรุณากรอกvillage</div>
            </div>
            <div class="col-md-4">
                <label for="senderAlley" class="form-label">alley</label>
                <input type="text" class="form-control" id="senderAlley" name="senderAlley" required>
                <div class="invalid-feedback">กรุณากรอกalley</div>
            </div>
            <div class="col-md-4">
                <label for="senderSubDistrict" class="form-label">prefecture</label>
                <input type="text" class="form-control" id="senderSubDistrict" name="senderSubDistrict" required>
                <div class="invalid-feedback">กรุณากรอกdistrict</div>
            </div>
            <div class="col-md-4">
                <label for="senderDistrict" class="form-label">district</label>
                <input type="text" class="form-control" id="senderDistrict" name="senderDistrict" required>
                <div class="invalid-feedback">กรุณากรอกdistrict</div>
            </div>
            <div class="col-md-4">
                <label for="senderProvince" class="form-label">province</label>
                <select class="form-select" id="senderProvince" name="senderProvince" required>
                    <option selected disabled value="">เลือกprovince...</option>
                    <option>กรุงเทพมหานคร</option>
                    <option>กระบี่</option>
                    <option>กาญจนบุรี</option>
                    <option>กาฬสินธุ์</option>
                    <option>กำแพงเพชร</option>
                    <option>ขอนแก่น</option>
                    <option>จันทบุรี</option>
                    <option>ฉะเชิงเทรา</option>
                    <option>ชลบุรี</option>
                    <option>ชัยนาท</option>
                    <option>ชัยภูมิ</option>
                    <option>ชุมพร</option>
                    <option>เชียงราย</option>
                    <option>เชียงใหม่</option>
                    <option>ตรัง</option>
                    <option>ตราด</option>
                    <option>ตาก</option>
                    <option>นครนายก</option>
                    <option>นครปฐม</option>
                    <option>นครพนม</option>
                    <option>นครราชสีมา</option>
                    <option>นครศรีธรรมราช</option>
                    <option>นครสวรรค์</option>
                    <option>นนทบุรี</option>
                    <option>นราธิวาส</option>
                    <option>น่าน</option>
                    <option>บึงกาฬ</option>
                    <option>บุรีรัมย์</option>
                    <option>ปทุมธานี</option>
                    <option>ประจวบคีรีขันธ์</option>
                    <option>ปราจีนบุรี</option>
                    <option>ปัตตานี</option>
                    <option>พระนครศรีอยุธยา</option>
                    <option>พะเยา</option>
                    <option>พังงา</option>
                    <option>พัทลุง</option>
                    <option>พิจิตร</option>
                    <option>พิษณุโลก</option>
                    <option>เพชรบุรี</option>
                    <option>เพชรบูรณ์</option>
                    <option>แพร่</option>
                    <option>ภูเก็ต</option>
                    <option>มหาสารคาม</option>
                    <option>มุกดาหาร</option>
                    <option>แม่ฮ่องสอน</option>
                    <option>ยโสธร</option>
                    <option>ยะลา</option>
                    <option>ร้อยเอ็ด</option>
                    <option>ระนอง</option>
                    <option>ระยอง</option>
                    <option>ราชบุรี</option>
                    <option>ลพบุรี</option>
                    <option>ลำปาง</option>
                    <option>ลำพูน</option>
                    <option>เลย</option>
                    <option>ศรีสะเกษ</option>
                    <option>สกลนคร</option>
                    <option>สงขลา</option>
                    <option>สตูล</option>
                    <option>สมุทรปราการ</option>
                    <option>สมุทรสงคราม</option>
                    <option>สมุทรสาคร</option>
                    <option>สระแก้ว</option>
                    <option>สระบุรี</option>
                    <option>สิงห์บุรี</option>
                    <option>สุโขทัย</option>
                    <option>สุพรรณบุรี</option>
                    <option>สุราษฎร์ธานี</option>
                    <option>สุรินทร์</option>
                    <option>หนองคาย</option>
                    <option>หนองบัวลำภู</option>
                    <option>อ่างทอง</option>
                    <option>อำนาจเจริญ</option>
                    <option>อุดรธานี</option>
                    <option>อุตรดิตถ์</option>
                    <option>อุทัยธานี</option>
                    <option>อุบลราชธานี</option>
                </select>
                <div class="invalid-feedback">กรุณาเลือกprovince</div>
            </div>
            <div class="col-md-4">
                <label for="senderZip" class="form-label">zip code</label>
                <input type="text" class="form-control" id="senderZip" name="senderZip" required pattern="[0-9]{5}" title="กรุณากรอกzip code 5 หลัก">
                <div class="invalid-feedback">กรุณากรอกzip code (5 หลัก)</div>
            </div>

            <div class="col-md-6">
                <label for="sendDate" class="form-label">Sent date</label>
                <input type="date" class="form-control" id="sendDate" name="sendDate" required>
                <div class="invalid-feedback">กรุณาระบุวันที่ส่ง</div>
            </div>

            <h2 class="text-center mb-4">ข้อมูลผู้รับจดหมาย</h2>
            <div class="col-md-6">
                <label for="receiverFirstName" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" id="receiverFirstName" name="receiverFirstName" required>
                <div class="invalid-feedback">กรุณากรอกชื่อผู้รับ</div>
            </div>
            <div class="col-md-6">
                <label for="receiverLastName" class="form-label">นามสกุล</label>
                <input type="text" class="form-control" id="receiverLastName" name="receiverLastName" required>
                <div class="invalid-feedback">กรุณากรอกนามสกุลผู้รับ</div>
            </div>

            <div class="col-md-4">
                <label for="receiverHouseNumber" class="form-label">house number</label>
                <input type="text" class="form-control" id="receiverHouseNumber" name="receiverHouseNumber" required pattern="[0-9]+" title="กรุณากรอกเฉพาะตัวเลข">
                <div class="invalid-feedback">กรุณากรอกhouse number (เฉพาะตัวเลข)</div>
            </div>
            <div class="col-md-4">
                <label for="receiverVillage" class="form-label">village</label>
                <input type="text" class="form-control" id="receiverVillage" name="receiverVillage" required>
                <div class="invalid-feedback">กรุณากรอกvillage</div>
            </div>
            <div class="col-md-4">
                <label for="receiverAlley" class="form-label">alley</label>
                <input type="text" class="form-control" id="receiverAlley" name="receiverAlley" required>
                <div class="invalid-feedback">กรุณากรอกalley</div>
            </div>
            <div class="col-md-4">
                <label for="receiverSubDistrict" class="form-label">prefecture</label>
                <input type="text" class="form-control" id="receiverSubDistrict" name="receiverSubDistrict" required>
                <div class="invalid-feedback">กรุณากรอกdistrict</div>
            </div>
            <div class="col-md-4">
                <label for="receiverDistrict" class="form-label">district</label>
                <input type="text" class="form-control" id="receiverDistrict" name="receiverDistrict" required>
                <div class="invalid-feedback">กรุณากรอกdistrict</div>
            </div>
            <div class="col-md-4">
                <label for="receiverProvince" class="form-label">province</label>
                <select class="form-select" id="receiverProvince" name="receiverProvince" required>
                    <option selected disabled value="">เลือกprovince...</option>
                    <option>กรุงเทพมหานคร</option>
                    <option>กระบี่</option>
                    <option>กาญจนบุรี</option>
                    <option>กาฬสินธุ์</option>
                    <option>กำแพงเพชร</option>
                    <option>ขอนแก่น</option>
                    <option>จันทบุรี</option>
                    <option>ฉะเชิงเทรา</option>
                    <option>ชลบุรี</option>
                    <option>ชัยนาท</option>
                    <option>ชัยภูมิ</option>
                    <option>ชุมพร</option>
                    <option>เชียงราย</option>
                    <option>เชียงใหม่</option>
                    <option>ตรัง</option>
                    <option>ตราด</option>
                    <option>ตาก</option>
                    <option>นครนายก</option>
                    <option>นครปฐม</option>
                    <option>นครพนม</option>
                    <option>นครราชสีมา</option>
                    <option>นครศรีธรรมราช</option>
                    <option>นครสวรรค์</option>
                    <option>นนทบุรี</option>
                    <option>นราธิวาส</option>
                    <option>น่าน</option>
                    <option>บึงกาฬ</option>
                    <option>บุรีรัมย์</option>
                    <option>ปทุมธานี</option>
                    <option>ประจวบคีรีขันธ์</option>
                    <option>ปราจีนบุรี</option>
                    <option>ปัตตานี</option>
                    <option>พระนครศรีอยุธยา</option>
                    <option>พะเยา</option>
                    <option>พังงา</option>
                    <option>พัทลุง</option>
                    <option>พิจิตร</option>
                    <option>พิษณุโลก</option>
                    <option>เพชรบุรี</option>
                    <option>เพชรบูรณ์</option>
                    <option>แพร่</option>
                    <option>ภูเก็ต</option>
                    <option>มหาสารคาม</option>
                    <option>มุกดาหาร</option>
                    <option>แม่ฮ่องสอน</option>
                    <option>ยโสธร</option>
                    <option>ยะลา</option>
                    <option>ร้อยเอ็ด</option>
                    <option>ระนอง</option>
                    <option>ระยอง</option>
                    <option>ราชบุรี</option>
                    <option>ลพบุรี</option>
                    <option>ลำปาง</option>
                    <option>ลำพูน</option>
                    <option>เลย</option>
                    <option>ศรีสะเกษ</option>
                    <option>สกลนคร</option>
                    <option>สงขลา</option>
                    <option>สตูล</option>
                    <option>สมุทรปราการ</option>
                    <option>สมุทรสงคราม</option>
                    <option>สมุทรสาคร</option>
                    <option>สระแก้ว</option>
                    <option>สระบุรี</option>
                    <option>สิงห์บุรี</option>
                    <option>สุโขทัย</option>
                    <option>สุพรรณบุรี</option>
                    <option>สุราษฎร์ธานี</option>
                    <option>สุรินทร์</option>
                    <option>หนองคาย</option>
                    <option>หนองบัวลำภู</option>
                    <option>อ่างทอง</option>
                    <option>อำนาจเจริญ</option>
                    <option>อุดรธานี</option>
                    <option>อุตรดิตถ์</option>
                    <option>อุทัยธานี</option>
                    <option>อุบลราชธานี</option>
                    <!-- เพิ่มรายชื่อจังหวัดอื่น ๆ ที่ต้องการ -->
                </select>
                <div class="invalid-feedback">กรุณาเลือกprovince</div>
            </div>
            <div class="col-md-4">
                <label for="receiverZip" class="form-label">zip code</label>
                <input type="text" class="form-control" id="receiverZip" name="receiverZip" required pattern="[0-9]{5}" title="กรุณากรอกzip code 5 หลัก">
                <div class="invalid-feedback">กรุณากรอกzip code (5 หลัก)</div>
            </div>

            <div class="col-md-6">
                <label for="receiveDate" class="form-label">Received date</label>
                <input type="date" class="form-control" id="receiveDate" name="receiveDate" required>
                <div class="invalid-feedback">กรุณาระบุวันที่ได้รับ</div>
            </div>

            <div class="col-12 text-center">
                <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
