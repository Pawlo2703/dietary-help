
<!-- header !-->
<?php
/// witam, prosze patrzec
// to co juz wczesniej, a moze nawet sie pytalem, czemu to mi nie trybu
// sesja niby dziala tak?, ale dlaczego to, nie lapie
    var_dump($_SESSION); //ten dump daje Ci null
  


include('headfoot/header.php')
?>

<body>
    <!-- menu & img !-->
    <?php
    include('headfoot/menu.php')
    ?>
<div class="reg">
    <h1>Your account has been created, you can log in now.</h1>
    <form method="post" action="http://localhost/Tren/public/log/login">
        
        <label><b>Your login:</b></label> <input name="login" type="text" placeholder="Login">
        <label><b>Your password:</b></label> <input name="password" type="password" placeholder="Password">
        <button type="submit" >Submit</button>
    </form>
</div>
<!-- dlaczego 
    
    
    <!-- footer !--> 
    <?php
    include('headfoot/footer.php')
    ?>


</body>
</html>


