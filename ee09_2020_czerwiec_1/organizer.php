<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link href="styl6.css" rel="stylesheet">
    <title>Organizer</title>
</head>
<body>
    <div id="baner1">
        <h2>MÓJ ORGANIZER</h2>
    </div>

    <div id="baner2">
        <form action="organizer.php" method="post">
        Wpis wydarzenia: <input type="text" name="one">
        <input type="submit" value="ZAPISZ">
        </form>
        <?php
            $baza = mysqli_connect('localhost','root','','egzamin6') or die("Bład połączenia!");
            $dane = $_POST['one'];

            if(isset($dane)){
                $sql = "UPDATE `zadania` SET `wpis`= '".$dane."' WHERE `dataZadania` like '2020-08-27';";
                mysqli_query($baza, $sql);
            }
            
            mysqli_close($baza);
        ?>
    </div>

    <div id="baner3">
        <img src="logo2.png" alt="Mój organizer">
    </div>

    <div id="glowny" style="clear:both;"> 
        <?php
            #skrypt1
            $baza = mysqli_connect('localhost','root','','egzamin6') or die("Bład połączenia!");
            $sql = "SELECT  dataZadania, miesiac , wpis FROM zadania WHERE miesiac like 'sierpien'";

            //$sql = "SELECT * FROM zadania";
            $wynik = mysqli_query($baza, $sql);

            while($row=mysqli_fetch_assoc($wynik)){
                echo "<div class='bloki'>";
                echo "<h6>".$row['dataZadania'].", ".$row['miesiac']."</h6>";
                echo "<p>".$row['wpis']."</p>";
                echo "</div>";
            }

            mysqli_close($baza);
        ?>
        <div style="clear:both;"></div>
        
    </div>

    <div id="stopka">
    <?php
        #skrypt 2

        $baza = mysqli_connect('localhost','root','','egzamin6') or die("Bład połączenia!");
        $sql = "SELECT `miesiac`, `rok` FROM `zadania` WHERE `dataZadania` like '2020-08-01';";
        $wynik = mysqli_query($baza, $sql);
        $row=mysqli_fetch_assoc($wynik);

        echo "<h3>miesiąc: ".$row['miesiac'].", rok: ".$row['rok']."</h3>";

        mysqli_close($baza);
    ?>
    <p>Stronę wykonał: 123123123123123</p>
    </div>
</body>
</html>
