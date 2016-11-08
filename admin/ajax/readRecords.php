<?php

	include("connection.php");

	$query = "SELECT * FROM divisi_tb";
	$result = $conn->query($query);
	
	if (!$result) {
        die("connection failed" . $conn->mysqli_error);
    }


    if(mysqli_num_rows($result) > 0)
    {
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data = '<tr>
				<td>'.$row['id_divisi'].'</td>
				<td>'.$row['divisi_name'].'</td>
				<td>
					<button onclick="GetUserDetails('.$row['id_divisi'].')" class="btn btn-warning">Update</button>
					<button onclick="DeleteUser('.$row['id_divisi'].')" class="btn btn-danger">Delete</button>
				</td>
				</tr>';
    	}
    }
    else
    {

    	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }


    echo $data;
?>