<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
</head>
<body>
<h1>Listado de Usuarios</h1>
    
    <?php
    include '../../../config/conexionBD.php';
    $sql = "SELECT * FROM libro";
    $result = $conn->query($sql);
   
    if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
           echo "<section>";
           echo "<h2>Nombre del libro <h2>";
           echo "<p>".$row["libNombre"]."<p>";
           echo "<p>".$row["libISBN"]."<p>";
           echo "<p>".$row["libNPaginas"]."<p>";
            $sqlC = "SELECT * FROM capitulos WHERE capLibCod='.$row["libCodigo"].'";
            $resultC = $conn->query($sqlA);
            if ($resultC->num_rows > 0) {
                echo "<table>";
                echo "<tr>
                    <th>Numero de Capitulo</th>
                    <th>Titulo del Capitulo</th>
                    <th>Nombre del Autor</th>
                    <th>Nacionalidad</th>
                </tr>";
                while($rowC = $resultC->fetch_assoc()) {
                    $sqlA = "SELECT * FROM autor WHERE autCodigo='.$rowC["capAutCod"].'";
                    $resultA = $conn->query($sqlA);
                    $rowA = $resultA->fetch_assoc()
                    echo "<tr>";
                    echo " <td>" . $row["capNumero"] . "</td>";
                    echo " <td>" . $row['capTitulo'] ."</td>";
                    echo  "<td>" . $row['autNombre'] ."</td>";
                    echo  "<td>" . $row['autNacionalidad'] ."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }


           echo "</section>";
          }
       }
    $conn->close(); 
     ?>
</body>
</html>