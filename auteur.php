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
            
            <form method="post" action='auteur.php'>
                <fieldset>
                    <legend>Clients</legend>
            <table>
                        <tr>
                            <th>Id auteur</th>
                            <th>Nom</th>
                            <th>Prenom</th>
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
                            $res="SELECT id_auteur, nom_auteur, prenom_auteur FROM auteur GROUP BY nom_auteur";
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
            
            <form method="post" action='auteur.php'>
                <fieldset>
                    <legend>Auteur</legend>
                    <label for="name1">Nom</label>
                    <input type="text" name="name1" id="" required>
                    <label for="prenom1">Prénom</label>
                    <input type="text" name="prenom1" id="" required>
                    <input type="submit" value="Envoyer" class="buy" name='button'>
                </fieldset>
            </form>
            <form method="post" action='auteur.php'>
                <fieldset>
                    <legend>Supprimer un auteur</legend>
                    <label for="idauteur"><h4>Rentrez l'id de l'auteur</h4></label>
                    <input type="text" name="idauteur" id="" required>
                    <input type="submit" value="Supprimer" class="buy" name='button1'>
                </fieldset>
            </form>
            <?php
            if(isset($_POST['button'])){
                $servername1 = "localhost";
                $username1 = "qgeoffroyp_rentmanga";
                $password1 = "Onepiece54";
                $table1="qgeoffroyp_rentmanga";
                $conn1 = mysqli_connect($servername1, $username1, $password1, $table1);
                $nom1=$_POST['name1'];
                $prenom1=$_POST['prenom1'];
                $requette1 = mysqli_query($conn1, "INSERT INTO auteur (nom_auteur, prenom_auteur) VALUES('$nom1', '$prenom1')");
            }
            function delete(){
                $servername = "localhost";
                $username = "qgeoffroyp_rentmanga";
                $password = "Onepiece54";
                $table="qgeoffroyp_rentmanga";
                $conn = mysqli_connect($servername, $username, $password, $table);
                mysqli_set_charset($conn, "utf8mb4");
                $idk = $_POST['idauteur'];
                mysqli_query($conn, "DELETE FROM ecrire WHERE id_auteur = '$idk'");
                mysqli_query($conn, "DELETE FROM auteur WHERE id_auteur = '$idk'");
                echo"Le client ".$idk." a été supprimée.";
            }
            if(isset($_POST['button1'])){
               delete();
            }
            ?>
            
            
        </main>

        <footer>
        </footer>

    </body>

</html>