
Hello, <?= $data['user']->getLogin() ?>
<section class="container">
    
    <div class="row">
        
   <?php if ($data['personalData']->getState()): 
    ?>     <figure class="col-sm-2">    
            <p>Protein:<?= $data['macro']->getProtein() ?></a></p>

        </figure>
        <figure class="col-sm-2">
            <p>Fat:<?= $data['macro']->getFat() ?></a></p>

        </figure>
        <figure class="col-sm-2">
            <p>Carbohydrate:<?= $data['macro']->getCarbohydrate() ?></a></p>

        </figure>
        <figure class="col-sm-2">
            <p></a></p>

        </figure>
        
        <figure class="col-sm-2">
            <p></a></p>
<?php endif; ?>
        </figure>

      
<?php if (!$data['personalData']->getState()): 
    ?>
        <a href="http://localhost/Tren/public/Macros/userTwo">Give us the rest of necessery details to calculate your macros and calories.</a>
<?php endif; ?>

</section>