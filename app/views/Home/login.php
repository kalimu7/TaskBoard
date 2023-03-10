<?php
    if(isset($_SESSION['login']) == true){
        header('Location:http://localhost/TaskBoard/public/Tasks/fetch');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="http://localhost/TaskBoard/public/css/style.css">

</head>
<body>
    <!-- *************************navbar************************ -->
    <nav class="navbar bg-body-tertiary" style="background:#91CEDE;">
                <div class="container-fluid">
                    <img src="http://localhost/TaskBoard/public/images/icon.png" alt="" srcset="">
                    <h4 class="text-white">TaskManager</h4>
                    <div>
                        <i class="bi bi-bell-fill mx-2" ></i>
                    </div>
                </div>
            </nav>
    <!-- *************************End of navbar************************ -->
    <!-- ******************************content****************** -->
    <section >
        <div class="container py-2">
            <div class="row d-flex justify-content-center align-items-center h-50">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-6  d-md-block">
                                <img src="http://localhost/TaskBoard/public/images/to-do-list-5807188__480.jpg"
                                    alt="task manager" class="img-fluid" style="border-radius: 1rem 0 0 1rem;height:100%;" />
                            </div>
                            <div class="col-md-6 col-lg-6 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="POST" action="http://localhost/TaskBoard/public/User/loginin">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <span class="h1 fw-bold mb-0"><img src="http://localhost/TaskBoard/public/images/icon.png"  alt="" srcset=""></span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your
                                            account</h5>
                                        <?php 
                                            if(isset($data['msg'])){
                                                echo '<span class="text-danger">'  .$data['msg']. '</span>';
                                            }
                                        ?>
                                        <div class="form-outline mb-4 text-start">
                                            <label class="form-label" for="form2Example17">Email address</label>
                                            <span class="text-danger" id="warning2"></span>
                                            <input type="email" id="emailform" class="form-control form-control-lg" name="email" />
                                        </div>

                                        <div class="form-outline mb-4 text-start">
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <span class="text-danger" id="warning3"></span>
                                            <input type="password" id="passwordform" class="form-control form-control-lg" name="password"/>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-primary btn-lg btn-block" id="loginbtn" name="login" type="submit">Login</button>
                                        </div>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                                href="http://localhost/TaskBoard/public/User/sign" style="color: #393f81;">Register here</a></p>                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ******************************end content****************** -->
    <script src="http://localhost/TaskBoard/public/JS/validatelogin.js"></script>
</body>
</html>