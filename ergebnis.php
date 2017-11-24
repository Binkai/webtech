<?php
session_start();
if(isset($_SESSION['zahl'])){
echo "<table> <tr> <th>Runde</th> <th> Mensch </th> <th>Computer</th> <th> Gewinner </th> </tr>";
for($i=0;$i <=$_SESSION['zahl'];$i++){
	echo "<tr><td>" . ($i+1) . "</td><td>" . $_SESSION['userwahl'][$i] . "</td><td>" . $_SESSION['pcwahl'][$i] . "</td><td>" . $_SESSION['ergebnis'][$i] . "</td></tr>";
}
echo "</table> <br>";
if($_SESSION['pcsieg'] == $_SESSION['usersieg']) {
	echo "Unentschieden! Keiner hat gewonnen. <br>";
} else if ($_SESSION['pcsieg'] > $_SESSION['usersieg']) {
	echo "Schade! Der Computer hat gewonnen. <br>";
} else {
	echo "Glückwunsch SIE haben gewonnnen. <br>";
}
} else {
	echo "Sie haben keine Runde gespielt.";
}

unset($_SESSION['zahl']);
unset($_SESSION['userwahl']);
unset($_SESSION['pcwahl']);
unset($_SESSION['ergebnis']);
unset($_SESSION['pcsieg']);
unset($_SESSION['usersieg']);
?>
<a href="radiobutt.php"> Noch eine Runde?</a>