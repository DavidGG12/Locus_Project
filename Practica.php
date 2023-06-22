<!DOCTYPE html>
<html>
<head>
<title>Formulario</title>
<meta charset="UTF-8">
<style>
    .container {
        width: 600px;
        margin: 0 auto;
        padding: 20px;
    }
    h1 {
        text-align: center;
    }
    .form-group {
        margin-bottom: 20px;
    }
    label {
        display: block;
        font-weight: bold;
    }
    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 5px;
    }
    textarea {
        width: 100%;
        height: 80px;
        padding: 5px;
    }
    .submit-btn {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        text-align: center;
        text-decoration: none;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Formulario</h1>
    <form action="IMPRESION.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre">Nombre completo:</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>
        <div class="form-group">
            <label for="curp">CURP:</label>
            <input type="text" name="curp" id="curp" required>
        </div>
        <div class="form-group">
            <label for="rfc">RFC:</label>
            <input type="text" name="rfc" id="rfc" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" accept="image/*"  required>
        </div>
        <div class="form-group">
            <label for="escuela">Escuela de procedencia:</label>
            <input type="text" name="escuela" id="escuela" required>
        </div>
        <div class="form-group">
            <label for="pais">País:</label>
            <input type="text" name="pais" id="pais" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado de la República:</label>
            <input type="text" name="estado" id="estado" required>
        </div>
        <div class="form-group">
            <label for="codigo_postal">Código Postal:</label>
            <input type="text" name="codigo_postal" id="codigo_postal" required>
        </div>
        <div class="form-group">
            <label for="padre">Padre o tutor:</label>
            <input type="text" name="padre" id="padre" required>
        </div>
        <input type="submit" value="Generar PDF" class="submit-btn">
    </form>
</div>
</body>


</html>