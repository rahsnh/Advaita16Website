$(document).ready(function(){

              $(".display_results").hide();

              $("#register_submit").click(function(event){
                  event.preventDefault();
            
            var TeamName = document.getElementById("TeamName").value;
            var members = document.getElementById("members").value;
            var ctr,id,Advaita_idx;
            // var event_id = document.getElementById("event_id").value;
            var event_id = return_event();
            var dataString = 'TeamName=' + TeamName + '&members=' + members + '&event_id=' + event_id;
            for (ctr = 0; ctr< members; ctr++)
            {
                id = "Advaita_id"+ctr;
                Advaita_idx = document.getElementById(id).value;
                if (Advaita_idx == "" || TeamName == "") {
                  $('.cd-popup').addClass('is-visible');
                        $('#err-desc').html("<li>Please Fill all the field.</li>");
                        //close popup
                      $('.cd-popup').on('click', function(event){
                        if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') ) {
                          event.preventDefault();
                          $(this).removeClass('is-visible');
                        }
                      });
                      //close popup when clicking the esc keyboard button
                      $(document).keyup(function(event){
                          if(event.which=='27'){
                            $('.cd-popup').removeClass('is-visible');
                          }
                        });
                        return false;
                  }
                   dataString += '&Advaita_id' + ctr + '=' + Advaita_idx;
            }
            console.log(dataString);

             $.ajax({
                  type: "POST",
                  url: "../../ad-admin/register.php",
                  data: dataString,
                  cache: false,
                  success: function(html) {

                  //open popup
                        $('.cd-popup').addClass('is-visible');
                        $('#err-desc').html(html);
                        if (html == "<li>You've been successfully registered!</li>") {
                          $('.cd-buttons li a').css("background", "#4CAF50");
                          $('.cd-buttons li a').html("SUCCESS");
                          location.reload();
                        }
                        else {
                          $('.cd-buttons li a').css("background", "#fc7169");
                          $('.cd-buttons li a').html("ERROR");
                        }
                      
                      //close popup
                      $('.cd-popup').on('click', function(event){
                        if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') ) {
                          event.preventDefault();
                          $(this).removeClass('is-visible');
                          if (html == "<li>You've been successfully registered!</li>") {
                              location.reload();
                          }
                        }
                      });
                      //close popup when clicking the esc keyboard button
                      $(document).keyup(function(event){
                          if(event.which=='27'){
                            $('.cd-popup').removeClass('is-visible');
                            if (html == "<li>You've been successfully registered!</li>") {
                              location.reload();
                            }
                          }
                        });
                 }
             });
             return false;
         });
          });

          function search_ajax_way(Email_id){
              $(".display_results").hide();
              if ($(Email_id).val() == "") {
                 $(Email_id).parent().children('.display_results').hide();
              }
              else {
                 $(Email_id).parent().children('.display_results').show();
                 var search_this = $(Email_id).val();
                 $.post("../../ad-admin/search.php", {searchit : search_this}, function(data){
                     $(Email_id).parent().children('.display_results').html(data);
                     $(".clicked").click(function () {
                       $(".display_results").hide();
                       var uniqueid = $(this).val();
                       if (uniqueid < 10) { uniqueid = "AD16000"+uniqueid; }
                       else if (uniqueid < 100) { uniqueid = "AD1600"+uniqueid; }
                       else if (uniqueid < 1000) { uniqueid = "AD160"+uniqueid; }
                       else { uniqueid = "AD16"+uniqueid; } 
                       $(Email_id).val(uniqueid);
                   });
                 });
              }
           }
