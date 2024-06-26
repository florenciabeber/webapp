<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Florencia Beber</title>
  
    <title>Administrador de Imágenes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container overflow-hidden text-center">
        <div class="row gx-4">
            <div class="col col-md-12">
                <h1>Universidad Nacional del Comahue - Centro Regional Zona Atlántica</h1>
                <h2>Tecnicatura Superior en Administración de Sistemas y Software Libre</h2>

                <h3>Administración de Sistemas Avanzada</h3>
                    Trabajo Práctico Final 2024
            </div>
        </div>  
    </div>
    <hr>
    <div class="container overflow-hidden text-center">
        <div class="row gx-4">
            <div class="col col-md-8">
                <div class="p-3">          
                    <?php
                    $dir = 'uploads/';
                    if (is_dir($dir)){
                        $files = scandir($dir);
                        foreach($files as $file) {
                            if ($file !== '.' && $file !== '..') {
                                echo '<div class="image-container">';
                                echo '<img src="'.$dir.$file.'" class="rounded" >';
                                echo '<form action="" method="post" style="display:inline;">';
                                echo '<input type="hidden" name="filename" value="'.$file.'">';
                                echo '<button type="submit" name="delete" class="delete-button">Eliminar</button>';
                                echo '</form>';
                                echo '</div>';
                            }
                        }
                    }

                    // Manejo de eliminación de imagen
                    if (isset($_POST['delete'])) {
                        $file_to_delete = $dir . $_POST['filename'];
                        if (file_exists($file_to_delete)) {
                            unlink($file_to_delete);
                            header("Location: index.php"); // Redirigir para actualizar la lista de imágenes
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col col-md-4 " >
                <div class="p-3 div-derecho" style="color: white;">
                    <h1 style="color: white;">Cargar Imágen</h1>
                    <hr>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <label for="file">Elige una imagen:</label>
                        <input type="file" name="file" id="file" accept="image/*">
                        
                        <hr>
                        <input type="submit" name="submit" value="Subir Imagen" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <footer style="color: white" class="footer">
        Alumna: Florencia Beber | Profesor: Ramiro García
    </footer>
   
</body>
</html>
