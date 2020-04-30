<?php
include("dbconn.php");
session_start();
session_destroy();

function closeWin() {
    myWindow.close();
  }

?>

<body onload="javascript:settimeout('self.close()',5000);">

<script type='text/javascript'>
     self.close();
</script>