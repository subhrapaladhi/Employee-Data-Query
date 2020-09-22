<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employee Data</title>
</head>

<style>
h1{
    text-align: center;
    font-size: 300%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
table{
    margin-left: auto;
    margin-right: auto;
}
th, td{
    width: 100px;
    padding: 2%;
    text-align: center;
}
</style>

<body>
    <h1>Employee List</h1>

<?php
    $conn = new mysqli("localhost","root","","Employee");
    if($conn->connect_error){
        die("Connection to Mysql failed");
    }

    if(isset($_POST['submit'])){
        $q = "SELECT Deptid FROM employee WHERE Empid=".$_POST['empid'].' AND Empname="'.$_POST['empname'].'"';
        $ans = $conn->query($q);

        // Check if department id is found
        if($ans->num_rows>0){
            $departmentID = $ans->fetch_assoc()['Deptid'];
        
            $query = "SELECT * FROM employee WHERE deptid=".$departmentID;
            $result = $conn->query($query);
            
            // Check if any employee for that department is found
            if($result->num_rows > 0){
                echo "
                <table>
                <tr>
                    <th>Empid</th>
                    <th>Empname</th>
                    <th>DOB</th>
                    <th>Basic Pay</th>
                    <th>Deptid</th>
                </tr>";

                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <td>".$row['Empid']."</td>
                        <td>".$row['Empname']."</td>
                        <td>".$row['DOB']."</td>
                        <td>".$row['Basicpay']."</td>
                        <td>".$row['Deptid']."</td>
                    ";
                }
                echo"</table>";
            } else {
                echo "No Data in table";
            }
        } else {
            echo "no employee with that employee id and name found";
        }
    } else {
        echo "no data found";
    }
?>
</body>
</html>