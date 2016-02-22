<?php 
/**
* @version      4.8.0 13.08.2013
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');
?>
<?php //print $this->_tmp_product_html_body_image?>
<?php //if(!count($this->images)){?>
<!--    <img id="main_image" src="--><?php //print $this->image_product_path?><!--/--><?php //print $this->noimage?><!--" alt="--><?php //print htmlspecialchars($this->product->name)?><!--" />-->
<?php //}?>
<?php //foreach($this->images as $k=>$image){?>
<!--    <a class="lightbox product_main_img" id="main_image_full_--><?php //print $image->image_id?><!--" href="--><?php //print
//        $this->image_product_path?><!--/--><?php //print $image->image_full;?><!--" --><?php //if ($k!=0){?><!--style="display:none"--><?php //}?><!-- title="--><?php //print htmlspecialchars($image->_title)?><!--">-->
<!--        <img id = "main_image_--><?php //print $image->image_id?><!--" src = "--><?php //print $this->image_product_path?><!--/--><?php //print $image->image_name;?><!--" alt="--><?php //print htmlspecialchars($image->_title)?><!--" title="--><?php //print htmlspecialchars($image->_title)?><!--" />-->
<!--        <div class="text_zoom">-->
<!--            <img src="--><?php //print $this->path_to_image?><!--search.png" alt="zoom" /> --><?php //print _JSHOP_ZOOM_IMAGE?>
<!--        </div>-->
<!--    </a>-->
<?php //}?>

<?php print $this->_tmp_product_html_body_image ?>

<?php if (!count($this->images)) { ?>
    <img id="main_image"
         src="<?php print $this->image_product_path ?>/<?php print $this->noimage ?>"
         alt="<?php print htmlspecialchars($this->product->name) ?>"/>
<?php } ?>

<?php foreach ($this->images as $k => $image) { ?>
    <a class="lightbox product_main_img" id="main_image_full_<?php print $image->image_id ?>"
       href="<?php print $this->image_product_path ?>/<?php print $image->image_full; ?>"
       <?php if ($k != 0){ ?>style="display:none"<?php } ?>
       title="<?php print htmlspecialchars($image->_title) ?>">
        <img id="main_image_<?php print $image->image_id ?>"
             src="<?php print $this->image_product_path ?>/<?php print $image->image_name; ?>"
             alt="<?php print htmlspecialchars($image->_title) ?>"
             title="<?php print htmlspecialchars($image->_title) ?>"/>

        <div class="text_zoom">
            <img src="<?php print $this->path_to_image ?>search.png" alt="zoom"/>
            <?php print _JSHOP_ZOOM_IMAGE ?>
        </div>
    </a>
<?php } ?>

<?php print $this->_tmp_product_html_before_image_thumb; ?>

<div id='list_product_image_thumb' class="owl-thumbs list_image_thumb">
    <?php if ((count($this->images) > 1) || (count($this->videos) && count($this->images))) { ?>
        <?php foreach ($this->images as $k => $image) { ?>
            <img class="jshop_img_thumb" src="<?php print
                $this->image_product_path ?>/<?php
            print $image->image_thumb ?>" alt="<?php print htmlspecialchars($image->_title) ?>"
                 onclick="showImage(<?php print $image->image_id ?>)"/>
        <?php } ?>
    <?php } ?>
</div>
<?php if (count($this->images) <= 4) { ?>
    <script>
        jQuery(document).ready(function ($) {
            $(".owl-controls").hide();
        })
    </script>
<?php } ?>

<?php print $this->_tmp_product_html_after_image_thumb; ?>
