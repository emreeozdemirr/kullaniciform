<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT firstName, lastName, email FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll();

    echo "<h2>Kayıtlı Kullanıcılar</h2>";
    echo "<table border='1'>
            <tr>
                <th>İsim</th>
                <th>Soyisim</th>
                <th>E-posta</th>
            </tr>";

    foreach ($users as $user) {
        echo "<tr>
                <td>{$user['firstName']}</td>
                <td>{$user['lastName']}</td>
                <td>{$user['email']}</td>
              </tr>";
    }

    echo "</table>";
} catch(PDOException $e) {
    echo "Hata: " . $e->getMessage();
}

$conn = null;
?>
