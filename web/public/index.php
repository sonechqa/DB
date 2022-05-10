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
    /*echo "<br>";
    echo fix_names("WILLIAM", "henry", "gatES");

    function fix_names($n1, $n2, $n3)
    {
        $n1 = ucfirst(strtolower($n1));
        $n2 = ucfirst(strtolower($n2));
        $n3 = ucfirst(strtolower($n3));

        return $n1 . " " . $n2 . " " . $n3;
    } */
    ?>

    <?php
    /* echo "<br>";
    $names = fix_names("WILLIAM", "henry", "gatES");
    echo $names[0] . " " . $names[1] . " " . $names[2];

    function fix_names($n1, $n2, $n3)
    {
        $n1 = ucfirst(strtolower($n1));
        $n2 = ucfirst(strtolower($n2));
        $n3 = ucfirst(strtolower($n3));

        return array($n1, $n2, $n3);
    } */
    ?>

    <?php
    /* echo "<br>";
    $a1 = "WILLIAM";
    $a2 = "henry";
    $a3 = "gatES";

    echo $a1 . " " . $a2 . " " . $a3 . "<br>";
    fix_names($a1, $a2, $a3);
    echo $a1 . " " . $a2 . " " . $a3;

    function fix_names(&$n1, &$n2, &$n3)
    {
        $n1 = ucfirst(strtolower($n1));
        $n2 = ucfirst(strtolower($n2));
        $n3 = ucfirst(strtolower($n3));
    } */
    ?>

    <?php
    echo "<br>";
    $a1 = "WILLIAM";
    $a2 = "henry";
    $a3 = "gatES";

    echo $a1 . " " . $a2 . " " . $a3 . "<br>";
    fix_names();
    echo $a1 . " " . $a2 . " " . $a3;

    function fix_names()
    {
        global $a1;
        $a1 = ucfirst(strtolower($a1));
        global $a2;
        $a2 = ucfirst(strtolower($a2));
        global $a3;
        $a3 = ucfirst(strtolower($a3));
    }
    ?>

    <?php
    /* include "library.php";
    / мой код */
    ?>

    <?php
    /* include_once "library.php";
    / мой код */
    ?>

    <?php
    /* require_once "library.php";
    / мой код */
    ?>

    <?php
    echo "<br>";
    if (function_exists("array_combine")) {
        echo "Функция существует";
    } else {
        echo "Функция не существует, желательно создать её самостоятельно";
    }
    ?>

    <?php
    /* echo "<br>";
    $object = new User;
    print_r($object);

    class User
    {
        public $name, $password;

        function save_user()
        {
            echo "Сюда помещается код, сохраняющий данные пользователя";
        }
    } */
    ?>

    <?php
    /* echo "<br>";
    $object = new User;
    print_r($object);
    echo "<br>";

    $object->name = "Joe";
    $object->password = "mypass";
    print_r($object);
    echo "<br>";

    $object->save_user();

    class User
    {
        public $name, $password;

        function save_user()
        {
            echo "Сюда помещается код, сохраняющий данные пользователя";
        }
    } */
    ?>

    <?php // копирование объекта
    /* echo "<br>";
    $object1 = new User();
    $object1->name = "Alice";
    $object2 = $object1;
    $object2->name = "Amy";

    echo "object1 name = " . $object1->name . "<br>";
    echo "object2 name = " . $object2->name;

    class User
    {
        public $name;
    } */
    ?>

    <?php //  клонирование объекта
    /* echo "<br>";
    $object1 = new User();
    $object1->name = "Alice";
    $object2 = clone $object1;
    $object2->name = "Amy";

    echo "object1 name = " . $object1->name . "<br>";
    echo "object2 name = " . $object2->name;

    class User
    {
        public $name;
    } */
    ?>

    <?php // метод-конструктор
    /* echo "<br>";
    class User
    {
        public function __construct($param1, $param2)
        {
            // Сюда помещаются инструкции конструктора
            $username = "Guest";
        }
    } */
    ?>

    <?php // метод-деструктор
    /* echo "<br>";
    class User
    {
        function __destruct()
        {
            // Сюда помещается код деструктора
        }
    } */
    ?>

    <?php // переменная $this
    /* echo "<br>";
    $object = new User;
    $object->password = "secret";
    echo $object->get_password();
    class User
    {
        public $name, $password;

        function get_password()
        {
            return $this->password;
        }
    } */
    ?>

    <?php // неявное объявление свойств
    /* echo "<br>";
    $object1 = new User();
    $object1->name = "Alice";

    echo $object1->name;

    class User
    {
    } */
    ?>

    <?php // статический метод
    /* echo "<br>";
    User::pwd_string();

    class User
    {
        static function pwd_string()
        {
            echo "Пожалуйста, введите ваш пароль";
        }
    } */
    ?>

    <?php // статическое свойство
    echo "<br>";
    $temp = new Test();

    echo "Тест А: " . Test::$static_property . "<br>";
    echo "Тест Б: " . $temp->get_sp() . "<br>";
    echo "Тест В: " . $temp->static_property . "<br>";

    class Test
    {
        static $static_property = "Это статическое свойство";

        function get_sp()
        {
            return self::$static_property;
        }
    }
    ?>

    <?php // наследование
    /* echo "<br>";
    $object = new Subscriber;
    $object->name = "Fred";
    $object->password = "pword";
    $object->phone = "012 345 6789";
    $object->email = "fred@bloggs.com";
    $object->display();

    class User
    {
        public $name, $password;

        function save_user()
        {
            echo "Сюда помещается код, сохраняющий данные пользователя";
        }
    }

    class Subscriber extends User
    {
        public $phone, $email;

        function display()
        {
            echo "Name: " . $this->name . "<br>";
            echo "Pass: " . $this->password . "<br>";
            echo "Phone: " . $this->phone . "<br>";
            echo "Email: " . $this->email;
        }
    } */
    ?>

    <?php // ключевое слово parent
    echo "<br>";
    $object = new Son;
    $object->test();
    $object->test2();

    class Dad
    {
        function test()
        {
            echo "[Class Dad] Я твой отец <br>";
        }
    }

    class Son extends Dad
    {
        function test()
        {
            echo "[Class Son] Я Люк <br>";
        }

        function test2()
        {
            parent::test();
        }
    }
    ?>

    <?php // конструктор подкласса
    echo "<br>";
    $object = new Tiger();
    echo "У тигров есть...<br>";
    echo "Мех: " . $object->fur . "<br>";
    echo "Полосы: " . $object->stripes;

    class Wildcat
    {
        public $fur;

        function __construct()
        {
            $this->fur = "TRUE";
        }
    }

    class Tiger extends Wildcat
    {
        public $stripes;

        function __construct()
        {
            parent::__construct(); // первоочередной вызов родительского конструктора
            $this->stripes = "TRUE";
        }
    }
    ?>

    <?php // метод final
    echo "<br>";
    class User
    {
        final function copyright()
        {
            echo "Этот класс был создан Джо Смитом";
        }
    }
    ?>
</body>

</html>