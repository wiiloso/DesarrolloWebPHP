<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php
// phpinfo(); 
echo '<div class="container">
    <div class="row">
        <div class="col-12 mt-2">
            <h1>Semana 1 - Tarea 1 </h1>
            <h4>a. Declaración de Variables:</h4>
            <ul>
                <li>Define al menos cinco variables de diferentes tipos de datos (integer, float, string, boolean, array).</li>
                <li>Asigna valores a estas variables.</li>
            </ul>
            <br>';
// Declaración de variables
$integerVariable = 10;
$floatVariable = 3.14;
$stringVariable = "Hello, World!";
$booleanVariable = true;
$arrayVariable = [1, 2, 3, 4, 5];


// Forzado de tipos 
$integerVariablefo = (int) 10;
$floatVariablefo = (float) 3.14;
$stringVariablefo = (string) "Hello, World!";
$booleanVariablefo =  (boolean) true;

echo "<strong>int, Integer:</strong> $integerVariablefo <br>";
echo "<strong>float, double, real:</strong> $floatVariablefo <br>";
echo "<strong>string:</strong> $stringVariablefo <br>";
echo "<strong>bool, boolean:</strong> $booleanVariablefo <br>";
echo "<strong>Array: </strong>[1, 2, 3, 4, 5] <br>";
foreach ($arrayVariable as $key=>$item){
    echo "$key => $item <br>";
}

echo '<br>
<h4>b. Operaciones Aritméticas:</h4>
<ul>
<li>Realiza al menos dos operaciones aritméticas con las variables numéricas que has creado. Muestra el resultado usando la función echo.</li>
</ul>
<br>';

$suma = $integerVariable + $floatVariable;
echo "<strong>Suma:</strong> $suma <br>";

$producto = $integerVariable * $floatVariable;
echo "<strong>Producto:</strong> $producto <br>";

echo "<br>
<h4>b. Manipulación de Cadenas:</h4>
<ul>
<li>Crea una variable de tipo cadena y realiza las siguientes acciones:</li>
<li>Concatenación de dos cadenas.</li>
<li>Obtén la longitud de la cadena.</li>
</ul>
<br>";
echo "<strong> variable texto 1 = </strong> Hello<br>";
echo "<strong> variable texto 2 = </strong> World!<br>";


$stringVariable = "Hello";
$concatenacionString = $stringVariable . " World!";
$stringLength = strlen($concatenacionString);

echo "<strong>Concatenación String:</strong> $concatenacionString <br>";
echo "<strong>String Length(longitud):</strong> $stringLength caracteres <br>";


echo "<br>
<h4>d. Uso de Condicionales:</h4>
<ul>
<li>Crea una estructura de control condicional que verifique el valor de una variable booleana y muestre un mensaje diferente según sea 'true' o 'false'.</li>
</ul>
<br>";

echo "<strong>La número 2 es par o impar ? si es verdadero true caso contrario false</strong> <br>";
$n =0 ; $s = "";
if ($n % 2 == 0) {
    echo "el número es par (true).";
} else {
    echo "el número es impar (false).";
}
echo "<br>";
echo "<br>
<h4>e. Creación de un Array:</h4>
<ul>
<li>Define un arreglo con al menos cinco elementos.</li>
<li>Muestra un elemento específico del arreglo utilizando su índice.</li>
</ul>
<br>";

$productos = ["Papas", "Arroz", "Azucar", "Harina", "Leche"];
echo "<strong>Arreglo de productos: </strong>['Papas', 'Arroz', 'Azucar', 'Harina', 'Leche']<br>";
echo "<strong>Productos:</strong> <br>";
foreach ($productos as $key=>$item){
    echo "" . ($key + 1) . ". $item <br>";
}
echo "<br>";
echo "<strong>Producto en la posición 3:</strong> $productos[2] <br>";
echo "<br>";

