<?php

if(!empty($_POST["toolkits"])){
	$file = tempnam("tmp", "zip");
    $zip = new ZipArchive();
    $res = $zip->open($file, ZipArchive::OVERWRITE);
	foreach($_POST["toolkits"] AS $v){
		$bits = explode("/",$v);
		$name = array_pop($bits);
		$zip->addFile($v, $name);
	}
	$zip->close();
	ob_clean();
	ob_start();
	// Stream the file to the client 
	header("Content-Type: application/zip"); 
	header("Content-Length: " . filesize($file)); 
	header("Content-Disposition: attachment; filename=\"toolkit.zip\""); 
	header("Content-Transfer-Encoding: binary");
	readfile($file); 
	ob_flush();
	unlink($file); 
}

$toolkit = new WP_Query(array(
                        'post_type' => 'toolkit',
                        'orderby' => 'meta_value_num',
                        'meta_key' => '_toolkit_tk_factsheet',
                        'order' => 'ASC'
                        ));
?>

<div class="row article">
    <div class="col-sm-10 col-sm-offset-1 beta delta">
		<?php
        $GLOBALS["fs_header"] = false;
		if ($toolkit->have_posts()): ?>
		
        <form class="toolkit-wrapper" action="" method="post">
		
	        <?php 
	        while ($toolkit->have_posts()): $toolkit->the_post();
	            get_template_part('templates/toolkit');
			endwhile;
			?> 
			
		<div class="control-group" style="padding-top:20px;">
			 <div class="controls">
			     <button id="singlebutton" name="singlebutton" class="btn btn-primary btn-success btn-lg btn-block">Download selected items as a ZIP archive</button>
			 </div>
		</div>
		
		</form>
		
		<?php endif; ?>
	</div>
</div>
        
<?php wp_reset_query(); ?>