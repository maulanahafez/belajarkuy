<?php
include("../config/connect.php");
session_start();
session_unset();
session_destroy();
?>
<script>
  alert("Anda berhasil Sign Out");
  document.location = "/belajarkuy/";
</script>