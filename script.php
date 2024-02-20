<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<!-- check session for error and success -->
    <?php if (isset($_SESSION['error'])) { ?>
        <script>
            Swal.fire({
                title: "<?php echo $_SESSION['error'] ?>",
                // text: "You clicked the button!",
                icon: "error"
            });
        </script>
        <?php
        unset($_SESSION['error']);
    } else if (isset($_SESSION['success'])) {
        ?>
            <script>
                Swal.fire({
                    title: "<?php echo $_SESSION['success'] ?>",
                    // text: "You clicked the button!",
                    icon: "success"
                });
            </script>
            <?php
            unset($_SESSION['success']);
    } ?>

</body>

</html>