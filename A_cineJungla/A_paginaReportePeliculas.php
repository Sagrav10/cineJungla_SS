<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    ADMINISTRADOR LOCAL
  </title>
    <?php 
    require_once "scripts.php";
    require_once "clases/conexion.php";
    include_once 'controlador/user.php';
    include_once 'controlador/user_Sesion.php';
    
    $obj=new conectar();
    $conexion=$obj->conexion();
    
    $userSession = new UserSession();
    $user = new Usuario();
    
    if(!isset($_SESSION['user']))
    {
        header("location: index.php");
    }
    
    $user->setUser($userSession->getCurrentUser());
    $cod_mul = $user->getCodigoMul();
    $cod_usuario = $user->getCodUsuario();


    $result=mysqli_query($conexion,"SELECT nom_multiplex FROM MULTIPLEX WHERE cod_multiplex=".$cod_mul);
    $aux=mysqli_fetch_row($result);
    $nom_mul = $aux[0];


    error_reporting(0);
    ?>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
 
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a href="A_paginaIndex.php" class="simple-text logo-mini">
          CJ
        </a>
        <a href="A_paginaIndex.php" class="simple-text logo-normal">
          CINE JUNGLA APP
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="A_paginaFunciones.php">
              <i class="fas fa-film"></i>
              <p>GESTI&Oacute;N DE FUNCIONES</p>
            </a>
          </li>
          <li>
            <a href="A_paginaSnacks.php">
              <i class="fas fa-hotdog">
              </i>
              <p>GESTI&Oacute;N DE SNACKS</p>
            </a>
          </li>
          <li>
            <a href="A_paginaSalas.php">
              <i class="fas fa-couch"></i>
              <p>GESTI&Oacute;N DE SALAS</p>
            </a>
          </li>
          <li>
            <a href="A_paginaEmpleados.php">
              <i class="now-ui-icons users_single-02"></i>
              <p>GESTI&Oacute;N DE EMPLEADOS</p>
            </a>
          </li>
          <li>
            <a href="A_paginaAuditoria.php">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>AUDITORIA</p>
            </a>
          </li>
          <li>
            <a href="A_paginaReportes.php">
              <i class="fas fa-book"></i>
              <p>REPORTES</p>
            </a>
          </li>


        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" style="font-size:3 ">
            <?php 
                $conexion=$obj->conexion();
                $sql="SELECT nom_multiplex FROM MULTIPLEX where MULTIPLEX.cod_multiplex = $cod_mul";
                $result=mysqli_query($conexion,$sql);
                
                while($row = $result->fetch_assoc())
                {
                    echo "MULTIPLEX ". $row['nom_multiplex'];
                }
                ?>
          </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#sergio">
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Usuario</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="controlador/logout.php">Cerrar sesi&oacute;n</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div>
      <div class="content">
        <div class="container-fluid ">
        <div class="row">
          <div class="col-sm-12">
            <div class="card text-left">
              <div class="card-header">
                TABLA REPORTES
              </div>
              <div class="card-body">


              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#reporteSnack">
                Reportes Snacks
              </button>

              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#reportePeliculas">
                Reportes Peliculas
              </button>

              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#reporteVentas">
                Reportes Ventas
              </button>
				
				<script type="text/javascript">
				document.cookie = 'same-site-cookie=foo; SameSite=Lax'; 
				document.cookie = 'cross-site-cookie=bar; SameSite=None; Secure';
				</script>
				
                <hr>
                <div id="tabladatatable">
<br><br>
				<?php



        $sql = "SELECT 
                      PELICULA,sala_cine.cod_multiplex as cod_multiplex,YEAR(FECHA) AS ANIO, MONTH(FECHA) AS MES,SUM(60-DISPONIBILIDAD) as cantidad
                FROM 
                      mostrarfunciones,sala_cine,funcion 
                WHERE 
                      mostrarfunciones.CODIGO=funcion.cod_funcion and
                      funcion.cod_sala_cine=sala_cine.cod_sala_cine AND 
                      MONTH(FECHA)=".$_POST['mes']."  AND 
                      mostrarFunciones.multiplex='".$nom_mul."' AND
                      YEAR(FECHA)=".$_POST['año']."


                      GROUP BY PELICULA
                      Order by cantidad DESC";
        
        
        $datosMes = array();

        $result=mysqli_query($conexion,$sql);

        while($mostrar=mysqli_fetch_row($result))
        {
            $actual = array("label"=> $mostrar[0], "y"=> $mostrar[4]);
            array_push($datosMes, $actual);
        }



