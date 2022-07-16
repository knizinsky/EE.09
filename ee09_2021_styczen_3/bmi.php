<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link href="styl3.css" rel="stylesheet">
    <title>Twoje BMI</title>
</head>
<body>
    <div id="logo">
        <img src="wzor.png" alt="wzór BMI">
    </div>

    <div id="baner">
        <h1>Oblicz swoje BMI</h1>
    </div>

    <div id="glowny">
        
        <table class="tabela" border="2">

            <tr><td>Interpretacja BMI</td><td>Wartość minimalna</td><td>Wartość maksymalna</td></tr>
            

            <?php
            
            $connect = mysqli_connect('localhost','root','','egzamin') or die("Błąd połączenia!");

            $sql = "SELECT informacja, wart_min, wart_max FROM bmi";

            $kwerenda = mysqli_query($connect,$sql);

            while($row=mysqli_fetch_assoc($kwerenda))
            {
                echo '<tr><td>'.$row['informacja'].'</td><td>'. $row['wart_min'].'</td><td>'. $row['wart_max'].'</td></tr>';
            }

            mysqli_close($connect);
            
            ?>

            </td></tr>

        </table>
            
    </div>

    <div id="lewy">
        <h2>Podaj wagę i wzrost</h2>
        <form action="bmi.php" method="post" name="formularz">
            <label>Waga: <input type="number" min="1" name="waga"></label><br>
            <label>Wzrost w cm: <input type="number" min="1" name="wzrost"></label><br>
            <input type="submit" value="Oblicz i zapamiętaj wynik">
        </form>

            <?php
            
            $waga = @$_POST['waga'];
            $wzrost = @$_POST['wzrost'];

            $bmi = @($waga/($wzrost*$wzrost))*10000;
            if(isset($waga) && isset($wzrost))
            echo "Twoja waga: ".$waga."; Twój wzrost: ".$wzrost.'<br>'."BMI wynosi: ".$bmi;

            ?>

    </div>

    <div id="prawy">
        <img src="rys1.png" alt="ćwiczenia">
    </div>

    <div id="stopka">
        <p>Autor: 12312312312</p>
        <a href="kwerendy.txt">Zobacz kwerendy</a>
    </div>

</body>
</html>