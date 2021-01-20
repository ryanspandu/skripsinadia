<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Penentuan Insentif Karyawan - Nadia Regina</title>
    <?php include 'head.php'; session_start(); ?>
    <style>
        body{
            background: rgb(33,118,207);
            background: linear-gradient(138deg, rgba(33,118,207,1) 0%, rgba(64,163,207,1) 32%, rgba(0,123,255,1) 100%);
        }
    </style>
</head>
<body class="mb-5">
    <div class="container">
        <div class="d-flex flex-row justify-content-center mt-5">
            <div class="bg-white rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                <img src="assets/img/logo.png" class="" width="50px"/>
            </div>
        </div>
        <hr style="border: rgba(207, 220, 253, 0.116) solid 0.25px;">

        <?php 
        if(isset($_SESSION['login_msg'])){
            $msg = $_SESSION['login_msg'];
        }else{
            $msg = NULL;
        }
            if($msg == 'Gagal Login'){ ?>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="alert alert-danger" role="alert">
                        Nip atau Password Salah!
                    </div>
                </div>
            </div>
            <?php }
        ?>

        <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card">
        <header class="card-header">
            <a href="register.php" class="float-right btn btn-outline-primary mt-1">Register</a>
            <h4 class="card-title mt-2">Log in</h4>
        </header>
        <article class="card-body">
        <form action="proses/login.php" method="POST">
            <!-- <div class="form-row">
                <div class="col form-group">
                    <label>First name </label>   
                    <input type="text" class="form-control" placeholder="">
                </div> 
                <div class="col form-group">
                    <label>Last name</label>
                    <input type="text" class="form-control" placeholder=" ">
                </div> 
            </div>  -->
            <div class="form-group">
                <label>Nip</label>
                <input type="text" name="nip" class="form-control" placeholder="">
            </div>  
            <div class="form-group">
                <label>Password</label>
                <input class="form-control" name="password" type="password">
            </div>   
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Login  </button>
            </div>      
            <!-- <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>                                           -->
        </form>
        </article> <!-- card-body end .// -->
        <div class="border-top card-body text-center">Belum punya akun? <a href="register.php">Register</a></div>
        </div> 
        </div> 

        </div> 


    </div> 
</body>
</html>