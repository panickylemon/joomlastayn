<div id = "jshop_module_cart">

    <a class="cart_header" href = "<?php print SEFLink('index.php?option=com_jshopping&controller=cart&task=view', 1)
    ?>">
        <img class="left" src="/joomlastayn/templates/mytemplate/images/cart2.png" alt="корзина">
        <span class="cart_header_text">Корзина</span>
        <span class="count_cart_header right" id = "jshop_quantity_products">(<?php print
                $cart->count_product?>)
        </span>
    </a>

</div>