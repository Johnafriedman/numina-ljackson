<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Leavenworth Jackson  Contact Form</title>

<!--[if IE 5]>
<style type="text/css"> 
/* place css box model fixes for IE 5* in this conditional comment */
.twoColFixRtHdr #sidebar1 { width: 220px; }
</style>
<![endif]-->
<!--[if IE]>
<style type="text/css"> 
/* place css fixes for all versions of IE in this conditional comment */
.twoColFixRtHdr #sidebar1 { padding-top: 30px; }
.twoColFixRtHdr #mainContent { zoom: 1; }
/* the above proprietary zoom property gives IE the hasLayout it needs to avoid several bugs */
</style>
<![endif]-->
<link href="../favicon.ico" rel="shortcut icon" />
<link href="../main_lj.css" rel="stylesheet" type="text/css" />
<meta name="Description" content="Leavenworth Jackson Rubber Stamps! Mail order and online purveyor of rubber stamps and supplies to the discriminating stamp art enthusiast since 1979." />
<meta name="Keywords" content="rubber stamps, finely detailed rubber stamps, rubber stamp art, mail art, collage art, mixed media art, stamp pads, rainbow pads, scrapbook, Berkeley, California" />
<style type="text/css">
<!--
.twoColFixRtHdr #mainContent2 {
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	margin-left: 30px;
	margin-right: 20px;
}
-->
</style>
</head>

<body class="twoColFixRtHdr">

<div id="container">
  <div id="header">
    <div id="title"> 
      <h1>LeavenworthJackson.com</h1>
    </div>
    <div id="stampart2"><img src="../images_lj/BrainheadSm.jpg" alt="heart face and drama art" width="780" height="372" /></div>
    <div id="navbar">
      <h4><a href="../index.html">Home</a> | <a href="about.html">About</a> | <a href="catalog.html">Catalog</a> | <a href="artwork.html">Artwork</a> | <a href="contact.html">Contact</a></h4>
    </div>
  </div>
  
  <div id="mainContent2">
    <h2>Contact Us    </h2>
    <p>
      <style type="text/css">
  .label{
    text-align:right;
  }
  #submit{
    text-align:center;
  }
      </style>
<?php
require '../../vendor/autoload.php'; // If you're using Composer (recommended)

$email = new \SendGrid\Mail\Mail();
$email->setFrom("test@leavenworthjackson.com", "Example User");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("test@leavenworthjackson.com", "Example User");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);

$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}


  $to='leavenworthjackson@mac.com';
  $messageSubject='Rubber Stamps Inquiry';
  $confirmationSubject='Confirmation of your email request';
  $confirmationBody="A confirmation of your message follows...\r\n";
  $email='';
  $body='';
  $displayForm=true;
  if ($_POST){
    $email=stripslashes($_POST['email']);
    $body=stripslashes($_POST['body']);
    // validate e-mail address
    $valid=preg_match('/^([0-9a-z]+[-._+&])*[0-9a-z]+@([-0-9a-z]+[.])+[a-z]{2,6}$/',$email);
    $crack=preg_match("/(\r|\n)(to:|from:|cc:|bcc:)/",$body);
    if ($email && $body && $valid && !$crack){
      if (mail($to,$messageSubject,$body,'From: '.$email."\r\n")
          && mail($email,$confirmationSubject,$confirmationBody.$body,'From: '.$to."\r\n")){
        $displayForm=false;
?>
</p>
    <p class="smalltext">
  Your message was successfully sent.
  In addition, a confirmation copy was sent to your e-mail address.
  Your message is shown below.</p>
<?php
        echo '<p>'.htmlspecialchars($body).'</p>';
      }else{ // the messages could not be sent
?>
<p class="smalltext">
  Something went wrong when the server tried to send your message.
  This is usually due to a server error, and is probably not your fault.
  We apologize for any inconvenience caused.</p>
<?php
      }
    }else if ($crack){ // cracking attempt
?>
<p><strong>
  Your message contained e-mail headers within the message body.
  This seems to be a cracking attempt and the message has not been sent.
</strong></p>
<?php
    }else{ // form not complete
?>
<p><strong>
  Your message could not be sent.
  You must include both a valid e-mail address and a message.
</strong></p>
<?php
    }
  }
  if ($displayForm){
?>
<form action="contactform.php" method="post">
  <table>
    <tr>
      <td width="65" class="label"><label for="email" class="smalltext">Your<br />
      e-mail </label></td>
      <td width="578">
        <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" size="30">
        <span class="smalltext">(a confirmation e-mail will be sent here)      </span></td>
    </tr>
    <tr>
      <td class="label"><label for="body" class="smalltext">Your message</label></td>
      <td><textarea name="body" id="body" cols="70" rows="5">
        <?php echo htmlspecialchars($body); ?>
      </textarea></td>
    </tr>
    <tr><td id="submit" colspan="2"><button type="submit" class="maintext">Send message</button></td></tr>
  </table>
</form>
<?php
  }
?>
  </div>
<div id="footer">
	  <p align="center"><span class="footertext">©2008-20 Leavenworth Jackson • Box 9988 • Berkeley • CA 94709</span></p>
  </div>
<!-- end #container --></div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-4680989-1");
pageTracker._initData();
pageTracker._trackPageview();
</script>
</body>
</html>
