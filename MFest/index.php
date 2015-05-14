<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Jungle Music Festival</TITLE>
<link rel="stylesheet" type="text/css" href="style.css">
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY>
<div ID="banner">
	<div ID="nav">
	<ul>
		<li><a href="#" onclick="ucitaj('home.php'); return false;">Home</a></li>
		<li><a href="#" onclick="show(); return false;">About us</a>	
		<div ID="dropdown">
				<ul>
				<li onmouseover="boja(this)" onmouseout="stara(this)"><a href="#" onclick="ucitaj('about.html'); return false;">Info</a></li>
				<li onmouseover="boja(this)" onmouseout="stara(this)"><a href="#" onclick="ucitaj('location.html'); return false;">Location</a></li>
				<li onmouseover="boja(this)" onmouseout="stara(this)"><a href="#" onclick="ucitaj('gallery.html'); return false;">Gallery</a></li>
				</ul>
			</div></li>
		<li><a href="#" onclick="ucitaj('lineup.html'); return false;">Lineup</a></li>
		<li><a href="#" onclick="ucitaj('tickets.html'); return false;">Tickets</a></li>
		<li><a href="#" onclick="ucitaj('contact.html'); return false;">Contact</a></li>
	</ul>
	</div>
	<div class="logo">
	</div>
	<div class="logotext">
	<h1>Music Festival</h1>
	<h2> 7 - 10th July 2015 </h2> 
	<h2> Sarajevo </h2>
	</div>
</div>

<div ID="wrapper">
	<?php include 'home.php';?>
</div>

<script src="skripta.js"></script>	
</BODY>
</HTML>