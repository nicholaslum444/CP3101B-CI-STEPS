<?php
if ($isLoggedIn) {
    if ($userType === USER_TYPE_LECTURER) {
        $userType = "Lecturer";
    } else if ($userType === USER_TYPE_STUDENT) {
        $userType = "Student";
    } else if ($userType === USER_TYPE_ADMIN) {
        $userType = "Admin";
    }
} else {
    $userType = "";
}
?>
<head>
    <!-- this script closes the popup window and reloads the caller window -->
    <script src="/js/jquery-2.1.3.min.js"></script>
    <script>
    $(function() {
        window.parent.location = "<?php echo $baseUrl; ?>/index.php/<?php echo $userType; ?>";
    });
    </script>
</head>
