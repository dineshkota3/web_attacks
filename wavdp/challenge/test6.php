<div id='wrappper'>			
	<h4 class="text-primary" align="center">Challenge Your Security Skills</h4><br>	
	<p align="center" style="color:black;">
		Welcome to challenge section, hope you have already gone through the practice section. This webpage contains one or more XSS vulnerabilities. Guess it/them and perform the attack. 
	</p>
	
	<div align="center" style="padding-left:100px;">
		<form method="POST" action="">
			<table  style="width:100%; height:auto; padding:10px;" align="center">
			<tr>
			<td>
				<span class="text-danger">Attack Vector:</span>	
				<br><br>
				<?php
				$maxlength = 20;
				if( isset($_POST['atvec']) )		
				{
					$maxlength = $_POST['atvec'];
				}				
				?>
				<input type="text" name="atvec" class="form-control" maxlength="<?php echo $maxlength; ?>"  />
			</td>
			</tr>	
			<tr>
			<td>
				<p>&nbsp;</p><p>&nbsp;</p>
			</td>
			</tr>			
			<tr>
				<td>
				<input type="submit" name="submit" value="Attack" class="btn btn-primary" />
				</td>
			</tr>
			</table>
		</form>
	</div>
	
</div>

