<head>
    <!-- this script closes the popup window and reloads the caller window -->
    <script src="/js/jquery-2.1.3.min.js"></script>
    <script>
    $(function() {
        window.opener.location.reload();
        window.close();
    });
    </script>

</head>
