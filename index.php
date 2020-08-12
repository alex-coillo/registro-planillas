<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Usabilidad del Aula Virtual</title>
</head>
<body>



<div class="container-fluid">

    <div class="container text-center by-5">
        <h1 class="display-4">USABILIDAD DEL AULA VIRTUAL</h1>
    </div>

    <div class="container-fluid ml-5 mt-3">
        <h3 class="font-weight-normal">Evaluación al docente en cada uno de sus cursos, llenar el formulario según las indicaciones dadas.</h3>
    </div>
<form class="formulario" action="agregar.php" method="POST" name="agregar">
  <div class="form-row mx-5 mt-4">
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 px-2 mt-4">
      <label for="programa">Programa profesional</label>
      <select class="form-control " name="programa" id="programa" required>
      
        
                    <?php
                include_once('conexion.php');
                $conexion=mysqli_connect($dbHost,$dbUser,$dbPass) or die("Problemas al acceder al servidor...");
                mysqli_select_db($conexion,$dbName) or die("Problemas al acceder a la base de datos...");
                mysqli_query($conexion,"SET NAMES 'utf8'");
                $sql = mysqli_query($conexion,"SELECT * from programas") or die("Problemas en consulta").mysqli_error();
                while ($registro=mysqli_fetch_array($sql)) {
                  echo "<option value=\"".$registro['id_p']."\">".$registro['nom_programa']."</option>";
                }
                mysqli_close($conexion);
              ?>
                   
        </select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 px-2 mt-4">
      <label for="">Docente</label>
      <input type="text" class="form-control" name="docente" id="docente" required>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 px-2 mt-4">
      <label for="">Asignatura o Curso</label>
      <input type="text" class="form-control" name="asignatura" id="asignatura" required>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 px-2 mt-4">
      <label for="">Planificación pedagógica</label>
      
      <select class="form-control " name="pp" id="pp" required>
                
                    <option value="1">Si su curso tiene un perfil profesional, silabus, competencias, temas)</option>
                    <option value="2">si solo a añadido temas y archivos en su curso</option>
                    <option value="3">si solo tiene archivos añadido en su curso.</option>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 px-2 mt-4">
      <label for="">USO VIDEOCONFERENCIAS</label>
      
      <select class="form-control " name="vc" id="vc" required>
                
                    <option value="1">Si usa Meet</option>
                    <option value="2">Si usa meet y su grabacion</option>
                    <option value="3">en caso solo tenga grabación</option>
        </select>
    </div>



    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 px-2 mt-4">
      <label for="">CRONOGRAMA DE ACTIVIDADES ACADÉMICAS</label> 
      <select class="form-control" type="number" name="ca" id="ca" required>
        <option type="number" value="1">Si el curso tiene una programación de las actividades por semana o semestre(Fechas para, clases, exámenes,etc.)</option>
        <option type="number" value="0">Si el curso no tiene una programación definida de las actividades</option>
      </select>
    </div>



    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 px-2 mt-4">
      <label for="">COMUNICACIÓN</label>
      
      <input type="number" class="form-control" name ="comunicacion" id="comunicacion" required>
      <label>Escribir la cantidad(número) de Formas de Comunicación que usa el docente(chats, foros, correos, tareas, etc.) </label>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 px-2 mt-4">
      <label for="">EVALUACIÓN</label>
      <select class="form-control " name="e" id="e" required>
                    <option value="1">si el docente usa cuestionarios, taller, tareas para evaluar</option>
                    <option value="2">si sólo utiliza cuestionarios</option>
        </select>
    </div>
    
    <div class="container-fluid text-right">
      <button type="submit" class="btn btn-primary">Agregar más cursos al mismo Docente</button>
    </div>
</form>




<div class="container-fluid mt-5 mx-auto">

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Programa</th>
      <th scope="col">Asignatura</th>
      <th scope="col">Planificación Pedagógica</th>
      <th scope="col">Uso Videoconferencias</th>
      <th scope="col">Cronograma de Actividades</th>
      <th scope="col">Comunicación</th>
      <th scope="col">Evaluacion</th>
    </tr>
  </thead>
  <tbody>
              
                <?php
                    include('conexion.php');
                    $conexion=mysqli_connect($dbHost,$dbUser,$dbPass) or die("Problemas al acceder al servidor...");
                    mysqli_select_db($conexion,$dbName) or die("Problemas al acceder a la base de datos...");
                    mysqli_query($conexion,"SET NAMES 'utf8'");
                    $sql = mysqli_query($conexion,"SELECT * from cursos_eva") or die("Problemas en consulta").mysqli_error();
                    while ($registro=mysqli_fetch_array($sql)) {
                      echo "<tr>";
                      echo "<td>".$registro['cod_programa']."</td>";
                      echo "<td>".$registro['nom_asignatura']."</td>";
                      switch($registro['cod_pp'])
                      {
                          case '1': echo "<td>Opción 1</td>";
                          break;
                          case '2': echo "<td>Opción 2</td>";
                          break;
                          case '3': echo "<td>Opción 3</td>";
                          break;
                      }
                      switch($registro['cod_vconfe'])
                      {
                          case '1': echo "<td>Opción 1</td>";
                          break;
                          case '2': echo "<td>Opción 2</td>";
                          break;
                          case '3': echo "<td>Opción 3</td>";
                          break;
                      }
                      switch($registro['cod_crono'])
                      {
                          case '1': echo "<td>Opción 1</td>";
                          break;
                          case '0': echo "<td>Opción 2</td>";
                          break;
                          case '2': echo "<td>Opción 2</td>";
                          break;
                          case '3': echo "<td>Opción 3</td>";
                          break;
                      }
                      echo "<td>".$registro['comunicacion']." formas</td>";
                      switch($registro['cod_evaluacion'])
                      {
                          case '1': echo "<td>Opción 1</td>";
                          break;
                          case '2': echo "<td>Opción 2</td>";
                          break;
                          case '3': echo "<td>Opción 3</td>";
                          break;
                      }
                      echo "<td><span class='label editar'><a href='editar-pcd.php?id=".$registro['id_curso']."'>Eliminar</a></span></td>";
                    }
                    mysqli_close($conexion);
                  ?>
                </tr>
                

              </tbody>
</table>



</div>




</div>







  <script src="/js/jquery-4.4.1.slim.min.js" ></script>
  <script src="/js/popper.min.js" ></script>
  <script src="/js/bootstrap.min.js" ></script>  
</body>
</html>