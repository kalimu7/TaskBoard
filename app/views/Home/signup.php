<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>signup</title>
</head>
<body>
    <!-- *********************************navbar**************************** -->
    <!-- *********************************navbar**************************** -->
    <!-- **************************Content***************************** -->
        <section  style="margin-top:100px;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-6  d-md-block">
                                <img src="http://localhost/TaskBoard/public/images/to-do-list-5807188__480.jpg"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;height:100%;" />
                            </div>
                            <div class="col-md-6 col-lg-6 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="http://localhost/TaskBoard/public/User/signup" method="POST" >

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <span class="h1 fw-bold mb-0"><img src="http://localhost/Hotel/public/assets/logo.png" height="100px"; alt="" srcset=""></span>
                                        </div>
                                        <?php
                                        if(isset($data['msg'])){
                                            echo '<span class="text-danger" >' .$data['msg']. '</span>';
                                        }
                                        ?>
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign up</h5>

                                        <div class="form-outline mb-4 text-start">
                                            <label class="form-label" for="form2Example27">Name</label>
                                            <input type="text" id="form2Example27" class="form-control form-control-lg" name="Name" />
                                        </div>


                                        <div class="form-outline mb-4 text-start">
                                            <label class="form-label " for="form2Example17">Email address</label>
                                            <input type="email" id="form2Example17" class="form-control form-control-lg" name="Email" />
                                        </div>

                                        
                                        <div class="form-outline mb-4 text-start">
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <input type="password" id="form2Example27" class="form-control form-control-lg" name="password" />
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button name="register" class="btn btn-dark btn-lg btn-block" type="submit">Sign up</button>
                                        </div>

                                        
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account?
                                         <a href="http://localhost/TaskBoard/public/User/login" style="color: #393f81;">Login here</a></p>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- **************************End Of Content***************************** -->
</body>
</html>