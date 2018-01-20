<?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $error = array();

                $id_ksiazka=trim($_POST['id_ksiazka']);
                $id_kategoria = trim($_POST['id_kategoria']);
                $isbn=trim($_POST['isbn']);
                $tytul = trim($_POST['tytul']);
                $autor = trim($_POST['autor']);
                $wydawnictwo = trim($_POST['wydawnictwo']);



                if (!isset($id_ksiazka) || empty($id_ksiazka)) {
                        array_push($error, 'Prosze podac identyfikator ksiazki');
                }else if(!isset($id_kategoria) || empty($id_kategoria)) {
                        array_push($error, 'Prosze podac identyfikator kategorii');
                }else if (!isset($isbn) || empty($isbn)){
                        array_push($error, 'Prosze podac numer isbn');
                }else if (!isset($tytul) || empty($tytul)){
                        array_push($error, 'Prosze podac tytul');
                }else if (!isset($autor) || empty($autor)){
                        array_push($error, 'Prosze podac autora');
                }else if (!isset($wydawnictwo) || empty($wydawnictwo)){
                        array_push($error, 'Prosze podac wydawnictwo');
                }


                if (count($error) == 0) {

                        $query = 'INSERT INTO ksiazka (id_ksiazka, id_kategria, isbn, tytul, autor, wudawnictwo ) VALUES (:id_ksiazka, :id_kategoria, :isbn, :tutul, :autor, :wydawnictwo)';

                        if ($sth = $pdo->prepare($query)) {
                                $sth->bindValue(':id_ksiazka', $id_ksiazka, PDO::PARAM_STR);
                                $sth->bindValue(':id_kategoria', $id_kategoria, PDO::PARAM_STR);
                                $sth->bindValue(':isbn', $isbn, PDO::PARAM_INT);
                                $sth->bindValue(':tytul', $tytul, PDO::PARAM_STR);
                                $sth->bindValue(':autor', $autor, PDO::PARAM_STR);
                                $sth->bindValue(':wydawnictwo', $wydawnictwo, PDO::PARAM_STR);


                                if (!$sth->execute()) {
                                        push_array($error, 'Błąd serwera');
                                }
                        }

                }
        }
?>



<h3>Dodaj ksiazke</h3>

<?php if (count($error) != 0): ?>
	<ul>
		<?php foreach ($error as $item): ?>
			<li> <?php echo $item; ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>

<form method="post" action="index.php?show=dodaj_ksiazke">
	<label for="form-username">Tytuł</label>
    <input type="text" name="tytul" class="form-control" id="tytul" placeholder="Tytuł" value="<?php echo $_POST['tytul'] ?>"><br>
            
             
    <label for="form-password">Autor</label>
    <input type="text" name="autor" class="form-control" id="autor" placeholder="Autor" value="<?php echo $_POST['autor'] ?>"><br>
             
    <label for="form-password">Wydawnictwo</label>
    <input type="text" name="wydawnictwo" class="form-control" id="year" placeholder="Wydawnictwo" value="<?php echo $_POST['wydawnictwo'] ?>"><br>
            
    <label for="form-password">Isbn</label>
    <input type="text" name="isbn" class="form-control" id="isbn" placeholder="Isbn" value="<?php echo $_POST['isbn'] ?>"><br>

    <label for="form-password">Identyfikator ksiazki</label>
    <input type="text" name="id_ksiazka" class="form-control" id="id_ksiazka" placeholder="Identyfikator ksiazki" value="<?php echo $_POST['id_ksiazka'] ?>"><br>

    <label for="form-password">Identyfikator kategorii</label>
    <input type="text" name="id_kategoria" class="form-control" id="id_kategoria" placeholder="id_kategoria" value="<?php echo $_POST['id_kategoria'] ?>"><br>
	

 <button type="submit" class="btn btn-primary">Submit</button>
             
</form>
