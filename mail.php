<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php if(strlen($letter) < 1): ?>
        <title>Love error</title>
        <?php else: ?>
        <title>Letter submitted</title>
        <?php endif ?>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php
            if(isset($_POST['letter'])) {
                $email_to = "";
                $email_subject = "Your love letter";
            
            function died($error) {
                echo $error."<br />";
                die();
            }

            if(!isset($_POST['letter'])) {
                died('We are sorry, but there appears to be no submitted letter :-(');       
            }
         
            $letter = $_POST['letter'];
            $mail = $_POST['email'];
            $error_message = "";
         
            if(strlen($letter) < 1) {
                $error_message .= 'The submitted letter is too short :-(<br>Please go back and write some more love!<br><br>';
            }

            if(strlen($mail) != 0) {
                $error_message .= 'You robot! Go away!<br><br>';
            }

            if(strlen($error_message) > 0) {
                died($error_message);
            }
         
            $email_message = "Love letter below\n\n";
            function clean_string($string) {
                $bad = array("content-type","bcc:","to:","cc:","href");
                return str_replace($bad,"",$string);
            }
         
            $email_message = clean_string($letter);
         
            // create email headers
            @mail($email_to, $email_subject, $email_message);  
        ?>

        <h1>Thank you for sharing some ♥ with us!</h1>
		<p>Your submitted lovely letter is:</p> 
		<p><?php echo $_POST["letter"]; ?></p>
    </body>
</html>

<?php
 
}
 
?>