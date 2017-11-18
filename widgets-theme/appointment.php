<?php include 'includes/config.php' ?>
<?php get_header() ?>
<?php
    //put client's email address here
    $to = 'ankita.mishra@seattlecentral.edu';

if(isset($_POST["FirstName"])){ 
    /*show data

    use var_dump() on the post data to view it:
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';

    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $Email = $_POST["Email"];
    $Comments = $_POST["Comments"];

    if(isset($_POST["FirstName"])){
        $FirstName = strip_tags(trim($_POST["FirstName"]));
    }else{
        $FirstName="";
    } */

    //clean and process the post data

    $FirstName = clean_post('FirstName');
    $LastName = clean_post('LastName');
    $Email = clean_post('Email');
    $Comments = clean_post('Comments');


    $subject = 'Ceramics Appointment Request Form' . $FirstName . " " . $LastName . " " . date('l jS \of F Y h:i:s A');
    /*
    $myText = "The user has entered their name and address as follows:" . PHP_EOL . PHP_EOL; //double newlines 
    $myText .= $FirstName . " " .  $LastName . PHP_EOL;
    $myText .= $Comments . PHP_EOL;
    //$myText .= $myCity . ", " . $myState . " " . $myZipCode . PHP_EOL;
    */
    
    $myText = process_post();


    $headers = 'From: noreply@example.com' . PHP_EOL .
        'Reply-To: $Email' . PHP_EOL .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $myText, $headers);  

    echo'
        <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">
          <strong>Message Sent</strong>
        </h2>
        <hr class="divider">
        <h3> Thank You for message.</h3>
        <p>We will contact you within 48 hours.</p>
        <p><a href="">Exit</a></p>

        ';


    /* echo
//    <p> The user's name is $FirstName $LastName. </p>
//    <p> $FirstName Email is $Email. </p>
//    <p> Here's what $FirstName had to say: </p>
//    <p> $Comments</p>
//    "; */




}else //show form
{
    echo '  
        <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">Book
          <strong>US</strong>
        </h2>
        <hr class="divider">
        <form action="" method="post">
          <div class="row">
            <div class="form-group col-lg-4">
              <label class="text-heading">First Name</label>
              <input type="text" name ="FirstName" class="form-control">
            </div>
            <div class="form-group col-lg-4">
              <label class="text-heading">Last Name</label>
              <input type="text" name ="LastName" class="form-control">
            </div>
            <div class="form-group col-lg-4">
              <label class="text-heading">Email Address</label>
              <input type="email" name="Email" class="form-control">
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-4">
              <label class="text-heading">Appointment Type</label><br />
              
              <input type="radio" name="Appointment-Type" value="Beginning hand building" /> Beginning hand building<br />
              <input type="radio" name="Appointment-Type" value="Beginning hand building" /> Beginning leg building<br />
              <input type="radio" name="Appointment-Type" value="Beginning hand building" /> Beginning face building<br />
            </div>
            
             <div class="form-group col-lg-4">
              <label class="text-heading">Appointment Extras</label><br />
              
              <input type="checkbox" name="Appointment-Extras" value="Mosaic" /> Beginning hand building<br />
              <input type="checkbox" name="Appointment-Extras" value="Beading" /> Beading<br />
              <input type="checkbox" name="Appointment-Extras" value="Sewing" />Sewing<br />
            </div>
            
            <div class="form-group col-lg-4">
              <label class="text-heading">Appointment Date</label>
              <input type="datetime-local" name="appointment-date" class="form-control">
            </div>
            
               <div class="form-group col-lg-12">
              <label class="text-heading">Comments</label>
              <textarea class="form-control" name="Comments" rows="6"></textarea>
            </div>
            <div class="form-group col-lg-12">
              <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
          </div>
        </form>

    ';   
}
?>
<?php get_footer() ?>


function clean_post($key){

    if(isset($_POST[$key]))
    {
        $value = strip_tags(trim($_POST[$key]));
    }else
    {
        $value="";
    }
    return $value;
}


function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL . PHP_EOL;
         }
    }
    return $myReturn;
}



?>













