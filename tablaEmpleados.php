<?php 
header('Content-Type: text/html; charset=UTF-8');
?>
<?php 
require_once "./clases/conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();

$cod_mul=2;

$sql="	SELECT 
			cod_empleado, nombre_empleado, nom_multiplex, nombre_cargo_empleado , fecha_ingreso_empleado , estado_empleado
		FROM 
			empleado, multiplex, cargo_empleado
		WHERE
			MULTIPLEX.cod_multiplex = EMPLEADO.cod_multiplex AND
			CARGO_EMPLEADO.cod_tipo_empleado = EMPLEADO.cod_tipo_empleado AND
			EMPLEADO.cod_multiplex = $cod_mul";

$result=mysqli_query($conexion,$sql);

?>

<div>
	<table class="table table-hover table-condensed" id="iddatatable">
		<thead style="background-color: #4f944a;color: white; font-weight: bold;">
			<tr>
				<td>CODIGO</td>
				<td>NOMBRE</td>
				<td>MULTIPLEX</td>
				<td>TIPO</td>
				<td>INGRESO</td>
				<td>ESTADO</td>
				<td>MODIFICAR</td>
				<td>ELIMINAR</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<td>CODIGO</td>
				<td>NOMBRE</td>
				<td>MULTIPLEX</td>
				<td>TIPO</td>
				<td>INGRESO</td>
				<td>ESTADO</td>
				<td>MODIFICAR</td>
				<td>ELIMINAR</td>
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

					<?php 
						$date = new DateTime( $mostrar[4]);
					?>

					<td><?php echo date_format($date, 'd/m/Y'); ?></td>
					
					
					
					<td><?php echo $mostrar[5] ?></td>

					<td>
						<center><span class="btn btn-warning btn-xs" >
							<span class="far fa-edit" ></span>
						</span></center>
					</td>	

					<td>
						<center><span class="btn btn-warning btn-xs">
							<span class="fas fa-user-times"></span>
						</span></center>
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