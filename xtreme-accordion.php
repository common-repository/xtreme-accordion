<?php
/*
Plugin Name: Xtreme Accordion
Plugin URI: http://www.flashtuning.net/flash-xml-image-viewers-galleries/x-treme-accordion-xml-as3.html
Description: The most advanced XML Accordion Gallery application. No Flash Knowledge required to insert the Accordion SWF inside the HTML page(s) of your site.
Version: 1.2
Author: Flashtuning 
Author URI: http://www.flashtuning.net
*/

$xtreme_accordion_swf_nr	= 0; 											

function xtremeAccordionStart($xtreme_obj) {
	
	$txtP = preg_replace_callback('/\[xtreme-accordion\s*(width="(\d+)")?\s*(height="(\d+)")?\s*(xml="([^"]+)")?\s*\]/i', 'xtremeAccordionAddObj', $xtreme_obj); 
	
	return $txtP;
}

function xtremeAccordionAddObj($xtreme_accordion_param) {

    global $xtreme_accordion_swf_nr; //number of swfs
	$xtreme_accordion_swf_nr++;
	
	$xtreme_accordion_rand = substr(rand(),0,3);
	
	$xtreme_accordion_dir = WP_CONTENT_URL .'/flashtuning/xtreme-accordion/';
	$xtreme_accordion_swf = $xtreme_accordion_dir.'accordion.swf';
	$xtreme_accordion_config = "swfobj2";
	
	if ($xtreme_accordion_param[2] !=""){$xtreme_accordion_width = $xtreme_accordion_param[2];}
	else {$xtreme_accordion_width = 600;}
	
	if ($xtreme_accordion_param[4] !=""){$xtreme_accordion_height = $xtreme_accordion_param[4];}
	else {$xtreme_accordion_height = 420;}
	
	if ($xtreme_accordion_param[6] !=""){$xtreme_accordion_xml  = $xtreme_accordion_dir.$xtreme_accordion_param[6];}
	else {$xtreme_accordion_xml = $xtreme_accordion_dir.'demo-settings.xml';}	
	
	
	/*
		quality - low | medium | high | autolow | autohigh | best
		bgcolor - hexadecimal RGB value
		wmode - Window | Opaque | Transparent
		allowfullscreen - true | false
		scale - noscale | showall | noborder | exactfit
		salign - L | R | T | B | TL | TR | BL | BR 
		allowscriptaccess - always | never | samedomain
	
	*/
	
	$xtreme_accordion_param = array("quality" =>	"high", "bgcolor" => "", "wmode"	=>	"window", "version" =>	"9.0.0", "allowfullscreen"	=>	"true", "scale" => "noscale", "salign" => "TL", "allowscriptaccess" => "samedomain");
	
	if (is_feed()) {$xtreme_accordion_config = "xhtml";}

	
	if ($xtreme_accordion_config != "xhtml") {
		$xtreme_accordion_output = "<div id=\"xtreme-accordion".$xtreme_accordion_rand."\">Please install flash player.</div>";
	
	}
	
	switch ($xtreme_accordion_config) {
	
		case "xhtml":
			$xtreme_accordion_output.= "\n<object width=\"".$xtreme_accordion_width."\" height=\"".$xtreme_accordion_height."\">\n";
			$xtreme_accordion_output.= "<param name=\"movie\" value=\"".$xtreme_accordion_swf."\"></param>\n";
			$xtreme_accordion_output.= "<param name=\"quality\" value=\"".$xtreme_accordion_param['quality']."\"></param>\n";
			$xtreme_accordion_output.= "<param name=\"bgcolor\" value=\"".$xtreme_accordion_param['bgcolor']."\"></param>\n";
			$xtreme_accordion_output.= "<param name=\"wmode\" value=\"".$xtreme_accordion_param['wmode']."\"></param>\n";
			$xtreme_accordion_output.= "<param name=\"allowFullScreen\" value=\"".$xtreme_accordion_param['allowfullscreen']."\"></param>\n";
			$xtreme_accordion_output.= "<param name=\"scale\" value=\"".$xtreme_accordion_param['scale']."\"></param>\n";
			$xtreme_accordion_output.= "<param name=\"salign\" value=\"".$xtreme_accordion_param['salign']."\"></param>\n";
			$xtreme_accordion_output.= "<param name=\"allowscriptaccess\" value=\"".$xtreme_accordion_param['allowscriptaccess']."\"></param>\n";
			$xtreme_accordion_output.= "<param name=\"base\" value=\"".$xtreme_accordion_dir."\"></param>\n";
			$xtreme_accordion_output.= "<param name=\"FlashVars\" value=\"setupXML=".$xtreme_accordion_xml."\"></param>\n";
			
			
			$xtreme_accordion_output.= "<embed type=\"application/x-shockwave-flash\" width=\"".$xtreme_accordion_width."\" height=\"".$xtreme_accordion_height."\" src=\"".$xtreme_accordion_swf."\" ";
			$xtreme_accordion_output.= "quality=\"".$xtreme_accordion_param['quality']."\" bgcolor=\"".$xtreme_accordion_param['bgcolor']."\" wmode=\"".$xtreme_accordion_param['wmode']."\" scale=\"".$xtreme_accordion_param['scale']."\" salign=\"".$xtreme_accordion_param['salign']."\" allowScriptAccess=\"".$xtreme_accordion_param['allowscriptaccess']."\" allowFullScreen=\"".$xtreme_accordion_param['allowfullscreen']."\" base=\"".$xtreme_accordion_dir."\" FlashVars=\"setupXML=".$xtreme_accordion_xml."\"  ";
			
			$xtreme_accordion_output.= "></embed>\n";
			$xtreme_accordion_output.= "</object>\n";
			break;
	
		default:
		
			$xtreme_accordion_output.= '<script type="text/javascript">';
			$xtreme_accordion_output.= "swfobject.embedSWF('{$xtreme_accordion_swf}', 'xtreme-accordion{$xtreme_accordion_rand}', '{$xtreme_accordion_width}', '{$xtreme_accordion_height}', '{$xtreme_accordion_param['version']}', '' , { setupXML: '{$xtreme_accordion_xml}'}, {base: '{$xtreme_accordion_dir}', wmode: '{$xtreme_accordion_param['wmode']}', scale: '{$xtreme_accordion_param['scale']}', salign: '{$xtreme_accordion_param['salign']}', allowScriptAccess: '{$xtreme_accordion_param['allowscriptaccess']}', allowFullScreen: '{$xtreme_accordion_param['allowfullscreen']}'}, {});";
			$xtreme_accordion_output.= '</script>';
	
			break;
					
	}
	return $xtreme_accordion_output;
}


