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

// filter for to replacing country code as country name in listing archive page
add_filter('hook_content_listing', 'get_full_name_from_country_code', 10, 1);

// filter for to replacing country code as country name in listing single page
add_filter('hook_item_cleanup', 'changeSomeValues', 10,1);

global $countries;
$countries = array(
    "AF"=>"Afghanistan","AL"=>"Albania","DZ"=>"Algeria", "AD"=>"Andorra", "AO"=>"Angola","AG"=>"Antigua and Barbuda","AR"=>"Argentina","AM"=>"Armenia","AU"=>"Australia","AT"=>"Austria",
    "AZ"=>"Azerbaijan","BS"=>"The Bahamas","BH"=>"Bahrain", "BD"=>"Bangladesh","BB"=>"Barbados","BY"=>"Belarus","BE"=>"Belgium","BZ"=>"Belize","BJ"=>"Benin","BT"=>"Bhutan",
    "BO"=>"Bolivia","BA"=>"Bosnia and Herzegovina","BW"=>"Botswana","BR"=>"Brazil","BN"=>"Brunei", "BG"=>"Bulgaria","BF"=>"Burkina Faso","BI"=>"Burundi","KH"=>"Cambodia","CM"=>"Cameroon",
    "CA"=>"Canada","CV"=>"Cape Verde","CF"=>"Central African Republic","TD"=>"Chad","CL"=>"Chile","CN"=>"China","CO"=>"Colombia","KM"=>"Comoros","CG"=>"Congo, Republic of the", "CD"=>"Congo, Democratic Republic of the","CR"=>"Costa Rica","CI"=>"Cote d'Ivoire","HR"=>"Croatia",
    "CU"=>"Cuba","CY"=>"Cyprus","CZ"=>"Czech Republic","DK"=>"Denmark","DJ"=>"Djibouti","DM"=>"Dominica","DO"=>"Dominican Republic","TL"=>"Timor-Leste","EC"=>"Ecuador","EG"=>"Egypt",
    "SV"=>"El Salvador","GQ"=>"Equatorial Guinea","ER"=>"Eritrea","EE"=>"Estonia","ET"=>"Ethiopia","FJ"=>"Fiji","FI"=>"Finland","FR"=>"France","GA"=>"Gabon","GM"=>"Gambia",
    "GE"=>"Georgia","DE"=>"Germany","GH"=>"Ghana","GR"=>"Greece","GL"=>"Greenland","GD"=>"Grenada","GT"=>"Guatemala","GN"=>"Guinea","GW"=>"Guinea-Bissau","GY"=>"Guyana",
    "HT"=>"Haiti","HN"=>"Honduras","HU"=>"Hungary","IS"=>"Iceland","IN"=>"India","ID"=>"Indonesia","IR"=>"Iran","IQ"=>"Iraq","IE"=>"Ireland","IL"=>"Israel",
    "IT"=>"Italy","JM"=>"Jamaica","JP"=>"Japan","JO"=>"Jordan","KZ"=>"Kazakhstan","KE"=>"Kenya","KI"=>"Kiribati","KP"=>"Korea, North","KR"=>"Korea, South","ZZ"=>"Kosovo",
    "KW"=>"Kuwait","KG"=>"Kyrgyzstan","LA"=>"Laos","LV"=>"Latvia","LB"=>"Lebanon","LS"=>"Lesotho","LR"=>"Liberia","LY"=>"Libya","LI"=>"Liechtenstein","LT"=>"Lithuania",
    "LU"=>"Luxembourg","MK"=>"Macedonia","MG"=>"Madagascar","MW"=>"Malawi","MY"=>"Malaysia","MV"=>"Maldives","ML"=>"Mali","MT"=>"Malta","MH"=>"Marshall Islands","MR"=>"Mauritania",
    "MU"=>"Mauritius","MX"=>"Mexico","FM"=>"Micronesia, Federated States of","MD"=>"Moldova","MC"=>"Monaco","MN"=>"Mongolia","ME"=>"Montenegro","MA"=>"Morocco","MZ"=>"Mozambique","MM"=>"Myanmar (Burma)",
    "NA"=>"Namibia","NR"=>"Nauru","NP"=>"Nepal","NL"=>"Netherlands","NZ"=>"New Zealand","NI"=>"Nicaragua","NE"=>"Niger","NG"=>"Nigeria","NO"=>"Norway","OM"=>"Oman","PK"=>"Pakistan","PW"=>"Palau","PA"=>"Panama","PG"=>"Papua New Guinea","PY"=>"Paraguay","PE"=>"Peru","PH"=>"Philippines",
    "PL"=>"Poland","PT"=>"Portugal","QA"=>"Qatar","RO"=>"Romania","RU"=>"Russia","RW"=>"Rwanda","KN"=>"Saint Kitts and Nevis","LC"=>"Saint Lucia","VC"=>"Saint Vincent and the Grenadines","WS"=>"Samoa","SM"=>"San Marino","ST"=>"Sao Tome and Principe","SA"=>"Saudi Arabia","SN"=>"Senegal",
    "RS"=>"Serbia","SC"=>"Seychelles","SL"=>"Sierra Leone","SG"=>"Singapore","SK"=>"Slovakia","SI"=>"Slovenia","SB"=>"Solomon Islands","SO"=>"Somalia","ZA"=>"South Africa","SS"=>"South Sudan","ES"=>"Spain","LK"=>"Sri Lanka","SD"=>"Sudan","SR"=>"Suriname","SZ"=>"Swaziland",
    "SE"=>"Sweden","CH"=>"Switzerland","SY"=>"Syria","TW"=>"Taiwan","TJ"=>"Tajikistan","TZ"=>"Tanzania","TH"=>"Thailand","TG"=>"Togo","TO"=>"Tonga","TT"=>"Trinidad and Tobago","TN"=>"Tunisia","TR"=>"Turkey","TM"=>"Turkmenistan","TV"=>"Tuvalu","UG"=>"Uganda","UA"=>"Ukraine",
    "AE"=>"United Arab Emirates","GB"=>"United Kingdom","US"=>"United States of America","UY"=>"Uruguay","UZ"=>"Uzbekistan","VU"=>"Vanuatu","VA"=>"Vatican City (Holy See)","VE"=>"Venezuela","VN"=>"Vietnam","YE"=>"Yemen","ZM"=>"Zambia","ZW"=>"Zimbabwe","HK"=>"Hong Kong","PR"=>"Puerto Rico");
function  get_full_name_from_country_code($c){
    global  $countries;
    if(preg_match('/wlt_shortcode_country\W+([A-Z]{2})/', $c, $matches)){
        $c = str_replace($matches[1], $countries[$matches[1]], $c);
    }
    if(preg_match("/( \d{2}:\d{2}:\d{2})/", $c, $matches1)){
        $c  = str_replace($matches1[0], '',$c);
    }

    return $c;
}

function changeSomeValues($c){
    global  $countries;
    if(preg_match('/val_country\W+([A-Z]{2})/', $c, $matches)){
        $c = str_replace($matches[1], $countries[$matches[1]], $c);
    }
    return $c;
}
add_action('pre_get_posts', 'add_orderby_start_date',10);

function add_orderby_start_date($query){

        if (is_search()&& get_query_var('orderby')==='') {
            set_query_var('meta_key', 'start_date');
            set_query_var('orderby', 'meta_value');
            set_query_var('order','desc');
        }
}
?>