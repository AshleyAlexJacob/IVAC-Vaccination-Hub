<head>
    <title>Home</title>
    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function() {
            null
        };
    </script>
</head>
<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
// if(session_destroy()) {
//    header("Location: index.php");
// }
unset($_SESSION);
session_destroy();
header('Location: index.php');
exit();

?>