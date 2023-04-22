<?php

global $post;
$pricingType = '';
$custom_price = '';
$min = '';
$max = '';
$step = '';

$meta = get_post_meta($post->ID, 'pricimizer_meta', true);
$pricingType = 'fixed_price';
if (!empty($meta)) {
    $pricingType = $meta['pricing_type'];

    if ($meta['pricing_type'] == 'range') {
        $min = $meta['price_data']['min'];
        $max = $meta['price_data']['max'];
        $step = $meta['price_data']['step'];
    } elseif ($meta['pricing_type'] == 'custom_price') {
        $custom_price = $meta['price_data'];
    }
}

echo '<div class="product_custom_field"><h3>Customize Product Price</h3>';
woocommerce_wp_hidden_input([
    'id' => 'price_input_type',
    'label' => __('price_input_type ', 'woocommerce'),
    'value' => $pricingType,
]);
woocommerce_wp_radio([
    'id' => 'price_input_radio',
    'label' => '',
    'options' => [
        'fixed_price' => __('Fixed price'),
        'range' => __('Range'),
        'custom_price' => __('Custom price'),
        'read_from_global_settings' => __('Read from global settings'),
    ],
    'default' => $pricingType,
]);
echo '<div id="show_range" class="price_set" style="display: none;" >';
woocommerce_wp_text_input([
    'id' => 'min',
    'placeholder' => 'Enter Minimum value ',
    'label' => __('Min', 'woocommerce') . ':',
    'type' => 'text',
    'value' => $min,
]);
woocommerce_wp_text_input([
    'id' => 'step',
    'placeholder' => 'Enter Step ',
    'label' => __('Step', 'woocommerce'). ':',
    'type' => 'text',
    'value' => $step,
]);
woocommerce_wp_text_input([
    'id' => 'max',
    'placeholder' => 'Enter Max value ',
    'label' => __('Max', 'woocommerce') . ':',
    'type' => 'text',
    'value' => $max,
]);
echo '</div><div id="show_custom_price" class="price_set" style="display: none;">';
woocommerce_wp_text_input([
    'id' => 'custom_price',
    'placeholder' => 'Enter custom prices',
    'label' => __('Custom price', 'woocommerce') . '<br /><small>(Comma separated)</small>',
    'value' => $custom_price,
]);
echo '</div>';
echo '</div>';