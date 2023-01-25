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
            <form method="post" action='index.php'>
                <fieldset>
                    <legend>Inscription</legend>
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="" required>
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="" required>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="" required>
                    <label for='age'>Âge :</label>
                    <input type="number" name="age" id="" required>

                    
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
                $nom=$_POST['name'];
                $prenom=$_POST['prenom'];
                $email=$_POST['email'];
                $age=$_POST['age'];
                $requette = mysqli_query($conn, "INSERT INTO client (nom_client, prenom_client, mail_client, naissance_client) VALUES('$nom', '$prenom', '$email', '$age')");
                $req1=mysqli_query($conn, "SELECT id_client FROM client WHERE nom_client='$nom'");
                while($var11 = mysqli_fetch_assoc($req1)){
                    $sheee=$var11['id_client'];
                    echo "<p>Votre identifiant est : $sheee. RETENEZ LE !<p>";
                }
            }
            
            ?>
            <form method="post" action='index.php'>
                <fieldset>
                    <legend>Liste manga</legend>
                <table>
                <!--<label for="trie">Trier :</label>-->
                <!--    <select name="trie" id="">-->
                <!--        <option value="manga.prix_manga">Prix ↑</option>-->
                <!--        <option value="manga.prix_manga DESC">Prix ↓</option>-->
                <!--        <option value="manga.nom_manga">Nom ↑</option>-->
                <!--        <option value="manga.nom_manga DESC">Nom ↓</option>-->
                <!--        <option value="auteur.nom_auteur">Auteur ↑</option>-->
                <!--        <option value="auteur.nom_auteur DESC">Auteur ↓</option>-->
                <!--        <option value="maison_edition.nom_ma">Editeur ↑</option>-->
                <!--        <option value="maison_edition.nom_ma DESC">Editeur ↓</option>-->
                <!--    </select>-->
                        <tr>
                            <th>Nom</th>
                            <th>Prix</th>
                            <th>Stock</th>
                            <th>Edition</th>
                            <th>Auteur</th>
                        </tr>
                        <!----------------------affichage des mangas----------------------->
                    <?php
                    // 
                        $servername = "localhost";
                        $username = "qgeoffroyp_rentmanga";
                        $password = "Onepiece54";
                        $table="qgeoffroyp_rentmanga";
                        $conn = mysqli_connect($servername, $username, $password, $table);
                        // 
                        mysqli_set_charset($conn, "utf8mb4");
                        // if (isset($_POST['trie'])){
                        //     $select=$_POST['trie'];
                            $res="SELECT manga.nom_manga, manga.prix_manga, manga.stock, maison_edition.nom_ma, auteur.nom_auteur FROM manga LEFT JOIN maison_edition ON manga.id_ma=maison_edition.id_ma LEFT JOIN ecrire ON manga.id_manga=ecrire.id_manga LEFT JOIN auteur ON ecrire.id_auteur=auteur.id_auteur ";
                            $requette1 = mysqli_query($conn, $res);
                            echo '<tr>';
                            while ($var = mysqli_fetch_assoc($requette1)){
                                foreach($var as $var1){
                                    echo '<td>'.$var1.'</td>';
                                }
                                echo '</tr>';
                        //     }
                        }
                   
                    ?>
                    </table>
            </fieldset>
            </form>
           
            <form method="post" action='index.php'>
                <fieldset>
                    <legend>Location</legend>
                    <label for="name">id client :</label>
                    <input type="text" name="id" id="" required>
                    <label for="prenom">Manga à louer :</label>
                    <input type="text" name="manga" id="" required>
                    <label for="dated">Date de début</label>
                    <input type="date" name="dated" id="" required>
                    <label for="datef">Date de fin</label>
                    <input type="date" name="datef" id="" required>
                    
                    
                    <input type="submit" value="Envoyer" class="buy" name='go3'>
                </fieldset>
            </form>

        </main>
<?php
    $servername = "localhost";
    $username = "qgeoffroyp_rentmanga";
    $password = "Onepiece54";
    $table="qgeoffroyp_rentmanga";
    $conn = mysqli_connect($servername, $username, $password, $table);
    mysqli_set_charset($conn, "utf8mb4");
    if(isset($_POST['go3'])){
        $idclient=$_POST['id'];
        $nommanga=$_POST['manga'];
        $dated=$_POST['dated'];
        $datef=$_POST['datef'];
        $idk3="(SELECT id_manga FROM manga WHERE nom_manga='$nommanga')";
        mysqli_query($conn, "INSERT INTO location (id_client, id_manga, date_debut, date_fin) VALUES($idclient, $idk3, $dated, $datef)");
        mysqli_query($conn, "UPDATE manga SET stock = GREATEST(0, stock - 1) WHERE nom_manga='$nommanga'");
    }
    
?>
        <footer>
        </footer>

    </body>

</html>