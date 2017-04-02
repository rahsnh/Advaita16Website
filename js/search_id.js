        $(document).ready(function(){

              $(".display_results").hide();

              $("#TeamLeaderEmail").keyup(function(event){
                  event.preventDefault();
                  $(".display_results").hide();                   
                  search_ajax_way($('#TeamLeaderEmail'));
               });
              $("#TeamLeaderEmail2").keyup(function(event){
                  event.preventDefault();
                  $(".display_results").hide();                   
                  search_ajax_way($('#TeamLeaderEmail2'));
               });
              $("#Participant2Email2").keyup(function(event){
                  event.preventDefault(); 
                  $(".display_results").hide();                  
                  search_ajax_way($('#Participant2Email2'));
               });
              $("#TeamLeaderEmail3").keyup(function(event){
                  event.preventDefault();    
                  $(".display_results").hide();               
                  search_ajax_way($('#TeamLeaderEmail3'));
               });
              $("#Participant2Email3").keyup(function(event){
                  event.preventDefault();
                  $(".display_results").hide();                   
                  search_ajax_way($('#Participant2Email3'));
               });
              $("#Participant3Email3").keyup(function(event){
                  event.preventDefault();
                  $(".display_results").hide();                   
                  search_ajax_way($('#Participant3Email3'));
               });
              $("#TeamLeaderEmail4").keyup(function(event){
                  event.preventDefault();
                  $(".display_results").hide();                   
                  search_ajax_way($('#TeamLeaderEmail4'));
               });
              $("#Participant2Email4").keyup(function(event){
                  event.preventDefault();
                  $(".display_results").hide();                   
                  search_ajax_way($('#Participant2Email4'));
               });
              $("#Participant3Email4").keyup(function(event){
                  event.preventDefault();
                  $(".display_results").hide();                   
                  search_ajax_way($('#Participant3Email4'));
               });
              $("#Participant4Email4").keyup(function(event){
                  event.preventDefault();
                  $(".display_results").hide();                   
                  search_ajax_way($('#Participant4Email4'));
               });
              $("#TeamLeaderEmail5").keyup(function(event){
                  event.preventDefault();
                  $(".display_results").hide();                   
                  search_ajax_way($('#TeamLeaderEmail5'));
               });
              $("#Participant2Email5").keyup(function(event){
                  event.preventDefault();
                  $(".display_results").hide();                   
                  search_ajax_way($('#Participant2Email5'));
               });
              $("#Participant3Email5").keyup(function(event){
                  event.preventDefault();
                  $(".display_results").hide();                   
                  search_ajax_way($('#Participant3Email5'));
               });
              $("#Participant4Email5").keyup(function(event){
                  event.preventDefault();
                  $(".display_results").hide();                   
                  search_ajax_way($('#Participant4Email5'));
               }); 
              $("#Participant5Email5").keyup(function(event){
                  event.preventDefault();
                  $(".display_results").hide();                   
                  search_ajax_way($('#Participant5Email5'));
               });
          });

          function search_ajax_way(Email_id){
              if (Email_id.val() == "") {
                 Email_id.parent().children('.display_results').hide();
              }
              else {
                 Email_id.parent().children('.display_results').show();
                 var search_this = Email_id.val();
                 $.post("search.php", {searchit : search_this}, function(data){
                     Email_id.parent().children('.display_results').html(data);
                     $(".clicked").click(function () {
                       $(".display_results").hide();
                       var uniqueid = $(this).val();
                       if (uniqueid < 10) { uniqueid = "AD160000"+uniqueid; }
                       else if (uniqueid < 100) { uniqueid = "AD16000"+uniqueid; }
                       else if (uniqueid < 1000) { uniqueid = "AD1600"+uniqueid; }
                       else { uniqueid = "AD160"+uniqueid; }
                       Email_id.val(uniqueid);
                   });
                 });
              }
           }
