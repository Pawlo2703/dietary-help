
<!-- header !-->
<?php
include('headfoot/header.php')
?>

<body>
    <!-- menu & img !-->
    <?php
    include('headfoot/menu.php')
    ?>
<div class="reg">
    <h3>Error: Login name already exists</h3>
    <h1></br>Create new account</h1>
    <form method="post" action="http://localhost/Tren/public/register/register">
        <label><b>Account login:</b></label> <input autocomplete="off" name="login" type="text" placeholder="Login">
        <label><b>Account password:</b></label> <input autocomplete="off" name="password" type="password" placeholder="Password">
        <button type="submit" >Submit</button>
    </form>
</div>

    
    
    <!-- footer !--> 
    <?php
    include('headfoot/footer.php')
    ?>


</body>
</html>


