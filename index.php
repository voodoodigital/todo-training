<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/bootstrap.bundle.js" defer></script>
    <script src="js/script.js" defer></script>
</head>



<body>

    <!-- main web applicatio UI layout -->
    <!-- develop your UI here -->
    <!-- you only have to main layout of the web application -->
    <!-- use bootstrap for the lay out -->

    <div class="container">
        <div class="col-12 p-0">
            <div class="row p-2" style="background-color:brown">

                <?php

                for ($i = 0; $i < 6; $i++) {
                ?>
                    <div class="col-4 rounded-4 offset-4 p-3 my-2 bg-danger ">
                        <div class="w-100 justify-content-between d-flex">
                            <div>TODO LIST TITLE</div>
                            <div>TIME</div>
                        </div>
                    </div>
                <?php
                }

                ?>
            </div>
        </div>
    </div>


</body>

</html>