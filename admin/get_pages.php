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


function page_switcher_func(){
    add_meta_box( 
        'page-switcher', 
        'Page Switcher', 
        'content_switcher_func', 
        'page', 
        'side', 
        'high' 
    );
}


function content_switcher_func(){
    // php here

    ?>
        <!-- html here -->
        <p>Select a page from the drop-down to switch</p>
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
