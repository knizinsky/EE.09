<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <link href="styl.css" rel="stylesheet">
    <title>Rozgrywki futbolowe</title>
</head>
<body>

    <div id="baner">
        <h2>Światowe rozgrywki piłkarskie</h2>
        <img src="obraz1.jpg" alt="boisko">
    </div>

    <div id="mecze">
        <?php

        $connection = mysqli_connect('localhost','root','','egzamin') or die("Błąd połączenia!");

        $zapytanie = "select zespol1, zespol2, wynik, data_rozgrywki from rozgrywka where zespol1 like 'EVG'";

        $kwerenda = mysqli_query($connection, $zapytanie);

        while($row = mysqli_fetch_assoc($kwerenda))
        {
            echo '<div class="bloki">'.'<h3>'.$row['zespol1']." - ".$row['zespol2'].'</h3>'.$row['wynik'].'<p>w dniu: '.$row['data_rozgrywki'].'</div>';
        }

        mysqli_close($connection);

        ?>
        <div style="clear:both;"></div>
    </div>

    <div id="glowny">
        <h2>Reprezentacja Polski</h2>
    </div>

    <div id="lewy">
        <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 
4-napastnicy):</p>

        <form action="index.php" method="post" >
            <input type="number" name="formularz">
            <input type="submit" value="Sprawdź">
        </form>

        <ul>
            
                <?php

                $form = @$_POST['formularz'];

                if($form!="")
                {
                    $connect = mysqli_connect('localhost','root','','egzamin');

                    $sql = "select imie, nazwisko from zawodnik where pozycja_id like '$form'";
                    $kwerenda = mysqli_query($connect, $sql);

                    while($row = mysqli_fetch_assoc($kwerenda))
                    {
                        echo '<li>'.$row['imie']." ".$row['nazwisko'].'</li>'; 
                    }
                    mysqli_close($connect);
                }
               

                ?>
            
        </ul>
    </div>

    <div id="prawy">
        <img src="zad1.png" alt="piłkarz">
        <p>Autor: 123456789123</p>
    </div>

    <div style="clear:both;"></div>
    
</body>
</html>