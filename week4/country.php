<!DOCTYPE HTML>
<html>  
  <body>
  <form action="<?php echo $_SERVER["PHP_SELF"]?>"  method="get">
    country: <select name="country">
        <option value="USA">USA</option>
        <option value="china">china</option>
        <option value="malaysia">malaysia</option>
        <option value="india">india</option>
        <option value="iran">iran</option>
        <option value="ukrain">ukrain</option>
        <option value="uganda">uganda</option>
        <option value="uk">uk</option>
        <option value="thailand">thailand</option>
        <option value="isreal">isreal</option>
        </select>
        <br></br>
    date of birth:<br>
    <label for="day">Select Day:</label>
    <select name="day" id="day">
        <?php
        for ($i = 1; $i <= 31; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        ?>
    </select>

    <label for="month">Select Month:</label>
    <select name="month" id="month">
        <?php
        for ($i = 1; $i <= 12; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        ?>
    </select>

    <label for="year">Select Year:</label>
    <select name="year" id="year">
        <?php
        for ($i = 2000; $i <= 2024; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        ?>
    </select>
    <br><br>
    gender:<input type="radio"name="gender" value="male">male
    <input type="radio"name="gender" value="female">female<br></br>
<input type="submit"><br></br>
    </form>
  </body>
</html>
<?php 
if(!empty($_GET))
{
    $country=$_GET['country'];
    $day=$_GET['day'];
    $month=$_GET['month'];
    $year=$_GET['year'];
    $gender=$_GET['gender'];

// If no errors, calculate age and display results
if (empty($errors)) {
    // Calculate age
    $birthDate = new DateTime("$year-$month-$day");
    $today = new DateTime();
    $age = $today->diff($birthDate)->y;

    // Display selected values and age
    echo "Country: $country <br>";
    echo "Date of Birth: $day/$month/$year <br>";
    echo "Gender: $gender <br>";
    echo "Age: $age years old <br>";
}
}
?>