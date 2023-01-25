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
                <a href="reservation.php">Réservations</a>
                <a href="client.php">Administrateur</a>
            </nav>
        </header>

        <main>
            <form method="post" action='reservation.php'>
                <fieldset>
                    <label for="name">Entrez votre ID client :</label>
                    <input type="text" name="id1" required>
                    <input type="submit" value="Envoyer" class="buy" name='go'>
                </fieldset>
            </form>
            <?php
            if(isset($_POST['go'])){
            $servername = "localhost";
            $username = "qgeoffroyp_rentmanga";
            $password = "Onepiece54";
            $table="qgeoffroyp_rentmanga";
            $conn = mysqli_connect($servername, $username, $password, $table);
            mysqli_set_charset($conn, "utf8mb4");
            $idk=$_POST['id1'];
            $res="SELECT manga.nom_manga, manga.prix_manga FROM location INNER JOIN manga ON location.id_manga=manga.id_manga INNER JOIN client ON location.id_client=client.id_client WHERE location.id_client='$idk'";
            $requette1 = mysqli_query($conn, $res);
            $res1=mysqli_query($conn, "SELECT prenom_client FROM client WHERE id_client='$idk'");
            while ($var2 = mysqli_fetch_assoc($res1)){
                foreach($var2 as $var3){
                    echo 'Commandes de '.$var3;
                }
            }
            echo '<table>
            <tr>
            <th>Manga</th>
            <th>Prix</th>
            </tr>
            <tr>';
            while ($var = mysqli_fetch_assoc($requette1)){
                foreach($var as $var1){
                    echo '<td>'.$var1.'</td>';
                }
                echo '</tr>';
            }
            }
            ?>
            </table>
            </fieldset>
            </form>
        </main>

        <footer>
        </footer>

    </body>

</html>