<?php
$name       = @trim(stripslashes($_POST['name'])); 
$from       = @trim(stripslashes($_POST['email'])); 
$subject    = @trim(stripslashes($_POST['subject'])); 
$message    = @trim(stripslashes($_POST['message'])); 
$to   		= 'krishnamrith12@gmail.com';//replace with your email

$headers   = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=iso-8859-1";
$headers[] = "From: {Amrith} <{jj@gmail.com}>";
$headers[] = "Reply-To: <{jj@gmail.com}>";
$headers[] = "Subject: {subj}";
$headers[] = "X-Mailer: PHP/".phpversion();


// Create map with request parameters
$params = array ('value1' => 'Filip', 'value2' => 'Czaja');
 
// Build Http query using params
$query = http_build_query ($params);
 
// Create Http context details
$contextData = array ( 
                'method' => 'POST',
                'header' => "Connection: close\r\n".
                            "Content-Length: ".strlen($query)."\r\n",
                'content'=> $query );
 
// Create context resource for our request
$context = stream_context_create (array ( 'http' => $contextData ));
 
// Read page rendered as result of your POST request
$result =  file_get_contents (
                  'https://maker.ifttt.com/trigger/codscomad/with/key/o_YhZ3qzxuCEJvAsC44JJ6MdAbKLdFDyggkSklhBDz1',  // page url
                  false,
                  $context);
 
// Server response is now stored in $result variable so you can process it



mail($to, $subject, 'hiHello', $headers);
echo 'DOne';
die;