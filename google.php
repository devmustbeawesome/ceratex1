<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/person.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$spreadsheetId = '19_ZJmMBRS3HP6ovHuhpBGPqw_AwlrEOT4eQkj9MRg8E';
$range = 'Лист1!A2';

try {
    $client = new \Google_Client();
    $client->setApplicationName('Google Sheets API');
    $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
    $client->setAccessType('offline');

    $path = $_SERVER['DOCUMENT_ROOT'] . '/river-key-314405-4f22d5363e93.json';
    $client->setAuthConfig($path);

    $service = new \Google_Service_Sheets($client);
    $spreadsheet = $service->spreadsheets->get($spreadsheetId);
    $values = [];

    $person = new Person();
    $personList = $person->getAdultPersonList();
    $res['status'] = $personList ? 'success' : 'fail';
    foreach ($personList as $key => $value) {
        $values[] = [$value['name'], $value['surname'], $value['age']];
    }

    $body    = new Google_Service_Sheets_ValueRange(['values' => $values]);
    $options = array('valueInputOption' => 'RAW');

    $service->spreadsheets_values->update($spreadsheetId, $range, $body, $options);
    $res['status'] = 'success';
} catch (Exception $e) {
    $res['status'] = 'error';
    $res['data'] = 'Поймано исключение: ' .  $e->getMessage();
} finally {
    echo json_encode($res);
}
