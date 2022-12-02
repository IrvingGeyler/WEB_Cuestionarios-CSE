<?php
session_start();


if (!isset($_SESSION['Admin'])) { //Si nunca se creado una sesion de admin
    header("Location: index.php");
}

$IdAdmin = $_SESSION['IdAdmin'];

include_once "layouts/head_pagina.php";
?>

<script src="js/jquery-3.6.1.min.js"></script>
<script>
    $(document).ready(function() {
        $(".upload").on('click', function() {
            var formData = new FormData();
            var files = $('#image')[0].files[0];
            formData.append('file', files);
            $.ajax({
                url: 'Proceso_Upload_img.php',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response != 0) {
                        $(".card-img-top").attr("src", response);
                        $('#image').remove();
                        $('#subir').remove();
                    } else {
                        alert('Formato de imagen incorrecto.');
                    }
                }
            });
            return false;
        });
    });
</script>
<title>Creacion de instrumento</title>

</head>

<body>

    <div id="contenido" style="border: 1px solid black;">
        <div style="border: 1px solid black;"><label>Creacion de instrumento</label></div>

        <div id="contenido-instrumento">
            <!--Creacion del instrumentos-->
            <div id="datos-ints">

                <form action="Proceso_Instrumento_Creacion.php" method="POST">

                    <div>
                        <label for="">Titulo</label>
                        <input type="text" name="Titulo" id="Titulo">
                    </div>

                    <div>
                        <label for="">Autor</label>
                        <input type="text" name="Autor" id="Autor">
                    </div>

                    <div>
                        <label for="">Descripcion</label>
                        <textarea name="Descripcion" id="Descripcion" cols="30" rows="10"></textarea>
                    </div>

                    <input type="hidden" name="idAutor" value=<?= $IdAdmin ?>>
                    <input type="submit" value="Terminar">
                </form>

            </div>

            <div>
                <form method="post" action="#" enctype="multipart/form-data">
                    <div>
                        <img class="card-img-top" src="img/avatar.png">

                        <div class="card-body">
                            <h5 class="card-title">Subir la imagen en formato .jpg, o .png </h5>
                            <div class="form-group">
                                <input type="file" class="form-control-file" name="image" id="image">
                            </div>
                            <input type="button" class="upload" value="Subir" id="subir">
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <a href="Vista_Admin_Principal.php"><button>Cancelar</button></a>
    </div>

<?php include_once "layouts/footer_pagina.php"; ?>