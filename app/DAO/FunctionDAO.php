<?php
 include 'BaseDAO.php';
 
 
  class FunctionDAO extends BaseDAO{
  
  /*--------------------------------index----------------------------------------------------------------*/
	function LogInUser($username,$password){
		
			$this->openCon();
			
				$stmt= $this->con->prepare("SELECT user_username,user_password FROM users where user_username=? and user_password=?;");
				$stmt->bindParam(1,$username);
				$stmt->bindParam(2,$password);
				
				$stmt->execute();
		
				 
					if($row=$stmt->fetch() ){
						return true;
					}else{
						return false;
					}
				 
				
			$this->closeCon();
		}
		function add_user($firstname,$lastname,$address,$contact_info,$email,$username,$password) {
				$this->openCon();
				
				$stmt = $this->con->prepare("INSERT INTO users (user_name,user_lastname,user_address,user_contact_info,user_email_address,user_username,user_password) VALUES (?,?,?,?,?,?,?)");
				$stmt->bindParam(1, $firstname);
				$stmt->bindParam(2, $lastname);
				$stmt->bindParam(3, $address);
				$stmt->bindParam(4, $contact_info);
				$stmt->bindParam(5, $email);
				$stmt->bindParam(6, $username);
				$stmt->bindParam(7, $password);
				$stmt->execute();
				
				$this->closeCon();
		}
		function view_fiesta(){
			$this->openCon();
			$stmt=$this->con->prepare("SELECT * from fiesta_tbl");
			$stmt->execute();
			$get_total_rows->fetch();
			while($row = $stmt->fetch() ){
					echo "<tr id=".$row[0].">";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "<td>".$row[4]."</td>";
					echo "</tr>";
					
				}
				$this->closeCon();			
		}
	
		/*----------------------------------------------USERSINTERFACE-----------------------------------------*/
			function view_data(){
		   $this->openCon();

		   	$stmt=$this->con->prepare("SELECT * FROM places_TLAIB ORDER BY places_id DESC");
		   	$stmt->execute();
		   	while($row = $stmt->fetch() ){
					echo "<tr id=".$row[0].">";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "<td>".$row[4]."</td>";
					echo "<td><i class=' icon-thumbs-up' title ='Like' onclick = 'like(".$row[0].")'></i></td>";

					echo "</tr>";
					
				}
			
			$this -> closeCon();
		}
		function option_search($select_input){
			$this->openCon();

			$stmt=$this->con->prepare("SELECT * FROM places_TLAIB WHERE places_classification=?");
			$stmt->bindParam(1, $select_input);
			$stmt->execute();
			while($row = $stmt->fetch() ){
					echo "<tr id=".$row[0].">";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "<td>".$row[4]."</td>";
					echo "<td><i class=' icon-thumbs-up' title ='Like' onclick = 'like(".$row[0].")'></i></td>";
					echo "</tr>";
					
				}

		}
		
		
		function add_places($places_id, $place_name,$place_location,$place_description,$place_classification,$username){
			$this->openCon();
			
			$stmt = $this->con->prepare("INSERT INTO places_TLAIB (places_name,places_location,places_description,places_classification) values(?,?,?,?)");
			$stmt->bindParam(1, $place_name);
			$stmt->bindParam(2, $place_location);
			$stmt->bindParam(3, $place_description);
			$stmt->bindParam(4, $place_classification);
			$stmt->execute();
			$places_id=$this->con->lastInsertId();

			$stmt1=$this->con->prepare("SELECT user_id FROM users WHERE user_username=?");
        	$stmt1->bindParam(1, $username);
        	$stmt1->execute();
        	$users_id=$stmt1->fetch();

        	$stmt2=$this->con->prepare("INSERT INTO fave_places(users_id,places_id)values(?,?)");
        	$stmt2->bindParam(1, $users_id[0]);
        	$stmt2->bindParam(2, $places_id);
        	$stmt2->execute();

			echo "<script> alert('places successfully added'); </script>";
			
			$this->closeCon();
		}
		function add_events($id,$event_name,$organizer,$people,$event_date,$event_held,$username){
			$this->openCon();

			$stmt=$this->con->prepare("INSERT INTO events_tbl(events_name,organizer,invited_people,events_date,events_held)VALUES(?,?,?,?,?)");
			$stmt->bindParam(1, $event_name);
			$stmt->bindParam(2, $organizer);
			$stmt->bindParam(3, $people);
			$stmt->bindParam(4, $event_date);	
			$stmt->bindParam(5, $event_held);
			$stmt->execute();
			$id=$this->con->lastInsertId();
			
			$stmt2=$this->con->prepare("SELECT user_id FROM users WHERE user_username=?");
			$stmt2->bindParam(1,$username);
			$stmt2->execute();
			$user_id=$stmt2->fetch();
			
			$stmt3=$this->con->prepare("INSERT INTO invited_tables (users_id,events_id)values(?,?)");
			$stmt3->bindParam(1,$user_id[0]);
			$stmt3->bindParam(2,$id);
			$stmt3->execute();
			
			$this->closeCon();
	
		}
		function view($username){
			$this->openCon();
			$stmt= $this->con->prepare("SELECT DISTINCT * FROM places_TLAIB as pt,users as u,fave_places as fp WHERE fp.users_id=u.user_id AND fp.places_id=pt.places_id AND u.user_username=?");
			$stmt->bindParam(1,$username);

			$stmt->execute();

			
			while($row = $stmt->fetch()){
			   echo "<tr id=".$row[0].">";
				echo "<td>".$row[1]."</td>";
				echo "<td>".$row[2]."</td>";
				echo "<td>".$row[3]."</td>";
				echo "<td>".$row[4]."</td>";
				echo "<td><i class='icon-remove'  onclick='user_delete(".$row[0].")'></i></td>";
				echo "<td><i class='icon-pencil' title ='Edit Data' onclick='user_edit(".$row[0].")'></i></td>";
				echo "</tr>";
			}
			$this->closeCon();

		}
		function view_events(){
			$this->openCon();
			$stmt= $this->con->prepare("SELECT * FROM events_tbl ORDER BY date_entered DESC");

			$stmt->execute();

			while($row = $stmt->fetch()){
			   echo "<tr id=".$row[0].">";
				echo "<td>".$row[1]."</td>";
				echo "<td>".$row[2]."</td>";
				echo "<td>".$row[3]."</td>";
				echo "<td>".$row[4]."</td>";
				echo "<td>".$row[5]."</td>";
				echo "<td>".$row[6]."</td>";		
				echo "<td><button id='accept' class='btn btn-info'  onclick='accept_event(".$row[0].")'>Accept invitation</button></td>";
				echo "<td><button id='ignore' class='btn btn-danger'  onclick='ignore_event(".$row[0].")'>Ignore invitaion</button></td>";
				echo "</tr>";
			}
			$this->closeCon();

		}
		function accept($id,$username){
			$this->openCon();
			$stmt=$this->con->prepare("SELECT users_id FROM invite AS it, users AS u, events_tbl AS et WHERE u.user_id = it.users_id AND et.events_id = it.events_id AND it.events_id =?");
			$stmt->bindParam(1, $id);
			$stmt->execute();
			$user_invite_id=$stmt->fetch();

			$stmt1=$this->con->prepare("SELECT user_id FROM users WHERE user_username= ?");
			$stmt1->bindParam(1, $username);
			$stmt1->execute();
			$user_accept_id=$stmt1->fetch();

			$stmt2=$this->con->prepare("INSERT INTO notifications_tbl(users_notified_id,users_notify)values(?,?)");
			$stmt2->bindParam(1, $user_invite_id[0]);
			$stmt2->bindParam(2, $user_accept_id[0]);
			$stmt2->execute();
			
			$this->closeCon();
		
		}
	
	function userdelete($id){
		$this->openCon();

		$stmt=$this->con->prepare("DELETE from places_TLAIB where places_id=?");
		$stmt->bindParam(1, $id);
	    $stmt->execute();
	    $places_id=$stmt->fetch();
	    $this->closeCon();

		
	}
	function usersprofile($username){
		$this->openCon();
		$stmt=$this->con->prepare("SELECT user_id,user_name,user_lastname,user_address,user_contact_info,user_email_address,user_username,user_password FROM users WHERE user_username=? ");
		$stmt->bindParam(1, $username);
		$stmt->execute();
			while($row = $stmt->fetch()){
				echo "<div id=".$row[0].">";
				echo "Name :".$row[1].", ".$row[2]." <br/><br/>";
				echo "Address : ".$row[3]."<br /><br/>";
				echo "Contact Info : ".$row[4]."<br /><br/>";
				echo "Email Address: ".$row[5]."<br /><br/>";
				echo "Username : ".$row[6]."<br /><br/>";
				echo "Password :".$row[7]."<br /><br/>";
				echo "</div>";
			}
		$this->closeCon();

		}
		function search_name($search){
			$this->openCon();
			$stmt=$this->con->prepare("SELECT * from places_TLAIB WHERE  places_name=%?%");
			$stmt->bindParam(1, $search);
			$stmt->execute();
			while ($row=$stmt->fetch()){
				echo "<tr id=".$row[0].">";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "<td>".$row[4]."</td>";
					echo "<td><i class=' icon-thumbs-up' title ='Like' onclick = 'like(".$row[0].")'></i></td>";
					echo "</tr>";
			}

			$this->closeCon();
		}
		function likes_users($id,$username){
			$this->openCon();
			$stmt=$this->con->prepare("SELECT user_id from users WHERE user_username=?");
			$stmt->bindParam(1, $username);
			$stmt->execute();
			$user_id=$stmt->fetch();

			$stmt1=$this->con->prepare("INSERT INTO like_places(users_id,places_like)values(?,?)");
			$stmt1->bindParam(1, $user_id[0]);
			$stmt1->bindParam(2, $id);
			$stmt1->execute();

			$this->closeCon();

		}
		function total_likes(){
			$this->openCon();
			$stmt=$this->con->prepare("");
	
		}
		function view_notification($username){
			$this->openCon();
			$stmt=$this->con->prepare("SELECT ");


			$this->closeCon();

		}
/*----------------------Admin---------------------------------*/
	function count_user(){
		$this->openCon();

		$stmt=$this->con->prepare("SELECT COUNT(user_id) from users");
		$stmt->execute();

		while($row=$stmt->fetch()){
			echo "<blink>Users Total Number: " .$row[0]."</blink><br />";
		}

		$this->closeCon();
	}	
	function user_tracker(){
		$this->openCon();

		$stmt=$this->con->prepare("SELECT user_id,user_name,user_lastname,user_address,user_contact_info,user_email_address,date FROM users ORDER BY date DESC");

		$stmt->execute();

		while($row=$stmt->fetch()){
			echo "<tr id=".$row[0].">";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "<td>".$row[4]."</td>";
			echo "<td>".$row[5]."</td>";
			echo "<td>".$row[6]."</td>";
			echo "</tr>";

		}
		$this->closeCon();

	}	

	function manage_data(){
		$this->openCon();
		$stmt=$this->con->prepare("SELECT pt.places_id,places_name,places_location,places_description,places_classification,user_username FROM  users AS u, places_TLAIB AS pt,fave_places AS fp WHERE fp.users_id=u.user_id AND fp.places_id=pt.places_id");

		$stmt->execute();


		while($row=$stmt->fetch()){
			echo "<tr id=".$row[0].">";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "<td>".$row[4]."</td>";
			echo "<td>".$row[7]."</td>";
			echo "</tr>";

		}
		$this->closeCon();

	}
	function email_confirmation($user_id){
		$this->openCon();

		$stmt=$this->con->prepare("SELECT user_email_address ,user_name,user_lastname from users where user_id=?");

		$stmt->execute();

		$this->closeCon();
	}
	


			}
?>
