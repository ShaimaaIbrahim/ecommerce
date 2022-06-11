<?php
/*
 * ===============================
 * manage members page
 * you can edit / delete members from here
 * =================================
 */

session_start();

if (isset($_SESSION['userName'])) {

    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] : 'manage';

    //start manage page
    if ($do == 'manage') {
        echo 'Welcome to manage page';
    } //start edit page
    elseif ($do == 'edit') {

        $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? $_GET['userid'] : 0;

        //MYSQL query
        $stmt = $conection->prepare("SELECT 
                                              *
                                        FROM  users 
                                        WHERE UserId = ? 
                                        LIMIT 1");
        //excute for parameters--
        $stmt->execute(array($userid));
        $count = $stmt->rowCount();
        $row = $stmt->fetch();

        if ($count > 0) { ?>
            <h1 class="text-container">Edit Members</h1>
            <div class="container ">
                <form class="form-horizontal" action="?do=update" method="POST">
                    <input value="<?php  echo $userid ?>" name="userid" type="hidden">
                    <!--start username field-->
                    <div class="form-group row form-group-lg">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-md-6">
                            <input class="form-control input-lg" type="text" value="<?php echo $row['UserName'] ?>"
                                   name="username" placeholder="Username"
                                   autocomplete="off"/>
                        </div>
                    </div>
                    <!--end username field-->

                    <!--start username field-->
                    <div class="form-group row form-group-lg">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-md-6">
                            <input class="form-control input-lg" type="text" name="password" placeholder="Password"
                                   autocomplete="off"/>
                        </div>
                    </div>
                    <!--end username field-->

                    <!--start username field-->
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-md-6">
                            <input class="form-control input-lg" value="<?php echo $row['Email'] ?>" type="text"
                                   name="email" placeholder="Email"
                                   autocomplete="off"
                                     />
                        </div>
                    </div>
                    <!--end username field-->

                    <!--start username field-->
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">FullName</label>
                        <div class="col-md-6">
                            <input class="form-control input-lg" type="text" value="<?php echo $row['FullName'] ?>"
                                   name="full" placeholder="FullName"
                                   autocomplete="off"/>
                        </div>
                    </div>
                    <!--end username field-->

                    <!--start username field-->
                    <div class="form-group row">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input class="btn btn-primary btn-lg" type="submit" value="Save" autocomplete="off"/>
                        </div>
                    </div>
                    <!--end username field-->
                </form>
            </div>

        <?php
        } else {
            echo 'No Users';
        }}
    elseif ($do == 'update') {
              echo  "<h1 class='text-container'>Update Members</h1>";
              if($_SERVER['REQUEST_METHOD']=='POST'){

                  $userid = $_POST['userid'];
                  $username = $_POST['username'];
                  $password = $_POST['password'];
                  $email = $_POST['email'];
                  $fullname = $_POST['full'];

                  $stmt = $conection->prepare("UPDATE users SET UserName = ? , Email = ? , FullName = ? WHERE UserId = ?");
                  $stmt->execute(array($username, $email, $fullname, $userid));
                  echo $stmt->rowCount() .'  rows updated';

              }else{
                  echo 'You Can not request this page directly';
              }
    }

    include $tpl . 'footer.php';
} else {
    echo 'you are not authrized';
    header('Location: index.php');
    exit();
}