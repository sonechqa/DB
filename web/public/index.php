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
</body>

</html>