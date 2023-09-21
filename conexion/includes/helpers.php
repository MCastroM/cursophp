<?php

function mostrarError($errores, $campo){
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
    }
    return $alerta;
}


function borrarErrores(){
        $_SESSION['errores'] = null;
        unset($_SESSION['errores']);
        if(isset($_SESSION['completado'])){
            $_SESSION['completado'] = null;
            unset($_SESSION['completado']);
        }

        if(isset($_SESSION['errores_entrada'])){
            $_SESSION['errores_entrada'] = null;
            // unset($_SESSION['errores_entrada']);
        }

}

function conseguirCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = pg_query($conexion, $sql);

    $result = array();   
    if($categorias && pg_num_rows($categorias) >= 1){
        $resultado = $categorias;
    }
    return $resultado;
}


function conseguirEntrada($conexion,$id){
    $sql =  "SELECT e.*, c.nombre AS categoria, CONCAT(u.nombre, ' ', u.apellido) as usuario FROM entradas e".
            " INNER JOIN categorias c ON e.categoria_id = c.id".
            " INNER JOIN usuarios u ON e.usuario_id = u.id".
            " WHERE e.id = $id;";

    $entrada = pg_query($conexion, $sql);

    // var_dump(pg_fetch_assoc($entrada));
    // die();

    $resultado = array();
    if($entrada && pg_num_rows($entrada) >= 1){
        $resultado = pg_fetch_assoc($entrada); 
    }

    return $resultado;
}


function conseguirUltimasEntradas($conexion, $limit = null, $categoria = null, $busqueda = null){
    $sql = "SELECT e.*, c.nombre as categoria FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id";

    if(!empty($categoria)){
        $sql .= " WHERE e.categoria_id = $categoria";
    }

    if(!empty($busqueda)){
        $sql .= " WHERE e.titulo like '%$busqueda%' ";
    }


    $sql .= " ORDER BY e.id DESC";

    if($limit){
        $sql.=" LIMIT 4";
    }

    $entradas = pg_query($conexion, $sql);

    $resultado = array();
    if($entradas && pg_num_rows($entradas)>= 1){
        $resultado = $entradas;
    }

    return $entradas;
}

function conseguirCategoria($conexion, $id){
    $sql = "SELECT * FROM categorias WHERE id = $id;";
    $categorias = pg_query($conexion, $sql);

    $result = array();   
    if($categorias && pg_num_rows($categorias) >= 1){
        $resultado = pg_fetch_assoc($categorias);
    }
    return $resultado;
}


