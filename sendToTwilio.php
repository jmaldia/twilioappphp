<?php
    /* Send an SMS using Twilio. You can run this file 3 different ways:
     *
     * - Save it as sendnotifications.php and at the command line, run 
     *        php sendnotifications.php
     *
     * - Upload it to a web host and load mywebhost.com/sendnotifications.php 
     *   in a web browser.
     * - Download a local server like WAMP, MAMP or XAMPP. Point the web root 
     *   directory to the folder containing this file, and load 
     *   localhost:8888/sendnotifications.php in a web browser.
     

    // Step 1: Download the Twilio-PHP library from twilio.com/docs/libraries, 
    // and move it into the folder containing this file.
    require "Services/Twilio.php";

    // Step 2: set our AccountSid and AuthToken from www.twilio.com/user/account
    $AccountSid = "AC469c402f9821920866ba54c93fc70db1";
    $AuthToken = "f638f098327aeaf175b093bbf6d67359";

    $contactname = $_GET["name"];//"Jon";
    $phonenumber = $_GET["phonenumber"]//847-224-4987;//
    $message = $_GET["message"]//"This is the message";// 
    
    $textmessage = preg_replace("/[^0-9]/","",$message);

    // Step 3: instantiate a new Twilio Rest Client
    $http = new Services_Twilio_TinyHttp(
    'http://api.twilio.com',
    array('curlopts' => array(
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
    ))
    );

    $client = new Services_Twilio($sid, $token, "2010-04-01", $http);

    // Step 4: make an array of people we know, to send them a message. 
    // Feel free to change/add your own phone number and name here.
    $people = array(
        $contactname => $phonenumber
    );

    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    foreach ($people as $number => $name) {

        $sms = $client->account->messages->sendMessage(

        // Step 6: Change the 'From' number below to be a valid Twilio number 
        // that you've purchased, or the (deprecated) Sandbox number
            "646-798-2566", 

            // the number we are sending to - Any phone number
            $number,

            // the sms body
            $textmessage
        );

        // Display a confirmation message on the screen
        echo "Sent message to $name";
    }
?>

*/
    /* Send an SMS using Twilio. You can run this file 3 different ways:
     *
     * - Save it as sendnotifications.php and at the command line, run 
     *        php sendnotifications.php
     *
     * - Upload it to a web host and load mywebhost.com/sendnotifications.php 
     *   in a web browser.
     * - Download a local server like WAMP, MAMP or XAMPP. Point the web root 
     *   directory to the folder containing this file, and load 
     *   localhost:8888/sendnotifications.php in a web browser.
     */

    // Step 1: Download the Twilio-PHP library from twilio.com/docs/libraries, 
    // and move it into the folder containing this file.
    require "Services/Twilio.php";

    // Step 2: set our AccountSid and AuthToken from www.twilio.com/user/account
    $AccountSid = "AC469c402f9821920866ba54c93fc70db1";
    $AuthToken = "f638f098327aeaf175b093bbf6d67359";

    $contactname = $_POST["name"];//"Jon";
    $phonenumber = $_POST["phonenumber"];//847-224-4987;//
    $textmessage = $_POST["message"];//"This is the message";//

    // Step 3: instantiate a new Twilio Rest Client
    $http = new Services_Twilio_TinyHttp(
    'https://api.twilio.com',
    array('curlopts' => array(
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
    ))
    );

    $client = new Services_Twilio($AccountSid, $AuthToken, "2010-04-01", $http);

    // Step 4: make an array of people we know, to send them a message. 
    // Feel free to change/add your own phone number and name here.
    $people = array(
        $phonenumber => $contactname,
    );

    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    foreach ($people as $phonenumber => $contactname) {
        try {
              $sms = $client->account->messages->sendMessage(

            // Step 6: Change the 'From' number below to be a valid Twilio number 
            // that you've purchased, or the (deprecated) Sandbox number
                "646-798-2566", 

                // the number we are sending to - Any phone number
                $phonenumber,

                // the sms body
                $textmessage


            );
          } catch($e) {
            $msg = $e->getMessage();

            header("Location: https://twilioappphp.herokuapp.com/?sent=fail");
            exit();
          }
      

        header("Location: https://twilioappphp.herokuapp.com/?sent=success");
            die();

            // Display a confirmation message on the screen

        // if ($phonenumber == 8472244987 || $phonenumber == 18472244987 || $phonenumber == +18472244987) {
        //     $sms = $client->account->messages->sendMessage(

        //     // Step 6: Change the 'From' number below to be a valid Twilio number 
        //     // that you've purchased, or the (deprecated) Sandbox number
        //         "646-798-2566", 

        //         // the number we are sending to - Any phone number
        //         $phonenumber,

        //         // the sms body
        //         $textmessage
        //     );

        //     // Display a confirmation message on the screen
        //     header("Location: https://twilioappphp.herokuapp.com/?sent=success");
        //     die();
        // } else {
        //     $sms = $client->account->messages->sendMessage(

        //     // Step 6: Change the 'From' number below to be a valid Twilio number 
        //     // that you've purchased, or the (deprecated) Sandbox number
        //         "646-798-2566", 

        //         // the number we are sending to - Any phone number
        //         +18472244987,

        //         // the sms body
        //         "text and verify: $phonenumber"
        //     );

        //     // Display a confirmation message on the screen
        //     header("Location: https://twilioappphp.herokuapp.com/?sent=fail");
        //     die();
        // }
    }

?>


