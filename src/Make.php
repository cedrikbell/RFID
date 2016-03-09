<?php 

class Make{
	
	public function generateNewMakeForm(){
		print(" <br><br><br><form action = addNewMake.php method=post>
			New Make: <input name=makeName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateSelectMakeForm(){
		print(" <form action = selMake.php method=post>
			Select Make: <input name=makeName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateUpdateMakeForm(){
		print(" <form action = upMake.php method=post>
			Update Make: <input name=makeName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateDeleteMakeForm(){
		print(" <form action = delMake.php method=post>
			Delete Make: <input name=makeName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}

			
			
			
			
			
			
			
	//public function getNewMake(){
	
	
	//}
	
	/*function getMakeID() 
<form action="createLocation.php" method="post">
	Room Number: <input name="roomNumber" type="text" ><br>
	Created: <input name="created_at" type="text">
	Updated: <input name="updated_at" type="text"><br>
	<input value="Submit Data" type="Submit">
</form>

	<?php

class make
{
	public $prop1 = "<form action='addNewMake.php' method='post'>
	<p>Make: <input type = 'text' name = 'make'></p>
	<p>Model: <input type = 'text' name = 'model'></p>
	<input type='submit' value='Submit'>
	</form>";
	
	public function getForm()
    {
      return $this->prop1 . "<br />";
    }
}
	
	$newobj = new make;
	
	echo $newobj->getForm();	



/*	
	{//returns makeID from makes table
		$sql = "SELECT $makeName from makes";
	}
	function getMakeName()
	{
	
	}
	function setMakeName($newName)
	{
	
	}
	function generateNewMakeForm(){
	
	
	}
	function processNewMake()
	{
	
	}

	*/
	}
?>