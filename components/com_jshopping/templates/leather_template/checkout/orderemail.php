<?php
/**
 * @version      4.11.2 18.08.2013
 * @author       MAXXmarketing GmbH
 * @package      Jshopping
 * @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
 * @license      GNU/GPL
 */
defined('_JEXEC') or die();
?>
<?php $order = $this->order; ?>
<html>
<title></title>
<head>
	<style type="text/css">
		html {
			font-family: Arial;
			line-height: 100%;
		}

		body, td {
			font-size: 11px;
			font-family: Arial;
		}

		.table_items{
			font-size: 9px;
		}

		body{
			max-width: 600px;
		}

		td.bg_gray, tr.bg_gray td {
			background-color: #CCCCCC;
		}

		table {
			border-collapse: collapse;
			border: 0;
		}

		td {
			padding-left: 3px;
			padding-right: 3px;
			padding-top: 0px;
			padding-bottom: 0px;
		}

		tr.bold td {
			font-weight: bold;
		}

		tr.vertical td {
			vertical-align: top;
			padding-bottom: 9px;
		}

		h3 {
			font-size: 14px;
			margin: 0px;
		}

		.jshop_cart_attribute {
			padding-top: 2px;
			font-size: 10px;
		}

		.taxinfo {
			font-size: 10px;
		}
	</style>
</head>
<body>
<?php print $this->_tmp_ext_html_ordermail_start ?>

<h3>Заказ</h3>
<p>Номер заказа: <?php print $this->order->order_number ?></p>
<p>Дата заказа: <?php print $this->order->order_date ?></p>

<?php if ($this->show_customer_info) { ?>
<h3>Информация о клиенте</h3>
<p>Ф.И.О.: <?php print $this->order->f_name ?> <?php print $this->order->l_name ?> <?php print $this->order->m_name
	?></p>
<p>Адрес: <?php print $this->order->city ?></p>
<p>Телефон: <?php print $this->order->phone ?></p>
<p>Email: <?php print $this->order->email ?></p>

<?php } ?>
<?php print $this->_tmp_ext_html_ordermail_after_customer_info; ?>

