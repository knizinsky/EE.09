<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link href="styl.css" rel="stylesheet">
    <title>Lista przyjaciół</title>
</head>
<body>
    <div id="baner">
        <h1>Portal społecznościowy - moje konto</h1>
    </div>

    <div id="glowny">

        <h2>Moje zainteresowania</h2>

        <ul>
            <li>muzyka</li>
            <li>film</li>
            <li>komputery</li>
        </ul>

        <h2>Moi znajomi</h2>


        <?php

            $conn = mysqli_connect('localhost', 'root', '','dane') or die("Błąd połączenia");
            $sql = "SELECT imie, nazwisko, opis,zdjecie FROM `osoby` WHERE Hobby_id in(1,2,6)";
            $wynik = mysqli_query($conn, $sql);

            while($row=mysqli_fetch_assoc($wynik))
            {
                echo "<div id='zdjecie'><img src=".$row['zdjecie']." alt='przyjaciel'></div>";
                echo "<div id='opis'><h3>".$row['imie']." ".$row['nazwisko']."</h3><p>Ostatni wpis: ".$row['opis']."</p></div>";
                echo "<div id='linia'><hr></div>";
            }

           mysqli_close($conn);

        ?>

    </div>

    <div class="stopka">
        Stronę wykonał: 12313123123
    </div>

    <div class="stopka">
        <a href="mailto:ja@portal.pl">Napisz do mnie</a>
    </div>

    <div style="clear:both;"></div>

</body>
</html>