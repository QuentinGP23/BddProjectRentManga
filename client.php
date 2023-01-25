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
            
            
            <form method="post" action='client.php'>
                <fieldset>
                    <legend>Clients</legend>
            <table>
                        <tr>
                            <th>Id client</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Âge</th>
                            <th>Email</th>
                        </tr>
                        <!----------------------affichage des Clients----------------------->
                    <?php
                   
                        $servername = "localhost";
                        $username = "qgeoffroyp_rentmanga";
                        $password = "Onepiece54";
                        $table="qgeoffroyp_rentmanga";
                        $conn = mysqli_connect($servername, $username, $password, $table);
                        mysqli_set_charset($conn, "utf8mb4");
                        // if (isset($_POST['trie'])){
                        //     $select=$_POST['trie'];
                            $res="SELECT id_client, nom_client, prenom_client, naissance_client, mail_client FROM client GROUP BY nom_client";
                            $requette1 = mysqli_query($conn, $res);
                            echo '<tr>';
                            while ($var = mysqli_fetch_assoc($requette1)){
                                foreach($var as $indice => $var1){
                                        echo '<td>'.$var1.'</td>';
                                     }
                                     echo '</tr>';
                                 }
                                 
                    echo '</table>
                    </fieldset>
            </form>';
            ?>
            <!------------------------------------------------------------------------>
            <form method="post" action='client.php'>
                <fieldset>
                    <legend>Supprimer toutes les réservations d'un client</legend>
                    <label for="idclient1"><h4>Rentrez l'id du client</h4></label>
                    <input type="text" name="idclient1" id="" required>
                    <input type="submit" value="Supprimer" class="buy" name='button1'>
                </fieldset>
            </form>
            
            <form method="post" action='client.php'>
                <fieldset>
                    <legend>Supprimer un client</legend>
                    <label for="idclient"><h4>Rentrez l'id du client</h4></label>
                    <input type="text" name="idclient" id="" required>
                    <input type="submit" value="Supprimer" class="buy" name='button'>
                </fieldset>
            </form>
            <?php
            
            function delete(){
                $servername = "localhost";
                $username = "qgeoffroyp_rentmanga";
                $password = "Onepiece54";
                $table="qgeoffroyp_rentmanga";
                $conn = mysqli_connect($servername, $username, $password, $table);
                mysqli_set_charset($conn, "utf8mb4");
                $idk = $_POST['idclient'];
                mysqli_query($conn, "DELETE FROM location WHERE id_client = '$idk'");
                mysqli_query($conn, "DELETE FROM client WHERE id_client = '$idk'");
                echo"Le client ".$idk." a été supprimée.";
            }
            if(isset($_POST['button'])){
               delete();
            }
            ///////////////////////////////////////////////////////////
            function delete1(){
                $servername = "localhost";
                $username = "qgeoffroyp_rentmanga";
                $password = "Onepiece54";
                $table="qgeoffroyp_rentmanga";
                $conn = mysqli_connect($servername, $username, $password, $table);
                mysqli_set_charset($conn, "utf8mb4");
                $idk1 = $_POST['idclient1'];
                mysqli_query($conn, "DELETE FROM location WHERE id_client = '$idk1'");
                echo"La réservation du client ".$idk1." a été supprimée.";
            }
            if(isset($_POST['button1'])){
               delete1();
            }
    ?>
    
        </main>

        <footer>
        </footer>

    </body>

</html>