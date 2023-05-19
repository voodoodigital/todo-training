<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- <link rel="stylesheet" href="css/main.css"> -->
    <link rel="stylesheet" href="css/style.css">
<!-- 
    <script src="js/bootstrap.bundle.js" defer></script> -->
    <script src="js/script.js" defer></script>
</head>



<body style="height: 100vh;">

    <!-- main web applicatio UI layout -->
    <!-- develop your UI here -->
    <!-- you only have to main layout of the web application -->
    <!-- use bootstrap for the lay out -->

    <div class="container h-100">
        <div class="col-12 p-0 h-100 d-flex flex-column">
            <div class="row m-0">
                <div class="col-6 offset-3 p-0 my-2">
                    <div class="row m-0 p-3 text-white">
                        <div class="col-12 p-0 rounded-3 p-3 shadow bg-primary">
                            <div class="row m-0">
                                <!-- title -->
                                <label class="fw-bold fs-6">Todo title</label>
                                <input type="text" class="form-control" id="todo">
                                <div class="col-12 p-0">
                                    <div class="row m-0">
                                        <div class="col-6 p-0">
                                            <!-- date -->
                                            <div class="row m-0 pe-2">
                                                <label class="fw-bold fs-6">Due date</label>
                                                <input type="date" class="form-control" id="date">
                                            </div>
                                        </div>
                                        <div class="col-6 p-0">
                                            <!-- time -->
                                            <div class="row m-0 ps-2">
                                                <label class="fw-bold fs-6">Due time</label>
                                                <input type="time" class="form-control" id="time">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 p-0 d-flex justify-content-end">
                                <div class="row m-0 pt-3">
                                    <div id="todoAdd" class="px-3 px-2 btn btn-success shadow">Add</div>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-0 p-2 flex-grow-1 overflow-auto" id="todoContainer"></div>                
        </div>
    </div>


</body>

</html>