<?php require_once 'includes/helpers.php'?>;

<!-- BARRA LATERAL-->
<aside id="sidebar">
    <div id="login" class="bloque">
        <h3>Identificate</h3>
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" />

            <label for="email">Email</label>
            <input type="email" name="email" />

            <input type="submit" value="Entrar" />
        </form>
    </div>

    <div id="register" class="bloque">

        <!-- Temporal para verificar errores-->
        <!-- <?php if(isset($_SESSION['errores'])): ?>-->
        <!-- <?php var_dump($_SESSION['errores']); ?> -->
        <?php endif; ?>
        <!-- Fin comprobacion de errores tempporal-->

        <h3>Registrate</h3>
        <form action="registro.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" />
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" />
            <?php echo mostrarError($_SESSION['errores'], 'apellidos'); ?>

            <label for="email">Email</label>
            <input type="email" name="email" />
            <?php echo mostrarError($_SESSION['errores'], 'email'); ?>

            <label for="password">Contraseña</label>
            <input type="password" name="password" />
            <?php echo mostrarError($_SESSION['errores'], 'password'); ?>

            <input type="submit" name="submit" value="Registrar" />
        </form>
        <?php borrarErrores();?>
    </div>
</aside>
</div>