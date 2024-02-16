<?php 
function requeteAvis(int $infos = 0) {
    $nombreAvis = $infos;
    $pdo = new PDO('mysql:host=localhost;dbname=garagevparrot', 'root', '');
    $statement = $pdo->prepare(
        "SELECT name,first_name,comment,score 
        FROM `view` 
        WHERE active=1 
        ORDER BY id 
        LIMIT 3 OFFSET :nombreAvis
        ");
    $statement->bindValue(':nombreAvis', $nombreAvis, PDO::PARAM_INT);
    if ($statement->execute()) {
        $view = $statement->fetchAll(PDO::FETCH_ASSOC);
        $view = json_encode($view);
        echo $view;
    } else {
        echo "error";
    }
}

if(isset($_GET['limite'])) {
    $Limite = $_GET['limite'];
    requeteAvis($Limite);
} 
?>