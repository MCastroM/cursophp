<?php

    if(!isset($_POST['busqueda'])){
        header("Location: index.php");
    }  
?>
<?php require_once 'includes/cabecera.php'?>
<?php require_once 'includes/lateral.php'?>

    <!-- CAJA PRINCIPAL-->
<div id="principal">
    
    <h1>Busqueda <?=$_POST['busqueda']?></h1>

    <?php
        $entradas = conseguirUltimasEntradas($db, null, null, $_POST['busqueda']);



        if(!empty($entradas) && pg_num_rows($entradas) >= 1): {
            while($entrada = pg_fetch_assoc($entradas)):
    ?>
            <articles id="entrada">
                <a href="entrada.php?id=<?=$entrada['id']?>">
                    <h2><?=$entrada['titulo']?></h2>
                    <span class="fecha"><?=$entrada['categoria']. ' | '.$entrada['fecha']?></span>
                    <p>
                        <?=substr($entrada['descripcion'],0, 180)."..."?>
                    </p>
                </a>
            
            </articles>

    <?php
            endwhile;
        }else:{
    ?>
        <div class="alerta">No hay entradas en esta categoria</div>
    <?php
        }endif; 
    ?>
</div>    
    
<?php require_once 'includes/pie.php'?>

