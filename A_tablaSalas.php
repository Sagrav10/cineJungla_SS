<?php 
header('Content-Type: text/html; charset=UTF-8');
?>
<?php 
require_once "./clases/conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();

$cod_mul = 2;

$sql="	SELECT 
			MULTIPLEX.nom_multiplex, SALA_CINE.cod_sala_cine, SALA_CINE.nombre_sala, SALA_CINE.estado_sala ,MULTIPLEX.cod_multiplex
		FROM 
			MULTIPLEX, SALA_CINE 
		WHERE 
			SALA_CINE.cod_multiplex = MULTIPLEX.cod_multiplex AND 
			MULTIPLEX.cod_multiplex = $cod_mul";

$result=mysqli_query($conexion,$sql);


?>

<div>
	<table class="table table-hover table-condensed" id="iddatatable">
		<thead style="background-color: #4f944a;color: white; font-weight: bold;">
			<tr>
				<td>MULTIPLEX</td>
				<td>CODIGO</td>
				<td>NOMBRE</td>
				<td>ESTADO</td>
				<td>ACCIÓN</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<td>MULTIPLEX</td>
				<td>CODIGO</td>
				<td>NOMBRE</td>
				<td>ESTADO</td>
				<td>ACCIÓN</td>
			</tr>
		</tfoot>
		<tbody>
			<?php 
			while ($mostrar=mysqli_fetch_row($result)){
				?>
				<tr>
					<td><?php echo $mostrar[0] ?></td>
					<td><?php echo $mostrar[1] ?></td>
					<td><?php echo $mostrar[2] ?></td>
					<td><?php echo $mostrar[3] ?></td>
					

					<td>
						<?php if( strcasecmp($mostrar[3], "ACTIVO") == 0  ){ ?>
							<span class="btn btn-warning btn-xs" onclick="desabilitarSala(<?php echo $mostrar[1]; echo ','; echo $mostrar[4]; ?> )">
								<span class="far fa-window-close""></span>
							</span>
						<?php  } else { ?>
							<span class="btn btn-warning btn-xs" onclick="habilitarSala(  <?php echo $mostrar[1]; echo ','; echo $mostrar[4]; ?> )">
								<span class="fas fa-check"></span>
							</span>
						<?php } ?>

					</td>	

					
				</tr>
				<?php 
			}
			?>

		</tbody>







	</table>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#iddatatable').DataTable();
	} );


</script>