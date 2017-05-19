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
    
    <form method="post" action="http://localhost/Tren/public/Macros/saveDetails">
       <p>Current Weight:</p><input autocomplete="off" name="weight" type="text" placeholder="weight">
       <p>Current Height:</p><input autocomplete="off" name="height" type="text" placeholder="height">
      <p>Your goal:</p><select name="state">
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


