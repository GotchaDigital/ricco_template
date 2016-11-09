<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php _e( 'SKU:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span></span>

	<?php endif; ?>

	<?php echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>

<?php
    ////echo get_post_meta( $post->ID, '_mktz_pro_3dmodel', true );
    //echo get_post_meta( $post->ID, '_mktz_pro_2dcad', true );
    //echo get_post_meta( $post->ID, '_mktz_pro_catalogue', true );
    //echo "Angreh: pesquise por 'angreh'no código";
    $f_empty = true;
?>

<div class="mktz-pro-files-title">Download:</div>


<div class="mktz-pro-files-wrapper">
<?php $modelLink = get_post_meta( $post->ID, '_mktz_pro_3dmodel', true ); if( !empty($modelLink) ): ?>
    <a class="mkt-pro-files" href="#" target="_blank">3D Model</a>
<?php $f_empty = false; endif; ?>

<?php $modelLink = get_post_meta( $post->ID, '_mktz_pro_2dcad', true ); if( !empty($modelLink) ): ?>
    <a class="mkt-pro-files" href="#" target="_blank">2D Cad</a>
<?php $f_empty = false; endif; ?>

<?php $modelLink = get_post_meta( $post->ID, '_mktz_pro_catalogue', true ); if( !empty($modelLink) ): ?>
    <a class="mkt-pro-files" href="#" target="_blank">Catalogue</a>
<?php $f_empty = false; endif; ?>

<?php if( $f_empty ) echo 'N&atilde;o existem arquivos para esse produto.'; ?>
</div>

<div class="mktz-pro-btn-wrapper">
    <a class="mktz-pro-actions" href="<?php echo get_post_meta( $post->ID, '_mktz_pro_storelink', true ); ?>">Ir para loja online</a>
    <a class="mktz-pro-actions" href="#">Solicitar Or&ccedil;amento</a>
</div>