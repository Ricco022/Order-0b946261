<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<a href="index.php">Terug</a>
<?php
$host = 'localhost';
$db   = 'netland';
$user = 'root';
$pass = 'HywtGBNiwu823@';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$query = 'SELECT * FROM films WHERE id =' . $_GET['id'];
$result = $pdo->query($query)->fetch();
?>
    <h1><?php echo $result['title'] ?> - <?php echo $result['duration'] ?></h1>
    <table>
        <tbody>
        <tr>
            <td><strong>Datum van uitkomst</strong></td>
            <td><?php echo $result['date'] ?></td>
        </tr>
        <tr>
            <td><strong>Land van uitkomst</strong></td>
            <td><?php echo $result['country'] ?></td>
        </tr>
        </tbody>
    </table>
    <p><?php echo $result['description'] ?></p>

<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $result['trailer'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

</body>
</html>