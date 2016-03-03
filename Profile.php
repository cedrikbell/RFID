<?php 

class Profile{
	
	public function generateNewProfileForm(){
		print(" <br><br><br><form action = addNewProf.php method=post>
			First Name: <input name=fName type=text ><br>
			Last Name: <input name=lName type=text ><br>
			Rank: <select name=rank type=text> 
				  <option value = pvt>PVT</option>
				  <option value = pfc>PFC</option>
				  <option value = spc>SPC</option>
				  <option value = cpl>CPL</option>
				  <option value = sgt>SGT</option>
				  <option value = ssgt>SSGT</option>
				  <option value = sfc>SFC</option>
				  <option value = msg>MSG</option>
				  <option value = wo1>WO1</option>
				  <option value = wo2>WO2</option>
				  <option value = wo3>WO3</option>
				  <option value = wo4>WO4</option>
				  <option value = wo5>WO5</option>
				  <option value = lt2>2LT</option>
				  <option value = lt1>1LT</option>
				  <option value = cpt>CPT</option>
				  <option value = maj>MAJ</option>
				  <option value = ltc>LTC</option>
				  <option value = col>COL</option>
				  <option value = civ>CIV</option>
				  <option value = gon>gone</option>
				  </select><br>
		  				  <input value=Submit Data type=Submit>
		</form><br>
		<a href=showProfPage.php>View Profiles</a>
		
		");
	}
	public function showProfiles(){
	
	
	}
	
	
}

?>