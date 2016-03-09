<?php 

class Model{
	
	public function generateNewModelForm(){
		print(" <form action = addNewModel.php method=post>
			New Model: <input name=modelName type=text ><br>
			Make:<input name=makeName type=text ><br>
			Nomenclature:<input name=nomName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateSelectModelForm(){
		print(" <form action = selModel.php method=post>
			Select Model: <input name=modelName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateUpdateModelForm(){
		print(" <form action = upModel.php method=post>
			Update Model: <input name=modelName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateDeleteModelForm(){
		print(" <form action = delModel.php method=post>
			Delete Model: <input name=modelName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}

}
?>