<?php
 //incluir conexión a la base de datos
 include '../../../../config/conexionBD.php';
 $codAutor = $_GET['codAutor'];
 //echo "Hola " . $cedula;

 $sql = "SELECT * FROM autor WHERE  autCodigo='$codAutor'";
//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 echo " <table style='width:100%'>
 <tr>
 <th>Nombre Autor</th>
 <th>Nacionalidad</th>
 </tr>";
 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

    echo "<tr>";
    echo " <td>" . $row['autNombre'] . "</td>";
    echo " <td>" . $row['autNacionalidad'] ."</td>";
    echo "</tr>";
    }
 } else {
    echo "<tr>";
    echo " <td colspan='7'> No existe el Autor</td>";
    echo "</tr>";
 }
 echo "</table>";
 $conn->close();

?>