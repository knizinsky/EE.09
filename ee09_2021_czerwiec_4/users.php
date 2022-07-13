<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Panel administratora</title>
    <link href="styl4.css" rel="stylesheet">
</head>
<body>
    <div id="baner">
        <h3>Portal Społecznościowy - panel
administratora</h3>
    </div>

    <div id="lewy">
        <h4>Użytkownicy</h4>

        <?php

            #skrypt 1

            $conn = mysqli_connect('localhost','root', '','dane4');

            $sql = "SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby LIMIT 30";

            $wynik = mysqli_query($conn, $sql);

            while($row=mysqli_fetch_assoc($wynik))
            {
                $ur = $row['rok_urodzenia'];
                $rok = date("Y")-$ur;
                echo $row['id'].". ".$row['imie']." ".$row['nazwisko'].", ".$rok."<br>";
            }
            
            mysqli_close($conn);
        ?>

        <a href="settings.html">Inne ustawienia</a>
    </div>

    <div id="prawy">
        <h4>Podaj id użytkownika</h4>
        
        <form action="users.php" method="post">
            <input type="number" name="ajdi">
            <input type="submit" value="ZOBACZ" id="przycisk">
        </form>

        <hr>

        <?php

            // skrypt 2

            $conn = mysqli_connect('localhost','root', '','dane4');

            $id = @$_POST['ajdi'];

            $sql = "SELECT osoby.imie, osoby.nazwisko, osoby.rok_urodzenia, osoby.opis, osoby.zdjecie, hobby.nazwa FROM osoby join hobby on hobby.id=osoby.Hobby_id where osoby.id='$id'";

            $wynik = mysqli_query($conn, $sql);

            while($row=mysqli_fetch_assoc($wynik))
            {
                echo "<h2>".$id.". ".$row['imie']." ".$row['nazwisko']."</h2>";
                echo "<img src='".$row['zdjecie']."' alt='$id'>";
                echo "<p>Rok urodzenia: ".$row['rok_urodzenia']."</p>";
                echo "<p>Opis: ".$row['opis']."</p>";
                echo "<p>Hobby: ".$row['nazwa']."</p>";
            }
            
            mysqli_close($conn);

        ?>

    </div>

    <div id="stopka">
        Stronę wykonał:000000000000
    </div>
</body>
</html>