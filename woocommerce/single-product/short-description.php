<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
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

global $post;

if ( ! $post->post_excerpt ) {
	return;
}
//angreh
?>
<div itemprop="description" class="short-description">
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_content ) ?>
</div>

<?php
//Acabamentos disponíveis
$images = get_field('cores_disponiveis');

if( $images ): ?>
    <div class="cores_disponiveis">
        <div class="title">Cores Dispon&iacute;veis</div>
        <ul>
            <?php foreach( $images as $image ): ?>
                <li>
                    <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>

<?php
//Acabamentos disponíveis
$images = get_field('acabamentos_disponiveis');

if( $images ): ?>
    <div class="acabamentos_disponiveis">
        <div class="title">Acabamentos Dispon&iacute;veis</div>
        <ul>
            <?php foreach( $images as $image ): ?>
                <li>
                    <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>