function  xtremeAccordionEcho($xtreme_accordion_width, $xtreme_accordion_height, $xtreme_accordion_xml) {
    echo xtremeAccordionAddObj( array( null, null, $xtreme_accordion_width, null, $xtreme_accordion_height, null, $xtreme_accordion_xml) );
}

function xtremeAccordionAdmin() {

if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }


?>
		<div class="wrap">
			<h2>Xtreme Accordion 1.2</h2>
					<table>
					<tr>
						<th valign="top" style="padding-top: 10px;color:#FF0000;">
							!IMPORTANT: Copy the free archive folder in the wp-content folder. (eg.: http://www.yoursite.com/wp-content/flashtuning/xtreme-accordion/)
						</th>
					</tr>
                    
                     <tr>
						<td>
					      <ul>
					        <li>1. Insert the swf into post or page using this tag: <strong>[xtreme-accordion]</strong>.</li>
                            <li>2. If you want to modify the width and height of the accordion insert this attributes into the tag: <strong>[xtreme-accordion width="yourvalue" height="yourvalue"]</strong></li>
   					        <li>3. If you want to use multiple instances of Xtreme Accordion on different pages. Follow this steps:
                            	<ul>
	                           <li>a. There are 2 xml files in <strong>wp-content/flashtuning/xtreme-accordion</strong> folder: demo-settings.xml, used for general settings, and demo-content.xml, used for individual items.</li>
                                <li>b. Modify the 2 xml files according to your needs and rename them (eg.: demo-settings2.xml, demo-content2.xml) </li>
                                <li>c. Open the demo-settings2.xml, search for this tag <strong> < object param="contentXML"	value="demo-content.xml" /></strong> and change the attribute value to <em>demo-content2.xml</em> </li>
                                <li>d. Copy the 2 modified xml files to <strong>wp-content/flashtuning/xtreme-accordion</strong></li>
                                <li>e. Use the <strong>xml</strong> attribute [xtreme-accordion xml="demo-settings2.xml"] when you insert the accordion on a page. </li>
                                </ul>
                            <li>4. Optionally for custom pages use this php function: <strong>xtremeAccordionEcho(width,height,xmlFile)</strong> (e.g: xtremeAccordionEcho(595,420,'demo-settings.xml') )</li>                  
                            </ul>
						</td>
				  </tr>
                    
                    
					<tr>
						<td>
						  <p>Check out other useful links. If you have any questions / suggestions, please leave a comment on the component page. </p>
					      <ul>
					        <li><a href="http://www.flashtuning.net">Author Home Page</a></li>
			                <li><a href="http://www.flashtuning.net/flash-xml-image-viewers-galleries/x-treme-accordion-xml-as3.html">Xtreme Accordion Page</a> </li>
			           </ul>
						</td>
				  </tr>
				</table>
			
		</div>
		
<?php
}
function xtremeAccordionAdminAdd() {
	
	add_options_page('Xtreme Accordion Options', 'Xtreme Accordion', 'manage_options','xtremeaccordion', 'xtremeAccordionAdmin');
}

function xtremeAccordionSwfObj() {
		wp_enqueue_script('swfobject');
	}


add_filter('the_content', 'xtremeAccordionStart');
add_action('admin_menu', 'xtremeAccordionAdminAdd');
add_action('init', 'xtremeAccordionSwfObj');
?>