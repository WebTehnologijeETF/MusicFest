<?php

$dsn = 'mysql:dbname=wt8;host=127.0.0.1';
    $user = 'wt8user';
    $password = 'wt8pass';

    try{
        $veza = new PDO($dsn, $user, $password);
     } catch (PDOException $e) {
          echo 'Konekcija nije uspjela: ' . $e->getMessage();
        }

     $veza->exec("set names utf8");


    if(isset($_POST['submit'])){

        if (isset($_GET['id']))
        $vijestID = $_GET['id'];

          $ime = htmlEntities($_POST['name'], ENT_QUOTES);
          $mail = htmlEntities($_POST['email'], ENT_QUOTES);
          $kom = htmlEntities($_POST['message'], ENT_QUOTES);

          $upit = $veza->prepare("insert INTO komentar SET vijest=?, tekst=?, autor=?");
          $upit->bindValue(1, $vijestID, PDO::PARAM_INT);
          $upit->bindValue(2, $kom, PDO::PARAM_STR);
          $upit->bindValue(3, $ime, PDO::PARAM_STR);
          $upit->execute();

          if (!$upit) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
          }
    } 

     $upit = $veza->query("select id, naslov, tekst, slika, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor from vijest order by vrijeme desc");
     if (!$upit) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }


$brojac = 0; //brojac zbog rasporeda novosti na stranici, desno i lijevo
$drugaVijest; //ako imam neparan broj novosti

foreach ($upit as $vijest) {
	$brojac++;
	$drugaVijest = false;


    $tekst = array_filter(explode("--\r\n", $vijest['tekst']));

    if($brojac % 2 != 0){

    	print "<div class='container'>";
    		print "<div class='news1'>";
    			print "<div class='title'>";
    			print "<h2>" . ucfirst(strtolower($vijest['naslov'])) . "</h2>"; //font je takav da su i mala slova velika, samo manji font
    			print "<span class = 'by'>" . date("d.m.Y. (h:i)", $vijest['vrijeme2']) . " " . $vijest['autor'] ."</span>";
    			print "</div>";
    			if($vijest['slika'] != null){
    				print "<div class='slika'>";
    				print "<img src='" . $vijest['slika'] . "' alt='slika'>";
    				print "</div>";
    			}
    			print "<p>" . $tekst[0] . "</p>";
                if(isset($tekst[1])){
                    print "<a href='#' class='button' onclick=" . "ucitaj('novostVise.php?vijest=" . $vijest['id'] .  "'); return false;" . ">More...</a>";
                }

                //broj komentara na datu vijest
                $id =  $vijest['id'];
                $upit = $veza->prepare("select COUNT(*) from komentar WHERE vijest=?");
                $upit->bindValue(1, $id, PDO::PARAM_INT);
                $upit->execute();

                $rezultat3 = $upit->fetchColumn();

          
                if (!$upit) {
                $greska = $veza->errorInfo();
                print "SQL greška: " . $greska[2];
                exit();
                 }

               
                if($rezultat3 != 0){
                    if($rezultat3 == 1)
                        print "<div class='komentar'><a href='#' onclick=" . "ucitaj('komentari.php?vijest=" . $vijest['id'] .  "'); return false;" . ">" . $rezultat3 . " comment"  . "</a></div>";
                    else
                        print "<div class='komentar'><a href='#' onclick=" . "ucitaj('komentari.php?vijest=" . $vijest['id'] .  "'); return false;" . ">" . $rezultat3 . " comments"  . "</a></div>";
                }
                
                else
                    print "<div class='komentar'><a href='#' onclick=" . "ucitaj('komentari.php?vijest=" . $vijest['id'] .  "'); return false;" . ">" . "No comments"  . "</a></div>";

    		print "</div>";
    }
   
    else{

    	print "<div class='news2'>";
    			$drugaVijest = true;
    			print "<div class='title'>";
    			print "<h2>" . ucfirst(strtolower($vijest['naslov'])) . "</h2>";
    			print "<span class = 'by'>" . date("d.m.Y. (h:i)", $vijest['vrijeme2']) . " " . $vijest['autor'] ."</span>";
    			print "</div>";
    		    if($vijest['slika'] != null){
                    print "<div class='slika'>";
                    print "<img src='" . $vijest['slika'] . "' alt='slika'>";
                    print "</div>";
                }
    			print "<p>" . $tekst[0] . "</p>";
                if(isset($tekst[1])){
                    print "<a href='#' class='button' onclick=" . "ucitaj('novostVise.php?vijest=" . $vijest['id'] .  "'); return false;" . ">More...</a>";
                }

                 //broj komentara na datu vijest
                $id =  $vijest['id'];
                $upit = $veza->prepare("select COUNT(*) from komentar WHERE vijest=?");
                $upit->bindValue(1, $id, PDO::PARAM_INT);
                $upit->execute();

                $rezultat3 = $upit->fetchColumn();

          
                if (!$upit) {
                $greska = $veza->errorInfo();
                print "SQL greška: " . $greska[2];
                exit();
                 }

                if($rezultat3 != 0){
                     if($rezultat3 == 1)
                        print "<div class='komentar'><a href='#' onclick=" . "ucitaj('komentari.php?vijest=" . $vijest['id'] .  "'); return false;" . ">" . $rezultat3 . " comment"  . "</a></div>";
                    else
                        print "<div class='komentar'><a href='#' onclick=" . "ucitaj('komentari.php?vijest=" . $vijest['id'] .  "'); return false;" . ">" . $rezultat3 . " comments"  . "</a></div>";
                }
                
                else
                   print "<div class='komentar'><a href='#' onclick=" . "ucitaj('komentari.php?vijest=" . $vijest['id'] .  "'); return false;" . ">" . "No comments"  . "</a></div>";

    		print "</div>";
    	print "</div>";
    }
    	
}

if($brojac % 2 != 0 && !$drugaVijest){
		print "</div>";
}


?>