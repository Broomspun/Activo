<?php
/* 
* Theme: PREMIUMPRESS CORE FRAMEWORK FILE
* Url: www.premiumpress.com
* Author: Mark Fail
*
* THIS FILE WILL BE UPDATED WITH EVERY UPDATE
* IF YOU WANT TO MODIFY THIS FILE, CREATE A CHILD THEME
*
* http://codex.wordpress.org/Child_Themes
*/
if (!defined('THEME_VERSION')) {	header('HTTP/1.0 403 Forbidden'); exit; }

global $CORE;
 
// GET HOME PAGE CUSTOM DATA
$HDATA = $GLOBALS['CORE_THEME']['hdata'];
 
// HOOK HOME PAGE
function _hook_header_after(){ global $CORE, $post; 
?> 


<?php if(!isset($GLOBALS['CORE_THEME']['home_section1']) || (isset($GLOBALS['CORE_THEME']['home_section1']) && $GLOBALS['CORE_THEME']['home_section1'] == '1' ) ){  ?>

<?php if(isset($GLOBALS['CORE_THEME']['homesliderid']) && $GLOBALS['CORE_THEME']['homesliderid'] != "" && $GLOBALS['CORE_THEME']['homeslider'] == 1 ){  

echo do_shortcode(stripslashes("[rev_slider ".$GLOBALS['CORE_THEME']['homesliderid']."]")); 

}else{ $HDATA = $GLOBALS['CORE_THEME']['hdata'];  ?>


<div class="home-banner clearfix"></div>
 

<div class="home-features clearfix"><div class="container"><div class="row"><div class="col-md-4">
<div class="features-intro clearfix">

<h2><?php echo stripslashes($HDATA['j1']['stxt1']); ?></h2>
<?php echo stripslashes($HDATA['j1']['sdesc1']); ?>

<a class="read-more" href="<?php echo home_url(); ?>/?s="><?php echo $CORE->_e(array('button','35')); ?></a>

</div></div><div class="col-md-8"><div class="row">

<div class="col-sm-6 single-feature"><div class="row"><div class="col-sm-3 icon-wrapper"><i class="fa fa-filter"></i></div><div class="col-sm-9">

<h3><?php echo stripslashes($HDATA['j1']['stxt2']); ?></h3><?php echo stripslashes($HDATA['j1']['sdesc2']); ?>

</div></div></div><div class="col-sm-6 single-feature"><div class="row"><div class="col-sm-3 icon-wrapper"><i class="fa fa-map-marker"></i></div><div class="col-sm-9">

<h3><?php echo stripslashes($HDATA['j1']['stxt3']); ?></h3><?php echo stripslashes($HDATA['j1']['sdesc3']); ?>

</div></div></div><div class="col-sm-6 single-feature"><div class="row"><div class="col-sm-3 icon-wrapper"><i class="fa fa-users"></i></div><div class="col-sm-9">

<h3><?php echo stripslashes($HDATA['j1']['stxt4']); ?></h3><?php echo stripslashes($HDATA['j1']['sdesc4']); ?>

</div></div></div><div class="col-sm-6 single-feature"><div class="row"><div class="col-sm-3 icon-wrapper"><i class="fa fa-envelope"></i></div><div class="col-sm-9">

<h3><?php echo stripslashes($HDATA['j1']['stxt5']); ?></h3><?php echo stripslashes($HDATA['j1']['sdesc5']); ?>

</div></div></div></div></div></div> 

</div>  
</div>
 
<?php } ?>

<?php } ?>

<?php
}
add_action('hook_header_after','_hook_header_after'); 

// HEADER
get_header($CORE->pageswitch()); 
 
?>



     

<?php if(!isset($GLOBALS['CORE_THEME']['home_section2']) || (isset($GLOBALS['CORE_THEME']['home_section2']) && $GLOBALS['CORE_THEME']['home_section2'] == '1' ) ){  ?>

    <div class="title-lines">
    
        <h2><?php echo stripslashes($HDATA['t2']['title1']); ?></h2>
        
        <h3><?php echo stripslashes($HDATA['t2']['title2']); ?></h3>
        
    </div> 
 
    <div class="tabstyle1"> 
    
      <ul class="nav nav-tabs hidden-xs" role="tablist">
     
        <li role="presentation" class="active"><a href="#t1" aria-controls="t1" role="tab" data-toggle="tab"><?php echo $CORE->_e(array('homepage','2')); ?></a></li>
        
        
        <li role="presentation"><a href="#t3" aria-controls="t3" role="tab" data-toggle="tab"><?php echo $CORE->_e(array('homepage','17')); ?></a></li>
    
      
      </ul>
    
    </div>
    
    <?php $GLOBALS['item_class_size'] = "col-md-3 col-sm-4 col-xs-12 "; ?> 
    <div class="tab-content" style="margin-top:20px;">
      
        <div role="tabpanel" class="tab-pane active" id="t1">   
        
            <div class="row wlt_search_results grid_style" >
            <?php echo do_shortcode('[LISTINGS dataonly=1 show=8 custom="new"]'); ?> 
            </div>
        
        </div>
 
        <div role="tabpanel" class="tab-pane" id="t3">   
        
            <div class="row wlt_search_results grid_style">
            <?php echo do_shortcode('[LISTINGS dataonly=1 show=8 custom="popular"]'); ?> 
            </div>
        
        </div>
 
    
    </div>
    <?php unset($GLOBALS['item_class_size']); ?>
    <script>
    jQuery(document).ready(function() { 
     
        setTimeout(function(){equalheight('.grid_style .thumbnail');  }, 2000); 
    
        jQuery('.nav-tabs a').on( "click", function() {
        setTimeout(function(){equalheight('.grid_style .thumbnail');  }, 1000); 
        });
    
    });
     </script>
     
<?php } ?> 


<?php get_footer($CORE->pageswitch()); ?>