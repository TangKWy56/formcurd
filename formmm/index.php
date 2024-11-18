<?php
// เชื่อมต่อฐานข้อมูล
$host = 'localhost';
$db = 'province';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $e->getMessage());
}

// ฟังก์ชันลบข้อมูล
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    try {
        $stmt = $pdo->prepare("DELETE FROM mail_info WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } catch (PDOException $e) {
        echo "การลบข้อมูลล้มเหลว: " . $e->getMessage();
    }
}

// ฟังก์ชันบันทึกข้อมูล
if (isset($_POST['save'])) {
    try {
        // เตรียมข้อมูลผู้ส่ง
        $senderData = [
            'first_name' => $_POST['senderFirstName'],
            'last_name' => $_POST['senderLastName'],
            'house_number' => $_POST['senderHouseNumber'],
            'village' => $_POST['senderVillage'],
            'alley' => $_POST['senderAlley'],
            'sub_district' => $_POST['senderSubDistrict'],
            'district' => $_POST['senderDistrict'],
            'province' => $_POST['senderProvince'],
            'zip' => $_POST['senderZip'],
            'send_date' => $_POST['sendDate']
        ];
        
        // เตรียมข้อมูลผู้รับ
        $receiverData = [
            'first_name' => $_POST['receiverFirstName'],
            'last_name' => $_POST['receiverLastName'],
            'house_number' => $_POST['receiverHouseNumber'],
            'village' => $_POST['receiverVillage'],
            'alley' => $_POST['receiverAlley'],
            'sub_district' => $_POST['receiverSubDistrict'],
            'district' => $_POST['receiverDistrict'],
            'province' => $_POST['receiverProvince'],
            'zip' => $_POST['receiverZip'],
            'receive_date' => $_POST['receiveDate']
        ];

        if (isset($_POST['id'])) {
            // อัปเดตข้อมูล
            $sql = "UPDATE mail_info SET 
                    sender_first_name=:sender_first_name, 
                    sender_last_name=:sender_last_name,
                    sender_house_number=:sender_house_number,
                    sender_village=:sender_village,
                    sender_alley=:sender_alley,
                    sender_sub_district=:sender_sub_district,
                    sender_district=:sender_district,
                    sender_province=:sender_province,
                    sender_zip=:sender_zip,
                    send_date=:send_date,
                    receiver_first_name=:receiver_first_name,
                    receiver_last_name=:receiver_last_name,
                    receiver_house_number=:receiver_house_number,
                    receiver_village=:receiver_village,
                    receiver_alley=:receiver_alley,
                    receiver_sub_district=:receiver_sub_district,
                    receiver_district=:receiver_district,
                    receiver_province=:receiver_province,
                    receiver_zip=:receiver_zip,
                    receive_date=:receive_date
                    WHERE id=:id";
            
            $stmt = $pdo->prepare($sql);
            $params = array_merge(
                ['id' => $_POST['id']],
                array_combine(
                    array_map(function($key) { return "sender_" . $key; }, array_keys($senderData)),
                    array_values($senderData)
                ),
                array_combine(
                    array_map(function($key) { return "receiver_" . $key; }, array_keys($receiverData)),
                    array_values($receiverData)
                )
            );
        } else {
            // เพิ่มข้อมูลใหม่
            $sql = "INSERT INTO mail_info (
                    sender_first_name, sender_last_name, sender_house_number, 
                    sender_village, sender_alley, sender_sub_district, 
                    sender_district, sender_province, sender_zip, send_date,
                    receiver_first_name, receiver_last_name, receiver_house_number,
                    receiver_village, receiver_alley, receiver_sub_district,
                    receiver_district, receiver_province, receiver_zip, receive_date
                ) VALUES (
                    :sender_first_name, :sender_last_name, :sender_house_number,
                    :sender_village, :sender_alley, :sender_sub_district,
                    :sender_district, :sender_province, :sender_zip, :send_date,
                    :receiver_first_name, :receiver_last_name, :receiver_house_number,
                    :receiver_village, :receiver_alley, :receiver_sub_district,
                    :receiver_district, :receiver_province, :receiver_zip, :receive_date
                )";
            
            $stmt = $pdo->prepare($sql);
            $params = array_merge(
                array_combine(
                    array_map(function($key) { return "sender_" . $key; }, array_keys($senderData)),
                    array_values($senderData)
                ),
                array_combine(
                    array_map(function($key) { return "receiver_" . $key; }, array_keys($receiverData)),
                    array_values($receiverData)
                )
            );
        }
        
        $stmt->execute($params);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } catch (PDOException $e) {
        echo "การบันทึกข้อมูลล้มเหลว: " . $e->getMessage();
    }
}

