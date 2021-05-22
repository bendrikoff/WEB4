<?php 
    $emailRegex = "/^[a-zA-Zа-яА-ЯёЁ_\d][-a-zA-Zа-яА-ЯёЁ0-9_\.\d]*\@[a-zA-Zа-яА-ЯёЁ\d][-a-zA-Zа-яА-ЯёЁ\.\d]*\.[a-zA-Zа-яА-Я]{2,6}$/i";
    $email = $_POST['email'];
    $numberRegex = "/^[0-9+]/";
    $number = $_POST['number'];

    $message = $_POST['subject'];
    
    $isCorrect = false;

    if(!empty($_POST))
    {
        $isCorrect = true;



        if(empty($email)||!preg_match($emailRegex, $email))
        {
            $isCorrect = false;
            $email_error = true;

        }

        if(empty($number)||!preg_match($numberRegex, $number))
        {
            $isCorrect = false;
            $number_error = true;

        }elseif(strlen($number) > 11 || strlen($number) < 6)
        {
            $isCorrect = false;
            $number_error = true;


        }

        if(strlen($message) < 10)
        {
            $isCorrect = false;
            $message_error = true;

        }
        if($isCorrect){
            header("Location: ../index.php");
        }
    }
    include("contact.php");


?>