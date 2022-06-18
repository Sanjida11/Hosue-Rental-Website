<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $ownerID = $address = $contact = $email = $houseID = "";
$name_err = $ownerID_err = $address_err = $contact_err = $email_err = $houseID_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate name
       if(empty(trim($_POST["name"]))){
        $ownerID_err = "Please enter an name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM owner WHERE name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            
            // Set parameters
            $param_name = trim($_POST["name"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $ownerID_err =  '<font color="#34D6D8">' . "This name is already taken." . '</font><br>';
                   
                } else{
                    $ownerID = trim($_POST["name"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    


    // Validate ownerID
    if(empty(trim($_POST["ownerID"]))){
        $ownerID_err =  '<font color="#34D6D8">' . "Please enter an ownerID." . '</font><br>';

    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM owner WHERE ownerID = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_ownerID);
            
            // Set parameters
            $param_ownerID = trim($_POST["ownerID"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $ownerID_err = '<font color="#34D6D8">' . "This ID is already taken." . '</font><br>';

                } else{
                    $ownerID = trim($_POST["ownerID"]);
                }
            } else{
                echo '<font color="#34D6D8">' . "Oops! Something went wrong. Please try again later." . '</font><br>';

            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
 




    // Validate address
    if(empty(trim($_POST["address"]))){
        $address_err =  '<font color="#34D6D8">' . "Please enter an address." . '</font><br>';

    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM owner WHERE address = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_address);
            
            // Set parameters
            $param_address = trim($_POST["address"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $address_err =  '<font color="#34D6D8">' . "This address is already taken." . '</font><br>';
        

                } else{
                    $address = trim($_POST["address"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }



// Validate contact
    if(empty(trim($_POST["contact"]))){
        $contact_err = '<font color="#34D6D8">' . "Please enter your mobile No." . '</font><br>';

    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM owner WHERE contact = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_contact);
            
            // Set parameters
            $param_contact = trim($_POST["contact"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $contact_err = '<font color="#34D6D8">' . "This contact is already taken." . '</font><br>';

                } else{
                    $contact = trim($_POST["contact"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    


// Validate email
    if(empty(trim($_POST["email"]))){
        $email_err ='<font color="#34D6D8">' . "Please enter an email." . '</font><br>';

    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM owner WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = '<font color="#34D6D8">' . "This email is already taken." . '</font><br>';

                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    

// Validate houseID
    if(empty(trim($_POST["houseID"]))){
        $houseID_err = '<font color="#34D6D8">' . "Please enter houseID." . '</font><br>';

    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM owner WHERE houseID = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_houseID);
            
            // Set parameters
            $param_houseID = trim($_POST["houseID"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $houseID_err ='<font color="#34D6D8">' .  "This houseID is already taken." . '</font><br>';
                    
                } else{
                    $houseID = trim($_POST["houseID"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($ownerID_err) &&  empty($address_err) && empty($contact_err) && empty($email_err) &&  empty($houseID_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO owner (name, ownerID, address, contact, email, houseID) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_ownerID, $param_address, $param_contact, $param_email,  $param_houseID);
            
            // Set parameters
            $param_name = $name;
            $param_ownerID = $ownerID;
            $param_address = $address;
            $param_contact = $contact;
            $param_email = $email;
            $param_houseID = $houseID;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to welcome page
                header("location: welcome.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="UTF-8">



    <title>Owner Sign Up</title>
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

           <link rel="stylesheet" type="text/css" href="owner.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <style type="text/css">        
        html,body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px;}
        
 
    </style>

</head>
<body style="background-color:black; color:white;">
    <div class="container">
    <div class="d-flex justify-content-center h-300">
                <div class="card">

            <div class="card-header">
    <div class="wrapper">



        <h2>Owner Sign Up</h2>

        
                    <div class="card-body">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
               
                <input type="text" minlength="1" maxlength="100" name="name" class="form-control" value="<?php echo $name; ?>"placeholder="Enter Your Name">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div> 

            <div class="form-group <?php echo (!empty($ownerID_err)) ? 'has-error' : ''; ?>">
                
                <input type="text" minlength="10" maxlength="10" name="ownerID" class="form-control" value="<?php echo $ownerID; ?>"placeholder="Enter ID">
                <span class="help-block"><?php echo $ownerID_err; ?></span>
            </div> 

            <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
               
                <input type="text" minlength="1" maxlength="80" name="address" class="form-control" value="<?php echo $address; ?>"placeholder="Enter Address">
                <span class="help-block"><?php echo $address_err; ?></span>
            </div>    

            <div class="form-group <?php echo (!empty($contact_err)) ? 'has-error' : ''; ?>">
               
                <input type="text" minlength="11" maxlength="11" name="contact" class="form-control" value="<?php echo $contact; ?>"placeholder="Enter Your Mobile No">
                <span class="help-block"><?php echo $contact_err; ?></span>
            </div> 

            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                
                <input type="email" minlength="1" maxlength="90" name="email" class="form-control" value="<?php echo $email; ?>"placeholder="Enter Your Valid Email">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div> 

            <div class="form-group <?php echo (!empty($houseID_err)) ? 'has-error' : ''; ?>">
                
                <input type="text" minlength="3" maxlength="80" name="houseID" class="form-control" value="<?php echo $houseID; ?>"placeholder="Enter Your House-ID">
                <span class="help-block"><?php echo $houseID_err; ?></span>
            </div> 

            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
               <input type="reset" class="btn btn-default" value="Reset">
                  <input type="button" class="btn btn-danger" value="Home" onclick="history.back()">

            </div>

        </form>

    </div>
    </div>    
</body>
</html>