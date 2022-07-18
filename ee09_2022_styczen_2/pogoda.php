<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Prognoza pogody Wrocław</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div id="lewy">
        <img src="logo.png" alt="meteo">
    </div>

    <div id="srodkowy">
        <h1>Prognoza dla Wrocławia</h1>
    </div>

    <div id="prawy">
        <p>maj, 2019 r.</p>
    </div>

    <div id="glowny">
        <table>
            <tr>
                <th>DATA</th><th>TEMPERATURA W NOCY</th><th>TEMPERATURA W DZIEŃ</th><th>OPADY[mm/h]</th><th>CIŚNIENIE[hPa]</th>
            </tr>
            <?php
                $baza = mysqli_connect("localhost","root","","prognoza");

                $sql = "SELECT * FROM `pogoda` WHERE `miasta_id`=1 order by `data_prognozy`asc;";

                $wynik = mysqli_query($baza, $sql);

                while($row=mysqli_fetch_assoc($wynik))
                {
                    echo "<tr><td>".$row['data_prognozy']."</td><td>".$row['temperatura_noc']."</td><td>".$row['temperatura_dzien']."</td><td>".$row['opady']."</td><td>".$row['cisnienie']."</td></tr>";
                }

                mysqli_close($baza);
            ?>
        </table>
    </div>

    <div id="lewy2">
        <img src="obraz.jpg" alt="Polska, Wrocław">
    </div>

    <div id="prawy2">
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>

    <div id="stopka">
        <p>Stronę wykonał: 123123123</p>
    </div>

</body>
</html>