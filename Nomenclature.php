<?php 

class Nomenclature{
	
	public function generateNewNomForm(){
		print(" <br><br><br><form action = addNewNom.php method=post>
			New Nomenclature: <input name=nomName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form></body></html>
		");
	}
	public function generateSelectNomForm(){
		print(" <br><br><br><form action = selNom.php method=post>
			Select Nomenclature: <input name=nomName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form></body></html>
		");
	}
	public function generateUpdateNomForm(){
		print(" <br><br><br><form action = upNom.php method=post>
			Update Nomenclature: <input name=nomName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form></body></html>
		");
	}
	public function generateDeleteNomForm(){
		print(" <br><br><br><form action = delNom.php method=post>
			Delete Nomenclature: <input name=nomName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form></body></html>
		");
	}

}
?>