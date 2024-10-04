<?php
header('Content-Type: application/json');

$response = ['status' => 'error', 'message' => 'Invalid input.'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);

    
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        $response['message'] = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = 'Invalid email format.';
    } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
        $response['message'] = 'Phone number must be 10 digits.';
    } else {
    

        $response['status'] = 'success';
        $response['message'] = 'Your message has been sent successfully!';
    }
}

echo json_encode($response);
?>
