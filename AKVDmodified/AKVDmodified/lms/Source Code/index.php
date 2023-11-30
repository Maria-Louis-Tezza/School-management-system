<?php
include 'header.php';
include('navbar.php');?>
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="post" action="loginauthenticate.php">
                    <div class="login-form-head">
                        <h4>User Login</h4>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Roll Number:</label>
                            <input type="text" class="form-control" name="rollno" maxlength=6 title="pattern required:combination of numbers and uppercase alphabets ranging from 2 to 6 letters  "  required pattern="^[A-Z 0-9]{2,6}$" required>
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="pass" title="pattern required:combination of lowercase and uppercase alphabets ranging from 2 to 10 letters  " required pattern="^[a-zA-Z]{2,10}$" required>
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
    <?php include('footer.php');?>