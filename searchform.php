<?php
/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<form role="search" method="get" class="search-form form-inline input-group" action="<?php echo esc_url(home_url('/'));?>">
	<input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'wowstrap');?>" value="<?php echo get_search_query();?>" name="s" />
	<div class="input-group-append">
		<button type="submit" class="btn btn-primary btn-search-submit"><i class="fas fa-search"></i> <span class="sr-only screen-reader-text"><?php echo _x('Cari', 'submit button', 'wowstrap');?></span></button>
	</div>
</form>
<?php
/* End of file searchform.php */
/* Location: ./wp-content/themes/wowstrap/searchform.php */