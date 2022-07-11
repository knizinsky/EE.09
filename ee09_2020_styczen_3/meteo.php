<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Prognoza pogody Poznań</title>
    <link href="styl4.css" rel="stylesheet">
</head>
<body>
    <div id="lewy">
        <p>maj, 2019 r.</p>
    </div>

    <div id="srodkowy">
        <h2>Prognoza dla Poznania</h2>
    </div>

    <div id="prawy">
        <img src="logo.png" alt="prognoza">
    </div>

    <div style="clear:both;"></div>

    <div id="lewy2">
        <a href="kwerendy.txt">Kwerendy</a>
    </div>

    <div id="prawy2">
        <img src="obraz.jpg" alt="Polska, Poznań">
    </div>

    <div id="glowny">
        <table>
            <tr><th>Lp.</th><th>DATA</th><th>NOC - TEMPERATURA</th><th>DZIEŃ - TEMPERATURA</th><th>OPADY [mm/h]</th><th>CIŚNIENIE [hPa]</th></tr>

            <?php

                #skrypt1
                
                $baza = mysqli_connect("localhost","root","","prognoza");

                $sql = "SELECT * from pogoda where `miasta_id`=2 order by `data_prognozy` desc";

                $wynik = mysqli_query($baza, $sql);

                while($row=mysqli_fetch_assoc($wynik))
                {
                    echo "<tr><td>".$row['id']."</td><td>".$row['data_prognozy']."</td><td>".$row['temperatura_noc']."</td><td>".$row['temperatura_dzien']."</td><td>".$row['opady']."</td><td>".$row['cisnienie']."</td></tr>";
                }
                

                mysqli_close($baza);

            ?>
        </table>
    </div>

    <div id="stopka">
        <p>Stronę wykonał: 123123123123</p>
    </div>

</body>
</html>