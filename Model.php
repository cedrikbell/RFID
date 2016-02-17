<?php 

class Model{
	
	public function generateNewModelForm(){
		print(" <br><br><br><form action = addNewModel.php method=post>
			New Model: <input name=modelName type=text ><br>
			Make:<input name=makeName type=text ><br>
			Nomenclature:<input name=nomName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form></body></html>
		");
	}
	public function generateSelectModelForm(){
		print(" <br><br><br><form action = selModel.php method=post>
			Select Model: <input name=modelName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form></body></html>
		");
	}
	public function generateUpdateModelForm(){
		print(" <br><br><br><form action = upModel.php method=post>
			Update Model: <input name=modelName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form></body></html>
		");
	}
	public function generateDeleteModelForm(){
		print(" <br><br><br><form action = delModel.php method=post>
			Delete Model: <input name=modelName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form></body></html>
		");
	}

}
?>