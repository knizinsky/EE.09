<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link href="styl.css" rel="stylesheet">
    <title>Psy</title>
</head>
<body>
    <form action="strona.php" method="post">
        <input type="text" name="a" id=""><br>
        <input type="password" name="b" id=""><br>
        <input type="password" name="c" id=""><br>
        <input type="submit" value="zapisz" name="" id=""><br>
    </form>
    <?php

         $conn = mysqli_connect('localhost', 'root', '', 'psy');
         if (!$conn)
		 {
             die("Brak połączenia z bazą");
         }
         if (!empty($_POST['a']) && !empty($_POST['b']) && !empty($_POST['c']))
		 {
             $login = $_POST['a'];
             $pass = $_POST['b'];
             $repeat = $_POST['c'];
            
             $blad = 0;
            
             $zap = 'SELECT login FROM uzytkownicy';
            $wynik = mysqli_query($conn, $zap);
             while ($wiersz = mysqli_fetch_array($wynik)) {
                 if ($wiersz['a'] == $login){
                    echo "<p>login występuje w bazie danych, konto nie zostało dodane</p>";
                    $blad = 1;
		break;
                 }
             }
            
             if ($pass != $repeat)
			 {
                echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
                $blad = 1;
             }
             if ($blad == 0){
                $hash = sha1($pass);
                $zap = "INSERT INTO uzytkownicy (login, pass) VALUES ('" . $login . "','" . $hash . "')";
                if (mysqli_query($conn, $zap) === TRUE){
                    echo "<p>Konto zostało dodane</p>";
		}
             }
         }
	else{
             echo "<p>wypełnij wszystkie pola</p>";
         }
         mysqli_close($conn);
        ?>
</body>
</html>
