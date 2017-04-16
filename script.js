function openLogin()
{
	document.getElementById("login").style.transform = "scale(1,1)";
	document.getElementById("login").style.animationName = "open_login";
	document.getElementById("login").style.animationPlayState = "running";
}

function closeLogin()
{
		//document.getElementById("login").style.transform = "scale(0,0)";
	document.getElementById("login").style.animationName = "close_login";
	document.getElementById("login").style.animationPlayState = "running";
}
