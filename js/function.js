
/* Contact Us */

function text() {
	var last = document.getElementById("lastname").value;
	var first = document.getElementById("firstname").value;

	if (!isNaN(last)) {
		document.getElementById("lastname").value = "";
	}
	if (!isNaN(first)) {
		document.getElementById("firstname").value = "";
	}
}

function message() {
	var last = document.getElementById("lastname").value;
	var first = document.getElementById("firstname").value;
	var mes = document.getElementById("message").value;

	if (last == "" || first == "" || mes == "") {
		alert("Please fill up the missing field/s.");
	}
}

/* Login */

function login() {
	var user = document.getElementById("username").value;
	var pass = document.getElementById("password").value;

	if (user == "" || pass == "") {
		alert("Please enter username and password.");
	}
}

/* Message */

function checkAll(All) {
	var recs = document.querySelectorAll('input[type="checkbox"]');

	for (var i = 1; i < recs.length	; i++) {
		if (recs[i] != All) {
			recs[i].checked = All.checked;
		}
	}
}