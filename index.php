<?php
// try to connect to the database
try {
    $bdd = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'toms', 'root');
// if connection OK then do the following:
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        if (isset($_POST['city'], $_POST['high'], $_POST['low'])) {
            $stmt = $bdd->prepare('INSERT INTO météo (ville, haut, bas) VALUES (?, ?, ?)');
            $stmt->execute([$_POST['city'], $_POST['high'], $_POST['low']]);
        } elseif (isset($_POST['delete'])) {
            $stmt = $bdd->prepare('DELETE FROM météo WHERE ville = ?');
            $stmt->execute([$_POST['delete']]);
        }
    }

    $result = $bdd->query('SELECT * FROM météo')->fetchAll(PDO::FETCH_ASSOC);
    //if connection KO then do the following:
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO WeatherApp</title>
</head>
<body>
<table>
    <form method="post">
        <?php foreach ($result as $row): ?>
            <tr>
                <td><?= $row['ville'] ?></td>
                <td><?= $row['haut'] ?></td>
                <td><?= $row['bas'] ?></td>
                <td>
                    <input type="checkbox" name="delete[]" value="<?= $row['ville'] ?>">
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4">
                <input type="submit" value="Delete Selected">
            </td>
        </tr>
    </form>
</table>

    <form method="post">
        <input type="text" name="city" placeholder="City">
        <input type="text" name="high" placeholder="High">
        <input type="text" name="low" placeholder="Low">
        <input type="submit" value="Add">
    </form>
</body>
</html>