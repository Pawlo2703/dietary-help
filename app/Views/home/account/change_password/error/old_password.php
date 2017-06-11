
<div class="reg">
    <h3>The old password you have inserted was incorrect.</h1>
        <h1>Change your password</h1>
        <form method="post" action="http://localhost/Tren/public/account_password/changePassword">

            <label><b>Old password:</b></label> <input autocomplete="off" name="old" type="password" placeholder="">   
            <label><b>New password:</b></label> <input autocomplete="off" name="new" type="password" placeholder="">
            <label><b>Repeat new password:</b></label> <input autocomplete="off" name="repeat" type="password" placeholder="">
            <button type="submit" >Submit</button>
        </form>
</div>

<!-- footer !--> 
<?php
include __DIR__ . '/../../../headfoot/footer.php'
?>


</body>
</html>


