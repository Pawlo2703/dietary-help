

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
                <td>Last weeks avarge weight:<?= $data['weight']->getAvgWeightLW() ?></td>
            </tr>
            <tr>
                <td>Carbohydrate:<?= $data['macro']->getCarbohydrate() ?></td>
                <td>Goal: <?= $data['person']->getState() ?></td>
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



</section>