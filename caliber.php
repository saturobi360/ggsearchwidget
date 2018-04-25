<?php
$selected = $_POST['manufacturer'];
$selected = str_replace(' ', '%20', $selected);
$file = file_get_contents('http://diafirearms.azurewebsites.net/api/firearmsmdl/calibergaugesearch/'.$selected, true);
$file = str_replace('"', '', $file);
$file = str_replace('[', '', $file);
$file = str_replace(']', '', $file);
$a1 = explode(',',$file);?>
<select id="calibergauge-dropdown" name="caliber" style="color:#000; border: 1px solid #000"; class="custom-select full-width">
<option value="" style="color:#000";>Caliber/Gauge</option>
<?php
foreach($a1 as $a2) { 
	if($a2 == 'null'){
	}
	else {
	?>
	
	<option value="<?php echo $a2; ?>" style="color:#000";><?php echo $a2; ?></option>
	<?php
}
}
?>
</select>
