<?php
header('Access-Control_Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/User.php';


$database = new Database();
$db = $database->connect();



$user = new User($db);

$result = $user->read();

$num = $result->rowCount();

if ($num > 0) {

    $users_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $user_item = array(
            "id" => $id,
            "firstname" => $firstname,
            "lastname" => $lastname
        );
        array_push($users_arr, $user_item);
    }
    echo json_encode($users_arr);
} else {
    echo json_encode(
        array("message" => "There are no posts.")
    );
}
