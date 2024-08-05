<?php

function pago($tasa, $num_per, $va, $vf = 0, $tipo = 0)
{
  // Si la tasa de interés es cero, el cálculo es diferente
  if ($tasa == 0) {
    return - ($va + $vf) / $num_per;
  }

  // Cálculo de la cuota utilizando la fórmula
  $cuota = $tasa * ($va * pow(1 + $tasa, $num_per) + $vf) / ((1 + $tasa) ** $num_per - 1);

  // Ajuste si los pagos son al inicio del período
  if ($tipo == 1) {
    $cuota /= (1 + $tasa);
  }

  return -$cuota;
}
/*
// Ejemplo de uso
$tasa = 0.05 / 12; // Tasa de interés mensual (5% anual)
$num_per = 10 * 12; // 10 años con pagos mensuales
$va = 100000; // Valor actual (monto del préstamo)

$pago_mensual = pago($tasa, $num_per, $va);
echo "El pago mensual es: " . round($pago_mensual, 2);
*/
$pre = $_POST['monto_prestamo'];
// echo "monto prestamo: " . $pre * -1;
$pre_negativo = $pre * -1;
$int = $_POST['interes_quincenal'];
$per = $_POST['plazo_quincenas'];
$imt = $int / 100;
//$cuo = $pre * (($imt * ((1 + $imt) ^ $per)) / (((1 + $imt) ^ $per) - 1));

$cuo = pago($imt, $per, $pre_negativo);

$int1 = $pre * $imt;
$amo1 = $cuo - $int1;
$sal1 = $pre - $amo1;
$amt1 = $amo1;

$pre2 = $sal1;
$int2 = $pre2 * $imt;
$amo2 = $cuo - $int2;
$sal2 = $pre2 - $amo2;
$amt2 = $amo2 + $amt1;

$pre3 = $sal2;
$int3 = $pre3 * $imt;
$amo3 = $cuo - $int3;
$sal3 = $pre3 - $amo3;
$amt3 = $amo3 + $amt2;

$pre4 = $sal3;
$int4 = round($pre4 * $imt, 2);
$amo4 = $cuo - $int4;
$sal4 = $pre4 - $amo4;
$amt4 = $amo4 + $amt3;

$pre5 = $sal4;
$int5 = round($pre5 * $imt, 2);
$amo5 = $cuo - $int5;
$sal5 = $pre5 - $amo5;
$amt5 = $amo5 + $amt4;

$pre6 = $sal5;
$int6 = round($pre6 * $imt, 2);
$amo6 = $cuo - $int6;
$sal6 = $pre6 - $amo6;
$amt6 = $amo6 + $amt5;

$pre7 = $sal6;
$int7 = round($pre7 * $imt, 2);
$amo7 = $cuo - $int7;
$sal7 = $pre7 - $amo7;
$amt7 = $amo7 + $amt6;

$pre8 = $sal7;
$int8 = round($pre8 * $imt, 2);
$amo8 = $cuo - $int8;
$sal8 = $pre8 - $amo8;
$amt8 = $amo8 + $amt7;

$pre9 = $sal8;
$int9 = round($pre9 * $imt, 2);
$amo9 = $cuo - $int9;
$sal9 = $pre9 - $amo9;
$amt9 = $amo9 + $amt8;

$pre10 = $sal9;
$int10 = round($pre10 * $imt, 2);
$amo10 = $cuo - $int10;
$sal10 = $pre10 - $amo10;
$amt10 = $amo10 + $amt9;

?>

<table>
  <thead>
    <tr>
      <th>Prestamo</th>
      <th>Interes</th>
      <th>Plazo</th>
      <th>cutoa</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>$<?= $pre ?></td>
      <td><?= $int ?>%</td>
      <td><?= $per ?> quincenas</td>
      <td>$<?= round($cuo, 2) ?></td>
    </tr>
  </tbody>
</table>

<?php
$saldo = $pre;
?>

<table>
  <thead>
    <tr>
      <th># cuota</th>
      <th>valor cutoa</th>
      <th>interes</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 1; $i <= $per; $i++) : ?>
      <tr>
        <td><?= $i ?></td>
        <td><?= round($cuo, 2) ?></td>
      </tr>
    <?php endfor ?>
  </tbody>
</table>