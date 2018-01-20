<?php
  $sth = $pdo->query('SELECT  id_czytelnik, login, haslo, imie, nazwisko, telefon, adres FROM czytelnik;');
  $result = $sth->fetchAll();
?>



<style>

    #table
    {
        border: 1px solid #ddd;
        padding: 8px;
        width:100%;
    }

    #table tr
    {
        align="center";
    }

    #table th
    {
        align: center;
        background-color: #4CAF50;
    }

    #table th, td
    {
        border: 1px solid #ddd;
        padding: 8px;
    }
</style>

	<table id="table" >
      <thead>
          <th scope="col">Identyfikator czytelnika</th>
          <th scope="col">Login</th>
          <th scope="col">Hasło</th>
          <th scope="col">Imię</th>
          <th scope="col">Nazwisko</th>
		  <th scope="col">Telefon</th>
          <th scope="col">Adres</th>
          <th scope="col"></th>


      </thead>
      <tbody>
      <?php foreach ($result as $row): ?>
        <tr >
            <td><?php echo $row["id_czytelnik"]; ?></td>
            <td><?php echo $row["login"]; ?></td>
		    <td><?php echo $row["haslo"]; ?></td>
            <td><?php echo $row["imie"]; ?></td>
		    <td><?php echo $row["nazwisko"]; ?></td>
            <td><?php echo $row["telefon"]; ?></td>
            <td><?php echo $row["adres"]; ?></td>

            <td><a href="index.php?show=aktualizuj&id_czytelnik=<?php echo $row["id_czytelnik"]; ?>" class="btn btn-primary">Zaktualizuj profil czytelnika</a></td>
		</tr>
      <?php endforeach; ?>
      </tbody>
    </table>