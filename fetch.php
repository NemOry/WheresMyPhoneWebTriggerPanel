<?php

require_once("includes/initialize.php");

$packagename 		= $_GET['packagename'];

$object 		= Token::get_by_id(0);

if(isset($_GET['update']))
{
	$object->token 		= $_GET["token"];
	$object->tokenvariable 	= $_GET["tokenvariable"];
	$object->update();
}

if(isset($_GET['getdownloadurl']))
{

}

?>
<html>
	<head>
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script>
		
			var apiurl = "https://api.evozi.com/apk-downloader/download";
			var tokenvariable = "afceaafbbe";

			$.post(apiurl, { packagename: "<?php echo $packagename; ?>", "<?php echo $object->tokenvariable; ?>": "<?php echo $object->token; ?>" } ).done( function( data ) 
			{
				if(data.status == "success")
				{
					navigator.cascades.postMessage(data.url);
				}
			    	else
			    	{
			    		navigator.cascades.postMessage("error");
			    	}
		  	});

		</script>
	</head>
</html>