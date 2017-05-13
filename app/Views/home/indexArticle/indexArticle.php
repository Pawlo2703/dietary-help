
Hello, <?= $data['user']->getLogin() ?>
<section class="container">
    
    <div class="row">
        
        <figure class="col-sm-2">    
            <p>Protein:<?= $data['user']->getProtein() ?></a></p>

        </figure>
        <figure class="col-sm-2">
            <p>Fat:<?= $data['user']->getFat() ?></a></p>

        </figure>
        <figure class="col-sm-2">
            <p>Carbohydrate:<?= $data['user']->getCarbohydrate() ?></a></p>

        </figure>
        <figure class="col-sm-2">
            <p>Weight:<?= $data['user']->getWeight() ?></a></p>

        </figure>
        
        <figure class="col-sm-2">
            <p>Goal:<?= $data['user']->getState() ?></a></p>

        </figure>

        
<?php if (!$data['user']->getState()): 
    ?>
        <a href="http://localhost/Tren/public/Macros/userTwo">Give us the rest of necessery details.</a>
<?php endif; ?>

</section>