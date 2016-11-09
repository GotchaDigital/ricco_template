<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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
	exit;
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

/* Angreh : Imagens relacionadas */
/* Begin */
$auxRP = array();
for($i=0;$i<5;$i++)
{
    $fieldName = 'rp_pro0' . $i;
    $field = get_post_meta($product->id, $fieldName, true);
    if( !empty($field) )
    {
        $file = get_field($fieldName);
        $auxRP[] = $file['url'];
    }
}
if( !empty($auxRP) )
{
    exit(var_dump($product->id,$auxRP));
}
/* End */

if ( ! $related = $product->get_related( $posts_per_page ) ) {
	return;
}

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products                    = new WP_Query( $args );
$woocommerce_loop['name']    = 'related';
$woocommerce_loop['columns'] = apply_filters( 'woocommerce_related_products_columns', $columns );

if ( $products->have_posts() ) : ?>

	<div class="related products">

		<h2><?php _e( 'Related Products', 'woocommerce' ); ?></h2>

		<?php woocommerce_product_loop_start(); ?>

            <div class="nz-recent-projects small-image">

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php //wc_get_template_part( 'content', 'product' ); ?>

                <?php

                $pro = new WC_Product($products->post->ID);

                //Pegando Imagem
                $imgPro = $pro->get_image( $size = 'medium_large' );
                $proImage = '<div class="mktz-pro-img">' . $imgPro . '</div>';

                //exit(var_dump($pro,$proImage));

                //Pegando Título
                $proTitle = '<div class="mktz-pro-title">' . get_the_title( $products->post->ID ) . '</div>';

                //Pegando Tags
                $tags = array();
                $tagsAux = get_the_terms( $products->post->ID, 'product_tag' );
                foreach( $tagsAux as $tag )
                {
                    $tags[] = $tag->name;
                }

                $tagsStr = implode(',', $tags);
                $proTags = '<div class="mktz-pro-tags">' . $tagsStr . '</div>';
                ?>
                <div class="projects">
                    <div class="nz-thumbnail" onclick="window.location.href='<?php echo $pro->get_permalink(); ?>">
                        <?php echo $proImage; ?>
                        <div class="ninzio-overlay" onclick="window.location.href='<?php echo $pro->get_permalink(); ?>">
                            <a class="nz-overlay-before"
                               data-lightbox-gallery="gallery3"
                               href="<?php echo $pro->get_permalink(); ?>"></a>
                            <h4 class="project-title">
                                <a href="<?php echo $pro->get_permalink(); ?>">
                                    <?php echo $proTitle; ?>
                                </a>
                                <span class="tags"><?php echo $proTags; ?></span>
                            </h4>
                        </div>
                    </div>
                </div>

			<?php endwhile; // end of the loop. ?>

            </div>

		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();
