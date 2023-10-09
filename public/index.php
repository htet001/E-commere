<?php

use App\Classes\Mail;

require_once "../bootstrap/init.php";

$mailer = new Mail();

$content = "What is Lorem Ipsum?
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum";

$data = [
    "to"=>"htet001002@gmail.com",
    "to_name"=>"Htet",
    "content"=>$content,
    "subject"=>"Testing for E-commerce project",
    "filename"=>"welcome"
];

if ($mailer->send($data)) {
    echo "<br><h1>Mail send successfully!!</h1>";
} else {
    echo "<br><h1>Mail send Fail!!</h1>";
}
