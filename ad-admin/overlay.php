<!-- open/close -->
    <div class="overlay overlay-genie" data-steps="m 701.56545,809.01175 35.16718,0 0,19.68384 -35.16718,0 z;m 698.9986,728.03569 41.23353,0 -3.41953,77.8735 -34.98557,0 z;m 687.08153,513.78234 53.1506,0 C 738.0505,683.9161 737.86917,503.34193 737.27015,806 l -35.90067,0 c -7.82727,-276.34892 -2.06916,-72.79261 -14.28795,-292.21766 z;m 403.87105,257.94772 566.31246,2.93091 C 923.38284,513.78233 738.73561,372.23931 737.27015,806 l -35.90067,0 C 701.32034,404.49318 455.17312,480.07689 403.87105,257.94772 z;M 51.871052,165.94772 1362.1835,168.87863 C 1171.3828,653.78233 738.73561,372.23931 737.27015,806 l -35.90067,0 C 701.32034,404.49318 31.173122,513.78234 51.871052,165.94772 z;m 52,26 1364,4 c -12.8007,666.9037 -273.2644,483.78234 -322.7299,776 l -633.90062,0 C 359.32034,432.49318 -6.6979288,733.83462 52,26 z;m 0,0 1439.999975,0 0,805.99999 -1439.999975,0 z">
      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 1440 806" preserveAspectRatio="none">
        <path class="overlay-path" d="m 701.56545,809.01175 35.16718,0 0,19.68384 -35.16718,0 z"/>
      </svg>
      <button type="button" class="overlay-close">Close</button>
         <nav class="login-nav">
         <div class="login-header">
            <h1>Please sign in to continue</h1>
         </div>
        </br>
        <div class="overlay-logincontent">
        <form name="loginForm" action="" onsubmit="return validateLoginForm()" method="post">
          <div id="topLogin" class="row display-width">
            <div class="form-group">
              <label class="control-label col-sm-5" for="email">Email:</label>
                <div class="col-sm-3">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="loginemail" value="<?php echo addslashes(filter_input(INPUT_POST, 'loginemail')); ?>"  required>
                </div>
            </div>
            <br />
            <div class="form-group">
              <label class="control-label col-sm-5" for="pwd">Password:</label>
                <div class="col-sm-3"> 
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="loginpassword" value="<?php echo addslashes(filter_input(INPUT_POST, 'loginpassword')); ?>" required>
                </div>
            </div>
            <div class="form-group"> 
              <div class="col-sm-offset-4 col-sm-4">
                <div class="checkbox">
                  <label><input type="checkbox" required> Keep me signed in</label>
                </div>
              </div>
            </div>
            <div class="form-group"> 
              <div class="col-sm-offset-4 col-sm-4">
                <a href="#">Problems signing in?</a>
              </div>
            </div>
            <div class="form-group"> 
              <div class="col-sm-offset-4 col-sm-4">
                <input type="submit" onclick="showlogindanger()" class="btn btn-primary" name="submit" value="SIGN-IN" />
              </div>
            </div>
          </div>
        </form>
        <br />
        <div id="danger1" tabindex="1" class="alert alert-danger" style="display:none;">WELCOME</div>
            <?php 
                 if ($loginerror){ 
                    echo "<script type='text/javascript'>
                    alert('$loginerror');
                    </script>";
                 }
            ?>
        </div>
      </nav>
    </div>


    <!-- open/close -->
    <div class="overlay overlay-signup" data-steps="m 701.56545,809.01175 35.16718,0 0,19.68384 -35.16718,0 z;m 698.9986,728.03569 41.23353,0 -3.41953,77.8735 -34.98557,0 z;m 687.08153,513.78234 53.1506,0 C 738.0505,683.9161 737.86917,503.34193 737.27015,806 l -35.90067,0 c -7.82727,-276.34892 -2.06916,-72.79261 -14.28795,-292.21766 z;m 403.87105,257.94772 566.31246,2.93091 C 923.38284,513.78233 738.73561,372.23931 737.27015,806 l -35.90067,0 C 701.32034,404.49318 455.17312,480.07689 403.87105,257.94772 z;M 51.871052,165.94772 1362.1835,168.87863 C 1171.3828,653.78233 738.73561,372.23931 737.27015,806 l -35.90067,0 C 701.32034,404.49318 31.173122,513.78234 51.871052,165.94772 z;m 52,26 1364,4 c -12.8007,666.9037 -273.2644,483.78234 -322.7299,776 l -633.90062,0 C 359.32034,432.49318 -6.6979288,733.83462 52,26 z;m 0,0 1439.999975,0 0,805.99999 -1439.999975,0 z">
      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 1440 806" preserveAspectRatio="none">
        <path class="overlay-path" d="m 701.56545,809.01175 35.16718,0 0,19.68384 -35.16718,0 z"/>
      </svg>
      
      <button type="button" class="overlay-close">Close</button>
        </br>
      <nav>
       <div class="register-content">
         <h1 class="register-header">REGISTRATION DETAILS</h1>
       </div>
       <div class="overlay-content">
          
           <form name="signupForm" action="" onsubmit="return validateForm()" method="post">
            <div id="topRegister" class="signup-container">
             <div class="row display-width slide-content">
               <div class="col-md-4">
                 <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input type="text" tabindex="2" class="form-control" id="firstname" name="firstname" required>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="form-group">
                    <label for="usr">Enter your Facebook user-id. You can get it by visiting <a href="http://findmyfbid.com/" target="_blank">findmyfbid.com</a>.If don't have a facebook account, then enter zero (0).
