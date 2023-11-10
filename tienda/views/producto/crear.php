<h1>Crear nuevos productos</h1>

<form action="<?=base_url?>producto/save" method="POST">
	<label for="nombre">Nombre</label>
	<input type="text" name="nombre">

	<label for="descripcion">Descripción</label>
	<textarea name="descripcion"></textarea>

	<label for="precio">Precio</label>
	<input type="text" name="precio">

	<label for="stock">Stock</label>
	<input type="numbrer" name="stock">

	<label for="categoria">Categoria</label>
	<?php $categorias = Utils::showCategorias(); ?>
		<?php var_dump($categorias); ?>
		<?php die(); ?>

	<select name="categoria">

	
		<?php while($cat = $categoria->fetch_object()): ?>
			<option value="<?=$cat->id?>">
					<?=$cat->nombre?>
			</option>
			<?php endwhile; ?>
	</select>

	<label for="nombre">Nombre</label>
	<input type="text" name="nombre">
</form>


