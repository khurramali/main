<?php
    $fs = get_post_meta(get_the_ID(), '_toolkit_tk_factsheet', true);
    $file = get_post_meta(get_the_ID(), '_toolkit_tk_file', true);
    $path = $_SERVER["DOCUMENT_ROOT"].str_replace(get_home_url(), "", $file);
    
    if(file_exists($path)){
        $file_size = ceil((filesize($path)/1000))."kb";
    }
    else $file_size = null;
    
    $fbits = explode('.',$file);
    $fext = array_pop($fbits);
    
?>

<?php if($fs == 1 && !$GLOBALS["fs_header"]) : ?>
<h3>Factsheets</h3>
<?php $GLOBALS["fs_header"] = true;
endif; ?>

<div class="checkbox">
    <input type="checkbox" name="toolkits[]" id="checkboxes-1" value="<?php echo $path?>">
    <h4 style="margin-top:3px;">
        <a href="<?php echo $file; ?>" target="_blank"><?php the_title(); ?></a>
        <small style="float:right;" class="<?php echo $fext ?>">
        
        <?php if ( $fext == "pdf" ): ?>
        
        <img src="http://www.adobe.com/images/pdficon_large.png" style="margin-right:5px;">
        
        <?php endif ?>
        
        <?php echo $file_size ?>
        </small>
    </h4>
</div>