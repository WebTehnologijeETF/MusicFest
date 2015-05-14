<?php
session_start();
 					$datum = $_SESSION["datum"];
                    $autor = $_SESSION["autor"];
                    $naslov = $_SESSION["naslov"];
                    $slika = $_SESSION["slika"];
                    $osnovni = $_SESSION["osnovni"];
                    $ostalo = $_SESSION["ostalo"];
session_unset();

		print "<div class='container'>";
    		print "<div class='vijest'>";
    			print "<div class='title'>";
    				print "<h2>" . ucfirst(strtolower($naslov)) . "</h2>";
    				print "<span class = 'by'>" . $datum . " " . $autor ."</span>";
    			print "</div>";
    			if($slika != "\r\n"){
    				print "<div class='vecaSlika'>";
    				print "<img src='" . $slika . "' alt='slika'>";
    				print "</div>";
    			}
    			print "<p>" . $osnovni . "</p>";
                print "<p>" . $ostalo . "</p>";
    		print "</div>";
    	print "</div>";


?>