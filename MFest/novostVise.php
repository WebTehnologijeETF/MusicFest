<?php

     
    $dsn = 'mysql:dbname=wt8;host=127.0.0.1';
    $user = 'wt8user';
    $password = 'wt8pass';

     try{
        $veza = new PDO($dsn, $user, $password);
     } catch (PDOException $e) {
          echo 'Konekcija nije uspjela: ' . $e->getMessage();
        }

    if (isset($_GET['vijest']))
        $id = $_GET['vijest'];
     
     $veza->exec("set names utf8");
     $upit = $veza->prepare("select id, naslov, tekst, slika, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor from vijest where id=?");
     $upit->bindValue(1, $id, PDO::PARAM_INT);
     $upit->execute();

     if (!$upit) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }

    foreach ($upit as $vijest) {

        print "<div class='container'>";
            print "<div class='vijest'>";
                print "<div class='title'>";
                    print "<h2>" . ucfirst(strtolower($vijest['naslov'])) . "</h2>";
                    print "<span class = 'by'>" .  date("d.m.Y. (h:i)", $vijest['vrijeme2']) . " " . $vijest['autor'] ."</span>";
                print "</div>";
                if($vijest['slika'] != null){
                    print "<div class='vecaSlika'>";
                    print "<img src='" . $vijest['slika'] . "' alt='slika'>";
                    print "</div>";
                }

                $tekst = array_filter(explode("--\r\n", $vijest['tekst']));
                print "<p>" . $tekst[0] . "</p>";
                if(isset($tekst[1])){
                    print "<p>" . $tekst[1] . "</p>";
                }

            print "</div>";
        print "</div>";

        $rezultat2 = $veza->query("select tekst, autor, vrijeme from komentar WHERE vijest=" . $id );
          

        if (!$rezultat2) {
        $greska = $veza->errorInfo();
        print "SQL greška: " . $greska[2];
        exit();
        }

    //    foreach($rezultat2 as $komentar){
    //       print $komentar['tekst'];
    //    }
    }

?>
