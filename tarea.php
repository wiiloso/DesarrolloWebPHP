<?php
// phpinfo(); 
echo "<h1>Semana 1 - Tarea 1 </h1>";
echo "<h4>a. Declaración de Variables:</h4>";
echo "<ul>";
echo "<li>Define al menos cinco variables de diferentes tipos de datos (integer, float, string, boolean, array).</li>";
echo "<li>Asigna valores a estas variables.</li>";
echo "</ul>";
echo "<br>";

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
echo "<strong>Array:</strong> <br>";
foreach ($arrayVariable as $key=>$item){
    echo "$key => $item <br>";
}

echo "<br>";
echo "<h4>b. Operaciones Aritméticas:</h4>";
echo "<ul>";
echo "<li>Realiza al menos dos operaciones aritméticas con las variables numéricas que has creado. Muestra el resultado usando la función `echo`.</li>";
echo "</ul>";
echo "<br>";

$suma = $integerVariable + $floatVariable;
echo "<strong>Suma:</strong> $suma <br>";

$producto = $integerVariable * $floatVariable;
echo "<strong>Producto:</strong> $producto <br>";



echo "<br>";
echo "<h4>b. Manipulación de Cadenas:</h4>";
echo "<ul>";
echo "<li>Crea una variable de tipo cadena y realiza las siguientes acciones:</li>";
echo "<li>Concatenación de dos cadenas.</li>";
echo "<li>Obtén la longitud de la cadena.</li>";
echo "</ul>";
echo "<br>";

$stringVariable = "Hello";
$concatenacionString = $stringVariable . " World!";
$stringLength = strlen($concatenacionString);

echo "<strong>Concatenación String:</strong> $concatenacionString <br>";
echo "<strong>String Length:</strong> $stringLength <br>";


echo "<br>";
echo "<h4>d. Uso de Condicionales:</h4>";
echo "<ul>";
echo "<li>Crea una estructura de control condicional que verifique el valor de una variable booleana y muestre un mensaje diferente según sea `true` o `false`.</li>";
echo "</ul>";
echo "<br>";


$booleanVariableT = true;

if ($booleanVariableT) {
    echo "La variable es verdadera(true).";
} else {
    echo "La variable es falsa(false).";
}


echo "<br>";
echo "<h4>e. Creación de un Array:</h4>";
echo "<ul>";
echo "<li>Define un arreglo con al menos cinco elementos.</li>";
echo "<li>Muestra un elemento específico del arreglo utilizando su índice.</li>";
echo "</ul>";
echo "<br>";

$productos = ["Papas", "Arroz", "Azucar", "Harina", "Leche"];
echo "<strong>Productos:</strong> <br>";
foreach ($productos as $key=>$item){
    echo "" . ($key + 1) . ". $item <br>";
}
?>