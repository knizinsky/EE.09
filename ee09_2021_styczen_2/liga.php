<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>piłka nożna</title>
    <link href="styl2.css" rel="stylesheet">   
</head>
<body>
    <div id="baner">
        <h3>Reprezentacje polski w piłce nożnej</h3>
        <img src="obraz1.jpg" alt="reprezentacja">
    </div>

    <div id="lewy">
        <form action="liga.php" method="post">
            <select name="lista">
                <option value="1">Bramkarze</option>
                <option value="2">Obrońcy</option>
                <option value="3">Pomocnicy</option>
                <option value="4">Napastnicy</option>
            </select>
            <input type="submit" value="Zobacz">
        </form>
        <img src="zad2.png" alt="piłka">
        <p>Autor: 12431231231</p>
    </div>

    <div id="prawy">
        <ol>
            <?php
                $baza = mysqli_connect('localhost','root','','egzamin') or die("Błąd połączenia");

                $lista = @$_POST['lista'];

                $sql = "SELECT imie, nazwisko from zawodnik where pozycja_id='".$lista."'";

                $wynik = mysqli_query($baza, $sql);

                while($row=mysqli_fetch_assoc($wynik))
                {
                    echo "<li><p>".$row['imie']." ".$row['nazwisko']."</p></li>";
                }

                mysqli_close($baza);
            
            ?>
        </ol>
    </div>

    <div id="glowny">
        <h3>Liga mistrzów</h3>
    </div>

    <div id="liga">
        <?php
            $baza = mysqli_connect('localhost','root','','egzamin') or die("Błąd połączenia");

            $sql = "SELECT zespol, punkty, grupa from liga order by punkty desc";

            $wynik = mysqli_query($baza, $sql);

            while($row=mysqli_fetch_assoc($wynik))
            {
                echo "<div class='blok'><h2>".$row['zespol']."</h2><h1>".$row['punkty']."</h1><p>Grupa: ".$row['grupa']."</p></div>";
            }

            mysqli_close($baza);
        ?>
    </div>
    
</body>
</html>