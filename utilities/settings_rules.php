<?php
// PASSWORD
if (isset($_POST['edit_pass'])) {

  

 


  if (!empty($_POST['edited_password'])) {
      $new_edited_password = hash_my_thing($_POST['edited_password']);
      $username_id         = $user_id;
      update_my_password($username_id, $new_edited_password);
      $setting_success_msg1 = "Your Password have been succesfully changed!";
      $setting_success_msg2 = "";
      $setting_success_msg3 = "";
      $setting_success_msg4 = "";
      
      $modal= "
          <script>
          $( document ).ready(function() {
              $('#succesful_setting').modal({show:true});
          });
          </script>
          <div id='succesful_setting' class='modal fade' role='dialog' data-backdrop='static'>
            <div class='modal-dialog'>

              <!-- Modal content-->
              <div class='modal-content'>
                <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal' type='button' >&times;</button>
                </div>
                <div class='modal-body'>
                <h4>Congrats!...</h4>
                <h6 class='text-center'> it may take a few minutes to update your changes to the whole website!  </h6>
                    <section class='c-container'> 
            <div class='o-circle c-container__circle o-circle__sign--success'>
              <div class='o-circle__sign'></div>  
            </div>   
          </section>        
                           <h6 class='text-center'> $setting_success_msg1 </h6>
                           <h6 class='text-center'> $setting_success_msg2 </h6>
                           <h6 class='text-center'> $setting_success_msg3 </h6>
                           <h6 class='text-center'> $setting_success_msg4 </h6>
                           

               </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-default' data-toggle='modal' data-target='#register' data-dismiss='modal' >OK!</button>
                </div>
              </div>
            </div>
          </div>";
      echo $modal;
  } else {
      $setting_error = "password must not be empty";
      $modal_error= "
          <script>
              $( document ).ready(function() {
                  $('#error_setting').modal({show:true});
              });
              </script>
              <div id='error_setting' class='modal fade' role='dialog' data-backdrop='static'>
                <div class='modal-dialog'>

                  <!-- Modal content-->
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='modal' type='button' >&times;</button>
                    </div>
                    <div class='modal-body'>
                    <h4>Something went wrong!...</h4>
                        <section class='c-container'> 
                <div class='o-circle c-container__circle o-circle__sign--failure'>
                  <div class='o-circle__sign'></div>  
                </div>   
              </section>        
                  <h6 class='text-center'> $setting_error </h6>
                   </div>
                    <div class='modal-footer'>
                      <button type='button' class='btn btn-default' data-toggle='modal' data-target='#register' data-dismiss='modal' >OK!</button>
                    </div>
                  </div>
                </div>
              </div>";
      echo $modal_error;
  }
  
}
// COLOR
if (isset($_POST['edit_color'])) {

  
  if (!empty($_POST['color'])) {
      $new_edited_color = $_POST['color'];
      $username_id         = $user_id;
      update_my_color($username_id, $new_edited_color);
      $setting_success_msg2 = "Your username color have been succesfully changed!";
      $setting_success_msg1 = "";
      $setting_success_msg3 = "";
      $setting_success_msg4 = "";
      $modal= "
          <script>
          $( document ).ready(function() {
              $('#succesful_setting').modal({show:true});
          });
          </script>
          <div id='succesful_setting' class='modal fade' role='dialog' data-backdrop='static'>
            <div class='modal-dialog'>

              <!-- Modal content-->
              <div class='modal-content'>
                <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal' type='button' >&times;</button>
                </div>
                <div class='modal-body'>
                <h4>Congrats!...</h4>
                <h6 class='text-center'> it may take a few minutes to update your changes to the whole website!  </h6>
                    <section class='c-container'> 
            <div class='o-circle c-container__circle o-circle__sign--success'>
              <div class='o-circle__sign'></div>  
            </div>   
          </section>        
                           <h6 class='text-center'> $setting_success_msg1 </h6>
                           <h6 class='text-center'> $setting_success_msg2 </h6>
                           <h6 class='text-center'> $setting_success_msg3 </h6>
                           <h6 class='text-center'> $setting_success_msg4 </h6>
                           

               </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-default' data-toggle='modal' data-target='#register' data-dismiss='modal' >OK!</button>
                </div>
              </div>
            </div>
          </div>";
      
      echo $modal;
      $_SESSION["current_user_color"] =$new_edited_color;
  } else {
      $setting_error = "color must not be empty";
      $modal_error= "
          <script>
              $( document ).ready(function() {
                  $('#error_setting').modal({show:true});
              });
              </script>
              <div id='error_setting' class='modal fade' role='dialog' data-backdrop='static'>
                <div class='modal-dialog'>

                  <!-- Modal content-->
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='modal' type='button' >&times;</button>
                    </div>
                    <div class='modal-body'>
                    <h4>Something went wrong!...</h4>
                        <section class='c-container'> 
                <div class='o-circle c-container__circle o-circle__sign--failure'>
                  <div class='o-circle__sign'></div>  
                </div>   
              </section>        
                  <h6 class='text-center'> $setting_error </h6>
                   </div>
                    <div class='modal-footer'>
                      <button type='button' class='btn btn-default' data-toggle='modal' data-target='#register' data-dismiss='modal' >OK!</button>
                    </div>
                  </div>
                </div>
              </div>";
              echo $modal_error;
      
  
          }
  



}





