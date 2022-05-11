<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Docker <?php echo "Практикум" ?></title>
</head>

<body>
    <?php
    printf("Меня зовут %s. Мне %d лет, то есть %X в шестнадцатеричном представлении", 'Соня', 20, 20);
    ?>

    <?php // установление цвета с помощью printf
    echo "<br>";
    printf("<span style='color:#%X%X%X'>Привет</span>", 65, 127, 245);
    ?>

    <?php // получение более тёмного оттенка
    echo "<br>";
    $r = 65;
    $g = 127;
    $b = 245;
    printf("<span style='color:#%X%X%X'>Привет</span>", $r - 20, $g - 20, $b - 20);
    ?>
</body>