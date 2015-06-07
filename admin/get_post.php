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


function post_switcher_func(){
    add_meta_box( 
        'page-switcher', 
        'Page Switcher', 
        'content_switcher_post_func', 
        'post', 
        'side', 
        'high' 
    );
}


function content_switcher_post_func(){
    // php here

    ?>
        <!-- html here -->
        <p>Select a Post from the drop-down to switch</p>
        <select class="page-switcher-select form-control select2-hidden-accessible" name="page-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'> 
         <option value="">
            <?php echo esc_attr( __( 'Select page' ) ); ?>
        </option> 
         <?php 
          $posts = get_posts(); 
          $id = get_the_ID();
          $siteurl = get_site_url('url');
          //https://markonect.com/wp-admin/post.php?post=145&action=edit

          foreach ( $posts as $post ) {
            $option = '<option value="'.$siteurl.'/wp-admin/post.php?post='.$post->ID.'&action=edit">';
            $option .= $post->post_title;
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
