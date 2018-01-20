
<?php


$id_czytelnik2 = trim($_GET["id_czytelnik"]);

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{


    $login_n = trim($_POST['login']);
    $haslo_n = trim($_POST['haslo']);
    $imie_n = trim($_POST['imie']);
    $nazwisko_n = trim($_POST['nazwisko']);
    $telefon_n = trim($_POST['telefon']);
    $adres_n = trim($_POST['adres']);

    $error = array();


    try {

        $query = 'UPDATE czytelnik 
                  SET   
                        login=:login_n,
                        haslo=:haslo_n, 
                        imie=:imie_n, 
                        nazwisko=:nazwisko_n, 
                        telefon=:telefon_n, 
                        adres=:adres_n
                        
                  WHERE id_czytelnik= :id_czytelnik2';

        if ($sth = $pdo->prepare($query)) {

            $sth->bindValue(':login_n', $login_n, PDO::PARAM_STR);
            $sth->bindValue(':haslo_n', $haslo_n, PDO::PARAM_STR);
            $sth->bindValue(':imie_n', $imie_n, PDO::PARAM_STR);
            $sth->bindValue(':nazwisko_n', $nazwisko_n, PDO::PARAM_STR);
            $sth->bindValue(':telefon_n', $telefon_n, PDO::PARAM_STR);
            $sth->bindValue(':adres_n', $adres_n, PDO::PARAM_STR);
            $sth->bindValue(':id_czytelnik2', $id_czytelnik2, PDO::PARAM_INT);


            if (!$sth->execute()) {

                push_array($error, 'Błąd serwera');
            }


        }

    }

    catch(PDOException $e)
    {
        $e->getMessage();
    }

}

?>

<?php if (count($error) != 0): ?>
    <ul>
        <?php foreach ($error as $item): ?>
            <li> <?php echo $item; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


<style>
    input[type=text], select
    {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit]
    {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover
    {
        background-color: #45a049;
    }

    div
    {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

</style>


<h3>Zaktualizuj profil czytelnika</h3>
<form method="post" action="index.php?show=aktualizuj&id_czytelnik=<?php echo $id_czytelnik2; ?>">

    <label for="fname">Login</label>
    <input type="text" name="login" class="form-control" id="login" value="<?php echo $login_n; ?>"><br>

    <label for="fname">Hasło</label>
    <input type="text" name="haslo" class="form-control" id="haslo" value="<?php echo $haslo_n; ?>"><br>

    <label for="fname">Imię</label>
    <input type="text" name="imie" class="form-control" id="imie"  value="<?php echo $imie_n; ?>"><br>

    <label for="fname">Nazwisko</label>
    <input type="text" name="nazwisko" class="form-control" id="nazwisko" value="<?php echo $nazwisko_n; ?>"><br>

    <label for="fname">Telefon</label>
    <input type="text" name="telefon" class="form-control" id="telefon" value="<?php echo $telefon_n; ?>"><br>

    <label for="fname">Adres</label>
    <input type="text" name="adres" class="form-control" id="adres" value="<?php echo $adres_n; ?>"><br>

    <input type="submit" value="<?php echo ('Aktualizuj'); ?>"></br>
</form>