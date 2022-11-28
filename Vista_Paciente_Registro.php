<?php
session_start();
error_reporting(0);

include_once "Controladores/Paciente_controlador.php";

$ControlPaciente = new Paciente_Controlador();

if ($_POST) {
    $ControlPaciente->registrar_Paciente();
}

include_once "layouts/head_pagina.php";
?>
<title>Registro de paciente</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="nombreNuevo" placeholder="Primer nombre" required><br>
        <input type="text" name="apellidoPaterno" placeholder="Apellido Paterno" required><br>

        <select name="estadoCivil" required>
            <option value="unionlibre">Unión libre</option>
            <option value="Casado">Casado/a</option>
            <option value="Soltero">Soltero/a</option>
            <option value="Divorciado">Divorciado/a</option>
            <option value="Viudo">Viudo/a</option>
        </select><br>

        <input name="Fecha_naci" type="date" required><br>

        <label for="sexo" required>Sexo
            <input type="radio" name="sexo" value="H">Hombre
            <input type="radio" name="sexo" value="M">Mujer
        </label><br>


        <select name="escolaridad" required>
            <option value="Preescolar">Preescolar</option>
            <option value="Primaria">Primaria</option>
            <option value="Secundaria">Secundaria</option>
            <option value="Media superior">Media superior</option>
            <option value="Licenciatura">Licenciatura</option>
            <option value="Especializacion/Maestria">Especializacion/Maestria</option>
            <option value="Doctorado">Doctorado</option>
        </select><br>
        <input type="text" name="ocupacion" placeholder="Ocupación"><br>
        <input type="text" name="usuario" placeholder="Nombre de usuario" required><br>
        <input type="password" name="contraseniaNuevo" placeholder="Contraseña" required><br>
        <input type="password" name="confirmaContrasenia" placeholder="Confirmar contraseña" required><br>
        <input type="submit" value="Registrarse">
    </form>
    <a href="index.php"><button>Volver al inicio</button></a>

    <?php
    include_once "layouts/footer_pagina.php";
    ?>