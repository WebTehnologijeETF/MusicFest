
function show(){
	document.getElementById("dropdown").style.visibility = "visible";
}

function boja(item){
	item.style.background = "rgba(0,0,0,0.4)";
}

function stara(item){
	item.style.background = "rgba(0,0,0,0)";
}

function validirajIme(form){
	if(form.name.value.length == null || form.name.value.length == "" || form.name.value.replace(/\s+/, "").length == "" ) {
		document.getElementById("error1").innerHTML = '<img src="../MFest/images/error.png" alt="slika"> Unesite ime i prezime';
		return false;
	}
	
	document.getElementById("error1").innerHTML = '';
	return true;
}

var mail = /^[^@]+@[^@.]+\.[^@]*\w\w$/;

function validirajMail(form){
	if(form.email.value.length == null || form.email.value.length == "" || form.email.value.replace(/\s+/, "").length == "" ) {

		document.getElementById("error2").innerHTML = '<img src="../MFest/images/error.png" alt="slika"> E-mail nije u pravilnom formatu';
		return false;
	}
	else if(!form.email.value.match(mail)) {
		document.getElementById("error2").innerHTML = '<img src="../MFest/images/error.png" alt="slika"> E-mail nije u pravilnom formatu';
		return false;
	}
	
	document.getElementById("error2").innerHTML = '';
	return true;	
}

function validirajMailKomentar(form){
	if(form.email.value.length == null || form.email.value.length == "" ) {

		document.getElementById("error2").innerHTML = '';
		return true;
	}
	else if(!form.email.value.match(mail)) {
		document.getElementById("error2").innerHTML = '<img src="../MFest/images/error.png" alt="slika"> E-mail nije u pravilnom formatu';
		return false;
	}
	
	document.getElementById("error2").innerHTML = '';
	return true;	
}

function validirajPoruku(form){
	if(form.message.value.length == null || form.message.value.length == "" || form.message.value.replace(/\s+/, "").length == "") return false;
	
	return true;
}

function validirajGrad(form){

	if(form.city.value.length == null || form.city.value.length == "")
		document.getElementById("error3").innerHTML = '<img src="../MFest/images/error.png" alt="slika"> Unesite lokaciju';

	else validirajLokaciju(form);
}

function validirajZIP(form){

	if(form.zip.value.length == null || form.zip.value.length == "")
		document.getElementById("error3").innerHTML = '<img src="../MFest/images/error.png" alt="slika"> Unesite ZIP';

	else validirajLokaciju(form);
}

function validirajLokaciju(form){


		var lokacija = form.city.value;
		var zip = form.zip.value;
		lokacija = encodeURIComponent(lokacija);
		zip = encodeURIComponent(zip);

		var ajax = new XMLHttpRequest();
	
		ajax.onreadystatechange = function(){
			if (ajax.readyState == 4 && ajax.status == 200){
				var obj = JSON.parse(ajax.responseText);
				if(obj.greska){
					document.getElementById("error3").innerHTML = '<img src="../MFest/images/error.png" alt="slika">' + obj.greska;
					return false;
				}

			}

			if (ajax.readyState == 4 && ajax.status == 404){
				alert("Greska: nepoznat URL");
				return false;
			}

			document.getElementById("error3").innerHTML = '';
			return true;	
		}

		ajax.open("GET", "http://zamger.etf.unsa.ba/wt/postanskiBroj.php?mjesto=" + lokacija + "&postanskiBroj=" + zip, true);
		ajax.send();

}
	

function validacija(form){
	if(!validirajIme(form) || !validirajMail(form) || !validirajPoruku(form)){

		alert("Forma nije pravilno ispunjena");
		return false;
		
	}

	return true;
}

function validacijaKomentara(form){
	if(!validirajIme(form) || !validirajMailKomentar(form) || !validirajPoruku(form)){

		alert("Unesite ime i komentar");
		return false;
		
	}

	return true;
}

function ucitaj(stranica){

	document.getElementById("dropdown").style.visibility = "hidden";
	
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200)
			document.getElementById("wrapper").innerHTML = ajax.responseText;
		if (ajax.readyState == 4 && ajax.status == 404)
			document.getElementById("wrapper").innerHTML = "Greska: nepoznat URL";
	}
	ajax.open("GET", stranica, true);
	ajax.send();

}
