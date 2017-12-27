<?php
// 檢查是否有空字段
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['line'])      ||
   empty($_POST['message'])   ||
        
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$line = strip_tags(htmlspecialchars($_POST['line']));
$message = strip_tags(htmlspecialchars($_POST['message']));

   
// 創建電子郵件並發送消息
$to = 'j2j2nny@gmail.com'; 
$email_subject = "您的網站詢問訊息 Form:  $name";
$email_body = "您已收到來自您網站聯繫表單的新訊息.\n\n"."以下是信件訊息:\n\n姓名: $name\n\n信箱: $email_address\n\n電話: $phone \n\nline: $line \n\n信件內容:\n$message";//語法中的\n是分行指令\n\n則空二行
$headers = "From: j2j2nny@gmail.com"; 
$headers .= "Reply-To: $email_address";   //這語法是指回信時會用到網友填寫的EMAIL
mail($to,$email_subject,$email_body,$headers);
return true;         
?>
