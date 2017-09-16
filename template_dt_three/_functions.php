<?php

// TELL THE CORE THIS IS A CHILD THEME
define('WLT_CHILDTHEME',true);

// TURN OFF DEFAULT PRICE SEARCH
define('DEFAULTS_ADMIN_COLOR_PRESETS',false);

// TURN ON HOME PAGE EDITOR OPTIONS
define('ALLOW_HOMEPAGE_EDIT',true);
 
// GOOGLE FONTS
function load_fonts() {
	if(!defined('WLT_CHILDTHEME')){
	wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Raleway:400,100,500,600,700,800,900,300,200');
	wp_enqueue_style( 'googleFonts');
	}
}    
add_action('wp_print_styles', 'load_fonts');

// CHILD THEME ACTIVATION
function childtheme_designchanges(){
	
	// LOAD IN CORE STYLES AND UNSET THE LAYOUT ONES SO OUR CHILD THEME DEFAULT OPTIONS CAN WORK
	$core_admin_values = get_option("core_admin_values"); 
		
	// SET HEADER
	$core_admin_values['logo_url'] = CHILD_THEME_PATH_IMG."logo.png";
	
		// FULL PAGE LAYOUT
		$core_admin_values['layout_layoutwidth'] = 1;
		$core_admin_values['layout_contentwidth'] = 0;
		
// EXTRA DEMO CONTENT
$core_admin_values['hdata'] = array(
 
 
	"j1" => array(
	
		"stxt1" 	=> "Responsive HTML5 Directory Theme",
		"sdesc1" 	=> "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.",
		
		"stxt2" 	=> "Search Filtering",
		"sdesc2" 	=> "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.",
		
		"stxt3" 	=> "Google Maps",
		"sdesc3" 	=> "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.",
		
		"stxt4" 	=> "Members Area",
		"sdesc4" 	=> "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.",
		
		"stxt5" 	=> "Contact Forms",
		"sdesc5" 	=> "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.",
		
		"stxt6" 	=> "SEO Friendly",
		"sdesc6" 	=> "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.",
	),

); 
		
 
	// RETURN VALUES
	return $core_admin_values;
}
// FUNCTION EXECUTED WHEN THE THEME IS CHANGED
function _after_switch_theme(){
	// GET DESIGN FROM FUNCTION
	$core_admin_values = childtheme_designchanges();
	// SAVE VALUES
	//update_option('core_admin_values',$core_admin_values);
		
}
add_action('after_switch_theme','_after_switch_theme');
// DEMO MODE
if(defined('WLT_DEMOMODE')){
$GLOBALS['CORE_THEME'] = childtheme_designchanges();
}

 


function _hook_admin_2_homeedit($c){

 
$c['j1']['data']['b1'] = array( "t" => "break","txt" => "Side Box 1");

$c['j1']['data']['stxt1'] = array( "t" => "Box 1 Title", "d" => "Your Text Here" );
$c['j1']['data']['sdesc1'] = array( "t" => "Box 1 Description", "d" => "your sub description here" );
 

$c['j1']['data']['b2'] = array( "t" => "break","txt" => "Side Box 2");

$c['j1']['data']['stxt2'] = array( "t" => "Box 2 Title", "d" => "Your Text Here" );
$c['j1']['data']['sdesc2'] = array( "t" => "Box 2 Description", "d" => "your sub description here" );
 

$c['j1']['data']['b3'] = array( "t" => "break","txt" => "Side Box 3");

$c['j1']['data']['stxt3'] = array( "t" => "Box 3 Title", "d" => "Your Text Here" );
$c['j1']['data']['sdesc3'] = array( "t" => "Box 3 Description", "d" => "your sub description here" );
 
$c['j1']['data']['b4'] = array( "t" => "break","txt" => "Side Box 4");

$c['j1']['data']['stxt4'] = array( "t" => "Box 4 Title", "d" => "Your Text Here" );
$c['j1']['data']['sdesc4'] = array( "t" => "Box 4 Description", "d" => "your sub description here" );
 
$c['j1']['data']['b5'] = array( "t" => "break","txt" => "Side Box 5");

$c['j1']['data']['stxt5'] = array( "t" => "Box 5 Title", "d" => "Your Text Here" );
$c['j1']['data']['sdesc5'] = array( "t" => "Box 5 Description", "d" => "your sub description here" );
 
$c['j1']['data']['b6'] = array( "t" => "break","txt" => "Side Box 5");

$c['j1']['data']['stxt6'] = array( "t" => "Box 6 Title", "d" => "Your Text Here" );
$c['j1']['data']['sdesc6'] = array( "t" => "Box 6 Description", "d" => "your sub description here" );
 
 

return $c;
}
add_action('hook_admin_2_homeedit', '_hook_admin_2_homeedit');

 


?>