<?php
    if(isset($_SESSION['login']) != true){
        header('Location:http://localhost/TaskBoard/public/User/login');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/TaskBoard/public/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="con" style="background:#91CEDE;">

        <div class="container text-white">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <img src="http://localhost/TaskBoard/public/images/icon.png" alt="" srcset="">
                    <h4>TaskManager</h4>
                    <div>
                        <i class="bi bi-bell-fill mx-2" ></i>
                        
                        <img  src="http://localhost/TaskBoard/public/images/user.jpeg"
                            style="width:39px;height:39px;border-radius: 60%;cursor:pointer;"  alt="" srcset="" id="imgdrop">
                            <div class="drop text-center">
                                <a  href="http://localhost/TaskBoard/public/user/out" id="logout">Log out</a>
                                <a  href="http://localhost/TaskBoard/public/user/out" id="logout">Profile</a>
                            </div>
                        </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- **************************Notification messages******************** -->
    <div class="text-center">

        <?php
        
            if(isset($_SESSION['msg'])){
                echo '<span class="text-danger display-6 text-center">'.$_SESSION['msg'].'</span>';
            }
            if(isset($_SESSION['msg1'])){
                echo '<span class="text-success display-6 text-center">'.$_SESSION['msg1'].'</span>';
            }
            unset($_SESSION['msg']);
            unset($_SESSION['msg1']);
        ?>
    </div>
    <!-- **************************End of Notification messages******************** -->
    <div class="d-flex justify-content-center my-2">
        <input  type="text" id="search" placeholder="Search by name" class="sr"  >
        <i class="bi bi-search mx-2 sr" id="searchbtn"></i>
    </div>
    <div class="container content d-flex justify-content-between my-4 align-items-center">
        
        <div>
            FILTER BY: <i class="bi bi-calendar-range px-2"></i> Due
            date <i class="bi bi-tags-fill px-2"></i> Tags
        </div>
        <div>
            <a id="Add"><i class="bi bi-plus-circle-fill display-4 text-primary"></i></a>
        </div>
        <!-- ***********************Pop up Form*************************** -->
        <div class="popup">
            <div class="d-flex justify-content-between px-4 py-2 align-items-center">
                <h5>Add New Task</h5>
                <a id="close"><i class="bi bi-x-circle text-danger display-6"></i></a>
            </div>
            <form class="d-flex flex-column justidy-content-center px-4 "
                action="http://localhost/TaskBoard/public/Tasks/AddTasks" method="POST">
                <div class="mb-1">
                    <label for="">Tasks Number</label>
                    <input name="Tnumbers" type="number" id="tasknumber" min="1" value="1">
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Task Name</label>
                    <input type="text" name="Tname1" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Task Description</label>
                    <input type="text" name="Tdescription1" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Task status</label>
                    <select class="form-select" name="Tstatus1" aria-label="Default select example">
                        <option selected value="TO DO">TO DO</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Done">Done</option>
                    </select>
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Deadline</label>
                    <input id="deadline" type="Date" name="Tdeadline1" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="inputholder">
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Add New Task</button>
            </form>
        </div>
        <!-- ***********************Pop up Form*************************** -->
    </div>
    <div class="container con-tasks   d-flex  justify-content-around">
        <div class="row gap-2 justify-content-center">
            <div class="col-12  bg-warning to-do ">
                <div class="d-flex  justify-content-between ">
                    <h5 class="bg-danger m-2">TO DO</h5>
                    <p id="count" class="m-2  text-white">Number</p>
                    <i class="bi bi-three-dots m-2"></i>
                </div>
                <?php
                    foreach($data as $d){
                    // var_dump($d);
                    if($d['4'] == 'TO DO'){
            
                ?>
                <div class="task" id="<?= $d['id']; ?>">
                    <p style="display:none;" data-target="status"><?= $d['4']; ?></p>
                    <h5 class="Names" data-target="name"><?= $d['name'] ?></h5>
                    <p data-target="desc"><?= $d['description'] ?></p>
                    <p data-target="dead" class="text-danger"><?= $d['deadline'] ?></p>
                    <div class="d-flex justify-content-between">
                        <a href="#" id="upp" data-role="update" data-id="<?= $d['id']; ?>"><i
                                class="bi bi-pencil-square d-block"></i></a>
                        <a href="http://localhost/TaskBoard/public/Tasks/delete/<?= $d['id']; ?>"> <i
                                class="bi bi-trash d-block"></i> </a>
                    </div>
                </div>
                <?php
                    }
                };
                ?>
                <!-- ****************dynamic**************** -->
            </div>
            <div class="col-12  bg-primary doing ">
                <div class="d-flex  justify-content-between ">
                    <h5  class="bg-danger m-2">In Progress</h5>
                    <p id="count" class="m-2  text-white">Number</p>
                    <i class="bi bi-three-dots m-2"></i>
                </div>
                <?php
                    foreach($data as $d){
                    if($d['4'] == 'In Progress'){
                ?>
                <div class="task" id="<?= $d['id']; ?>">
                    <p style="display:none;" data-target="status"><?= $d['4']; ?></p>
                    <h5 class="Names" data-target="name"><?= $d['name'] ?></h5>
                    <p data-target="desc"><?= $d['description'] ?></p>
                    <p data-target="dead" class="text-danger"><?= $d['deadline'] ?></p>
                    <div class="d-flex justify-content-between">
                        <a href="#" id="upp" data-role="update" data-id="<?= $d['id']; ?>"><i
                                class="bi bi-pencil-square d-block"></i></a>
                        <a href="http://localhost/TaskBoard/public/Tasks/delete/<?= $d['id']; ?>"> <i
                                class="bi bi-trash d-block"></i> </a>
                    </div>
                </div>
                <?php
                    }
                };
                ?>
            </div>
            <div class="col-12  bg-success  done ">
                <div class="d-flex  justify-content-between ">
                    <h5 class="bg-danger m-2">Done</h5>
                    <p id="count" class="m-2  text-white">Number</p>
                    <i class="bi bi-three-dots m-2"></i>
                </div>
                <?php
                    foreach($data as $d){
                    if($d['4'] == 'Done'){
                ?>
                <div class="task" id="<?= $d['id']; ?>">
                    <p style="display:none;" data-target="status"><?= $d['4']; ?></p>
                    <h5 class="Names" data-target="name"><?= $d['name'] ?></h5>
                    <p data-target="desc"><?= $d['description'] ?></p>
                    <p data-target="dead" class="text-danger"><?= $d['deadline'] ?></p>
                    <div class="d-flex justify-content-between">
                        <a href="#" id="upp" data-role="update" data-id="<?= $d['id']; ?>"><i
                                class="bi bi-pencil-square d-block"></i></a>
                        <a href="http://localhost/TaskBoard/public/Tasks/delete/<?= $d['id']; ?>"> <i
                                class="bi bi-trash d-block"></i> </a>
                    </div>
                </div>
                <?php
                    }
                };
                ?>
            </div>
        </div>
    </div>
    <!-- ***********************Pop up update*************************** -->
    <div class="popup update">
        <div class="d-flex justify-content-between px-4 py-2 align-items-center">
            <h5>Update Your Task</h5>
            <a id="closeit"><i class="bi bi-x-circle text-danger display-6"></i></a>
        </div>
        <!-- <form class="d-flex flex-column justidy-content-center px-4 "
                action="http://localhost/TaskBoard/public/Tasks/AddTasks" method="POST"> -->
        <div class="px-3">

            <input type="hidden" id="idd" name="idtask">
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Task Name</label>
                <input type="text" name="name" class="form-control" id="idname" aria-describedby="emailHelp">
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Task Description</label>
                <input type="text" name="description" class="form-control" id="iddesc" aria-describedby="emailHelp">
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Task status</label>
                <select id="selectstatus" class="form-select" name="Tstatus" aria-label="Default select example">
                    <option selected value="TO DO">TO DO</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Done">Done</option>
                </select>
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Deadline</label>
                <input id="deadline1" type="Date" name="deadline" class="form-control" aria-describedby="emailHelp">
            </div>
            <!-- <input type="date" id="deadline1" > -->
    
            <button class="btn btn-primary" id="save">Update</button>
            
        </div>
        <!-- </form> -->
    </div>
    <!-- ***********************Pop up update End*************************** -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="http://localhost/TaskBoard/public/JS/logic.js"></script>
</body>

</html>