


<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8>
<title></title>
<style type="text/css">
    body {
        margin: auto;
        background: #ffffff;
    }
    .header_block {
        display: block;
        padding: 10px;
        margin: auto;
        font-family: Arial;
        background: #34495e;
        width: 100%;
        text-align: center;
        color: #ffffff;
        font-weight: lighter;
    }
    .message {
        padding-top: 20px;
        margin: auto;
        width: 400px;
        text-align: center;
        font-family: Arial;
    }
    .form_box_wrapper {
        background: #ecf0f1;
        margin: auto;
        margin-top: 100px;
        width: 400px;
        padding: 50px;
        border-radius: 5px;
    }
    .form_box {
        width: 100%;
    }
    input {
        width: 95%;
        padding: 10px;
        border: 0px;
        border-radius: 3px;
        font-size: 14px
        font-family: Helvetica, Arial;
    }
    input[type="submit"] {
        background: #2ecc71;
        width: 100%;
    }
</style>
</head>
  
<body>



<div class="header_block">
    <header>
        <h1>Text me!</h1>
    </header>
</div>


    <?php
        if ($_GET){
            $success = $_GET["sent"];
            if ($success == "success") {
                echo '<div class="message"><p>Thanks for your message!</p></div>';
            }
        }
        
    ?>

<div class="form_box_wrapper">
    <div class="form_box">
    <form method="post" action="sendToTwilio.php">
        
            <input type="text" name="name" placeholder="Name"><br><br>
            <input type="text" name="phonenumber" placeholder="Phone Number"><br><br>
            <input type="textarea" name="message" placeholder="Message"><br><br>

            <input type="submit" value="Send">
    </form>
    </div>
</div>

</body>

</html>

