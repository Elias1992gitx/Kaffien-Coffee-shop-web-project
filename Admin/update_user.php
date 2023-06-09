<?php
include('./config.php');
include('./Partials/navbar.php');
?>
<div class="main-containt">
    <div class="wrapper">
        <div class="form-container">

            <form action="#" method="post">
                <h3>register</h3>
                <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM user_form WHERE id=$id" ;
                $result = mysqli_query($conn, $sql);
                
                if($result == TRUE){
                    $count = mysqli_num_rows($result);
                    if($count==1){
                        $row = mysqli_fetch_assoc($result);
                        $name = $row['name'];
                        $email = $row['email'];
                        $id = $row['id'];

                    }else{
                        header('location: manage_user.php');
                    }
                }
                ?>


                <input type="text" name="name" value="<?php echo $name ?>">
                <input type="email" name="email" value="<?php echo $email ?>">
                <input type="hidden" name="id" value="<?php echo $id ?>"> 
                <input type="submit" name="submit" value="update" class="form-btn">
                <p>what to go back? <a href="manage_user.php">return</a></p>
            </form>

        </div>
    </div>
</div>
<?php 
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $id = $_POST['id'];
    $email = $_POST['email'];


    $sql = "UPDATE user_form SET 
    name='$name',
    email='$email'
    WHERE id='$id';";
    $result = mysqli_query($conn,$sql);
    if($result == true){
        $_SESSION['update']="User data updated";
        header('location:manage_user.php');
    } else{
        $_SESSION['update'] = "User data not updated";
        header('location:manage_user.php');
    }
}
?>
<?php
include('./Partials/footer.php');
?>