// ดึงข้อมูลสำหรับแก้ไข
$editData = null;
if (isset($_GET['edit'])) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM mail_info WHERE id = ?");
        $stmt->execute([$_GET['edit']]);
        $editData = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "การดึงข้อมูลล้มเหลว: " . $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลจดหมาย</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- ปุ่มเพิ่มข้อมูล -->
        <div class="d-flex justify-content-between mb-3">
            <h2><?php echo $editData ? 'แก้ไขข้อมูล' : 'ข้อมูลจดหมายทั้งหมด'; ?></h2>
            <?php if (!$editData): ?>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
                    เพิ่มข้อมูล
                </button>
            <?php endif; ?>
        </div>

        <!-- ตารางแสดงข้อมูล -->
        <?php if (!$editData): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ผู้ส่ง</th>
                        <th>ที่อยู่ผู้ส่ง</th>
                        <th>วันที่ส่ง</th>
                        <th>ผู้รับ</th>
                        <th>ที่อยู่ผู้รับ</th>
                        <th>วันที่รับ</th>
                        <th>การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $stmt = $pdo->query("SELECT * FROM mail_info ORDER BY id DESC");
                        while ($row = $stmt->fetch()) {
                            echo "<tr>";
                            echo "<td>{$row['sender_first_name']} {$row['sender_last_name']}</td>";
                            echo "<td>{$row['sender_house_number']} {$row['sender_village']} {$row['sender_alley']} {$row['sender_sub_district']} {$row['sender_district']} {$row['sender_province']} {$row['sender_zip']}</td>";
                            echo "<td>{$row['send_date']}</td>";
                            echo "<td>{$row['receiver_first_name']} {$row['receiver_last_name']}</td>";
                            echo "<td>{$row['receiver_house_number']} {$row['receiver_village']} {$row['receiver_alley']} {$row['receiver_sub_district']} {$row['receiver_district']} {$row['receiver_province']} {$row['receiver_zip']}</td>";
                            echo "<td>{$row['receive_date']}</td>";
                            echo "<td>
                                    <div class='btn-group'>
                                        <a href='?edit={$row['id']}' class='btn btn-warning btn-sm'>แก้ไข</a>
                                        <form method='post' style='display:inline;' onsubmit='return confirm(\"ยืนยันการลบข้อมูล?\");'>
                                            <input type='hidden' name='id' value='{$row['id']}'>
                                            <button type='submit' name='delete' class='btn btn-danger btn-sm'>ลบ</button>
                                        </form>
                                    </div>
                                  </td>";
                            echo "</tr>";
                        }
                    } catch (PDOException $e) {
                        echo "การดึงข้อมูลล้มเหลว: " . $e->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>

        <!-- Modal สำหรับฟอร์มเพิ่มข้อมูล -->
        <div class="modal fade" id="formModal" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">เพิ่มข้อมูลจดหมาย</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <?php include 'province.php'; // แยกฟอร์มไปไว้อีกไฟล์ ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- ฟอร์มแก้ไขข้อมูล -->
        <?php if ($editData): ?>
            <form method="post" class="needs-validation" novalidate>
                <input type="hidden" name="id" value="<?php echo $editData['id']; ?>">
                <?php include 'province.php'; // ใช้ฟอร์มเดียวกับการเพิ่มข้อมูล ?>
                <div class="row mt-3">
                    <div class="col-12">
                        <button type="submit" name="save" class="btn btn-primary">บันทึกการแก้ไข</button>
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-secondary">ยกเลิก</a>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script>
    // เพิ่ม JavaScript สำหรับ form validation
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
    </script>
</body>
</html>