<?php



$username_err = $name_err = $surname_err = $dni_err = $email_err = $phone_err = "";
$name_error = validate_name($_POST['Name']);
$username_error = validate_name($_POST['Username']);
$surname_error = validate_surname($_POST['Surname']);
$email_error = validate_email($_POST['Email']);

$modalScript = "<script>
$( document ).ready(function() {
    $('#modal1').modal({show:true});
});
</script>";
$modalScript2 = "<script>
$( document ).ready(function() {
    $('#register').modal({show:true});
});
</script>";
$modalScript3 = "<script>
$( document ).ready(function() {
    $('#register_succesful').modal({show:true});
});
</script>";

$modal_Script="<script>
    $( document ).ready(function() {
        $('#modal1').modal({show:true});
    });
    </script>";


    $errorCount = 0; 
// CONDICIONES DE ERRORES
      //condicion name
    if($name_error == 1){
        global $name_err;
        $name_err = 'Name must not be empty';
        global $errorCount;
        $errorCount = $errorCount +1;
    }elseif($name_error == 2){
        global $name_err;
        $name_err = 'Name must have only letters';
        global $errorCount;
        $errorCount = $errorCount +1;
    }
      //condicion surname
      if($surname_error == 1){
        global $name_err;
        $name_err = 'Surname must not be empty';
        global $errorCount;
        $errorCount = $errorCount +1;
    }elseif($name_error == 2){
        global $name_err;
        $name_err = 'Surname must have only letters';
        global $errorCount;
        $errorCount = $errorCount +1;
    }
     //condicion username
    if($username_error == 1){
        global $username_err;
        $username_err = 'Username must not be empty';
        global $errorCount;
        $errorCount = $errorCount +1;
    }
     //condicion email
    if($email_error == 1){
        global $email_err;
        $email_err = 'Your e-mail must not be empty';
        global $errorCount;
        $errorCount = $errorCount +1;
    }elseif($email_error == 2){
        global $email_err;
        $email_err = 'This is not my kind of e-mail, try something with at least @something';
        global $errorCount;
        $errorCount = $errorCount +1;
    }
   
    
    //condicion si todo es correcto
    if($name_error == 0 && $surname_error == 0  && $email_error == 0 && $countqgenial['LOG']==0){
        $name_r =    ($_POST['Name']);
        $lastname_r =($_POST['Surname']);
        $username_r =($_POST['Username']);
        $email_r =   ($_POST['Email']);
        $password_r =hash_my_thing(($_POST['Password']));
        register_me($name_r,$lastname_r,$username_r,$email_r,$password_r);
        
        $modal_succes="

        <div id='register_succesful' class='modal fade' role='dialog' data-backdrop='static'>
        <div class='modal-dialog'>
      
          
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' type='button' >&times;</button>
            </div>
            <div class='modal-body'>
            
                <section class='c-container'> 
        <div class='o-circle c-container__circle o-circle__sign--success'>
          <div class='o-circle__sign'></div>  
        </div>   
      </section>         
                       <h6 class='text-center'> Congrats, $name_r You're in! </h6>
           </div>
            <div class='modal-footer'>
              
            </div>
          </div>
        </div>
      </div>";
echo $modal_succes;
echo $modalScript3;
        
    }
    
    // inyeccion de scripts si existen errores
    
    if($countqgenial['LOG']==1){
        
        $username_err= "Username is already in use!";
        $errorCount=$errorCount+1;
    }
    if($errorCount>0 ){
       
        
        $modal= "

<div id='modal1' class='modal fade' role='dialog' data-backdrop='static'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' type='button' >&times;</button>
      </div>
      <div class='modal-body'>
      <h4>There are some errors...</h4>
          <h5>You might want to check:</h5>
          <section class='c-container'> 
  <div class='o-circle c-container__circle o-circle__sign--failure'>
    <div class='o-circle__sign'></div>  
  </div>   
</section>        
                 <h6 class='text-center'> $name_err </h6>
                 <h6 class='text-center'> $surname_err  </h6>
                 <h6 class='text-center'>$username_err </h6>
                 <h6 class='text-center'> $email_err </h6>
     </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-toggle='modal' data-target='#register' data-dismiss='modal' >Try again</button>
      </div>
    </div>
  </div>
</div>";
echo $modal;        
echo $modal_Script;        
    }
    
    
