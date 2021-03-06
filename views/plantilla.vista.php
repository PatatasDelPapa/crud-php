<!DOCTYPE html>
<html lang="es">
<head>
    <title>Lista de notas</title>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notas</title>

    <!-- =============================================
    PLUGINS DE CSS
    ===============================================-->

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- =============================================
    PLUGINS DE JS
    ===============================================-->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/8a8f0892da.js" crossorigin="anonymous"></script>
</head>
<body>

    <h1 style="text-align:center;">CRUD PHP PURO</h1>

    <!-- =============================================
    BOTONES
    ===============================================-->
    <div class="container-fluid bg-light">
        
        <div class="container py-2">
            
            <!-- 
                Esta seccion esta dedicada simplemente a resaltar la seccion activa en el panel superior.
                Si el usuario se encuentra viendo el listado, se resalta el boton Listado, en cambio, si
                se encuentra ingresando una nota, se resalta el boton de Ingreso.
            -->

            <!-- 
                Esto se logra revisando las [Kev][Value] de las peticiones GET realizadas. Sin embargo, 
                cuando el usuario ingresa por primera vez al sistema no existe ninguna petición GET
                por lo que realizamos un default a Listado como activo.
            -->

            <!-- Panel de navegación superior del sistema -->
            <ul class="nav nav-justified py-2 nav-pills">
                <!-- Existe una petición GET con llave pagina? -->
                <?php if (isset($_GET["pagina"])): ?>
                    <!-- Si existe, el valor es listado? -->
                    <?php if ($_GET["pagina"] == "listado"): ?>
                        <li class="nav-item">
                            <!-- Si el valor era listado entonces resaltalo -->
                            <a class="nav-link active" href="index.php?pagina=listado">Listado</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <!-- Si el valor no era listado no lo resaltes -->
                            <a class="nav-link" href="index.php?pagina=listado">Listado</a>
                        </li>
                    <?php endif ?>

                    <!-- Si existe, el valor es ingreso? -->
                    <?php if ($_GET["pagina"] == "ingreso"): ?>
                        <li class="nav-item">
                            <!-- Si el valor era ingreso entonces resaltalo -->
                            <a class="nav-link active" href="index.php?pagina=ingreso">Ingreso</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <!-- Si el valor no era ingreso no lo resaltes -->
                            <a class="nav-link" href="index.php?pagina=ingreso">Ingreso</a>
                        </li>
                    <?php endif ?>
                <!-- No existe una petición GET con llave pagina -->
                <?php else: ?> 
                    <li class="nav-item">
                        <!-- Por default resaltamos listado -->
                        <a class="nav-link active" href="index.php?pagina=listado">Listado</a>
                    </li>
                    <li class="nav-item">
                        <!-- Por default no resaltamos ingreso -->
                        <a class="nav-link" href="index.php?pagina=ingreso">Ingreso</a>
                    </li>
                <?php endif ?>
                

            </ul>
        
        </div>
    
    </div>

    <!-- =============================================
    CONTENIDO
    ===============================================-->
    <div class="container-fluid">
        
        <div class="container py-5">

            <?php 
                /*
                    ISSET: isset() Determina si una variable esta definida y no es NULL
                */
                if(isset($_GET["pagina"])) {
                    if(
                        $_GET["pagina"] == "listado" || 
                        $_GET["pagina"] == "ingreso" || 
                        $_GET["pagina"] == "editar"
                    ) {
                        include "pages/".$_GET["pagina"].".vista.php";
                    } else {
                        include "pages/error404.vista.php";
                    }
                } else {
                    include "pages/listado.vista.php";
                }
            ?>

        </div>

    </div>

</body>
</html>