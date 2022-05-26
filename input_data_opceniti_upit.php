<!DOCTYPE html>
<html lang="hr">
    <head>
        <meta charset="UTF-8">
        <title>Unos podataka u opceniti upit</title>
    </head>
    <body>
        <?php
                $baza = mysqli_connect('localhost','root','') or die ('Nije moguće uspostaviti vezu.');
                mysqli_select_db($baza, 'web_forma') or die (mysqli_error($baza));


                $imeprezime = $_POST['full-name'];
                $email = $_POST['email'];
                $upit = $_POST['abstract'];

                $sql = "INSERT INTO opceniti_upit (imeIprezime, email, upit) VALUES ('$imeprezime', '$email', '$upit')";

                if(mysqli_query($baza, $sql)){
                    echo "Podaci su uspješno unenešeni.";
                }
                else{
                    echo "Pogreška! "
                       . mysqli_error($baza);
                }

                $baza->close();
        ?>
    <center>
        <a href="form_page.html"> <input type="submit" value="Nazad"/></a>
    </center>
    </body>
</html>
