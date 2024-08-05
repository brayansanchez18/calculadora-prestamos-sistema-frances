<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="prestamos.php" method="post">
    <label for="#monto">Monto de solicitud: </label>
    <input type="number" step="any" name="monto_prestamo" id="monto" required>
    <br>
    <label for="interes">Interes quincenal (%)</label>
    <input type="number" name="interes_quincenal" id="interes" required>
    <br>
    <label for="periodo">Plazo</label>
    <input type="number" name="plazo_quincenas" id="periodo" required>
    <br>
    <button type="submit">Calcular</button>
  </form>
</body>

</html>