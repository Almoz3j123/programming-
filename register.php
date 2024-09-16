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

// جلب البيانات من النموذج
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// إدخال البيانات في قاعدة البيانات
$sql = "INSERT INTO registrations (name, email, phone) VALUES ('$name', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "تم التسجيل بنجاح. سنقوم بالاتصال بك قريبًا.";
} else {
    echo "خطأ: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>