<?php
/**
 * @version      4.8.0 13.08.2013
 * @author       MAXXmarketing GmbH
 * @package      Jshopping
 * @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
 * @license      GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<div class="finish_block col-md-10 col-sm-9 col-xs-12">

	<?php if (!empty($this->text)) { ?>
		<?php echo $this->text; ?>
	<?php } else { ?>
		<p>Спасибо за заказ! На Вашу электронную почту отправлен счёт на оплату. </p>
	<?php } ?>
</div>
