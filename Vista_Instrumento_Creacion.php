<?php
session_start();


if (!isset($_SESSION['Admin'])) { //Si nunca se creado una sesion de admin
 header("Location: index.php");
}

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

    <a href="Vista_Admin_Principal.php"><button>Regresar</button></a>

    <form method="post" action="#" enctype="multipart/form-data">
        <div>
            <img class="card-img-top" src="img/avatar.png">

            <div class="card-body">
                <h5 class="card-title">Sube una foto, la imagen puede ser en formato .jpg, o .png </h5>
                <div class="form-group">
                    <label for="image">Nueva imagen</label>
                    <input type="file" class="form-control-file" name="image" id="image">
                </div>
                <input type="button" class="upload" value="Subir">
            </div>
        </div>
    </form>

<?php include_once "layouts/footer_pagina.php"; ?>