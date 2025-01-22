<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!-- LISTAR TODAS LAS CITAS -->
    <!-- LA VARIABLE QUE CONTIENE TODAS LAS CITAS ES... $citas (que es un array asociativo) -->
    <!-- ITERAR CON UN FOREACH $citas Y METER EN UN <ul> ... o en varios <p> o en lo que queráis cada cita -->
    <?php foreach ($citas as $cita): ?>
        <ul>
            <?= $cita["id"] ?>
            <li>Descripcion: <?= $cita["descripcion"] ?></li>
            <li>Fecha: <?= $cita["fecha_cita"] ?></li>
            <li>cliente: <?= $cita["cliente"] ?></li>
            <li>Tatuador: <?= $cita["tatuador"] ?></li>
        </ul>
    <?php endforeach; ?>

</body>

</html>