</label>
                    <input type="number" class="form-control" id="usr" name="usr" required>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo addslashes(filter_input(INPUT_POST, 'email')); ?>" required>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo addslashes(filter_input(INPUT_POST, 'password')); ?>" required>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="form-group">
                    <label for="rpassword">Retype-Password:</label>
                    <input type="password" class="form-control" id="rpassword" name="rpassword" value="<?php echo addslashes(filter_input(INPUT_POST, 'rpassword')); ?>" required>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select class="form-control" name="gender">
                        <option selected disabled value="Choose">Select Gender</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                    </select> 
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="form-group">
                    <label for="ph_no">Phone No:</label>
                    <input type="text" class="form-control" id="ph_no" name="ph_no" maxlength="10" required>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="form-group">
                    <label for="state">State:</label>
                    <select class="form-control" name="state">
                        <option selected disabled value="Choose">Select State</option>  
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Puducherry">Puducherry</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                        <option value="Other">Other</option>
                    </select>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="form-group">
                    <label for="institution">Institution:</label>
                    <input type="text" class="form-control" id="institution" name="institution" required>
                 </div>
               </div>            
               <div class="col-md-4">
                 <div class="form-group">
                    <label for="dept">Department:</label>
					<select class="form-control" name="dept" required>
						<option selected disabled>Select Department</option>
						<option value="Computer Science & Engineering">Computer Science & Engineering</option>
						<option value="Information Technology">Information Technology</option>
						<option value="Electronics & Electrical Communication Engineering">Electronics & Communication Engineering(ETC/ECE)</option>
						<option value="Electrical Engineering">Electrical Engineering</option>
						<option value="Mathematics">Mathematics</option>
						<option value="Chemistry">Chemistry</option>
						<option value="Physics">Physics</option>
						<option value="Software Engineering">Software Engineering</option>
						<option value="Biotechnology">Biotechnology</option>
						<option value="Management">Management</option>
						<option value="Quality Design">Quality Design</option>
						<option value="Geology and Geophysics">Geology and Geophysics</option>
						<option value="Mechanical Engineering">Mechanical Engineering</option>
						<option value="Petroleum Technology">Petroleum Technology</option>
						<option value="Agricultural & Food Engineering">Agricultural & Food Engineering</option>
						<option value="B.tech Marine Engineering">B.tech Marine Engineering</option>
						<option value="Ocean Engineering">Ocean Engineering</option>
						<option value="Aerospace Engineering">Aerospace Engineering</option>
						<option value="Humanities and Social Sciences">Humanities and Social Sciences</option>
						<option value="Metallurgy and Materials Engineering">Metallurgy and Materials Engineering</option>
						<option value="Mining Engineering">Mining Engineering</option>
						<option value="Industrial Engineering and Management">Industrial Engineering and Management</option>
						<option value="Chemical Engineering">Chemical Engineering</option>
						<option value="Instrumentation Engineering">Instrumentation Engineering</option>
						<option value="Architecture & Regional Planning">Architecture & Regional Planning</option>
						<option value="Civil Engineering">Civil Engineering</option>
						<option value="other">other</option>
					</select>
                 </div>
               </div>              
               <div class="col-md-4">
                 <div class="form-group">
                    <label for="year">Year:</label>
                    <select class="form-control" name="year">
                        <option selected disabled value="Choose">Select Year</option>
                        <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option>
                        <option value="5">5th Year</option>
                        <option value="6">Postgraduate Ist</option>
						<option value="7">Postgraduate IInd</option>
						<option value="8">Postgraduate IIIrd</option>
						<option value="9">Other</option>
                    </select> 
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="form-group">
                    <label for="addr">Address:</label>
                    <textarea class="form-control" name="addr" placeholder="Enter address"></textarea>
                 </div>
               </div>
               
               
               <div class="col-md-4">
                 <div class="form-group">
                    <input type="checkbox" id="check" name="check">
                    <label for="check">I Agree:</label>
                    <br/>
                    <input type="submit" onclick="showdanger()" class="btn btn-info" name="submit" value="SIGN-UP">
                 </div>
               </div>
               <div class="col-md-12">
                 <div id="danger" tabindex="1" class="alert alert-danger" style="display:none;">WELCOME</div>
                 <br />
               </div>
             </div>
            </div>
        </form>
            <?php if ($error){ 
                 echo "<script type='text/javascript'>
                    alert('$error');
                 </script>";
                 }
            ?>                       
        </div>
        
        <div class="overlay-logincontent right-slide">
        <form name="loginForm1" action="" onsubmit="return validateLoginFormSlide()" method="post">
           <div class="row display-width">
            <div class="form-group">
              <label class="control-label col-sm-5" for="email">Email:</label>
                <div class="col-sm-3">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="loginemail" value="<?php echo addslashes(filter_input(INPUT_POST, 'loginemail')); ?>" required>
                </div>
            </div>
            <br />
            <div class="form-group">
              <label class="control-label col-sm-5" for="pwd">Password:</label>
                <div class="col-sm-3"> 
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="loginpassword" value="<?php echo addslashes(filter_input(INPUT_POST, 'loginpassword')); ?>" required>
                </div>
            </div>
            <div class="form-group"> 
              <div class="col-sm-offset-4 col-sm-4">
                <div class="checkbox">
                  <label><input type="checkbox"> Keep me signed in</label>
                </div>
              </div>
            </div>
            <div class="form-group"> 
              <div class="col-sm-offset-4 col-sm-4">
                <a href="#">Problems signing in?</a>
              </div>
            </div>
            <div class="form-group"> 
              <div class="col-sm-offset-4 col-sm-4">
                <input type="submit" onclick="showlogindangerslide()" class="btn btn-primary" name="submit" value="SIGN-IN" />
              </div>
            </div>
          </div>
        </form>
          <br />
          <div id="danger2" tabindex="1" class="alert alert-danger" style="display:none;">WELCOME</div>
            <?php 
                 if ($loginerror){ 
                    echo "<script type='text/javascript'>
                    alert('$loginerror');
                    </script>";
                 }
            ?>
          </div>
          <div class="clear"></div>

        <div class="login-content">
         <h3><span class="register-footer">Already a member:- </span><button id="slide" type="button" class="btn btn-primary toggle-button"><a href="#topRegister" style="text-decoration:none; color:white;">LOGIN</a></button></h3>
       </div>
       </nav>
    </div>