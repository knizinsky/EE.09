<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wycieczki i urlopy</title>
    <link href="styl3.css" rel="stylesheet">
</head>
<body>
    <div id="baner">
        <h1>BIURO PODRÓŻY</h1>
    </div>

    <div id="lewy">
        <h2>KONTAKT</h2>
        <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
        <p>telefon: 555666777</p>
    </div>

    <div id="srodkowy">
        <h2>GALERIA</h2>
        <?php
            #skrypt 1

            $baza = mysqli_connect('localhost','root','','egzamin3');

            $sql = "SELECT nazwaPliku, podpis from zdjecia order by podpis asc;";

            $wynik = mysqli_query($baza, $sql);

            while($row=mysqli_fetch_assoc($wynik))
            {
                echo "<img src='".$row['nazwaPliku']."' alt='".$row['podpis']."'>";
            }

            mysqli_close($baza);
        ?>
    </div>

    <div id="prawy">
        <h2>PROMOCJE</h2>
        <table>
            <tr><td>Jesień</td><td>Grupa 4+</td><td>Grupa 10+</td></tr>
            <tr><td>5%</td><td>10%</td><td>15%</td></tr>
        </table>
    </div>

    <div id="dane">
        <h2>LISTA WYCIECZEK</h2>

        <?php

            #skrypt 2

            $baza = mysqli_connect('localhost','root','','egzamin3');

            $sql = "SELECT id, dataWyjazdu, cel, cena from wycieczki where dostepna=1;";

            $wynik = mysqli_query($baza, $sql);

            while($row=mysqli_fetch_assoc($wynik))
            {
                echo $row['id'].". ".$row['dataWyjazdu'].", ".$row['cel'].", cena: ".$row['cena']."<br>";
            }

            mysqli_close($baza);

        ?>
    </div>

    <div id="stopka">
        <p>Stronę wykonał: 1231231231</p>
    </div>

</body>
</html>