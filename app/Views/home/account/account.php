<section class="container">
    Hello, <?= $data['user']->getLogin() ?>


    <table class="table">
        <tbody>
            <tr>
                <td><a href="http://localhost/Tren/public/account/changePasswordForm">change password</a></td>
                <td><a href="http://localhost/Tren/public/account/changeAvatar">change avatar</a></td>
                <td><a href="http://localhost/Tren/public/account/changePersonalData">change personal details</a></td>
            </tr>
        
    </table>


 </section>

<!-- footer !-->
<?php
include __DIR__ . '/../headfoot/footer.php'
?>


</body>
</html>


