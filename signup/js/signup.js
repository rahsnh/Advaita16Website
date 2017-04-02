function validateForm() {
            var email = document.forms["signupForm"]["email"].value;
            var username = document.forms["signupForm"]["usr"].value;
            var pswrd = document.forms["signupForm"]["password"].value;
            var rpassword = document.forms["signupForm"]["rpassword"].value;
            var firstname = document.forms["signupForm"]["firstname"].value;
            var lastname = document.forms["signupForm"]["lastname"].value;
            var ph_no = document.forms["signupForm"]["ph_no"].value;      
            var gender = document.forms["signupForm"]["gender"].value;
            var state = document.forms["signupForm"]["state"].value;
            var dept = document.forms["signupForm"]["dept"].value;
            var year = document.forms["signupForm"]["year"].value;			
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
            var error="";
          if (document.getElementById('check').checked) {

            if (!(!email == "" && !pswrd == ""  && !firstname == "" && !lastname == "" && !username == "" && !rpassword == "")) {
                error+="<br />* All fields are mandatory";
            }         
            else {
               if(!email.match(mailformat)){
                  error+="<br />Please enter a valid email";
               }
               if (pswrd.length < 8) {
                  error+="<br />Password should be at least 8 characters";
               }
               if(!/[A-Z]/.test(pswrd)) {
                  error+= "<br />Password should include min 1 capital letter";
               }
               if(!/\d/.test(pswrd)) {
                  error+= "<br />Password should contain atleast 1 digit";
               }
               if (/\d/.test(firstname)) {
                  error+="<br />firstname should contain only alphabet";
               }
               if (/\d/.test(lastname)) {
                  error+="<br />Lastname should contain only alphabet";
               }
               if (!(pswrd === rpassword)) {
                  error+="<br />Password do not match";
               }
               //if (!(/\d/.test(ph_no))) {
                 // error+="<br />Phone No should not contain any alphabet";
               //}
			   if (gender === "0") {
                  error+="<br />Select Gender";
               }
			   if (state === "0") {
                  error+="<br />Select State";
               }
			   if (dept === "0") {
                  error+="<br />Select Department";
               }
			   if (year === "0") {
                  error+="<br />Select Year";
               }
			}
           }
         else {
             error+="<br />Please make sure you agree our terms & conditions";
         }
                    
              if (error == null || error == "" ) {
                return true;
              } 
              else {
                error = "There were error(s) in your sign up details:"+error;
                document.getElementById('danger').innerHTML = error;
                document.getElementById('danger').style.display = "block"; 
                return false;
              }
       }

         function validateLoginForm() {
            
            var loginemail = document.forms["loginForm"]["loginemail"].value;
            var loginpassword = document.forms["loginForm"]["loginpassword"].value;
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
            var loginerror="";
            if (loginemail == null || loginemail == "") {
                loginerror+="<br />Please enter your email";                 
            }
            else if(!loginemail.match(mailformat)){
                loginerror+="<br />Please enter a valid email";
            }
            if (loginpassword == null || loginpassword == "") {
                loginerror+="<br />Please enter your password";
            }
              if (loginerror == null || loginerror == "" ) {
                return true;
              } 
              else {
                loginerror = "There were error(s) in your sign in details:"+loginerror;
                document.getElementById('danger1').innerHTML = loginerror;
                document.getElementById('danger1').style.display = "block"; 
                return false;
              }
       }

         function validateLoginFormSlide() {
            
            var loginemail = document.forms["loginForm1"]["loginemail"].value;
            var loginpassword = document.forms["loginForm1"]["loginpassword"].value;
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
            var loginerror="";
            if (loginemail == null || loginemail == "") {
                loginerror+="<br />Please enter your email";                 
            }
            else if(!loginemail.match(mailformat)){
                loginerror+="<br />Please enter a valid email";
            }
            if (loginpassword == null || loginpassword == "") {
                loginerror+="<br />Please enter your password";
            }
              if (loginerror == null || loginerror == "" ) {
                return true;
              } 
              else {
                loginerror = "There were error(s) in your sign in details:"+loginerror;
                document.getElementById('danger2').innerHTML = loginerror;
                document.getElementById('danger2').style.display = "block"; 
                return false;
              }
       }

          function showdanger() {
               document.getElementById('danger').style.display = "block"; 
               $('#danger')[0].focus();
          }

          function showlogindanger() {
               document.getElementById('danger1').style.display = "block"; 
               $('#danger1')[0].focus();
          }

          function showlogindangerslide() {
               document.getElementById('danger2').style.display = "block"; 
               $('#danger2')[0].focus();
          }

               $(document).ready(function(){
                    $('#slide').click(function(){
                    var hidden = $('.right-slide');
                    var row = $('.signup-container');
                    var header = $('.register-header');
                    var footer = $('.register-footer');
                    var toggle = $('.toggle-button');
                    document.getElementById('danger').style.display = "none";
                    document.getElementById('danger2').style.display = "none";                    
                    if (hidden.hasClass('visible')){
                        row.animate({"left":"0%"}, "slow");
                        hidden.animate({"left":"100%"}, "slow").removeClass('visible');
                        header.html("REGISTRATION DETAILS");
                        footer.html("Already a member:- ");
                        toggle.html('<a href="#topRegister" style="text-decoration:none; color:white;">LOGIN</a>');
                    } else {
                        row.animate({"left":"-100%"}, "slow");
                        hidden.animate({"left":"0%"}, "slow").addClass('visible'); 
                        header.html("Please sign in continue");
                        footer.html("Not Registered yet? "); 
                        toggle.html("REGISTER");
                        $('html,body').animate({ scrollTop: $(this.hash).offset().top }, 500);
                    }
                    });
                });
