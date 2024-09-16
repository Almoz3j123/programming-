<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root"; // ضع هنا اسم مستخدم قاعدة البيانات
$password = ""; // ضع هنا كلمة المرور الخاصة بقاعدة البيانات
$dbname = "course_registration"; // اسم قاعدة البيانات

// إنشاء اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// جلب جميع المسجلين
$sql = "SELECT id, name, email, phone, reg_date FROM registrations";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>المسجلون في الدورة</h1>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>الاسم</th>
                <th>البريد الإلكتروني</th>
                <th>رقم الهاتف</th>
                <th>تاريخ التسجيل</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["phone"] . "</td>
                <td>" . $row["reg_date"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "لا يوجد مسجلون بعد.";
}

$conn->close();
?>