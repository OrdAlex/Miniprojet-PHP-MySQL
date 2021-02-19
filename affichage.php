<?php
$con = mysqli_connect("serveur.siovision.fr", "musees05", "E2OAjjNa71uxjNf8", "musees05");
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste de Musées</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<?php
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
$sql = 'SELECT * FROM MUSEE';
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
?>
<table class="table">
    <tr>
        <th>Region</th>
        <th>Nom</th>
        <th>Telephone</th>
        <th>Adresse</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row["NEW_REGIONS"] ?></td>
            <td><?php echo $row["NOM_DU_MUSEE"] ?></td>
            <td><?php echo $row["TELEPHONE1"] ?></td>
            <td><?php echo $row["ADR"] . " " . $row["CP"] . " " . $row["VILLE"] ?></td>
        </tr>
    <?php }
    } else {
        echo "0 results";
    }
    mysqli_close($con) ?>

</table>
</body>
</html>