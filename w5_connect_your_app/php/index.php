<?php

$host = 'db';
$db   = 'pnc';
$user = 'user';
$pass = 'pass';
$port = "3306";
$charset = 'utf8mb4';

$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];

$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
$pdo = new \PDO($dsn, $user, $pass, $options);

$stmt = $pdo->prepare("
    INSERT INTO mahasiswa 
    (nama, alamat, email, nik, wilayah_id)
    VALUEs 
    (:nama, :alamat, :email, :nik, :wid)");
$stmt->execute(['nama' => 'ARIS P', 'alamat' => "Ssskkh", 
'email' => 'soedo@gmail.com', 'nik' => '7654', 'wid' => 1]);

$stmt = $pdo->query('SELECT * FROM mahasiswa');
$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($rs) {
  foreach ($rs as $row) {
    echo $row['id'] . ',' . $row['nama'] . '<br>';
    // etc ...
  }
}