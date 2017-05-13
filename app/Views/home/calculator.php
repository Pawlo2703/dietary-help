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
    <h1>Calculate your macro intake</h1>
    <form method="post" action="http://localhost/Tren/public/calc/saveMacros">
        <label><b>Age:</b></label> <input autocomplete="off" name="age" type="text" placeholder="Age">
        <label><b>Weight:</b></label> <input autocomplete="off" name="weight" type="text" placeholder="Weight">
        <label><b>Height:</b></label> <input autocomplete="off" name="height" type="text" placeholder="Height">
        <label><b>Gender:</b></label><select name="gender">
  <option >Male</option>
  <option >Female</option></select>
        
        <label><b>Workout intensity:</b></label><select name="workout">
  <option >Low</option>
  <option >Moderate</option>
  <option >Intense</option></select>
<label><b>Time:</b></label><input autocomplete="off" name="workouttime" type="text" placeholder="Time">
<label><b>Times a week:</b></label><input autocomplete="off" name="workouttimesaweek" type="text" placeholder="Time">

  <label><b>Cardio intensity:</b></label><select name="cardio">
  <option >Low</option>
  <option >Moderate</option>
  <option >Intense</option></select>
  <label><b>Time:</b></label><input autocomplete="off" name="cardiotime" type="text" placeholder="Time">
<label><b>Times a week:</b></label><input autocomplete="off" name="cardiotimesaweek" type="text" placeholder="Time">
 
    <label><b>Daily activity outside the gym:</b></label><select name="activity">
  <option >Setendary</option>
  <option >Moderate</option>
  <option >Intense</option></select>
  

        <button type="submit" >Submit</button>
    </form>
</div>
    
    <!-- footer !-->
    <?php
    include('headfoot/footer.php')
    ?>

  
</body>
</html>


