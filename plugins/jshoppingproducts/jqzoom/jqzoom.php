<?php
/**
 * @package Joomla.JoomShopping.Products
 * @author Brooksus
 * @website http://brooksite.ru/
 * @email brooksus@yandex.ru
 * @copyright Copyright by Brooksus All rights reserved.
 * @license The MIT License (MIT) + http://zoomsl.tw1.ru/license/ + www.elevateweb.co.uk - Dual licensed under the LGPL licenses. - http://en.wikipedia.org/wiki/MIT_License -   http://en.wikipedia.org/wiki/GNU_General_Public_License;
 **/
defined('_JEXEC') or die('Restricted access');
?>
<?php
jimport('joomla.application.component.controller');

class plgJshoppingProductsJqzoom extends JPlugin{

function onBeforeDisplayProductListView(&$view){
	
	//PARAMS
	 $jq_lib = $this->params->get('jq_lib', 0);
	 $jshop_list_use = $this->params->get('jshop_list_use', 0);		
		if ($jshop_list_use=="1"){
		$zoom_type_list		= $this->params->get('zoom_type_list', 1);
		$zoom_start_list		= $this->params->get('zoom_start_list', 3);
		$zoom_wind_width_list		= $this->params->get('zoom_wind_width_list', 350);
		$zoom_wind_height_list		= $this->params->get('zoom_wind_height_list', 350);
		$zoom_wind_title_list		= $this->params->get('zoom_wind_title_list', 1);
		$zoom_wind_pos_list		= $this->params->get('zoom_wind_pos_list', 1);
		$lens_size_list		= $this->params->get('lens_size_list', 100);
	 
 if ($jq_lib=="0"){//ZOOMER
	JFactory::getDocument()->addStyleSheet(JURI::base().'plugins/jshoppingproducts/jqzoom/jqzoom.css');	
 JFactory::getDocument()->addScript(JURI::base().'plugins/jshoppingproducts/jqzoom/zoomsl-3.0.min.js');
	} else {
	JFactory::getDocument()->addScript(JURI::base().'plugins/jshoppingproducts/jqzoom/jquery.elevatezoom.min.js');
	}
	 if ($jq_lib=="0"){//ZOOMER
		if ($zoom_wind_pos_list=='1'){$magnifierpos="right";} else {$magnifierpos="left";}
	 if ($zoom_type_list=='1' && $zoom_wind_title_list=='1'){$classtextdn='';} else {$classtextdn="txtdnnone";}
		if ($zoom_type_list=='2'){$innerzoom="true";} else {$innerzoom="false";}
		if ($zoom_type_list=='3'){
		$zoom_wind_width_list=$lens_size;
		$zoom_wind_height_list=$lens_size;
		$innerzoommagnifier="true";
		$classmagnifier='""';
		} else {$innerzoommagnifier="false";$classmagnifier='""';}
	
	JFactory::getDocument()->addCustomTag('<script type="text/javascript">
function initDataListZoom(){
	 jQuery(".jshop_list_product img.jshop_img").mouseover(function(){
		jQuery(".jshop_list_product img.jshop_img").attr("data-large",function(src) {
		var imgsrc=jQuery(this).attr("src");
		return imgsrc.replace("thumb","full");
		});
		});
		jQuery(".jshop_list_product img.jshop_img").attr("data-help",function(val ) {
  return "<span style=\"font-size:10px\">Используйте колесико мыши для Zoom +/-</span>";
		});
		jQuery(".jshop_list_product img.jshop_img").mouseover(function(){
		jQuery(".jshop_list_product img.jshop_img").attr("data-text-bottom",function(alt) {
  return jQuery(this).attr("alt");
		});
		});
		jQuery(".jshop_list_product img.jshop_img").imagezoomsl({
			 zindex:9999,
				zoomrange: [1, 10],
				cursorshadeborder: "3px solid #000",
				magnifierborder:"2px solid #ccc",
				magnifiereffectanimate: "fadeIn",
				magnifierpos: "'.$magnifierpos.'",
				magnifiersize: ['.$zoom_wind_width_list.', '.$zoom_wind_height_list.'],
				zoomstart: '.$zoom_start_list.',
				innerzoom: '.$innerzoom.',
				innerzoommagnifier: '.$innerzoommagnifier.',
				classmagnifier: '.$classmagnifier.',
				classtextdn:"'.$classtextdn.'"
				});	
	};
	
		jQuery(function(){initDataListZoom();});
		</script>');
		}//END ZOOMER
		else { //ELEVATE
		if ($zoom_wind_pos_list=='1'){$magnifierpos="1";} else {$magnifierpos="11";}
	 if ($zoom_type_list=='1'){$zoomType="window";$tint="true";}
		if ($zoom_type_list=='2'){$zoomType="inner";$tint="false";}
		if ($zoom_type_list=='3'){$zoomType="lens";$tint="false";}
	
	JFactory::getDocument()->addCustomTag('<script type="text/javascript">

function initDataListZoom(){
	 	
		jQuery(".jshop_list_product img.jshop_img").elevateZoom({
			 zoomType:"'.$zoomType.'",
			 zoomLevel:0.8,
				minZoomLevel: 0.5,
			 maxZoomLevel: 1,
				scrollZoom: true,
			 scrollZoomIncrement: 0.05,
				zoomWindowPosition: '.$magnifierpos.',
				zoomWindowWidth: '.$zoom_wind_width_list.',
			 zoomWindowHeight: '.$zoom_wind_height_list.',
				cursor: "crosshair",
				tint:'.$tint.', 
    tintColour:"#000", 
  	 tintOpacity:0.4
				});	
	};
	
	jQuery(window).load(function(){
			jQuery(".jshop_list_product img.jshop_img").attr("data-zoom-image",function(src) {
			var imgsrc=jQuery(this).attr("src");
		 return imgsrc.replace("thumb","full");
		});
		initDataListZoom();
});
		
		</script>');
		}
		} else {
		JFactory::getDocument()->addCustomTag('<script type="text/javascript">
function initDataListZoom(){}
</script>');	
		}
}

function onBeforeDisplayProductView(&$view){
	$jq_lib = $this->params->get('jq_lib', 0);
	$jshop_use = $this->params->get('jshop_use', 1);
	if ($jshop_use=="1"){
	if ($jq_lib=="0"){//ZOOMER
	JFactory::getDocument()->addStyleSheet(JURI::base().'plugins/jshoppingproducts/jqzoom/jqzoom.css');	
 JFactory::getDocument()->addScript(JURI::base().'plugins/jshoppingproducts/jqzoom/zoomsl-3.0.min.js');
	} else {
	JFactory::getDocument()->addScript(JURI::base().'plugins/jshoppingproducts/jqzoom/jquery.elevatezoom.min.js');
	}
	 //PARAMS
		$zoom_type		= $this->params->get('zoom_type', 1);
		$zoom_start		= $this->params->get('zoom_start', 3);
		$zoom_wind_width		= $this->params->get('zoom_wind_width', 350);
		$zoom_wind_height		= $this->params->get('zoom_wind_height', 350);
		$zoom_wind_title		= $this->params->get('zoom_wind_title', 1);
		$zoom_wind_pos		= $this->params->get('zoom_wind_pos', 1);
		$lens_size		= $this->params->get('lens_size', 100);
		if ($jq_lib=="0"){//ZOOMER
		if ($zoom_wind_pos=='1'){$magnifierpos="right";} else {$magnifierpos="left";}
	 if ($zoom_type=='1' && $zoom_wind_title=='1'){$classtextdn='';} else {$classtextdn="txtdnnone";}
		if ($zoom_type=='2'){$innerzoom="true";} else {$innerzoom="false";}
		if ($zoom_type=='3'){
		$zoom_wind_width=$lens_size;
		$zoom_wind_height=$lens_size;
		$innerzoommagnifier="true";
		//$classmagnifier='window.external ? window.navigator.vendor === "Yandex" ? "" : "round-loupe" : ""';
		$classmagnifier='""';
		} else {$innerzoommagnifier="false";$classmagnifier='""';}
				
	  			
			JFactory::getDocument()->addCustomTag('<script type="text/javascript">
		function initDataZoom(){
		jQuery(".image_middle img[id^=\"main_image_\"]").attr("data-large",function(href ) {
  return jQuery(this).parent("a").attr("href");
		});
		jQuery(".image_middle img[id^=\"main_image_\"]").attr("data-help",function(val ) {
  return "<span style=\"font-size:10px\">Используйте колесико мыши для Zoom +/-</span>";
		});
		jQuery(".image_middle img[id^=\"main_image_\"]").attr("data-text-bottom",function(title ) {
  return jQuery(this).attr("title");
		});		  
		jQuery(".image_middle img[id^=\"main_image_\"]").first().imagezoomsl({
			 zindex:9999,
				zoomrange: [1, 10],
				cursorshadeborder: "3px solid #000",
				magnifierborder:"2px solid #ccc",
				magnifiereffectanimate: "fadeIn",
				magnifierpos: "'.$magnifierpos.'",
				magnifiersize: ['.$zoom_wind_width.', '.$zoom_wind_height.'],
				zoomstart: '.$zoom_start.',
				innerzoom: '.$innerzoom.',
				innerzoommagnifier: '.$innerzoommagnifier.',
				classmagnifier: '.$classmagnifier.',
				classtextdn:"'.$classtextdn.'"
				});	
				
			//CLICK
			jQuery(".jshop_img_thumb").click(function(){
			jQuery(".magnifier, .tracker, .textdn, .cursorshade, .statusdiv, .txtdnnone").remove();	
			var idtimga=jQuery(this).attr("onclick");
			idtimgn=/\d+/; 
			var idtimg=idtimgn.exec(idtimga);
				
				jQuery("#main_image_"+idtimg).imagezoomsl({
			 zindex:9999,
				zoomrange: [1, 10],
				cursorshadeborder: "3px solid #000",
				magnifierborder:"2px solid #ccc",
				magnifiereffectanimate: "fadeIn",
				magnifierpos: "'.$magnifierpos.'",
				magnifiersize: ['.$zoom_wind_width.', '.$zoom_wind_height.'],
				zoomstart: '.$zoom_start.',
				innerzoom: '.$innerzoom.',
				innerzoommagnifier: '.$innerzoommagnifier.',
				classmagnifier: '.$classmagnifier.',
				classtextdn:"'.$classtextdn.'"
						});	
				});	
		};
	
		jQuery(window).load(function(){initDataZoom();});
		</script>');
		} //END ZOOMER
		else { //ELEVATE
		if ($zoom_wind_pos=='1'){$magnifierpos="1";} else {$magnifierpos="11";}
	 if ($zoom_type=='1'){$zoomType="window"; $tint="true";}
		if ($zoom_type=='2'){$zoomType="inner"; $tint="false";}
		if ($zoom_type=='3'){$zoomType="lens"; $tint="false";}
	
	JFactory::getDocument()->addCustomTag('<script type="text/javascript">
function initDataZoom(){
	
	//REMOVE DOUBLE LIGHTBOX
			jQuery(".image_middle a.lightbox img").click(function(){
				jQuery("#jquery-lightbox:first").remove();
				jQuery("#jquery-overlay:first").remove();
			});
			
		jQuery(".image_middle img[id^=\"main_image_\"]").attr("data-zoom-image",function(href ) {
  return jQuery(this).parent("a").attr("href");
		});
		jQuery(".image_middle img[id^=\"main_image_\"]").first().elevateZoom({
			 zoomType:"'.$zoomType.'",
			 zoomLevel:0.8,
				minZoomLevel: 0.5,
			 maxZoomLevel: 1,
				scrollZoom : true,
			 scrollZoomIncrement: 0.05,
				zoomWindowPosition: '.$magnifierpos.',
				zoomWindowWidth: '.$zoom_wind_width.',
			 zoomWindowHeight: '.$zoom_wind_height.',
				cursor: "crosshair",
				tint:'.$tint.', 
    tintColour:"#000", 
  	 tintOpacity:0.4,
				lensSize: '.$lens_size.'
				});	
				
			
			//CLICK
			jQuery(".jshop_img_thumb").click(function(){
			jQuery(".magnifier, .tracker, .textdn, .cursorshade, .statusdiv, .txtdnnone").remove();	
			var idtimga=jQuery(this).attr("onclick");
			idtimgn=/\d+/; 
			var idtimg=idtimgn.exec(idtimga);
				
				jQuery("#main_image_"+idtimg).elevateZoom({
			 zoomType:"'.$zoomType.'",
			 zoomLevel:0.8,
				minZoomLevel: 0.5,
			 maxZoomLevel: 1,
				scrollZoom : true,
			 scrollZoomIncrement: 0.05,
				zoomWindowPosition: '.$magnifierpos.',
				zoomWindowWidth: '.$zoom_wind_width.',
			 zoomWindowHeight: '.$zoom_wind_height.',
				cursor: "crosshair",
				tint:'.$tint.', 
    tintColour:"#000", 
  	 tintOpacity:0.4,
				lensSize: '.$lens_size.'
						});	
				});	
		};
	
		jQuery(function(){initDataZoom();});
		</script>');
		}
	 } else {
		JFactory::getDocument()->addCustomTag('<script type="text/javascript">
function initDataZoom(){}
</script>');	
		}
 } 
//**END PLUG**//
}
?>