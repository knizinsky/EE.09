<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link href="styl.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>

    <h1>Podaj dane</h1>

    <form action="waga.php" method="post">
        Waga:<input type="number" name="waga"><br>
        Wzrost:<input type="number" name="wzrost"><br>
        <button>Licz BMI i zapisz wynik</button>
    </form>

    <?php

    $conn = mysqli_connect('localhost','root','','egzamin') or die("Błąd połączenia!");

    $waga = @$_POST['waga'];
    $wzrost = @$_POST['wzrost'];

    if($waga!="" && $wzrost!="")
    {
        $bmi = ($waga/($wzrost*$wzrost))*10000;

        

        if($bmi<19 && $bmi>=0)
        {
            $wartosc = 1;
        }
        else if($bmi<26 && $bmi>=19)
        {
            $wartosc = 2;
        }
        else if($bmi<31 && $bmi>=26)
        {
            $wartosc = 3;
        } 
        else if($bmi>=31)
        {
            $wartosc = 4;
        }
       
        $data = date('Y-m-d');

        echo "Twoja waga: ".$waga."; Twój wzrost: ".$wzrost."<br>"."BMI wynosi: ".$bmi;

        
        
        $wstaw = "INSERT INTO `wynik`(`bmi_id`, `data_pomiaru`, `wynik`) VALUES ('$wartosc','$data','$bmi')";
        $kwerenda = mysqli_query($conn, $wstaw);

    }
   

    mysqli_close($conn);

    ?>

    <table>
        <th><tr><td><b>lp.</b></td><td><b>Interpretacja</b></td><td><b>zaczyna się od…</b></td></tr></th>
        <?php

        $conn = mysqli_connect('localhost','root','','egzamin') or die("Błąd połączenia!");

        $sql = "SELECT id, informacja, wart_min from bmi";
        
        $wynik = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($wynik))
        {
            echo "<tr><td>".$row['id'].'</td>'."<td>".$row['informacja'].'</td>'."<td>".$row['wart_min'].'</td></tr>';
        }

       


        mysqli_close($conn);
        ?>
    </table>
</body>
</html>