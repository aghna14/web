/**handles:kt-wc-add-to-cart-variation**/
jQuery(document).ready(function($){var i=$(".product form.variations_form"),n=i.find(".single_variation_wrap");i.on("reset_data",function(){i.find(".single_variation_wrap_kad").find(".quantity").hide(),i.find(".single_variation .price").hide()}),i.on("woocommerce_variation_has_changed",function(){$(".kad-select").trigger("update")}),n.on("hide_variation",function(){$(this).css("height","auto")})});