<br>
<table width="90%" align="center" border="0" cellspacing="0" cellpadding="0" style="line-height:100%;">

	<tr>
		<td colspan="2" class="bg_gray">
			<h3><?php print _JSHOP_ORDER_ITEMS ?></h3>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="padding:0px;padding-top:10px;">
			<table width="100%" cellspacing="0" cellpadding="0" class="table_items" align="center">
				<tr>
					<td colspan="5" style="vertical-align:top;padding-bottom:5px;font-size:1px;">
						<div style="height:1px;border-top:1px solid #999;"></div>
					</td>
				</tr>
				<tr class="bold">
					<td width="25%" style="padding-left: 0px"><?php print _JSHOP_NAME_PRODUCT ?></td>
					<td width="20%"
					    style="padding-bottom:5px;"><?php if ($this->config->show_product_code_in_order) { ?><?php print _JSHOP_EAN_PRODUCT ?><?php } ?></td>
					<td width="15%" style="padding-bottom:5px;"><?php print _JSHOP_QUANTITY ?></td>
					<td width="20%" style="padding-bottom:5px;"><?php print _JSHOP_SINGLEPRICE ?></td>
					<td width="20%" style="padding-bottom:5px;"><?php print _JSHOP_PRICE_TOTAL ?></td>
				</tr>
				<tr>
					<td colspan="5" style="vertical-align:top;padding-bottom:10px;font-size:1px;">
						<div style="height:1px;border-top:1px solid #999;"></div>
					</td>
				</tr>
				<?php
				foreach ($this->products as $key_id => $prod) {
					$files = unserialize($prod->files);
					?>
					<tr class="vertical">
						<td>
<!--							<img-->
<!--								src="--><?php //print $this->config->image_product_live_path ?><!--/--><?php //if ($prod->thumb_image) print $prod->thumb_image; else print $this->noimage; ?><!--"-->
<!--								align="left" style="margin-right:5px;">-->
							<?php print $prod->product_name; ?>
							<?php if ($prod->manufacturer != '') { ?>
								<div class="manufacturer"><?php print _JSHOP_MANUFACTURER ?>:
									<span><?php print $prod->manufacturer ?></span></div>
							<?php } ?>
							<div class="jshop_cart_attribute">
								<?php print sprintAtributeInOrder($prod->product_attributes) ?>
								<?php print sprintFreeAtributeInOrder($prod->product_freeattributes) ?>
								<?php print sprintExtraFiledsInOrder($prod->extra_fields) ?>
							</div>
							<?php print $prod->_ext_attribute_html; ?>
							<?php if ($this->config->display_delivery_time_for_product_in_order_mail && $prod->delivery_time) { ?>
								<div class="deliverytime"><?php print _JSHOP_DELIVERY_TIME ?>
									: <?php print $prod->delivery_time ?></div>
							<?php } ?>
						</td>
						<td><?php if ($this->config->show_product_code_in_order) { ?><?php print $prod->product_ean; ?><?php } ?></td>
						<td><?php print formatqty($prod->product_quantity); ?><?php print $prod->_qty_unit; ?></td>
						<td>
							<?php print formatprice($prod->product_item_price, $order->currency_code) ?>
							<?php print $prod->_ext_price_html ?>
							<?php if ($this->config->show_tax_product_in_cart && $prod->product_tax > 0) { ?>
								<div
									class="taxinfo"><?php print productTaxInfo($prod->product_tax, $order->display_price); ?></div>
							<?php } ?>
							<?php if ($this->config->cart_basic_price_show && $prod->basicprice > 0) { ?>
								<div class="basic_price"><?php print _JSHOP_BASIC_PRICE ?>:
									<span><?php print sprintBasicPrice($prod); ?></span></div>
							<?php } ?>
						</td>
						<td>
							<?php print formatprice($prod->product_item_price * $prod->product_quantity, $order->currency_code); ?>
							<?php print $prod->_ext_price_total_html ?>
							<?php if ($this->config->show_tax_product_in_cart && $prod->product_tax > 0) { ?>
								<div
									class="taxinfo"><?php print productTaxInfo($prod->product_tax, $order->display_price); ?></div>
							<?php } ?>
						</td>
					</tr>
					<?php if (count($files)) { ?>
						<tr>
							<td colspan="5">
								<?php foreach ($files as $file) { ?>
									<div><?php print $file->file_descr ?> <a
											href="<?php print JURI::root() ?>index.php?option=com_jshopping&controller=product&task=getfile&oid=<?php print $this->order->order_id ?>&id=<?php print $file->id ?>&hash=<?php print $this->order->file_hash ?>&rl=1"><?php print _JSHOP_DOWNLOAD ?></a>
									</div>
								<?php } ?>
							</td>
						</tr>
					<?php } ?>
					<tr>
						<td colspan="5" style="vertical-align:top;padding-bottom:10px;font-size:1px;">
							<div style="height:1px;border-top:1px solid #999;"></div>
						</td>
					</tr>
				<?php } ?>
				<?php if ($this->show_weight_order && $this->config->show_weight_order) { ?>
					<tr>
						<td colspan="5" style="text-align:right;font-size:11px;">
							<?php print _JSHOP_WEIGHT_PRODUCTS ?>:
							<span><?php print formatweight($this->order->weight); ?></span>
						</td>
					</tr>
				<?php } ?>
				<?php if ($this->show_total_info) { ?>
					<tr>
						<td colspan="5">&nbsp;</td>
					</tr>
					<?php if (!$this->hide_subtotal) { ?>
						<tr>
							<td colspan="4" align="right" style="padding-right:15px;"><?php print _JSHOP_SUBTOTAL ?>:
							</td>
							<td class="price"><?php print formatprice($this->order->order_subtotal, $order->currency_code); ?><?php print $this->_tmp_ext_subtotal ?></td>
						</tr>
					<?php } ?>
					<?php print $this->_tmp_html_after_subtotal ?>
					<?php if ($this->order->order_discount > 0) { ?>
						<tr>
							<td colspan="4" align="right"
							    style="padding-right:15px;"><?php print _JSHOP_RABATT_VALUE ?><?php print $this->_tmp_ext_discount_text ?>
								:
							</td>
							<td class="price">
								-<?php print formatprice($this->order->order_discount, $order->currency_code); ?><?php print $this->_tmp_ext_discount ?></td>
						</tr>
					<?php } ?>
					<?php if (!$this->config->without_shipping) { ?>
						<tr>
							<td colspan="4" align="right"
							    style="padding-right:15px;"><?php print _JSHOP_SHIPPING_PRICE ?>:
							</td>
							<td class="price"><?php print formatprice($this->order->order_shipping, $order->currency_code); ?><?php print $this->_tmp_ext_shipping ?></td>
						</tr>
					<?php } ?>
					<?php if (!$this->config->without_shipping && ($order->order_package > 0 || $this->config->display_null_package_price)) { ?>
						<tr>
							<td colspan="4" align="right"
							    style="padding-right:15px;"><?php print _JSHOP_PACKAGE_PRICE ?>:
							</td>
							<td class="price"><?php print formatprice($this->order->order_package, $order->currency_code); ?><?php print $this->_tmp_ext_shipping_package ?></td>
						</tr>
					<?php } ?>
					<?php if ($this->order->order_payment != 0) { ?>
						<tr>
							<td colspan="4" align="right"
							    style="padding-right:15px;"><?php print $this->order->payment_name; ?>:
							</td>
							<td class="price"><?php print formatprice($this->order->order_payment, $order->currency_code); ?><?php print $this->_tmp_ext_payment ?></td>
						</tr>
					<?php } ?>
					<?php if (!$this->config->hide_tax) { ?>
						<?php foreach ($this->order->order_tax_list as $percent => $value) { ?>
							<tr>
								<td colspan="4" align="right"
								    style="padding-right:15px;"><?php print displayTotalCartTaxName($order->display_price); ?><?php if ($this->show_percent_tax) print " " . formattax($percent) . "%"; ?>
									:
								</td>
								<td class="price"><?php print formatprice($value, $order->currency_code); ?><?php print $this->_tmp_ext_tax[$percent] ?></td>
							</tr>
						<?php } ?>
					<?php } ?>
					<tr>
						<td colspan="4" align="right" style="padding-right:15px;"><b><?php print $this->text_total ?>
								:</b></td>
						<td class="price">
							<b><?php print formatprice($this->order->order_total, $order->currency_code) ?><?php print $this->_tmp_ext_total ?></b>
						</td>
					</tr>
					<?php print $this->_tmp_html_after_total ?>
					<tr>
						<td colspan="5">&nbsp;</td>
					</tr>

				<?php } ?>
			</table>
		</td>
	</tr>
</table>


<?php if ($this->show_payment_shipping_info) { ?>
<?php if (!$this->config->without_payment || !$this->config->without_shipping) { ?>
	<?php if (!$this->config->without_shipping) { ?>
		<h3>Информация о доставке</h3>
	<?php } ?>
	<?php if (!$this->config->without_shipping) { ?>
		<div>
			<?php print nl2br($this->order->shipping_information); ?>
		</div>
		<?php } ?>
	<?php } ?>
<?php } ?>


<?php if (!$this->client) { ?>
<h4>Замечания клиента: </h4>
	<p><?php print $this->order->order_add_info ?></p>
<?php } ?>

<?php print $this->_tmp_ext_html_ordermail_end ?>
<br>

</body>
</html>