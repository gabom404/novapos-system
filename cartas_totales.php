<?php include_once "encabezado.php"; ?>

<div class="row">
    <?php foreach($cartas as $indice => $carta){?>
        <div class="col-lg-3 col-md-6 mb-4" style="color: <?=  $carta['color']?> !important">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas <?= $carta['icono']?>"></i>
                        <?= $carta['titulo']?>
                    </h4>
                    <h2><?= $carta['total']?></h2>
                    <?php if ($indice == 1) { ?>
                        <form action="generar_ganancias.php" method="post" target="_BLANK">
                            <input type="hidden" name="totalVentas" value="<?= $totales['totalTarjeta'] + $totales['totalEfectivo'] ?>">
                            <input type="hidden" name="totalTarjeta" value="<?= $totales['totalTarjeta'] ?>">
                            <input type="hidden" name="totalEfectivo" value="<?= $totales['totalEfectivo'] ?>">
                            <button type="submit" class="btn btn-primary">Generar Ganancias</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php }?>
</div>
