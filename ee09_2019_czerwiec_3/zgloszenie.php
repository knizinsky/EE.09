<?php

    $conn = mysqli_connect('localhost','root','','wedkarstwo') or die("Blad polaczenia!");

    $lowisko = $_POST['lowisko'];
    $data = $_POST['data'];
    $sedzia = $_POST['sedzia'];

    $sql = "INSERT INTO `zawody_wedkarskie` (`id`, `Karty_wedkarskie_id`, `Lowisko_id`, `data_zawodow`, `sedzia`) VALUES (NULL, '0', '$lowisko', '$data', '$sedzia');";

    mysqli_query($conn, $sql);

    mysqli_close($conn);
?>