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
    <h1>Give us more information about yourself:</h1>
    <form method="post" action="http://localhost/Tren/public/Macros/saveDetails">
       <input autocomplete="off" name="weight" type="text" placeholder="weight">
      <select name="state">
  <option >Bulking</option>
  <option >Cutting</option>

</select>
     <button  type="submit" >Submit</button>
    </form>
</div>
    
    <!-- footer !-->
    <?php
    include('headfoot/footer.php')
    ?>

  
</body>
</html>


