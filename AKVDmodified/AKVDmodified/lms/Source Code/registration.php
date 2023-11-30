<?php
include 'header.php';
include('navbar.php');
?>
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="registration_authenticate.php" method="post">
                    <table class="reg-table">

        <div class="form-group col-md-12">
        <h2 style="color: Blue">Register</h2>
        </div>

        <!-- roll number -->
        <div class="form-group col-md-12 ">
        <label style="color:red">* </label>
           <input type="text" class="form-control" name="rollno" placeholder="Roll Number" title="pattern required: integer numbers containing 4 to 6 digits" required pattern="^[0-9]{4,6}$" required="">    
        </div>

        <!-- first name -->
        <div class="form-group col-md-12 ">           
                    <label style="color:red">*</label>            
                    <input type="text" class="form-control" name="fname" placeholder="First Name" required pattern="^[a-zA-Z]{3,10}$" title="pattern required: combination of upper and lowercase characters containing 3 to 10 characters "  required="">         
        </div>

        <!-- middle name -->
        <div class="form-group col-md-12 ">
                    <input type="text" class="form-control" name="mname" placeholder="Middle Name" required pattern="^[a-zA-Z]{2,10}$" title="pattern required: combination of upper and lowercase characters containing 3 to 10 characters ">
        </div>

        <!-- last name -->
        <div class="form-group col-md-12">
                    <input type="text" class="form-control" name="lname" placeholder="Last Name" required pattern="^[a-zA-Z]{2,10}$" title="pattern required: combination of upper and lowercase characters containing 3 to 10 characters ">    
        </div>

        <!-- branch -->
        <div class="form-group col-md-12 ">       
                    <label style="color:red">*</label>
                    <label>Choose a Specialized Branch:</label>
                    <select name="branch" id="branch">
                        <option value="science">General Science</option>
                        <option value="social">Social Science</option>
                        <option value="english">English</option>
                        <option value="maths">Mathematics</option>
                    </select> 
        </div>

        <!-- class/semester -->
        <div class="form-group col-md-12 ">
                    <label style="color:red">*</label>
                    <label>Select the Class:</label>

                    <select name="sem" id="sem">
                        <option value="1">1st Grade</option>
                        <option value="2">2nd Grade</option>
                        <option value="3">3rd Grade</option>
                        <option value="4">4th Grade</option>
                    </select>
        </div>

        <!-- DOB -->
        <div class="form-group col-md-12">        
                    <label style="color:red">*</label>      
                    <input type="date" class="form-control" id="dob" name="dob" required> 
        </div>

        <!-- email -->
        <div class="form-group col-md-12 ">    
                    <label style="color:red">*</label>     
                    <input type="email" class="form-control" name="semail" placeholder="Email" required>
        </div>

        <!-- gender -->
        <div class="form-group col-md-12">        
                    <label style="color:red">*</label>     
                    <label>Select the Gender:</label>
                    <select name="gender" id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
        </div>

        <!-- blood group -->
        <div class="form-group col-md-12 ">   
                    <label style="color:red">*</label> 
                    <label>Select the Blood Group:</label>
                    <select name="bg" id="bg">
                        <option value="A+">A+</option>
                        <option value="O+">O+</option>
                        <option value="B+">B+</option>
                        <option value="AB-">AB-</option>
                    </select>
        </div>

        <!-- contact -->
        <div class="form-group col-md-12 ">
          
                    <label style="color:red">*</label>
                    <input type="text" class="form-control" name="contact" required pattern="^[0-9]{10}$" title="pattern required: 10 integer numbers " placeholder="Contact NO" required >
        </div>

        <!-- address -->
        <div class="form-group col-md-12 ">
       
                    <label style="color:red">*</label>
                    <input type="text" class="form-control" name="address" required pattern="^[a-z A-Z]{5,50}$" title="pattern required:combination of lowercase and uppercase alphabets ranging from 5 letters to 50 letters " placeholder="Address" required>
        </div>

        <!-- password -->
        <div class="form-group col-md-12 ">
            
                    <label style="color:red">*</label>
                    <input type="password" class="form-control" name="pass" title="pattern required: combination of lowercase and uppercase alphabets ranging from 2 to 8 letters " placeholder="Password" required pattern="^[a-z A-Z]{2,10}$" required>
        </div>

        <!-- confirm password -->
        <div class="form-group col-md-12 ">
      
                    <label style="color:red">*</label>
                    <input type="password" class="form-control" name="cpass" title="pattern required:combination of lowercase and uppercase alphabets ranging from 2 to 8 letters " placeholder="Confirm Password" required pattern="^[a-z A-Z]{2,10}$" required>
        </div>

        <div class="form-group col-md-12">
        
                    <input type="submit" class="btn btn-primary" value="Register"></input>
                    <input type="reset" class="btn btn-secondary" value="Reset"></input>
        </div>
    </table>
    </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <?php include('footer.php');?>