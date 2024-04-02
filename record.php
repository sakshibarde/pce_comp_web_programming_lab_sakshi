<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
 
// Get data from database 
$res = $conn->query("SELECT * FROM register ORDER BY username DESC"); 
?>

<!-- Display  data from database -->
<?php if($res->num_rows > 0){ ?> 
    <div class="gallery"> 
<table>
    <?php while($row = $res->fetch_assoc()){ ?> 
    <tr><td><?php echo $row['username']?><td>
       <td><?php echo $row['email']?><td>
       <td>><?php echo $row['password']?> </td>
    </tr>
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Data not found...</p> 
<?php } ?>

<style>
    .gallery{
        width: 100%;
        border-collapse: collapse;
    }
    td {
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }
</style>