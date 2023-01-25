<!DOCTYPE html>
<html lang="fr">

    <head>
        <title>location</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-compatible" content="IE=edge">
        <meta name="Author" content="GEOFFROY PITAILLER Quentin">
        <meta name="description" content="index">
        <meta name="keywords" content="sae,bdd,php,uvsq">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="main.css">
    </head>

    <body>
        <header class="header">
            <img src="img/logo.svg.png" alt="logo" class="logo">
            <nav class="headernav">
                <a href="index.php">Accueil</a>
                <a href="client.php">Client</a>
                <a href="manga.php">Manga</a>
                <a href="auteur.php">Auteur</a>
                <a href="edition.php">Maison d'edition</a>
                <a href="bilan.php">Bilan</a>
            </nav>
        </header>

        <main>
            <form method="post" action="manga.php">
                <fieldset>
                    <legend>réservations</legend>
                    
                    <table>
                        <tr>
                            <th>Id client</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Manga</th>
                            <th>Prix</th>
                            <th>Date début</th>
                            <th>Date fin</th>
                        </tr>
            <?php
                        $servername = "localhost";
                        $username = "qgeoffroyp_rentmanga";
                        $password = "Onepiece54";
                        $table="qgeoffroyp_rentmanga";
                        $conn = mysqli_connect($servername, $username, $password, $table);
                        // 
                        mysqli_set_charset($conn, "utf8mb4");
                            $res="SELECT client.id_client, client.prenom_client, client.nom_client, manga.nom_manga, manga.prix_manga, location.date_debut, location.date_fin FROM client INNER JOIN location ON client.id_client=location.id_client INNER JOIN manga ON location.id_manga=manga.id_manga ORDER BY client.nom_client";
                            $requette1 = mysqli_query($conn, $res);
                            echo '<tr>';
                            while ($var = mysqli_fetch_assoc($requette1)){
                                foreach($var as $var1){
                                    echo '<td>'.$var1.'</td>';
                                }
                                echo '</tr>';
                        //     }
                        }
                   
                    
                    echo '</table>
            </fieldset>
            </form>';
            
            echo "<form>
                <fieldset>
             <legend>Chiffrre d'affaire :</legend>";
             echo "<h2>Chiffrre d'affaire total:</h2>";
            $a=mysqli_query($conn,"SELECT SUM(prix_manga) FROM location INNER JOIN manga ON location.id_manga=manga.id_manga");
            while($var2=mysqli_fetch_assoc($a)){
                foreach($var2 as $var3){
                    echo '<p>'.$var3.'€</p>';
                }
            }
                echo "<table>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Prix total</th>
                        </tr>";
            
            $a1=mysqli_query($conn,"SELECT client.nom_client, client.prenom_client, SUM(prix_manga) FROM location INNER JOIN manga ON location.id_manga=manga.id_manga INNER JOIN client ON location.id_client=client.id_client GROUP BY client.nom_client ORDER BY SUM(prix_manga) DESC");
            while($var5=mysqli_fetch_assoc($a1)){
                echo '<tr>';
                foreach($var5 as $indice1 =>$var4){
                    
                    if($indice1=='SUM(prix_manga)'){
                        echo '<td>'.$var4.'€</td>';
                    }
                    else{
                        echo '<td>'.$var4.'</td>';
                    }
                    
                }
                echo '</tr>';
            }
            echo "<h2>Manga le plus loué :</h2>";
            $a3=mysqli_query($conn,"SELECT manga.nom_manga, COUNT(location.id_manga) AS total FROM location INNER JOIN manga ON location.id_manga=manga.id_manga GROUP BY manga.nom_manga ORDER BY total DESC LIMIT 1");
            while($var12=mysqli_fetch_assoc($a3)){
                foreach($var12 as $indice3 => $var13){
                    if($indice3=='nom_manga'){
                    echo '<p>'.$var13.'</p>';
                    }
                }
            }
            echo "<h2>Chiffre d'affaire par client :</h2>";
            
?>
</table>
</fieldset>
</form>
        </main>

        <footer>
        </footer>

    </body>

</html>