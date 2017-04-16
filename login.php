<?php
   //session_start();

   // all'ingresso le sessioni vengono cancellate
   $_SESSION['id']=null;
   $_SESSION['username']=null;


echo "<FORM name='F1' method='post' action='index.php' id='login'>";
echo"<BUTTON id='close_button' onclick='closeLogin()'></BUTTON>";
	echo "<INPUT type='text' name='USER' id='username_field' value='' placeholder='Username'><BR>";
	echo "<INPUT type='text' name='PASS' id='password_field' value='' placeholder='Password'><BR><BR>";
	echo "<INPUT id='login_button' type='submit' name='ENTRA' value='Login'>";
	echo "<INPUT id='register_button' type='submit' name='REGISTRA' value='Registrati'><BR>";
echo "</FORM>";
?>
