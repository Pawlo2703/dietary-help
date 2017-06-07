
<!-- header !-->
<?php
include __DIR__ . '/../headfoot/header.php'
?>

<body>
    <!-- menu & img !-->
    <?php
    include __DIR__ . '/../headfoot/menu.php'
    ?>
 <form method="post" action="http://localhost/Tren/public/MealPreferences/changeMacro">
  <p>Your diet calorie sources:</p><select class="body_text" name="prefs">
                <option>Choose one..</option>
                <option value="1">High Carb (80%)/(20%) Low fat</option>
                <option value="2">High Carb (70%)/(30%) Low fat</option>
                <option value="3">Moderate Carb(60%)/(40%)Moderate fat</option>
                <option value="4">Moderate Carb(50%)/(50%)Moderate fat</option>
                <option value="5">Low Carb(40%)/(60%)High fat</option>
                <option value="6">Low Carb(30%)/(70%)High fat</option>
  </select></br>
 

        <button type="submit" >Submit</button>
    </form>

    
    <!-- footer !-->
    <?php
    include __DIR__ . '/../headfoot/footer.php'
    ?>

  
</body>
</html>


