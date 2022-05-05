<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Docker <?php echo "fsafas" ?></title>
</head>

<body>
    <h1> <?php echo "Hello world" ?></h1>

    <?php // первая PHP-программа
    $username = "Fred Smith";
    echo $username;
    echo "<br>";
    $current_user = $username;
    echo $current_user;
    ?>

    <?php
    echo "<br>";
    $team = array('Bill', 'Mary', 'Mike', 'Chris', 'Anne');
    echo $team[3];
    ?>

    <?php
    echo "<br>";
    $xo = array(
        array('x', 'o', 'o'),
        array('o', 'o', 'x'),
        array('x', 'o', 'x')
    );
    echo $xo[1][2]
    ?>

    <?php
    echo "<br>";
    $author = "Steve Ballmer";
    echo "Developers, Developers, developers,
        developers, developers, developers!

        $author.";
    ?>

    <?php
    echo "<br>";
    $author = "Bill Gates";
    $text = "Measuring programming progress by lines of code is like measuring aircraft building progress by weight.
        - $author.";
    echo $text;
    ?>

    <?php
    echo "<br>";
    $author = "Brian W. Kernighan";

    echo <<<_END
        Debugging is twice as hard as writing the code in the first place.
        Therefore, if you write the code as cleverly as possible, you are,
        by definition, not smart enough to debug it.

        $author.
        _END;
    ?>

    <?php
    echo "<br>";
    $author = "Scott Adams";

    $out = <<<_END
    Normal people believe that if it ain't broke, don't fix it.
    Engineers believe that if it ain't broke, it doesn't have enough features yet.

    - $author.
    _END;
    echo $out;
    ?>

    <?php
    echo "<br>";
    $number = 12345 * 67890;
    echo substr($number, 3, 1);
    ?>

    <?php
    echo "<br>";
    $pi = "3.1415927";
    $radius = 5;
    echo $pi * ($radius * $radius);
    ?>

    <?php
    echo "<br>";
    define("_LINE_", 95);
    define("_FILE_", "index.php");
    echo "Это строка " . _LINE_ . " в файле " . _FILE_;
    ?>

    <?php
    echo "<br>";
    $b = 1;
    $b ? print "TRUE" : print "FALSE";
    ?>

    <?php
    /*echo "<br>";
    function longdate($timestamp)
    {
        return date("l F jS Y", $timestamp);
    }
    echo longdate(time()); */
    ?>

    <?php
    echo "<br>";
    function longdate($timestamp)
    {
        $temp = date("l F jS Y", $timestamp);
        return "Дата: $temp";
    }
    echo longdate(time())
    ?>

    <?php
    echo "<br>";
    $a = 5;
    $b = 5;

    if ($a > $b) echo "$a больше $b<br>";
    if ($a < $b) echo "$a меньше $b<br>";
    if ($a >= $b) echo "$a больше или равно $b<br>";
    if ($a <= $b) echo "$a меньше или равно $b<br>";
    ?>

    <?php
    echo "<br>";
    $a = 1;
    $b = 0;

    echo ($a and $b) . "<br>";
    echo ($a or $b) . "<br>";
    echo ($a xor $b) . "<br>";
    echo !$a . "<br>";
    ?>

    <?php
    /* echo "<br>";
    $fuel = 10;

    while ($fuel > 1) {
        echo "Топлива ещё достаточно";
    } */
    ?>

    <?php
    /* echo "<br>";
    $count = 0;

    while (++$count <= 12) {
        echo "Число $count, умноженное на 12, равно " . $count * 12 . "<br>";
    }
    ?>

    <?php
    echo "<br>";
    $count = 1;
    do {
        echo "Число $count, умноженное на 12, равно " . $count * 12 . "<br>";
    } while (++$count <= 12); */
    ?>

    <?php
    echo "<br>";
    for ($count = 1; $count <= 12; ++$count) {
        echo "Число $count, умноженное на 12, равно " . $count * 12 . "<br>";
    }
    ?>

    <?php
    echo "<br>";
    $j = 10;

    while ($j > -10) {
        $j--;

        if ($j == 0) continue;

        echo (10 / $j) . "<br>";
    }
    ?>

    <?php
    echo "<br>";
    $a = 56;
    $b = 12;
    $c = (int) ($a / $b);

    echo $c;
    ?>

    <?php
    echo "<br>";
    echo fix_names("WILLIAM", "henry", "gatES");

    function fix_names($n1, $n2, $n3)
    {
        $n1 = ucfirst(strtolower($n1));
        $n2 = ucfirst(strtolower($n2));
        $n3 = ucfirst(strtolower($n3));

        return $n1 . " " . $n2 . " " . $n3;
    }
    ?>
</body>

</html>