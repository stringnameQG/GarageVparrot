<?php 
function requeteVehicule(
    int $prixMinimum = 0,
    int $prixMaximum = 1000000,
    int $killometrageMinimum = 0,
    int $killometrageMaximum = 1000000,
    int $anneeMiseEnciculationMinimum = 1900,
    int $anneeMiseEnciculationMaximum = 2200,
    ) {
    $pdo = new PDO('mysql:host=localhost;dbname=garagevparrot', 'root', '');
    $statement = $pdo->prepare(
        "SELECT *
        FROM `car`
        RIGHT JOIN `picturecar` 
        ON car.id = picturecar.car_id 
        WHERE 
            (price BETWEEN :prixMinimum AND :prixMaximum) AND
            (killometering BETWEEN :killometrageMinimum AND :killometrageMaximum) AND
            (circulation BETWEEN :anneeMiseEnciculationMinimum AND :anneeMiseEnciculationMaximum)
        ORDER BY car.price
        ");
    $statement->bindValue(':prixMinimum', $prixMinimum, PDO::PARAM_INT);
    $statement->bindValue(':prixMaximum', $prixMaximum, PDO::PARAM_INT);
    $statement->bindValue(':killometrageMinimum', $killometrageMinimum, PDO::PARAM_INT);
    $statement->bindValue(':killometrageMaximum', $killometrageMaximum, PDO::PARAM_INT);
    $statement->bindValue(':anneeMiseEnciculationMinimum', $anneeMiseEnciculationMinimum, PDO::PARAM_INT);
    $statement->bindValue(':anneeMiseEnciculationMaximum', $anneeMiseEnciculationMaximum, PDO::PARAM_INT);
    if ($statement->execute()) {
        $car = $statement->fetchAll(PDO::FETCH_ASSOC);
        $car = json_encode($car);
        echo $car;
    } else {
        echo "error";
    }
}

if(isset($_GET['prixMinimum'])) {
    $prixMinimum = $_GET['prixMinimum'];
    $prixMaximum = $_GET['prixMaximum'];
    $killometrageMinimum = $_GET['killometrageMinimum'];
    $killometrageMaximum = $_GET['killometrageMaximum'];
    $anneeMiseEnciculationMinimum = $_GET['anneeMiseEnciculationMinimum'];
    $anneeMiseEnciculationMaximum = $_GET['anneeMiseEnciculationMaximum'];
    requeteVehicule(
        $prixMinimum,
        $prixMaximum,
        $killometrageMinimum, 
        $killometrageMaximum,
        $anneeMiseEnciculationMinimum,
        $anneeMiseEnciculationMaximum
    );
}
?>