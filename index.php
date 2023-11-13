<!-- Weather App using PDO-->

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
            foreach ($_POST['delete'] as $city) {
                $stmt->execute([$city]);
            }
        }
        header("Location: index.php"); // Redirect to the same page (refresh without POST data)
        exit;
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
<main id="main">
<h1>WeatherApp</h1>
<table>
    <form method="post">
        <?php foreach ($result as $row): ?>
            <tr>
                <td id="city"><?= $row['ville'] ?></td>
                <td><?= $row['haut'] ?></td>
                <td><?= $row['bas'] ?></td>
                <td>
                    <input class="checkBox" type="checkbox" name="delete[]" value="<?= $row['ville'] ?>">
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4">
                <input class="btn" type="submit" value="Delete Selected">
            </td>
        </tr>
    </form>
</table>
<h2>Add a city</h2>
    <form method="post">
        <input style="width: 170px" type="text" name="city" placeholder="City"><br>
        <input style="width: 70px" type="text" name="high" maxlength="6" placeholder="High">
        <input style="width: 70px" type="text" name="low" maxlength="6" placeholder="Low">
        <input class="btn" type="submit" value="Add">
    </form>
</main>

<!--Not much style, so here it is: -->
    <style>  
    body {
        font-family: 'Courier New', monospace;
        margin: 0;
        padding: 0;
        background-color: #000;
        color: #0f0;
    }
    h1, h2 {
        color: #0f0;
    }
    table {
        width: 33%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid #800080;
    }
    #city {
        padding: 5px;
        text-align: left;
    }
    
    td {
        padding: 5px;
        text-align: center;
    }
    form {
        margin-bottom: 20px;
        
    }
    input[type="text"] {
        padding: 5px;
        margin-right: 10px;
        margin-bottom: 5px;
        background-color: #000;
        color: #0f0;
        border: 1px solid #0000FF;
    }

    #main {
        margin: 0 auto;
        width: 80%;
    }

    .checkBox {
        margin-left: auto;
        margin-right: auto;
    text-align: center;
}

.btn {
    background-color: #000;
    color: #0f0;
    border: 2px solid #0f0;
    padding: 5px 10px;
    text-decoration: none;
    cursor: pointer;
}
.btn:hover {
    background-color: #0f0;
    color: #000;
}
    </style>
</body>
</html>