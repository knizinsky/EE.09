<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Warzywniak</title>
    <link href="styl2.css" rel="stylesheet">
</head>
<body>
    <div id="baner1">
        <h1>Internetowy sklep z eko-warzywami</h1>
    </div>

    <div id="baner2">
        <ol>
            <li>warzywa</li>
            <li>owoce</li>
            <li><a href="https://terapiasokami.pl/" target="_blank">soki</a></li>
        </ol>
    </div>

    <div id="glowny">

    <?php
        
    
        
             $conn = mysqli_connect("localhost",'root','','dane2') or die("Błąd połączenia!");

            $sql = "SELECT produkty.nazwa, produkty.ilosc, produkty.opis, produkty.cena, produkty.zdjecie from produkty where produkty.Rodzaje_id in(1,2);";

            $wynik = mysqli_query($conn, $sql);

            while($row=mysqli_fetch_assoc($wynik)) 
            {
                echo "<div class='blok'><img src='".$row['zdjecie']."' alt='warzywniak'>";
                echo "<h5>".$row['nazwa']."</h5>";
                echo "<p>opis: ".$row['opis']."</p>";
                echo "<p>na stanie: ".$row['ilosc']."</p>";
                echo "<h2>".$row['cena']." zł</h2>";
                echo "</div>";
            }

            mysqli_close($conn); 

            ?>
    </div>

    <div id="stopka">

    
        <form action="sklep.php" method="post">
            Nazwa:<input type="text" name="nazwa">
            Cena: <input type="number" name="cena">
            <input type="submit" value="Dodaj produkt">
        </form>
        

            <!-- $conn = mysqli_connect("localhost",'root','','dane2') or die("Błąd połączenia!");

            $nazwa = @$_POST['nazwa'];
            $cena = @$_POST['cena'];

            $sql2 = "INSERT INTO `produkty` (`id`, `Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie`) VALUES (NULL, '1', '4', '".$nazwa."','10', NULL, '".$cena."', 'owoce.jpg');";

            $wynik = mysqli_query($conn,$sql2);

            mysqli_close($conn); -->

        

        Stronę wykonał: 1243142141
    </div>

</body>
</html>