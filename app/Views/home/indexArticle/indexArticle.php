

<section class="container">
    Hello, <?= $data['user']->getLogin() ?>


    <table class="table">
        <thead>
            <tr>  
                <th>Macros:</th>

                <th>Info:</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Protein:<?= $data['macro']->getProtein() ?></td>
                <td>Calories: <?= $data['macro']->getCalories() ?></td>
            </tr>
            <tr>
                <td>Fat:<?= $data['macro']->getFat() ?></td>
                <td>Last weeks avarge weight:<?php
                    if ($data['weight']->getAvgWeightLW() > 1):
                        ?>
                        <?= $data['weight']->getAvgWeightLW() ?>
                    <?php endif; ?></td>
            </tr>
            <tr>
                <td>Carbohydrate:<?= $data['macro']->getCarbohydrate() ?></td>
                <?php
                    if ($data['person']->getState()): ?>
                <td>Goal: <?= $data['person']->getState() ?><?php endif; ?></td>
                
            </tr>
        </tbody>
    </table>


    <?php
    $today = date("Y-m-d");
    if (($data['person']->getDate()) < $today):
        ?>
        <div class="reg">
            <form method="post" action="http://localhost/Tren/public/weight/saveWeight">
                <label><b>Todays weight:</b></label> <input autocomplete="off" name="weight" type="text" placeholder="Weight">


                <button type="submit" >Submit</button>
            </form>
        </div>
    <?php endif; ?>


    <?php
    $today = date('w');
    $today2 = date("Y-m-d");

    if (($today == '4') && (($data['person']->getDate()) == $today2) && (($data['person']->getIsSunday()) == 0) && ($data['weight']->getAvgWeightLW() > 1)) :
        ?>
        <div class="reg">
            <form method="post" action="http://localhost/Tren/public/weight/weightcompare">
                <label><b>Compare your weekly weigh ins, and see if we need to change macros:</b></label>

                <button type="submit" >Submit</button>
            </form>
        </div>
    <?php endif; ?>
</section>