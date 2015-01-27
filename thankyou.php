<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Mut × Love</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <link rel="icon" type="image/png" href="assets/images/favicon.png">
        <link rel="stylesheet" type="text/css" href="assets/styles/main.min.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php
            if(isset($_POST['letter'])) {
                $email_to = "love@studiomut.com";
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
                $error_message .= '<div class="fail"><h1 class="fail__title">The submitted letter is too short :-(</h1><h3 class="fail__text">Please <a class="fail__text--link" href="/">go back</a> and write more love!<h3></div>';
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
        <div class="success">
            <h1 class="success__title">Thank You <span>×</span> sharing the love</h1>
            <h1 class="success__title">Tausend <span>×</span> Dank für die Liebe</h1>
            <h1 class="success__title">Grazie <span>×</span> le tue parole d&#8217;amore</h1>
    		<p class="success__text">Your submitted lovely letter is:</p> 
    		<p class="success__letter"><?php echo $_POST["letter"]; ?></p>

            <div class="success__footer">
                <p class="success__footer--text">See you on the <a href="#">Museion Talvera Side on August 6th</a></p>
                <p class="success__footer--text">Bis Balt, wir sehen uns <a href="#">am 6. August vorm Museion</a></p>
                <p class="success__footer--text">Ci vediamo il <a href="#">6 agosto al Museion</a></p>
            </div>
        </div>
    </body>
</html>

<?php
 
}
 
?>