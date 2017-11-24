<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<a href="ergebnis.php">Vorzeitiges Ergebnis.</a>
<form method = "post" action="radiobutt.php">
  <input type="radio" name="spiel" value="1"> Schere<br>
  <input type="radio" name="spiel" value="2"> Stein<br>
  <input type="radio" name="spiel" value="3"> Papier<br><br>
  <input type="submit">
</form> 

<?php
if(isset($_POST['spiel'])){
 $pc = rand(1,3);
	if(isset($_SESSION['zahl']))
	{
		$_SESSION['zahl']++;
		echo "Runde Nummer: " . ($_SESSION['zahl']+1)."<br>";
		
	}
	else {
		$zahl = 0;
		$_SESSION['zahl'] = $zahl;
		echo "Runde Nummer: " . ($_SESSION['zahl']+1). "<br>";
	}
}
if(!(isset($_SESSION['usersieg'])&&isset($_SESSION['pcsieg']))){
	$_SESSION['usersieg'] = 0;
	$_SESSION['pcsieg'] = 0;
}
if(isset($pc)) {
if($pc == 1) {
	echo "Der PC hat Schere gewählt.";
	$_SESSION['pcwahl'][$_SESSION['zahl']] = 'Schere';
	
	if ($_POST['spiel'] == 1){
		echo "Unentschieden";
		$_SESSION['userwahl'][$_SESSION['zahl']] = 'Schere';
		$_SESSION['ergebnis'][$_SESSION['zahl']] = 'unentschieden';
	}
	if ($_POST['spiel'] == 2){
		echo "Du Gewinnst";
		$_SESSION['userwahl'][$_SESSION['zahl']] = 'Stein';
		$_SESSION['ergebnis'][$_SESSION['zahl']] = 'Gewonnen'; 
		$_SESSION['usersieg']++;
	}
	if ($_POST['spiel'] == 3){
		echo "Du verlierst";
		$_SESSION['userwahl'][$_SESSION['zahl']] = 'Papier';
		$_SESSION['ergebnis'][$_SESSION['zahl']] = 'Verloren';
		$_SESSION['pcsieg']++;
	}
} else if ($pc == 2) {
	echo "Der PC hat Stein gewählt.";
	$_SESSION['pcwahl'][$_SESSION['zahl']] = 'Stein';
		if ($_POST['spiel'] == 1){
		echo "Du verlierst";
		$_SESSION['userwahl'][$_SESSION['zahl']] = 'Schere';
		$_SESSION['ergebnis'][$_SESSION['zahl']] = 'Verloren';
		$_SESSION['pcsieg']++;
	}
	if ($_POST['spiel'] == 2){
		echo "Unentschieden";
		$_SESSION['userwahl'][$_SESSION['zahl']] = 'Stein';
		$_SESSION['ergebnis'][$_SESSION['zahl']] = 'unentschieden';
	}
	if ($_POST['spiel'] == 3){
		echo "Du Gewinnst";
		$_SESSION['userwahl'][$_SESSION['zahl']] = 'Papier';
		$_SESSION['ergebnis'][$_SESSION['zahl']] = 'Gewonnen';
		$_SESSION['usersieg']++;
	}
} else {
	echo "Der PC hat Papier gewählt.";
	$_SESSION['pcwahl'][$_SESSION['zahl']] = 'Papier';
		if ($_POST['spiel'] == 1){
		echo "Du Gewinnst";
		$_SESSION['userwahl'][$_SESSION['zahl']] = 'Schere';
		$_SESSION['ergebnis'][$_SESSION['zahl']] = 'Gewonnen';
		$_SESSION['usersieg']++;
	}
	if ($_POST['spiel'] == 2){
		echo "Du verlierst";
		$_SESSION['userwahl'][$_SESSION['zahl']] = 'Stein';
		$_SESSION['ergebnis'][$_SESSION['zahl']] = 'Verloren';
		$_SESSION['pcsieg']++;
	}
	if ($_POST['spiel'] == 3){
		echo "Unentschieden";
		$_SESSION['userwahl'][$_SESSION['zahl']] = 'Papier';
		$_SESSION['ergebnis'][$_SESSION['zahl']] = 'unentschieden';
	}
}
if($_SESSION['zahl'] == 4) {
	header('Location: http://localhost/php/ergebnis.php');
	
}
}
if (!isset($_POST['spiel'])){
	echo "Bitte etwas wählen.";
}
?>
</body>
</html>
