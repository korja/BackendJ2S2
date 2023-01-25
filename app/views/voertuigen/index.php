<?php require(APPROOT . '/views/includes/header.php');?>

<h3><?= $data['title'] ?></h3>

<h5><?= 'Aantal instructeurs: ' . $data['aantal']; ?></h5>

<table border='6'>
    <thead>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Mobiel</th>
        <th>Datum In dienst</th>
        <th>AantalSterren</th>
        <th>Voertuigen</th>
    </thead>
    <tbody>
        <?= $data['rows'] ?>
    </tbody>
</table>

<?php require(APPROOT . '/views/includes/footer.php');?>