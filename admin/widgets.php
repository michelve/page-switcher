<?php
/**
 * @link              http://velismichel.com
 * @since             1.0.0
 * @package           page_Switcher
 * @author            Michel Velis
 * @website           http://velismichel.com
 */


if(!defined('PageSwitcher_CON')) {
   die('Direct access not permitted');
}

// Function used in the action hook
function add_dashboard_widgets() {
    wp_add_dashboard_widget('dashboard_widget', 'Page Switcher', 'content_switcher_func');
}

// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'add_dashboard_widgets' );


add_action('restrict_manage_posts','content_switcher_func_editor');


function content_switcher_func_editor(){
    // php here
    global $typenow;
    global $wp_query;
     
    ($typenow=='page')?>
        <!-- html here -->
        <select class="page-switcher-select form-control select2-hidden-accessible" name="page-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'> 
         <option value="">
            <?php echo esc_attr( __( 'Select page' ) ); ?>
        </option> 
         <?php 
          $pages = get_pages(); 
          $id = get_the_ID();
          $siteurl = get_site_url('url');
          //https://markonect.com/wp-admin/post.php?post=145&action=edit

          foreach ( $pages as $page ) {
            $option = '<option value="'.$siteurl.'/wp-admin/post.php?post='.$page->ID.'&action=edit">';
            $option .= $page->post_title;
            $option .= '</option>';
            echo $option;
          }
         ?>
        </select>
        <script>
            $(".page-switcher-select").select2({
              placeholder: "Select/Search a Page",
              allowClear: true
            });
        </script>
    <?php    
}

