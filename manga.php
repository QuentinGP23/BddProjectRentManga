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
        <script src="jquery-3.6.0.min.js"></script>
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
                    <legend>Mangas</legend>
                    
                    <table>
                        <tr>
                            <th>ID</th>
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
                            $res="SELECT manga.id_manga, manga.nom_manga, manga.prix_manga, manga.stock, maison_edition.nom_ma, auteur.nom_auteur FROM manga LEFT JOIN maison_edition ON manga.id_ma=maison_edition.id_ma LEFT JOIN ecrire ON manga.id_manga=ecrire.id_manga LEFT JOIN auteur ON ecrire.id_auteur=auteur.id_auteur ";
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
            <!------------------------------------------------------------------------>
            <!--insertion-->
            <form method="post" action='manga.php'>
                <fieldset>
                    <legend>Insérer un manga</legend>
                    <label for="nom"><h4>Nom</h4></label>
                    <input type="text" name="nom" id="" required>
                    <label for="prix"><h4>prix</h4></label>
                    <input type="number" name="prix" min="0.00" max="100.00" step="0.01" id="" required>
                    <label for="stock"><h4>Stock</h4></label>
                    <input type="text" name="stock" id="" required>
                    <label for='ma'><h4>Maison d'édition</h4></label>
                        <?php
                        // ouverture table
                        $servername = "localhost";
                        $username = "qgeoffroyp_rentmanga";
                        $password = "Onepiece54";
                        $table="qgeoffroyp_rentmanga";
                        $conn = mysqli_connect($servername, $username, $password, $table);
                        // 
                        mysqli_set_charset($conn, "utf8mb4");
                        $res= mysqli_query($conn, "SELECT nom_ma FROM maison_edition");
                        while($var=mysqli_fetch_assoc($res)){
                            echo "<tr>";
                            $idk2 = $var['nom_ma'];
                            echo "$idk2 <input type='radio'  name='ma' value='$idk2'/><br>";
                            echo "</tr>";
                        }
                        echo "<br>";  
                        $res1= mysqli_query($conn, "SELECT nom_auteur, prenom_auteur FROM auteur");
                        echo "<label for='auteur'><h4>Auteur</h4></label>";
                        while($var1 = mysqli_fetch_assoc($res1)){
                            echo "<tr>";
                            $var2 = $var1['nom_auteur'];
                            $var0 = $var1['prenom_auteur'];
                            echo "$var0 $var2 <input type='radio'  name='auteur' value='$var2'/><br>";
                            echo "<tr>";    
                        echo "</table>";
            
                        }
                        ?>
                    <input type="submit" value="Envoyer" class="buy" name='go2'>
                </fieldset>
            </form>
            <form method="post" action='manga.php'>
                <fieldset>
                    <legend>Supprimer un manga</legend>
                    <label for="idmanga1"><h4>Rentrez l'id du manga</h4></label>
                    <input type="text" name="idmanga1" id="" required>
                    <input type="submit" value="Supprimer" class="buy" name='click'>
                </fieldset>
            </form>
            
            <?php
            function insert(){
        //////////ouverture table////////////////////////////////
                
            }
            $servername = "localhost";
            $username = "qgeoffroyp_rentmanga";
            $password = "Onepiece54";
            $table="qgeoffroyp_rentmanga";
            $conn = mysqli_connect($servername, $username, $password, $table);
            if(isset($_POST['go2'])){
                $servername = "localhost";
                $username = "qgeoffroyp_rentmanga";
                $password = "Onepiece54";
                $table="qgeoffroyp_rentmanga";
                $conn = mysqli_connect($servername, $username, $password, $table);
        ////////////////////////////////////////////////////////////////
                mysqli_set_charset($conn, "utf8mb4");
                $idk3=$_POST['ma'];
                $nom=$_POST['nom'];
                $prix=$_POST['prix'];
                $stock=$_POST['stock'];
                mysqli_query($conn, "INSERT INTO manga (nom_manga, prix_manga, stock, id_ma) VALUES('$nom', '$prix', '$stock', (SELECT id_ma FROM maison_edition WHERE nom_ma = '$idk3'))") or die(mysqli_error($conn));
                //////////////////////////////////////////////////
                $idk4 = $_POST['auteur'];
                $idk5="(SELECT id_auteur FROM auteur WHERE nom_auteur = '$idk4')";
                $idk6="(SELECT id_manga FROM manga WHERE nom_manga = '$nom')";
                mysqli_query($conn, "INSERT INTO ecrire (id_auteur, id_manga) VALUES($idk5, $idk6)") or die(mysqli_error($conn));
                $var1=mysqli_query($conn, "SELECT id_auteur FROM auteur WHERE nom_auteur = '$idk4'");
            }
            //////////////////////////////////////////////////////////////
            
            function delete(){
                $servername = "localhost";
                $username = "qgeoffroyp_rentmanga";
                $password = "Onepiece54";
                $table="qgeoffroyp_rentmanga";
                $conn = mysqli_connect($servername, $username, $password, $table);
                mysqli_set_charset($conn, "utf8mb4");
                $zbre = $_POST['idmanga1'];
                mysqli_query($conn, "DELETE FROM location WHERE id_manga = '$zbre'");
                mysqli_query($conn, "DELETE FROM ecrire WHERE id_manga = '$zbre'");
                mysqli_query($conn, "DELETE FROM manga WHERE id_manga = '$zbre'");
                echo"Le manga ".$zbre." a été supprimée.";
            }
            if(isset($_POST['click'])){
               delete();
            }
            ?>
            
            
        </main>

        <footer>
        </footer>

    </body>

</html>