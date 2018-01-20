<?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $error = array();

            $id_czytelnik = trim($_POST['id_czytelnik']);
            $login = trim($_POST['login']);
            $haslo = trim($_POST['haslo']);
            $imie = trim($_POST['imie']);
            $nazwisko = trim($_POST['nazwisko']);
            $telefon = trim($_POST['telefon']);
            $adres = trim($_POST['adres']);

            

            try {

                if (count($error) == 0) {

                    $query = 'INSERT INTO czytelnik (id_czytelnik, login, haslo, imie, nazwisko, telefon, adres ) 
                          VALUES (:id_czytelnik, :login, :haslo, :imie, :nazwisko, :telefon, :adres)';

                    if ($sth = $pdo->prepare($query)) {


                        $sth->bindValue(':id_czytelnik', $id_czytelnik, PDO::PARAM_INT);

                        $sth->bindValue(':login', $login, PDO::PARAM_STR);

                        $sth->bindValue(':haslo', $haslo, PDO::PARAM_STR);

                        $sth->bindValue(':imie', $imie, PDO::PARAM_STR);

                        $sth->bindValue(':nazwisko', $nazwisko, PDO::PARAM_STR);

                        $sth->bindValue(':telefon', $telefon, PDO::PARAM_STR);

                        $sth->bindValue(':adres', $adres, PDO::PARAM_STR);


                        if (!$sth->execute()) {

                            push_array($error, 'Błąd serwera');

                        }

                    }

                }

            }

            catch(PDOException $e) {
                print $e->getMessage();
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
    input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

</style>


<h3>Dodaj czytelnika</h3>


<form method="post" action="index.php?show=dodaj">
	<label for="form-username">Identyfikator czytelnika</label>
    <input type="text" name="id_czytelnik" class="form-control" id="id_czytelnik" value="<?php echo $_POST['id_czytelnik'] ?>"><br>

    <label for="form-password">Login</label>
    <input type="text" name="login" class="form-control" id="login" value="<?php echo $_POST['login'] ?>"><br>
             
    <label for="form-password">Haslo</label>
    <input type="text" name="haslo" class="form-control" id="haslo" value="<?php echo $_POST['haslo'] ?>"><br>
            
    <label for="form-password">Imie</label>
    <input type="text" name="imie" class="form-control" id="imie" value="<?php echo $_POST['imie'] ?>"><br>

    <label for="form-password">Nazwisko</label>
    <input type="text" name="nazwisko" class="form-control" id="nazwisko" value="<?php echo $_POST['nazwisko'] ?>"><br>

    <label for="form-password">Telefon</label>
    <input type="text" name="telefon" class="form-control" id="telefon" value="<?php echo $_POST['telefon'] ?>"><br>

    <label for="form-password">Adres</label>
    <input type="text" name="adres" class="form-control" id="adres" value="<?php echo $_POST['adres'] ?>"><br>

    <input type="submit" value="<?php echo ('Dodaj'); ?>"></br>
             
</form>
