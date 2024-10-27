<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_x">Liczba 1: </label>
    <input id="id_x" type="text" name="x" value="<?php isset($x)?print($x):print(""); ?>" /><br />
	<label for="id_op">Operacja: </label>
	<select name="op">
		<option value="plus">+</option>
		<option value="minus">-</option>
		<option value="times">*</option>
		<option value="div">/</option>
	</select><br />
	<label for="id_y">Liczba 2: </label>
    <input id="id_y" type="text" name="y" value="<?php isset($y)?print($y):print(""); ?>" /><br />
	<input type="submit" value="Oblicz" /><br />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
    <div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
        <?php echo 'Wynik: '.$result; ?>
    </div>
<?php } ?>

<form action="<?php print(_APP_URL);?>/app/loan.php" method="post">
    <label for="id_amount">Kwota: </label>
    <input id="id_amount" type="text" name="amount" value="<?php isset($amount)?print($amount):print(""); ?>" /><br />
    <label for="id_numberOfYears">Ilość lat: </label>
    <input id="id_numberOfYears" type="text" name="numberOfYears" value="<?php isset($numberOfYears)?print($numberOfYears):print(""); ?>" /><br />
    <label for="id_interest">Oprocentowanie: </label>
    <input id="id_interest" type="text" name="interest" value="<?php isset($interest)?print($interest):print(""); ?>" /><br />
    <input type="submit" value="Oblicz" />
<form />

<?php
//wyświeltenie listy błędów, jeśli istnieją
    if (isset($messages)) {
        if (count ( $messages ) > 0) {
            echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
            foreach ( $messages as $key => $msg ) {
                echo '<li>'.$msg.'</li>';
            }
            echo '</ol>';
        }
    }
?>

<?php if (isset($loanResult)){ ?>
    <div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
        <?php echo 'Wynik: '.$loanResult; ?>
    </div>
<?php } ?>

</body>
</html>