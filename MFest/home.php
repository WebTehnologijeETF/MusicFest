<?php
session_start();

$files = glob("../MFest/novosti/*.txt");
usort($files, function($a, $b){
	 $file1 = fopen($a, "r");
	 $file2 = fopen($b, "r");
	 return strtotime(fgets($file1)) < strtotime(fgets($file2));
}); //sortiranje fajlova po datumu

$brojac = 0; //brojac zbog rasporeda novosti na stranici, desno i lijevo
$drugaVijest; //ako imam neparan broj novosti

foreach ($files as $file) {
	$brojac++;
	$drugaVijest = false;
    $news = fopen($file,"r");
   	  
    $datum = fgets($news);
    $autor = fgets($news);
    $naslov = fgets($news);
    $slika = fgets($news);

    $osnovni = "";
    $ostalo = "";

    while (!feof($news)){

    	$linija = fgets($news);
    	if($linija != "--\r\n"){
    		$osnovni = $osnovni . $linija;
    	}
    	else{

    		do{
    			$ostalo = $ostalo . fgets($news);
    		} while(!feof($news));
    		break;
    	}
    	
    }

    if($brojac % 2 != 0){

    	print "<div class='container'>";
    		print "<div class='news1'>";
    			print "<div class='title'>";
    			print "<h2>" . ucfirst(strtolower($naslov)) . "</h2>"; //font je takav da su i mala slova velika, samo manji font
    			print "<span class = 'by'>" . $datum . " " . $autor ."</span>";
    			print "</div>";
    			if($slika != "\r\n"){
    				print "<div class='slika'>";
    				print "<img src='" . $slika . "' alt='slika'>";
    				print "</div>";
    			}
    			print "<p>" . $osnovni . "</p>";
                if($ostalo != ""){
                    $_SESSION["datum"] = $datum;
                    $_SESSION["autor"] = $autor;
                    $_SESSION["naslov"] = $naslov;
                    $_SESSION["slika"] = $slika;
                    $_SESSION["osnovni"] = $osnovni;
                    $_SESSION["ostalo"] = $ostalo;
                    print "<a href='#' class='button' onclick=" . "ucitaj('novostVise.php'); return false;" . ">More...</a>";
                }
    		print "</div>";
    }
   
    else{

    	print "<div class='news2'>";
    			$drugaVijest = true;
    			print "<div class='title'>";
    			print "<h2>" . ucfirst(strtolower($naslov)) . "</h2>";
    			print "<span class = 'by'>" . $datum . " " . $autor ."</span>";
    			print "</div>";
    			if($slika != "\r\n"){
    				print "<div class='slika'>";
    				print "<img src='" . $slika . "' alt='slika'>";
    				print "</div>";
    			}
    			print "<p>" . $osnovni . "</p>";
                if($ostalo != ""){
                    $_SESSION["datum"] = $datum;
                    $_SESSION["autor"] = $autor;
                    $_SESSION["naslov"] = $naslov;
                    $_SESSION["slika"] = $slika;
                    $_SESSION["osnovni"] = $osnovni;
                    $_SESSION["ostalo"] = $ostalo;
                    print "<a href='#' class='button' onclick=" . "ucitaj('novostVise.php'); return false;" . ">More...</a>";
                }
    		print "</div>";
    	print "</div>";
    }
    	

	fclose($news);
}

if($brojac % 2 != 0 && !$drugaVijest){
		print "</div>";
}

?>