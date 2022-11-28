<?
require($_SERVER['DOCUMENT_ROOT'] . '/.dbconfig.php');
class Person
{
    public $name, $surname, $age;
    private $conn;


    function __construct()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_error) {
            die("Ошибка: не удается подключиться: " . $this->conn->connect_error);
        }
    }

    function __destruct()
    {
        $this->conn->close();
    }

    function addPerson($person_name, $person_surname, $person_age)
    {
        $result = $this->conn->prepare("INSERT INTO `persons` (`id`, `name`, `surname`, `age`) VALUES (NULL, ?, ?, ?);");
        $result->bind_param('sss', $person_name, $person_surname, $person_age);
        $result = $result->execute();
        return $result;
    }
    function getAdultPersonList()
    {
        $personList = [];
        $result = $this->conn->query("SELECT * FROM `persons` WHERE age >= 18");
        while ($person = $result->fetch_array(MYSQLI_ASSOC)) {
            $personList[] = $person;
        }
        return $personList;
    }
}