// IMAGE
if (isset($_POST['edit_img'])) {

  
  if (!empty($_POST['edited_img'])) {
      $new_edited_img = $_POST['edited_img'];
      $username_id         = $user_id;
      update_my_img($username_id, $new_edited_img);
      $setting_success_msg2 = "";
      $setting_success_msg1 = "";
      $setting_success_msg3 = "Your image have been succesfully changed!";
      $setting_success_msg4 = "";
      $modal= "
          <script>
          $( document ).ready(function() {
              $('#succesful_setting').modal({show:true});
          });
          </script>
          <div id='succesful_setting' class='modal fade' role='dialog' data-backdrop='static'>
            <div class='modal-dialog'>

              <!-- Modal content-->
              <div class='modal-content'>
                <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal' type='button' >&times;</button>
                </div>
                <div class='modal-body'>
                <h4>Congrats!...</h4>
                <h6 class='text-center'> it may take a few minutes to update your changes to the whole website!  </h6>
                    <section class='c-container'> 
            <div class='o-circle c-container__circle o-circle__sign--success'>
              <div class='o-circle__sign'></div>  
            </div>   
          </section>        
                           <h6 class='text-center'> $setting_success_msg1 </h6>
                           <h6 class='text-center'> $setting_success_msg2 </h6>
                           <h6 class='text-center'> $setting_success_msg3 </h6>
                           <h6 class='text-center'> $setting_success_msg4 </h6>
                           

               </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-default' data-toggle='modal' data-target='#register' data-dismiss='modal' >OK!</button>
                </div>
              </div>
            </div>
          </div>";
      
      echo $modal;
      $_SESSION["current_user_img"] =$new_edited_img;
  } else {
      $setting_error = "image URL must not be empty";
      $modal_error= "
          <script>
              $( document ).ready(function() {
                  $('#error_setting').modal({show:true});
              });
              </script>
              <div id='error_setting' class='modal fade' role='dialog' data-backdrop='static'>
                <div class='modal-dialog'>

                  <!-- Modal content-->
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='modal' type='button' >&times;</button>
                    </div>
                    <div class='modal-body'>
                    <h4>Something went wrong!...</h4>
                        <section class='c-container'> 
                <div class='o-circle c-container__circle o-circle__sign--failure'>
                  <div class='o-circle__sign'></div>  
                </div>   
              </section>        
                  <h6 class='text-center'> $setting_error </h6>
                   </div>
                    <div class='modal-footer'>
                      <button type='button' class='btn btn-default' data-toggle='modal' data-target='#register' data-dismiss='modal' >OK!</button>
                    </div>
                  </div>
                </div>
              </div>";
      echo $modal_error;
      
  }  
}
// BANNER
if (isset($_POST['edit_banner'])) {
  
  
  if (!empty($_POST['edited_banner'])) {
      $new_edited_banner = $_POST['edited_banner'];
      $username_id = $user_id;
      update_my_banner($username_id, $new_edited_banner);
      $setting_success_msg2 = "";
      $setting_success_msg1 = "";
      $setting_success_msg3 = "";
      $setting_success_msg4 = "Your banner have been succesfully changed!"; 
      $modal= "
          <script>
          $( document ).ready(function() {
              $('#succesful_setting').modal({show:true});
          });
          </script>
          <div id='succesful_setting' class='modal fade' role='dialog' data-backdrop='static'>
            <div class='modal-dialog'>

              <!-- Modal content-->
              <div class='modal-content'>
                <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal' type='button' >&times;</button>
                </div>
                <div class='modal-body'>
                <h4>Congrats!...</h4>
                <h6 class='text-center'> it may take a few minutes to update your changes to the whole website!  </h6>
                    <section class='c-container'> 
            <div class='o-circle c-container__circle o-circle__sign--success'>
              <div class='o-circle__sign'></div>  
            </div>   
          </section>        
                           <h6 class='text-center'> $setting_success_msg1 </h6>
                           <h6 class='text-center'> $setting_success_msg2 </h6>
                           <h6 class='text-center'> $setting_success_msg3 </h6>
                           <h6 class='text-center'> $setting_success_msg4 </h6>
                           

               </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-default' data-toggle='modal' data-target='#register' data-dismiss='modal' >OK!</button>
                </div>
              </div>
            </div>
          </div>";
      
      echo $modal;
      $_SESSION["current_user_banner"] =$new_edited_banner;
  } else {
      $setting_error = "banner URL must not be empty";
      $modal_error= "
          <script>
              $( document ).ready(function() {
                  $('#error_setting').modal({show:true});
              });
              </script>
              <div id='error_setting' class='modal fade' role='dialog' data-backdrop='static'>
                <div class='modal-dialog'>

                  <!-- Modal content-->
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='modal' type='button' >&times;</button>
                    </div>
                    <div class='modal-body'>
                    <h4>Something went wrong!...</h4>
                        <section class='c-container'> 
                <div class='o-circle c-container__circle o-circle__sign--failure'>
                  <div class='o-circle__sign'></div>  
                </div>   
              </section>        
                  <h6 class='text-center'> $setting_error </h6>
                   </div>
                    <div class='modal-footer'>
                      <button type='button' class='btn btn-default' data-toggle='modal' data-target='#register' data-dismiss='modal' >OK!</button>
                    </div>
                  </div>
                </div>
              </div>";
              echo $modal_error;
      
  }
  
}


?>
    
