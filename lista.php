<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista przyjaciół</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div class="baner">
        <h1>Portal Społecznościowy - moje konto</h1>
    </div>
    <div class="glowny">
        <h2>Moje zainteresowania</h2>
        <ul>
            <li>muzyka</li>
            <li>film</li>
            <li>komputery</li>
        </ul>
        <h2>Moi znajomi</h2>

        <?php


        $conn = mysqli_connect("localhost","root", "", "lista");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT imie, nazwisko, opis, zdjecie FROM osoby WHERE Hobby_id IN (1, 2, 6)";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $zdjecie = $row["zdjecie"];
                $imie = $row["imie"];
                $nazwisko = $row["nazwisko"];
                $opis = $row["opis"];

                echo '<div class="blok">';
                echo '<div class="zdjecie"><img src="' . $zdjecie . '" alt="przyjaciel" width="100" height="100"></div>';
                echo '<div class="opis">';
                echo '<h3>' . $imie . ' ' . $nazwisko . '</h3>';
                echo '<p>Ostatni wpis: ' . $opis . '</p>';
                echo '</div>';
                echo '<hr class="linia">';
                echo '</div>';
            }
        } else {
            echo "Brak znajomych";
        }

        $conn->close();
        ?>

    </div>
    <div class="stopka">
        <div class="stopka-blok1">
            <p>Stronę wykonał: Fabian Adamiak</p>
        </div>
        <div class="stopka-blok2">
            <a href="mailto:ja@portal.pl">napisz do mnie</a>
        </div>
    </div>
</body>
</html>

