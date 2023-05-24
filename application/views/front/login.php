<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
    <script src="<?php echo base_url() . 'assets/js/jquery-3.6.0.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/bootstrap.min.js'; ?>"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/profile.css'); ?>">

</head>

<body>
    <div class="bg-image" style="background-image: url('https://trumpwallpapers.com/wp-content/uploads/Cafe-Wallpaper-03-1920x1200-1.jpg');
            height: 100vh">
        <section class="vh-100 gradient-custom">

            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-white text-dark" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <?php
                                if (!empty($this->session->flashdata('success'))) {
                                    echo "<div class='alert alert-success m-3 mx-auto'>" . $this->session->flashdata('success') . "</div>";
                                }
                                ?>
                                <?php
                                if (!empty($this->session->flashdata('msg'))) {
                                    echo "<div class='alert alert-danger m-3 mx-auto'>" . $this->session->flashdata('msg') . "</div>";
                                }
                                ?>

                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <<h4 class="pb-4 border-bottom text-center">Login Ke Account Anda</h4>
                                        <form action="<?php echo base_url() . 'login/authenticate'; ?>" name="loginform" id="loginform" method="POST">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control bg-light" name="username" id="username" placeholder="Username">
                                                <span></span>
                                            </div>
                                            <?php echo form_error('username'); ?>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control bg-light" name="password" id="password" placeholder="Password">
                                                <span></span>
                                            </div>
                                            <?php echo form_error('password'); ?>
                                            <div class="py-3 pb-4 border-bottom">
                                                <button type="submit" class="btn btn-success mr-3">Login</button>
                                                <a href="<?php echo base_url() . 'singup/index' ?>" class="btn btn-danger">Register</a>
                                            </div>
                                        </form>

                                        <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                            <a href="#!" class="text-dark"><i class="fab fa-facebook-f fa-lg"></i></a>
                                            <a href="#!" class="text-dark"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                            <a href="#!" class="text-dark"><i class="fab fa-google fa-lg"></i></a>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            const form = document.getElementById('loginform');
            const username = document.getElementById('username');
            const password = document.getElementById('password');

            form.addEventListener('submit', (event) => {
                event.preventDefault();
                validate();
            })

            const sendData = (sRate, count) => {
                if (sRate === count) {
                    event.currentTarget.submit();
                }
            }

            const successMsg = (usernameVal) => {
                let formCon = document.getElementsByClassName('form-control');
                var count = formCon.length - 1;
                for (var i = 0; i < formCon.length; i++) {
                    if (formCon[i].className === "form-control bg-light success") {
                        var sRate = 0 + i;
                        sendData(sRate, count);
                    } else {
                        return false;
                    }
                }
            }

            const validate = () => {
                const usernameVal = username.value.trim();
                const passwordVal = password.value.trim();

                if (usernameVal === "") {
                    setErrorMsg(username, 'username can not be blank');
                } else {
                    setSuccessMsg(username);
                }

                if (passwordVal === "") {
                    setErrorMsg(password, 'password can not be blank');
                } else {
                    setSuccessMsg(password);
                }

                successMsg();
            }

            function setErrorMsg(ele, msg) {
                const formCon = ele.parentElement;
                const formInput = formCon.querySelector('.form-control');
                const span = formCon.querySelector('span');
                span.innerText = msg;
                formInput.className = "form-control bg-light is-invalid";
                span.className = "invalid-feedback font-weight-bold";
            }

            function setSuccessMsg(ele) {
                const formCon = ele.parentElement;
                const formInput = formCon.querySelector('.form-control');
                formInput.className = "form-control bg-light success";
            }
        </script>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>