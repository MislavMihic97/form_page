<!DOCTYPE html>
<html lang="hr">
    <head>
        <meta charset="UTF-8">
        <title>Prikaz podataka opceniti upit</title>
    </head>
    <body>
        <div style="text-align: center;">
            <h1>Općeniti upit</h1>
            <table border="1" cellpadding="2" cellspacing="2" style="width:60%; margin-left: auto; margin-right: auto;">
                <tr>
                    <th>Upit ID</th>
                    <th>Ime i prezime</th>
                    <th>E-mail</th>
                    <th>Upit</th>
                </tr>
        <?php
           $baza = mysqli_connect('localhost','root','') or die ('Nije moguće uspostaviti vezu.');
           mysqli_select_db($baza, 'web_forma') or die (mysqli_error($baza));

           $sql= "SELECT * FROM opceniti_upit";

           mysqli_query($baza, $sql) or die (mysqli_error($baza));
           $result = $baza->query($sql);

           $brojuno=0;
           if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row["upitID"] . '</td>';
                        echo '<td>' . $row["imeIprezime"] . '</td>';
                        echo '<td>' . $row["email"] . '</td>';
                        echo '<td>' . $row["upit"] . '</td>';
                        echo '<tr>';
                        $brojuno++;
                    }
                } else {
                        echo "Nema podataka u tablici!";
                }
           $baza->close();
        ?>
            </table>
            <p><?php echo "Broj unosa:" . $brojuno; ?></p>
            <a href="form_page.html"> <input type="submit" value="Nazad"/></a>
        </div>
    </body>
    
</html>
