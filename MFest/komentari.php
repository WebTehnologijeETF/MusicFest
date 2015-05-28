<?php

     
    $dsn = 'mysql:dbname=wt8;host=127.0.0.1';
    $user = 'wt8user';
    $password = 'wt8pass';

     try{
        $veza = new PDO($dsn, $user, $password);
     } catch (PDOException $e) {
          echo 'Konekcija nije uspjela: ' . $e->getMessage();
        }

    if (isset($_GET['vijest'])){
        $id = $_GET['vijest'];
     
     $veza->exec("set names utf8");

     $upit = $veza->prepare("select tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2 from komentar WHERE vijest=? order by vrijeme desc");
     $upit->bindValue(1, $id, PDO::PARAM_INT);
     $upit->execute();

     if (!$upit) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }

   }
       print "<div class='container'>";

       ?>
<form action="index.php?id=<?=$id?>" method="post">
        <fieldset>
        <legend accesskey=I></legend>
        Name<br>
        <input type="text" name="name" onblur="validirajIme(this.form)">
        <div ID="error1"></div>
        E-mail<br>
        <input type="text" name="email" onblur="validirajMailKomentar(this.form)">
        <div ID="error2"></div>
        <br>
        <br>Your comment<br>
        <textarea name="message" rows=2 cols=20 onchange="validirajPoruku(this.form)"></textarea>
        <br>
        <input type="submit" value="Send" name="submit" onclick="return validacijaKomentara(this.form);">
        </fieldset>
    </form>
<?php
            if(isset($id)){

              print "<div class='vijest'>";
                print "<div class='title'>";
                    print "<h2> Comments </h2>";
                print "</div>";

                foreach ($upit as $komentar) {

                print "<div class='blok'>";
                    print "By: " . $komentar['autor'];
                    print "<div class='datum'> Posted: " . date("d.m.Y. (h:i)", $komentar['vrijeme2']) . "</div>";
                    print "<p>" . $komentar['tekst'] . "</p>";
                print "</div><br>";
                    
                }

            print "</div>";
        print "</div>";
            }
             

?>
