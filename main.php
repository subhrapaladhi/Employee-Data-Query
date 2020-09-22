<!DOCTYPE html>
<head>
    <title>Employee Data</title>
</head>
<body>

<?php
    // require('conn.php');
    $conn = new mysqli("localhost","root","","Employee");
    if($conn->connect_error){
        die("Connection to Mysql failed");
        echo "flkdsfj";
    }
    //get all data from sql
    $query = "SELECT * FROM employee";
    $result = $conn->query($query);
    if ($result->num_rows < 0){
        echo "No Data in table";
    }
?>

    <form action="index.php">
        <label for="empid">Employee ID</label>
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
        
        <label for="empname">Employee Name</label>
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
        
        <label for="empname">Date of Birth</label>
        <select name="dob" id="dob">
            <?php
                $query = "SELECT DISTINCT DOB FROM employee";
                $result = $conn->query($query);
                if ($result->num_rows < 0){
                    echo "No Data in table";
                }else{
                    while($row = $result->fetch_assoc()){
                        echo '<option value="'.$row["DOB"].'">'.$row["DOB"].'</option>';
                    }
                }
            ?>
        </select>

        <br>
        
        <label for="empname">Basic Pay</label>
        <select name="pay" id="pay">
            <?php
                $query = "SELECT DISTINCT Basicpay FROM employee";
                $result = $conn->query($query);
                if ($result->num_rows < 0){
                    echo "No Data in table";
                }else{
                    while($row = $result->fetch_assoc()){
                        echo '<option value="'.$row["Basicpay"].'">'.$row["Basicpay"].'</option>';
                    }
                }
            ?>
        </select>
        <br>
        <label for="empname">Department ID</label>
        <select name="deptid" id="deptid">
            <?php
                $query = "SELECT DISTINCT Deptid FROM employee";
                $result = $conn->query($query);
                if ($result->num_rows < 0){
                    echo "No Data in table";
                }else{
                    while($row = $result->fetch_assoc()){
                        echo '<option value="'.$row["Deptid"].'">'.$row["Deptid"].'</option>';
                    }
                }
            ?>
        </select>
        
        <br>

        <input type="submit">
    </form>
</body>
</html>