<h1>Урок 2. Условные блоки, ветвление функции</h1>
<br />
<h2 style="background-color:#ddd;padding:5px 15px;">Задача № 1</h2>
<p>
1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. 
Затем написать скрипт, который работает по следующему принципу:<br />
    если $a и $b положительные, вывести их разность;<br />
    если $а и $b отрицательные, вывести их произведение;<br />
    если $а и $b разных знаков, вывести их сумму;<br />
    Ноль можно считать положительным числом.<br />
</p>
<h3 style="background:#eee;padding:3px 10px;">Решение</h3>
<?php
    $a = -22;
    $b = 15;

    echo "\$a=$a<br />";
    echo "\$b=$b<br />";
    
    if ($a >= 0 && $b >= 0)     // если $a и $b положительные, вывести их разность;
    {
        echo "разность: ".($a - $b)."<br />";
    }
    elseif ($a < 0 && $b < 0)   // если $а и $b отрицательные, вывести их произведение;
    {
        echo "произведение: ".($a * $b)."<br />";
    }
    else                        // если $а и $b разных знаков, вывести их сумму;
    { 
        echo "сумма: ".($a + $b)."<br />";
    }
?>
<br />
<hr />
<br />
<h2 style="background-color:#ddd;padding:5px 15px;">Задача № 2</h2>
<p>
2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15. 
Задание по желанию - доработайте решение и используйте рекурсивную функцию
</p>
<h3 style="background:#eee;padding:3px 10px;">Решение</h3>
<?php
    $a = rand(0, 15);
   
    echo "\$a=$a<br /><br />";
    echo "Var 1(switch op):<br />";
    switch($a)
    {
        case 0:
            echo "1<br />";
        case 1:
            echo "2<br />";
        case 2:
            echo "3<br />";
        case 3:
            echo "4<br />";
        case 4:
            echo "5<br />";
        case 5:
            echo "6<br />";
        case 6:
            echo "7<br />";
        case 7:
            echo "8<br />";
        case 8:
            echo "9<br />";
        case 9:
            echo "10<br />";
        case 10:
            echo "11<br />";
        case 11:
            echo "12<br />";
        case 12:
            echo "13<br />";
        case 13:
            echo "14<br />";
        case 14:
        case 15:
            echo "15<br />";
            break;
    }

    echo "<br />Var 2(recoursive func):<br />";
    function getNextEl($p) {
        // if ($p < 15) {
        //     $p++;
        // }
        // echo $p."<br />";

        echo ($p < 15 ? ++$p : $p)."<br />";

        if ($p < 15) {
            getNextEl($p);
        }
    }

    getNextEl($a);
?>
<br />
<hr />
<br />
<h2 style="background-color:#ddd;padding:5px 15px;">Задача № 3</h2>
<p>
3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. 
Обязательно использовать оператор return.
</p>
<h3 style="background:#eee;padding:3px 10px;">Решение</h3>
<?php
    $a = -22;
    $b = 15;
 
    echo "\$a=$a<br />";
    echo "\$b=$b<br /><br />";
    echo "Сложение: ".addition($a, $b)."<br />";
    echo "Вычитание: ".subtraction($a, $b)."<br />";
    echo "Умножение: ".multiplication($a, $b)."<br />";
    echo "Деление: ".division($a, $b)."<br />";

    function addition($arg1, $arg2) {
        return ($arg1 + $arg2);
    }

    function subtraction($arg1, $arg2) {
        return ($arg1 - $arg2);
    }

    function multiplication($arg1, $arg2) {
        return round(($arg1 * $arg2), 3);
    }

    function division($arg1, $arg2) {
        return round(($arg1 / $arg2), 3);
    }
?>
<br />
<hr />
<br />
<h2 style="background-color:#ddd;padding:5px 15px;">Задача № 4</h2>
<p>
4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, 
    $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций 
    (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
</p>
<h3 style="background:#eee;padding:3px 10px;">Решение</h3>
<?php
    $a = -22;
    $b = 15;
 
    echo "\$a=$a<br />";
    echo "\$b=$b<br /><br />";
    echo "Сложение: ".mathOperation($a, $b, "addition")."<br />";
    echo "Вычитание: ".mathOperation($a, $b, "subtraction")."<br />";
    echo "Умножение: ".mathOperation($a, $b, "multiplication")."<br />";
    echo "Деление: ".mathOperation($a, $b, "division")."<br />";

    function mathOperation($arg1, $arg2, $operation) {
        switch($operation) {
            case "addition":
                return addition($arg1, $arg2);
                
            case "subtraction":
                return subtraction($arg1, $arg2);

            case "multiplication":
                return multiplication($arg1, $arg2);

            case "division":
                return division($arg1, $arg2);
        }
    }
?>
<br />
<hr />
<br />
<h2 style="background-color:#ddd;padding:5px 15px;">Задача № 5</h2>
<p>
5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон, 
вывести текущий год в подвале при помощи встроенных функций PHP. Делать не нужно. Сделано в первом ДЗ!
</p>
<h3 style="background:#eee;padding:3px 10px;">Решение</h3>
<?php
    echo "Сделано в первом ДЗ!";
?>
<br />
<hr />
<br />
<h2 style="background-color:#ddd;padding:5px 15px;">Задача № 6</h2>
<p>
6. *С помощью рекурсии организовать функцию возведения числа в степень. 
Формат: function power($val, $pow), где $val – заданное число, $pow – степень. Степень int и > 0
</p>
<h3 style="background:#eee;padding:3px 10px;">Решение</h3>
<?php
    $a = 4;
    $b = 5;

    if (gettype($b) !== "integer" || $b <= 0) {
        $result = $a;
    } 
    else {
        $result = power($a, $b);
    }

    echo "Возведение числа $a в степень $b: $result", "\n";
    //echo gettype($b);

    function power($val, $pow) {
        if($pow == 0) {
            return 1;
        }
        
        if($pow == 1) {
            return $val;
        }

        if($pow % 2 != 0) {
            return $val * power($val, ($pow - 1));
        }
        else {
            $val = power($val,$pow/2);
            return $val * $val;
        }
    }
?>
<br />
<hr />
<br />
<h2 style="background-color:#ddd;padding:5px 15px;">Задача № 7</h2>
<p>
7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:<br />
22 часа 15 минут<br />
21 час 43 минуты<br />
</p>
<h3 style="background:#eee;padding:3px 10px;">Решение</h3>
<?php
    echo dateToStr();

    function dateToStr () {
        $nHour = (int)date("H");
        $nMinute = (int)date("i");
        $hour = " часа ";
        $minute = " минут";

        switch($nHour) {
            case 0:
                $hour = " часов ";
                break;
            case 1:
            case 21:
                $hour = " час ";
                break;
        }

        switch($nMinute) {
            case 1:
            case 21:
            case 31:
            case 41:
            case 51:
                $minute = " минута";
                break;
            case 2:
            case 3:
            case 4:
            case 22:
            case 23:
            case 24:
            case 32:
            case 33:
            case 34:
            case 42:
            case 43:
            case 44:
            case 52:
            case 53:
            case 54:
                $minute = " минуты";
                break;
        }

        return $nHour.$hour.$nMinute.$minute;
    }
?>
<br />
<hr />
