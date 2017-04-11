<?php
   session_start();

   // all'ingresso le sessioni vengono cancellate
   $_SESSION['id']=null;
   $_SESSION['username']=null;

?>

<HTML>

<HEAD>
<LINK rel='Stylesheet' href='stile.css' type='TEXT/CSS'>
</HEAD>

<BODY>
<H2>Login</H2>

<?php

echo "<FORM name='F1' method='post' action='index.php'>";
echo "username:<INPUT type='text' name='USER' value='' size='4'><BR>";
echo "password:<INPUT type='text' name='PASS' value='' size='4'><BR><BR>";
echo "<INPUT class='bottone' type='submit' name='ENTRA' value='Login'>";
echo "</FORM>";

echo "<FORM name='F2' method='post' action='registra.php'>";
echo "<INPUT class='bottone' type='submit' name='REGISTRA' value='Registrati'><BR>";
echo "</FORM>";
?>

</BODY>
</HTML>
