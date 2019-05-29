<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    echo "<div>";
        echo "<input type='number' max='100' min='0' id='valorC' name=''>";
       echo "<button value='".$row2['pr_codigo']."' name='prueba' onclick='anadirProducto(this.value)'>Anadir</button>"; 
    echo "</div>";
    ?>
</body>
<script>
    function anadirProducto(dato){
        var cantidad=document.getElementById('valorC').value;
        localStorage.setItem(dato, cantidad);
    }
    </script>
</html>