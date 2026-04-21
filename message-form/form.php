 <?php
   include_once("dbconnection.php");
 
 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="text-center section-title mt-3 mb-5">Contact Us</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 p-4">
                    <form action="" method="POST">
                <?php
                     if($_SERVER['REQUEST_METHOD']=='POST'){
    
                       $name=mysqli_real_escape_string($con,$_POST['name']);
                       $email=mysqli_real_escape_string($con,$_POST['email']);
                       $rollno=mysqli_real_escape_string($con,$_POST['rollno']);
                       $degree=mysqli_real_escape_string($con,$_POST['degree']);
                       $section=mysqli_real_escape_string($con,$_POST['section']);
                       $message=mysqli_real_escape_string($con,$_POST['messege']);

                       //check empty fields
                       if(empty($name) || empty($email) || empty($rollno) ||empty($degree) || empty($section) || empty($message)){
                        echo"<div class='alert alert-danger'>
                           Error: All fields must be filled!!!
                        </div>";

                       }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                           echo"<div class='alert alert-danger'>
                           Error: Format of Email Must be correct!!!
                        </div>";

                       }else{
                           $query="INSERT INTO message(name,email,rollno,degree,section,message) VALUES('$name','$email','$rollno','$degree','$section','$message')";
                           $result=$con->query($query);
                           if($result){
                            echo"<div class='alert alert-Success'>
                             Message send Successfully!!!
                            </div>";
                           }else{
                             echo"<div class='alert alert-Success'>
                             Data base Error!!!
                            </div>";
                           }
                       }
    
                    }
                ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="small font-weight-bold">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter your name " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="small font-weight-bold">email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                                </div>
                            </div>
                        </div>
                     
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rollno" class="small font-weight-bold">Ag-No</label>
                                    <input type="text" name="rollno" class="form-control" placeholder="Enter your registration no " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="degree" class="small font-weight-bold">degree</label>
                                    <input type="text" name="degree" class="form-control" placeholder="Enter your degree " required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="section" class="small font-weight-bold">Section</label>
                            <input type="text" name="section" class="form-control" placeholder="Enter your section " required>
                        </div>
                        <div class="form-group">
                            <label for="messege" class="small font-weight-bold">messege</label>
                            <textarea name="messege" class="form-control" rows="4" >Who can we help you?</textarea>
                        </div>
                        <div class="mt-4 text-center">
                            <button type="submit" name="submit" class="btn btn-primary px-5 shadow-sm font-weight-bold">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





<!-- bootstrap js links -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
