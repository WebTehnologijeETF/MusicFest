
function show(){
	document.getElementById("dropdown").style.visibility = "visible";
}

function boja(item){
	item.style.background = "rgba(0,0,0,0.4)";
}

function stara(item){
	item.style.background = "rgba(0,0,0,0)";
}
var ime = /^[a-zA-Z]+ [a-zA-Z]+$/;

function validirajIme(form){
	if(form.name.value.length == null || form.name.value.length == "" ) {
		document.getElementById("error1").style.visibility = "visible";
		return false;
	}
	else if(!form.name.value.match(ime)){
		document.getElementById("error1").style.visibility = "visible";
		return false;
	}
	
	document.getElementById("error1").style.visibility = "hidden";
	return true;
}

var mail = /^[^@]+@[^@.]+\.[^@]*\w\w$/;

function validirajMail(form){
	if(form.email.value.length == null || form.email.value.length == "" ) {
		document.getElementById("error2").style.visibility = "visible";
		return false;
	}
	else if(!form.email.value.match(mail)) {
		document.getElementById("error2").style.visibility = "visible";
		return false;
	}
	
	document.getElementById("error2").style.visibility = "hidden";
	return true;	
}

function validirajPoruku(form){
	if(form.message.value.length == null || form.message.value.length == "" ) return false;
	
	return true;
}

function validacija(form){
	if(!validirajIme(form) || !validirajMail(form) || !validirajPoruku(form)) alert("Forma nije pravilno ispunjena");
}