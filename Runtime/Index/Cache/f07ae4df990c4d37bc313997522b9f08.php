<?php if (!defined('THINK_PATH')) exit();?><script>
$(document).ready(function(){
	try{
		load_map_wrapper();
	}catch(e){

	}
});
function load_map_wrapper(){
	<?php if(($data["latitude"] != '') AND ($data["longitude"] != '')): ?>var maps = new jvfMap('maps_<?php echo ($data["id"]); ?>',"<?php echo ($data["latitude"]); ?>","<?php echo ($data["longitude"]); ?>",<?php echo ($data["zoom"]); ?>);
	maps.addTags("<?php echo ($data["latitude"]); ?>","<?php echo ($data["longitude"]); ?>","<?php echo ($data["address"]); ?>",<?php echo ($data["zoom"]); ?>,"<?php echo ($data["short_title"]); ?><br /><?php echo L("address_text");?>：<?php echo ($data["address"]); ?><br /><?php echo L("phone_text");?>：<?php echo ($data["tel"]); ?>");
	maps.addTags('<?php echo ($locate["lat"]); ?>','<?php echo ($locate["lng"]); ?>','<?php echo ($locate["address"]); ?>',<?php echo ($data["zoom"]); ?>,'locate');
	<?php else: ?>
	initialize();<?php endif; ?>
}
</script>
<div style="width:800px;height:600px;">
	<div id="maps_<?php echo ($data["id"]); ?>" style="width:800px; height:575px;"></div>
	 
</div>