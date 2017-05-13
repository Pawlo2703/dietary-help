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
    <h1>Put your current macros below</h1>
    <form method="post" action="http://localhost/Tren/public/Macros/saveMacros">
       <input autocomplete="off" name="protein" type="text" placeholder="Pros">
       <input autocomplete="off" name="fat" type="text" placeholder="Fats">
       <input autocomplete="off" name="carbs" type="text" placeholder="Carbs">
     <button  type="submit" >Submit</button>
    </form>
</div>
    
    <!-- footer !-->
    <?php
    include('headfoot/footer.php')
    ?>

  
</body>
</html>


