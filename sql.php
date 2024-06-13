<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT email FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        die("Bu e-posta adresi zaten kullanılıyor.");
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (firstName, lastName, email, password, birthDate, gender) VALUES (:firstName, :lastName, :email, :password, :birthDate, :gender)");
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':birthDate', $birthDate);
    $stmt->bindParam(':gender', $gender);
    $stmt->execute();

    echo "Kayıt başarılı!";
} catch(PDOException $e) {
    echo "Hata: " . $e->getMessage();
}

$conn = null;
?>
