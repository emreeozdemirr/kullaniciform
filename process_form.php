<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $birthDate = $_POST["birthDate"];
    $gender = $_POST["gender"];

    // Validasyon
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($birthDate) || empty($gender)) {
        die("Lütfen tüm alanları doldurun.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Geçersiz e-posta formatı.");
    }

    if (strlen($password) < 6) {
        die("Şifre en az 6 karakter olmalıdır.");
    }
}
?>
