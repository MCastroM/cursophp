<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
	<h1>Pedido se ha confirmado</h1>
	<p>
		Tu pedido ha sido guardado con exito, una vez que realices la transferencia
		bancaria a la cuenta nnnnnnnn-00000-0000 con le coste del pedido, será procesado y enviado
	</p>
	<br/>

	<!-- Muestro esto si esta identificado-->
	<?php if(isset($pedido)): ?>
		<h3>Datos de pedido:</h3>
		<pre>
			Número de pedido:	<?=$pedido->id?>
			Total a pagar:		<?=$pedido->coste?>
			Productos:
		</pre>
	<?php endif; ?>
	<?php echo "No entro a pedido";?>
	 
<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
	<h1>Tu pedido no ha sido procesado</h1>
<?php endif; ?>

