<!DOCTYPE html>
<head>
    <title>Employee Data</title>
</head>

<style>
    h1{
        text-align: center;
        font-size: 300%;
    }
    form{
        padding-left: 40%;
        font-size: 125%;
    }
    input{
        font-size: 85%;
    }
    select{
        font-size: 100%;
    }
</style>

<body>
    <h1>Choose Employee</h1>
<?php
    // require('conn.php');
    $conn = new mysqli("localhost","root","","Employee");
    if($conn->connect_error){
        die("Connection to Mysql failed");
    }
?>

    <form action="./index.php" method="post">
        <label for="empid">Employee ID: </label>
        <select name="empid" id="empid">
            <?php
                $query = "SELECT Empid FROM employee";
                $result = $conn->query($query);
                if ($result->num_rows < 0){
                    echo "No Data in table";
                }else{
                    while($row = $result->fetch_assoc()){
                        echo '<option value="'.$row["Empid"].'">'.$row["Empid"].'</option>';
                    }
                }
            ?>
        </select>

        <br>
        <br>
        
        <label for="empname">Employee Name: </label>
        <select name="empname" id="empname">
            <?php
                $query = "SELECT Empname FROM employee";
                $result = $conn->query($query);
                if ($result->num_rows < 0){
                    echo "No Data in table";
                }else{
                    while($row = $result->fetch_assoc()){
                        echo '<option value="'.$row["Empname"].'">'.$row["Empname"].'</option>';
                    }
                }
            ?>
        </select>

        <br>
        <br>
        
        <input type="submit" name="submit">
    </form>
</body>
</html>