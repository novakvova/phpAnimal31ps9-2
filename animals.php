<?php
include_once "_header.php";
include_once "_navbar.php";
?>

<?php include_once "connect_db.php"; ?>
<div class="container">
    <div class="row">
        <h1>Тваринки</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Назва</th>
                <th scope="col">Порода</th>
                <th scope="col">Дата народження</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT `Name`,`Bread`,`DateBirdth` FROM `tbl_animals`";
            //ADO.NET Command
            $sth = $dbh->prepare($query);
            //run
            $sth->execute();
            //reader - read data
            while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                echo '
        <tr>
            <th scope="row">1</th>
            <td>' . $row["Name"] . '</td>
            <td>' . $row["Bread"] . '</td>
            <td>' . $row["DateBirdth"] . '</td>
        </tr>
        ';
            }
            ?>

            </tbody>
        </table>
    </div>
</div>


<?php
include_once "_scripts.php";
include_once "_footer.php";
?>
