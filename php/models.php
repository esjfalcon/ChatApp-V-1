<?php 

class users
{
	protected $servername = "localhost";
	protected $dbname = "chatapp";
	protected $password = "";
	protected $tbname = "users";
	protected $username="root";
	protected $conn;




	public function __construct(){
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		

		
	}



	public function insert($og, $ic, $message){
		echo $og;
		echo $ic;
		echo $message;
		if (!empty($message)) {
			// $query = "INSERT INTO messages (sender_id, reciever_id, body) VALUES($og, $ic, $message)";
			$query = "INSERT INTO messages (sender_id, reciever_id, body) VALUES ('$og', '$ic', '$message')";
			$sql = $this->conn->query($query);
			if ($sql) {
				echo "inserted";
			}else{
				echo "not inserted";
			}
		}
	}



	public function message($r_id, $s_id){
			$data = "";
			$query = "SELECT * FROM messages 
					  LEFT JOIN users on users.unique_id = messages.sender_id
						where (sender_id = '$s_id' and reciever_id = '$r_id') OR 
					  (sender_id = '$r_id' and reciever_id = '$s_id') ORDER BY messages.id";
			$sql = $this->conn->query($query);

			$num_rows = $sql->num_rows;
			if ($num_rows>0) {
				while ($row = mysqli_fetch_assoc($sql)) {
					if ($row['reciever_id'] === $s_id) {
						$data .='<div class="chat outgoing">
								  <div class="details">
								  <p>'.$row['body'].'</p>
								  </div>
								  </div>';
					}else{
						$data .='<div class="chat incoming">
								 <img src="php/images/'.$row['img'].'" alt="">
								  <div class="details">
								  <p>'.$row['body'].'</p>
								  </div>
								  </div>';
					}
				}
				echo $data;
			}

		return $data;

	}


	public function user(){
		$data= null;
		$id = $_SESSION['unique_id'];

		$query = "SELECT * FROM users where unique_id = '$id'";
		if ($sql = $this->conn->query($query)){
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
		return $data;
         
	}

					// $output .='<a href="chat.php?user_id='. $row['unique_id'] .'">
     //                <div class="content">
     //                <img src="php/images/'. $row['img'] .'" style="height: 50px;" alt="">
     //                <div class="details">
     //                    <span>'. $row['fnam']. " " . $row['lname'] .'</span>
     //                    <p>message</p>
     //                </div>
     //                </div>
     //                <div class="status-dot"><i class="fas fa-circle"></i></div>
     //            </a>';

	public function users($id){
		$output ="";
		$query = "SELECT * FROM users where not unique_id = '$id'";

		if ($sql = $this->conn->query($query)){
			while($row = mysqli_fetch_assoc($sql)){
				$uid = $_SESSION['unique_id'];
				$test_id = $row['unique_id'];
				$query2 = "SELECT * FROM messages where (sender_id='$uid' OR sender_id='$test_id') AND (reciever_id='$test_id' OR reciever_id='$uid')
				ORDER BY id DESC LIMIT 1";
				
				$sql2 = $this->conn->query($query2);
				// print_r($sql2);
					if ($sql->num_rows>0) {
						while($row2 = mysqli_fetch_assoc($sql2)){
						 $res =  $row2['body'];			 
					}
					}else{
						$res = "NO message yet!!";
					}

				(strlen($res) > 15) ? $msg = substr($res, 0, 15).'...': $msg=$res;

				$output.= '<a href="chat.php?user_id='. $row['unique_id'] .'">
							<input type="hidden" name="idd" value="'.$row['unique_id'].'">
				           <div class="content">
				           <img src="php/images/'. $row['img'] .'" style="height: 50px;" alt="">
				           <span>'. $row['fnam']. " " . $row['lname'] .'</span>
				           <p>'.$msg.'</p>
				           </div>
				           </div>
				           <div class="status-dot"><i class="fas fa-circle"></i></div>
				           </a>';
			}
		}else{
			echo "No users available" ;
		}
		echo $output;
	
         
	}


	public function login($email, $password){
		session_start();
		$data = null;
		if (!empty($email) && !empty($password)) {
			$user_pass = md5($password);
			$query = "SELECT * from users where email = '$email' and password = '$user_pass'";
			$sql = $this->conn->query($query);
			$num_rows = $sql->num_rows;
			if ($num_rows === 1) {
				$row = mysqli_fetch_assoc($sql);
				$_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";			
			}else{
				echo "username or password is incorrect";
			}
		}else{
			echo "All field should not be empty";
		}
	}


// search method


	public function search($search){
		session_start();
		$output = "";
		$id = $_SESSION['unique_id'];
		$query = "SELECT * FROM users where fnam LIKE '%{$search}%' OR lname LIKE '%{$search}%'";
		$sql = $this->conn->query($query);

		// print_r($sql);
		if ($sql = $this->conn->query($query)){
			while($row = mysqli_fetch_assoc($sql)){
					$output.= '<a href="chat.php?user_id='. $row['unique_id'] .'">
							<input type="hidden" name="idd" value="'.$row['unique_id'].'">
				           <div class="content">
				           <img src="php/images/'. $row['img'] .'" style="height: 50px;" alt="">
				           <span>'. $row['fnam']. " " . $row['lname'] .'</span>
				           <p></p>
				           </div>
				           </div>
				           <div class="status-dot"><i class="fas fa-circle"></i></div>
				           </a>';

				       }
		}else{
			$output.="No users founded!";
		}
	}





	public function signup($fname, $lname, $email, $password){
		if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
			$query = "SELECT * FROM users where email = '$email'";
			$sql = $this->conn->query($query);
			$num_rows = $sql->num_rows;
			if ($num_rows>0) {
				echo "this email is already exists";
			}else{
				if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
                    

                    $extensions = ["jpeg", "png", "jpg"];

                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);
                                $status = "Active";
                                $encrypt_pass = md5($password);
                                $query1 = "INSERT INTO users (unique_id, fnam, lname, email, password, img, status) VALUES('$ran_id', '$fname', '$lname', '$email', '$encrypt_pass', '$new_img_name', '$status')";
                                
                                $sql1 = $this->conn->query($query1);
                                if($sql1){
                                    $query2 = "SELECT * FROM users where email = '$email'";
									$sql2 = $this->conn->query($query2);
									$rows = $sql2->num_rows;
                                    if($rows > 0){
                                    	$result = $sql2->fetch_assoc();
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                       
                                        echo "success";
                                    }else{
                                        echo "This email address not Exist!";
                                    }
                                }else{
                                    echo "Something went wrong. Please try again!";
                                }
                            }
                        }else{
                            echo "Please upload an image file - jpeg, png, jpg";
                        }
                    }else{
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }
                else{
                    	echo "upload a valid image file";
                    }
			}
		}else{
			echo "All field are required";
		}
	}
}