?>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1",
	title:{
		text: "Reporte de peliculas mensual"
	},
	data: [{
		type: "column", 
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($datosMes, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<br><br>
                </div>
                <div align="right">
                  <form id="data" name="data" action="./A_reportes/A_pdfPeliculas.php?t=pdf" method="POST">
                    <input type="hidden" id='año' name='año' value='<?php echo $_POST['año']?>' >
                    <input type="hidden" id='mes' name='mes' value='<?php echo $_POST['mes'] ?>' >
                  </form>

                 <a href="#" onclick="javascript:document.data.submit()" target="_blank">PDF</a>

                </div><br>
              </hr>
            </div>
            <div class="card-footer text-muted">
              BY CINEJUNGLA APP
            </div>
          </div>
        </div>

      </div>
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  GRUPO DE DESARROLLO UEB SOFTWARE
                </a>
              </li>

              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by UEBGRUPOB. Coded by <a href="https://www.creative-tim.com" target="_blank">EQUPIO COMPLETO</a>.
          </div>
        </div>
      </footer>
    </div>
    </div>
  </div>

 <!-- Modal Snacks-->
 <div class="modal fade" id="reporteSnack" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reporte Snacks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
              <form action="./A_paginaReporteSnacks.php" method="post" id="form1">

                <table>

                  <tr>
                    <td><label>Año</label></td>

                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      

                    <td><label>Mes</label></td>
                    
                  </tr>

                  <tr>

                    <td>
                      <select name="año" id="año" class="form-control">
                   
                    <?php                      
                      $años = array();

                      for($i = date("Y")-5; $i <= date("Y")+5; $i++){

                        echo "<option value=$i>$i</option>";                         
                      }

                    ?>

                    </select>
                    
                    </td>
                      
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                    
                    <td>
                      <select name="mes" id="mes" class="form-control">
                   
                      <?php
                        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

                        for($i = 0; $i < count($meses); $i++){

                          echo "<option value=$i+1>$meses[$i]</option>";                         
                        }

                      ?>
                    </td>

                  </tr>


                </table>
              </form>

              

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" form="form1" value="Submit">Ir</button>
              </div>
            </div>
          </div>
        </div>

         <!-- Modal Peliculas -->
         <div class="modal fade" id="reportePeliculas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reporte Peliculas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
              <form action="./A_paginaReportePeliculas.php" method="post" id="form2">

                <table>

                  <tr>
                    <td><label>Año</label></td>

                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      

                    <td><label>Mes</label></td>
                    
                  </tr>

                  <tr>

                    <td>
                      <select name="año" id="año" class="form-control">
                   
                    <?php                      
                      $años = array();

                      for($i = date("Y")-5; $i <= date("Y")+5; $i++){

                        echo "<option value=$i>$i</option>";                         
                      }

                    ?>

                    </select>
                    
                    </td>
                      
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                      <td>&nbsp</td>
                    
                    <td>
                      <select name="mes" id="mes" class="form-control">
                   
                      <?php
                        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

                        for($i = 0; $i < count($meses); $i++){

                          echo "<option value=$i+1>$meses[$i]</option>";                         
                        }

                      ?>
                    </td>

                  </tr>


                </table>
              </form>

              

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" form="form2" value="Submit">Ir</button>
              </div>
            </div>
          </div>
        </div>

         <!-- Modal Ventas-->
         <div class="modal fade" id="reporteVentas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reporte Ventas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
              <form action="./A_paginaReporteVentas.php" method="post" id="form3">

                <center><table>

                  <tr>
                    <td><center><label>Año</label></center></td>
                  </tr>

                  <tr>

                    <td>
                      <select name="año" id="año" class="form-control">
                   
                    <?php                      
                      $años = array();

                      for($i = date("Y")-5; $i <= date("Y")+5; $i++){

                        echo "<option value=$i>$i</option>";                         
                      }

                    ?>

                    </select>

                  </tr>


                  </center></table>
              </form>

              

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" form="form3" value="Submit">Ir</button>
              </div>
            </div>
          </div>
        </div>
</body>

</html>