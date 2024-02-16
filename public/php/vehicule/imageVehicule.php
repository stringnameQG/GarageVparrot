<?php
function requeteVehiculeImage() 
{
    $pdo = new PDO('mysql:host=localhost;dbname=garagevparrot', 'root', '');
    $statement = $pdo->prepare(
        "SELECT
        car_id,
        name
        FROM `picturecar`
        WHERE car_id 
        IN  (12, 13) 
        ORDER BY car_id 
        ");
    // $statement->bindValue(':vehiculeImage', $vehiculeImage, PDO::PARAM_INT);
    if ($statement->execute()) {
        $vehiculeImage = $statement->fetchAll(PDO::FETCH_ASSOC);
        $vehiculeImage = json_encode($vehiculeImage);
        echo $vehiculeImage;
    } else {
        echo "error";
    }
}

if(isset($_GET['idVehiculeList'])) {
    echo "Dans imageVehicule.php";
    /*
    $idVehiculeList = $_GET['idVehiculeList'];
    echo $idVehiculeList;
    $idImageListe = [];
    foreach ($idVehiculeList as $value){
        array_push($idImageListe, $value);
    }
    echo "Le tableau " + $idImageListe;
    requeteVehiculeImage();
    */
} else {
    echo "Vide";
}
?>