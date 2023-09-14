<?php require_once 'includes/cabecera.php'?>
<?php require_once 'includes/lateral.php'?>

    <!-- CAJA PRINCIPAL-->
<div id="principal">
    <h1>Ultimas entradas</h1>

    <?php
        $entradas = conseguirUltimasEntradas($db);
        if(!empty($entradas)):
            while($entrada = pg_fetch_assoc($entradas)):
    ?>
        <articles id="entrada">
            <a href="">
                <h2><?=$entrada['titulo']?></h2>
                <span class="fecha"><?=$entrada['categoria']. ' | '.$entrada['fecha']?></span>
                <p>
                    <?=substr($entrada['descripcion'],0, 180)."..."?>
                </p>
            </a>
            
        </articles>

    <?php
            endwhile;
        endif;
    ?>

        <div id="ver-todas">
            <a href="">Ver todas las entradas</a>
        </div> 
</div>    
    

<?php require_once 'includes/pie.php'?>

