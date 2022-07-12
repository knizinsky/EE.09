<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link href="styl3.css" rel="stylesheet">
    <title>Video On Demand</title>
</head>
<body>
    <div id="baner1">
        <h1>Internetowa wypożyczalnia filmów</h1>
    </div>

    <div id="baner2">
        <table>
            <tr><td>Kryminał</td><td>Horror</td><td>Przygodowy</td></tr>
            <tr><td>20</td><td>30</td><td>20</td></tr>
        </table>
    </div>

    <div id="lista">

        <h3>Polecamy</h3>

        <?php

            $conn = mysqli_connect("localhost","root","","dane3");

            $sql = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id in(18,22,23,25);";

            $wynik = mysqli_query($conn, $sql);

            while($row=mysqli_fetch_assoc($wynik))
            {
                echo "<div id='film'>";
                echo "<h4>".$row['id'].". ".$row['nazwa']."</h4>";
                echo "<img src='".$row['zdjecie']."'alt='film'>";
                echo "<p>".$row['opis']."</p>";
                echo "</div>";
            }
            echo "<div style='clear:both'></div>";

            mysqli_close($conn);

        ?>
    </div>

    <div id="lista">

        <h3>Filmy fantastyczne</h3>

        <?php

            $conn = mysqli_connect("localhost","root","","dane3");

            $sql = "SELECT id, nazwa, opis, zdjecie from produkty WHERE Rodzaje_id=12";

            $wynik = mysqli_query($conn, $sql);

            while($row=mysqli_fetch_assoc($wynik))
            {
                echo "<div id='film'>";
                echo "<h4>".$row['id'].". ".$row['nazwa']."</h4>";
                echo "<img src='".$row['zdjecie']."'alt='film'>";
                echo "<p>".$row['opis']."</p>";
                echo "</div>";
            }
            echo "<div style='clear:both'></div>";

            mysqli_close($conn);
        ?>
    </div>

    <div id="stopka">
        
        <form action="video.php" method="post">
            Usuń film nr.:<input type="number" name="id">
            <input type="submit" value="Usuń film">
        </form>
        <?php

            $conn = mysqli_connect("localhost","root","","dane3");

            $id = @$_POST['id'];

            $sql = "DELETE FROM `produkty` WHERE id='$id'";

            mysqli_query($conn, $sql);

            mysqli_close($conn);

        ?>
        Stronę wykonał: <a href="mailto:ja@poczta.com">12312321321</a>
    </div>
    
</body>
</html>