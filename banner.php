<?php session_start(); ?>
<div class="banner"> <h1 display="inline">Welcome to coolstufz.net 
<?php if (isset($_SESSION['uname']))
      {echo(" " . $_SESSION['uname']);}
      else
      {echo(" :D");}
?>
<h1></div>
