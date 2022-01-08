<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CALCULATOR</title>
</head>
<body>
  <h1>CALCULATOR</h1>
  <br>
  <?php
    if (isset($_GET['A'])) {
        $a = intval($_GET['A']);
    } else {
        $a = 5;
    }

    if (isset($_GET['B'])) {
        $b = intval($_GET['B']);
    } else {
        $b = 7;
    }

    if (isset($_GET['sign'])) {
        $sign = $_GET['sign'];
    } else {
        $sign = '+';
    }
	
    $Result = 0;

    switch ($sign) {  
        case '+':
            $Result = $a + $b;
            break;

        case '-':
            $Result = $a - $b;
            break;

        case '*':
            $Result = $a * $b;
            break;

        case '/':
            if ($b != 0) {
                $Result = $a / $b;
            } else {
                $Result = 'infinity';
            }
    }
  ?>
  <form method="get">
        <input name="A" id="A" type="number" width="100" value="<?= $a?>">
        <select name="sign">
            <option <?php if ($sign == '+') {echo "selected";}?> value="+">+</option>
            <option <?php if ($sign == '-') {echo "selected";}?> value="-">-</option>
            <option <?php if ($sign == '*') {echo "selected";}?> value="*">*</option>
            <option <?php if ($sign == '/') {echo "selected";}?> value="/">/</option>
        </select>
        <input name="B" id="B" type="number" width="100" value="<?= $b?>">
        <input type="submit" value="=">
        <b><?= $Result?></b>
  </form>
</body>
</html>