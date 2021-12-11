<?php
$today = date("d.m.Y");
echo "<br />";
var_dump($today);
echo "<br />";
echo "<br />";
?>
<h1>
    <?= "Первая домашка php на $today"?>
</h1>
<?php
    $world  = 'world';
    echo 'Hello '.$world.CHR(13);
    echo "<br />";
    define("HelloConst", "HELLO WORLD!!!");
    echo HelloConst;
    echo "<br />";
    echo 'Today is'.date("d.m.Y");
    echo "<br />";
    var_dump(HelloConst);
    echo "<br />";
    echo var_dump(rand(1,10));
    echo "<br />";
    echo var_dump(round(22.56789, 1));
    echo "<br />";
    $int10 = 42;
    $int2 = 0b101010;
    $int8 = 052;
    $int16 = 0x2A;
    $int64 = 64;
    echo "Десятеричная система $int10 <br>";
    echo "Двоичная система $int2 <br>";
    echo "Восьмеричная система $int8 <br>";
    echo "Шестнадцатеричная система $int16 <br>";
    echo var_dump($int64);
    echo "<br />";
    $precise1 = 1.5;
    $precise2 = 1.5e4;
    $precise3 = 6E-8;
    echo "$precise1 | $precise2 | $precise3";
    echo "<br />";
    $a = 1;
    echo "$a";
    echo '$a';
    echo "<br />";
    $a = 10;
    $b = (boolean) $b;
    echo $b;
    echo "<br />";
    echo "<br />";
?>
<?php
$a = 'Hello,';
$b = 'world';
$c = $a . $b;
echo $c;
echo "<br />";
?>
<?php
$a = 4;
$b = 5;
echo $a + $b . '<br>';    // сложение
echo $a * $b . '<br>';    // умножение
echo $a - $b . '<br>';    // вычитание
echo $a / $b . '<br>';  // деление
echo $a % $b . '<br>'; // остаток от деления
echo $a ** $b . '<br>'; // возведение в степень
?>
<?php
$a = 4;
$b = 5;
$a += $b;
echo 'a = ' . $a;
echo "<br />";
$a = 0;
echo $a++;     // Постинкремент
echo "<br />";
echo ++$a;    // Преинкремент
echo "<br />";
echo $a­--;     // Постдекремент
echo "<br />";
echo --$a;    // Предекремент
echo "<br />";
?>
<?php
$a = 4;
$b = 5;
var_dump($a == $b);  // Сравнение по значению
echo "<br />";
var_dump($a === $b); // Сравнение по значению и типу
echo "<br />";
var_dump($a > $b);    // Больше
echo "<br />";
var_dump($a < $b);    // Меньше
echo "<br />";
var_dump($a <> $b);  // Не равно
echo "<br />";
var_dump($a != $b);   // Не равно
echo "<br />";
var_dump($a !== $b); // Не равно без приведения типов
echo "<br />";
var_dump($a <= $b);  // Меньше или равно
echo "<br />";
var_dump($a >= $b);  // Больше или равно
?>


<?php
echo "<br /><br />3-е задание 1й домашки<br />";
    $a = 5;
    $b = '05';

    echo "<br />";
    var_dump($a == $b);         // Почему true?
    echo "var_dump(\$a == \$b); True потому, что используется оператор сравнения '==', который не сравнивает типы, как оператор тожд.сравнения '==='<br /><br />";

    var_dump((int)'012345');     // Почему 12345?
    echo "var_dump((int)'012345'); 12345 потому, что используется явное приведение к типу int. 
    Аналогичные конструкции: '(type)Переменная или значение' используются в С-подобных языках.<br /><br />";

    var_dump((float)123.0 === (int)123.0); // Почему false?
    echo "var_dump((float)123.0 === (int)123.0); false потому, что в правой и левой части используется явное приведение типов, 
    а оператор тождественного сравнения проверяет в т.ч. и типы. А в данном примере типы разные.<br /><br />";

    var_dump((int)0 === (int)'hello, world'); // Почему true?
    echo "var_dump((int)0 === (int)'hello, world'); true потому, что в правой и левой части используется явное приведение типов, 
    а оператор тождественного сравнения проверяет в т.ч. и типы. А в данном примере типы одинаковы. 
    А явное приведение строки 'hello, world' к типу int даст как раз 0, как в левой части<br /><br />";
?>



<?php
$a=1;
$b=2;
echo "<br />";
echo "<br />";
echo "<br />5-е задание 1й домашки<br />";
echo "a=$a".'<br />';
echo "b=$b".'<br />';

$a += $b;
$b = $a - $b;
$a = $a - $b;

echo "a=$a".'<br />';
echo "b=$b".'<br />';
?>



