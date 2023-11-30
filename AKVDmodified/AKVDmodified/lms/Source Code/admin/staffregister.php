<?php
require_once('connect.php');

include 'header.php';
include('navbarin.php');
?>
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="staffregisterauth.php" method="post">
                    <table class="reg-table">

        <div class="form-group col-md-12">
        <h2 style="color: Blue">Staff Register</h2>
        </div>

        <!-- roll number -->
        <div class="form-group col-md-12 ">
        <label style="color:red">* </label>
           <input type="text" class="form-control" name="empid" placeholder="employee ID" title="pattern required: integer numbers containing 4 to 6 digits" required pattern="^[0-9]{4,6}$" required="">    
        </div>

        <!-- first name -->
        <div class="form-group col-md-12 ">           
                    <label style="color:red">*</label>            
                    <input type="text" class="form-control" name="e_fname" placeholder="First Name" required pattern="^[a-zA-Z]{3,10}$" title="pattern required: combination of upper and lowercase characters containing 3 to 10 characters "  required="">         
        </div>

        <!-- middle name -->
        <div class="form-group col-md-12 ">
                    <input type="text" class="form-control" name="e_mname" placeholder="Middle Name" required pattern="^[a-zA-Z]{2,10}$" title="pattern required: ">
        </div>

        <!-- last name -->
        <div class="form-group col-md-12">
                    <input type="text" class="form-control" name="e_lname" placeholder="Last Name" required pattern="^[a-zA-Z]{2,10}$" title="pattern required: ">    
        </div>

        

        

        <!-- DOB -->
        <div class="form-group col-md-12">        
                    <label style="color:red">*</label>      
                    <input type="date" class="form-control" id="e_dob" name="e_dob" required> 
        </div>

        <!-- email -->
        <div class="form-group col-md-12 ">    
                    <label style="color:red">*</label>     
                    <input type="email" class="form-control" name="e_email" placeholder="Email" required>
        </div>

        <!-- gender -->
        <div class="form-group col-md-12">        
                    <label style="color:red">*</label>     
                    <label>Select the Gender:</label>
                    <select name="e_gender" id="e_gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
        </div>


        <!-- contact -->
        <div class="form-group col-md-12 ">
          
                    <label style="color:red">*</label>
                    <input type="text" class="form-control" name="e_contact" required pattern="^[0-9]{10}$" title="pattern required: 10 integer numbers " placeholder="Contact NO" required >
        </div>

        <!-- address -->
        <div class="form-group col-md-12 ">
       
                    <label style="color:red">*</label>
                    <input type="text" class="form-control" name="e_address" required pattern="^[a-z A-Z]{5,50}$" title="pattern required:combination of lowercase and uppercase alphabets ranging from 5 letters to 50 letters " placeholder="Address" required>
        </div>

        <!-- password -->
        <div class="form-group col-md-12 ">
            
                    <label style="color:red">*</label>
                    <input type="password" class="form-control" name="pass" title="pattern required:combination of lowercase and uppercase alphabets ranging from 2 to 10 letters  " placeholder="Password" required pattern="^[a-zA-Z]{2,10}$" required>
        </div>

        <!-- confirm password -->
        <div class="form-group col-md-12 ">
      
                    <label style="color:red">*</label>
                    <input type="password" class="form-control" name="cpass" title="pattern required: combination of lowercase and uppercase alphabets ranging from 2 to 10 letters " placeholder="Confirm Password" required pattern="^[a-zA-Z]{2,10}$" required>
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