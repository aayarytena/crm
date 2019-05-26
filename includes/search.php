<?php
	if (isset($_GET['search'])) {
		include 'conn.php';

		$search = $_GET['search'];

		$sql =  "SELECT * FROM customeraccounts WHERE customerlname LIKE '$search%' OR customerfname LIKE '$search%'";
		$result = $conn->query($sql);


		if ($row = $result->num_rows > 0 ) {
			echo '
					<table class="table table-bordered">
				     <thead>
				       <tr>
				         <th scope="col">ID</th>
				         <th scope="col">Fullname</th>
				         <th scope="col">Email</th>
				         <th scope="col">Contact No.</th>
				       </tr>
				     </thead>
				     <tbody>
			';
		  foreach ($result as $data){
		  	$name = $data['customerfname'].' '.$data['customerlname'];
		  	echo '
		  		<tr>
		  			<th style="font-weight: normal" scope="row">'.$data['id'].'</th>
		  			<th style="font-weight: normal"><a href="account.php?id='.$data['id'].'&name='.$name.'">'.$data['customerfname'].' '.$data['customerlname'].'</a></th>
		  			<th style="font-weight: normal">'.$data['customereemail'].'</th>
		  			<th style="font-weight: normal">'.$data['customerbirthday'].'</th>
		  		</tr>
		  	';
		  }
		  echo '
		  	  </tbody>
		  	</table>
		  ';
		}else{
		  echo '<div class="alert alert-danger" role="alert">
		        No Result Found! Try Again.
		      </div>';
		}
	}


              
            