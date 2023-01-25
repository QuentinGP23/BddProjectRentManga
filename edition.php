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
            <form method="post" action='edition.php'>
                <fieldset>
                    <legend>Affichage</legend>
            <table>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                        </tr>
            <?php
                   
            $servername = "localhost";
            $username = "qgeoffroyp_rentmanga";
            $password = "Onepiece54";
            $table="qgeoffroyp_rentmanga";
            $conn = mysqli_connect($servername, $username, $password, $table);
            mysqli_set_charset($conn, "utf8mb4");
            // if (isset($_POST['trie'])){
            //     $select=$_POST['trie'];
                $res="SELECT * FROM maison_edition";
                $requette1 = mysqli_query($conn, $res);
                echo '<tr>';
                while ($var = mysqli_fetch_assoc($requette1)){
                    foreach($var as $var1){
                            echo '<td>'.$var1.'</td>';
                         }
                         echo '</tr>';
                     }
            echo '</table>
            </fieldset>
            </form>';
            ?>
            
            <form method="post" action='edition.php'>
                <fieldset>
                    <legend>Maison d'édition</legend>
                    <label for="name2">Nom</label>
                    <input type="text" name="name2" id="" required>
                    <input type="submit" value="Envoyer" class="buy" name='button1'>
                </fieldset>
            </form>
            <form method="post" action='edition.php'>
                <fieldset>
                    <legend>Supprimer une maison d'édition</legend>
                    <p>Attention pour supprimer une maison d'édition, il faut que les mangas de cette maison ne soient pas loués et n'aient pas d'auteur</p>
                    <label for="idma"><h4>Rentrez l'id de la maison d'édition</h4></label>
                    <input type="text" name="idma" id="" required>
                    <input type="submit" value="Supprimer" class="buy" name='button0'>
                </fieldset>
            </form>
            <?php
            if(isset($_POST['button1'])){
                $servername2 = "localhost";
                $username2 = "qgeoffroyp_rentmanga";
                $password2 = "Onepiece54";
                $table2 = "qgeoffroyp_rentmanga";
                $conn2 = mysqli_connect($servername2, $username2, $password2, $table2);
                $nom2=$_POST['name2'];
                mysqli_set_charset($conn2, "utf8mb4");
                $requette2 = mysqli_query($conn2, "INSERT INTO maison_edition (nom_ma) VALUES('$nom2')");
            }
             function delete(){
                $servername = "localhost";
                $username = "qgeoffroyp_rentmanga";
                $password = "Onepiece54";
                $table="qgeoffroyp_rentmanga";
                $conn = mysqli_connect($servername, $username, $password, $table);
                mysqli_set_charset($conn, "utf8mb4");
                $idk = $_POST['idma'];
                mysqli_query($conn, "DELETE FROM manga WHERE id_ma = '$idk'");
                mysqli_query($conn, "DELETE FROM maison_edition WHERE id_ma = '$idk'");
                echo"La maison ".$idk." a été supprimée.";
            }
            if(isset($_POST['button0'])){
               delete();
            }
            ?>
            
            
        </main>

        <footer>
        </footer>

    </body>

</html>