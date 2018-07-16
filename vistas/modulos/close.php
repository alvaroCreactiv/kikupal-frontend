<?php 
ob_start();
session_start();
session_unset();
session_destroy();
ob_end_flush();

$url=Ruta::ctrRuta();

echo '<script>

localStorage.removeItem("recipient");
localStorage.removeItem("rutaActual");
localStorage.clear();
window.location = "'.$url.'";

</script>';