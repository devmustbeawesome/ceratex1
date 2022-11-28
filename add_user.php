<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/person.php';
$res = [];

$person_name = $_REQUEST['name'];
$person_surname = $_REQUEST['surname'];
$person_age = $_REQUEST['age'];
if ($person_name && $person_surname && $person_age) {
    $person = new Person();
    $res['status'] = $person->addPerson($person_name, $person_surname, $person_age) ? 'success' : 'fail';
} else {
    $res['status'] = 'fail';
}
echo json_encode($res);
