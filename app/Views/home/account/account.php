<section class="container">
    Hello, <?= $data['user']->getLogin() ?>


    <table class="table">
        <tbody>
            <tr>
                <td><a href="http://localhost/Tren/public/account_password/changePasswordForm">change password</a></td>
                <td><img src="http://localhost/tren/public/images/<?= $data['user']->getImage() ?>" />
                <td><a href="http://localhost/Tren/public/account_avatar/display">change avatar</a></td>
                <td><a href="http://localhost/Tren/public/account_account/changePersonalData">change personal details</a></td>
            </tr>
        
    </table>


 </section>

<!-- footer !-->
<?php
include __DIR__ . '/../headfoot/footer.php'
?>


</body>
</html>


