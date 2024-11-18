<?php
// ตั้งค่าการเชื่อมต่อกับฐานข้อมูล
$host = 'localhost';  // ที่อยู่ของฐานข้อมูล
$db = 'province';     // ชื่อฐานข้อมูล
$user = 'root';       // ชื่อผู้ใช้งานฐานข้อมูล
$pass = '';           // รหัสผ่านฐานข้อมูล

try {
    // เชื่อมต่อกับฐานข้อมูลด้วย PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ตรวจสอบว่ามีข้อมูลจากฟอร์มที่ส่งมาหรือไม่
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // รับค่าจากฟอร์ม
        $senderFirstName = $_POST['senderFirstName'];
        $senderLastName = $_POST['senderLastName'];
        $senderHouseNumber = $_POST['senderHouseNumber'];
        $senderVillage = $_POST['senderVillage'];
        $senderAlley = $_POST['senderAlley'];
        $senderSubDistrict = $_POST['senderSubDistrict'];
        $senderDistrict = $_POST['senderDistrict'];
        $senderProvince = $_POST['senderProvince'];
        $senderZip = $_POST['senderZip'];
        $sendDate = $_POST['sendDate'];

        $receiverFirstName = $_POST['receiverFirstName'];
        $receiverLastName = $_POST['receiverLastName'];
        $receiverHouseNumber = $_POST['receiverHouseNumber'];
        $receiverVillage = $_POST['receiverVillage'];
        $receiverAlley = $_POST['receiverAlley'];
        $receiverSubDistrict = $_POST['receiverSubDistrict'];
        $receiverDistrict = $_POST['receiverDistrict'];
        $receiverProvince = $_POST['receiverProvince'];
        $receiverZip = $_POST['receiverZip'];
        $receiveDate = $_POST['receiveDate'];

        // สร้าง SQL เพื่อบันทึกข้อมูลลงในฐานข้อมูล
        $sql = "INSERT INTO mail_info (sender_first_name, sender_last_name, sender_house_number, sender_village, sender_alley, sender_sub_district, sender_district, sender_province, sender_zip, send_date, receiver_first_name, receiver_last_name, receiver_house_number, receiver_village, receiver_alley, receiver_sub_district, receiver_district, receiver_province, receiver_zip, receive_date) 
                VALUES (:senderFirstName, :senderLastName, :senderHouseNumber, :senderVillage, :senderAlley, :senderSubDistrict, :senderDistrict, :senderProvince, :senderZip, :sendDate, :receiverFirstName, :receiverLastName, :receiverHouseNumber, :receiverVillage, :receiverAlley, :receiverSubDistrict, :receiverDistrict, :receiverProvince, :receiverZip, :receiveDate)";

        //
        $stmt = $pdo->prepare($sql);

        // เชื่้อมต่อค่าที่รับมาจากฟอร์มกับตัวแปรในคำสั่ง SQL
        $stmt->bindParam(':senderFirstName', $senderFirstName);
        $stmt->bindParam(':senderLastName', $senderLastName);
        $stmt->bindParam(':senderHouseNumber', $senderHouseNumber);
        $stmt->bindParam(':senderVillage', $senderVillage);
        $stmt->bindParam(':senderAlley', $senderAlley);
        $stmt->bindParam(':senderSubDistrict', $senderSubDistrict);
        $stmt->bindParam(':senderDistrict', $senderDistrict);
        $stmt->bindParam(':senderProvince', $senderProvince);
        $stmt->bindParam(':senderZip', $senderZip);
        $stmt->bindParam(':sendDate', $sendDate);
        $stmt->bindParam(':receiverFirstName', $receiverFirstName);
        $stmt->bindParam(':receiverLastName', $receiverLastName);
        $stmt->bindParam(':receiverHouseNumber', $receiverHouseNumber);
        $stmt->bindParam(':receiverVillage', $receiverVillage);
        $stmt->bindParam(':receiverAlley', $receiverAlley);
        $stmt->bindParam(':receiverSubDistrict', $receiverSubDistrict);
        $stmt->bindParam(':receiverDistrict', $receiverDistrict);
        $stmt->bindParam(':receiverProvince', $receiverProvince);
        $stmt->bindParam(':receiverZip', $receiverZip);
        $stmt->bindParam(':receiveDate', $receiveDate);

        // แสเง้งตำสั่ง คำสั่ง SQL
        if ($stmt->execute()) {
            echo "ข้อมูลถูกบันทึกสำเร็จ!";
        } else {
            echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
        }
    }
} catch (PDOException $e) {
    echo "ข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล: " . $e->getMessage();
}
?>
