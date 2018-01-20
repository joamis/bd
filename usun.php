<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $error = array();

    $id_czytelnik = trim($_POST['id_czytelnik']);



   try {

       $query = 'DELETE FROM czytelnik 
                  WHERE id_czytelnik =:id_czytelnik';

       if ($sth = $pdo->prepare($query)) {
           $sth->bindValue(':id_czytelnik', $id_czytelnik, PDO::PARAM_INT);

           if (!$sth->execute()) {
               push_array($error, 'Błąd serwera');
           }
       }

   }

   catch (PDOException $e){
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


<h3>Usuń czytelnika</h3>

<form method="post" action="index.php?show=usun">
    <label for="form-username">Identyfikator czytelnika</label>
    <input type="text" name="id_czytelnik" class="form-control" id="id_czytelnik" ><br>
    <input type="submit" value="<?php echo ('Usuń'); ?>"</br>
</form>
</form>
        
