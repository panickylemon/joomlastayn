<?php

defined('_JEXEC') or die;
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$menu = $app->getMenu();
$lang = JFactory::getLanguage();

$template_url = $this->baseurl . '/templates/' . $this->template;
$doc->addStyleSheet($template_url . '/bootstrap/css/bootstrap.min.css');
$doc->addStyleSheet($template_url . '/css/jquery.reject.css');
$doc->addStyleSheet($template_url . '/css/template.css');
$doc->addStyleSheet($template_url . '/css/media.css');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/bootstrap/js/bootstrap.min.js', 'text/javascript');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/jquery.reject.js', 'text/javascript');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/jquery.inputmask.bundle.js', 'text/javascript');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/ie_message.js', 'text/javascript');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/main.js', 'text/javascript');

$is_home_page = $menu->getActive() == $menu->getDefault($lang->getTag());
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<script type="text/javascript"
	        src="<?php echo $this->baseurl ?>/templates/mytemplate/js/jquery-1.12.0.min.js"></script>
	<jdoc:include type="head"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script type="text/javascript">jQuery.noConflict();</script>
</head>
<body>
<div class="wrapper">
	<header>
		<div class="top_header">

			<div class="wrapper_search left">
				<jdoc:include type="modules" name="search"/>
			</div>

			<div class="basket_header right">
				<jdoc:include type="modules" name="cart"/>
			</div>

		</div>
		<div class="nav_wrap">
			<div class="nav">
				<ul class="menu menu_left left">
					<li class="left">
						<div><a class="menu_left_first" href="/index.php/shop/">МАГАЗИН</a></div>
					</li>
					<li class="right">
						<div><a href="/index.php/blog">БЛОГ</a></div>
					</li>
				</ul>

				<div class="logo">
					<div><a href="/index.php/"><img src="/joomlastayn/templates/mytemplate/images/logo.png"
					                                            alt="логотип"></a></div>
				</div>

				<ul class="menu menu_right right">
					<li class="left">
						<div><a href="/index.php/how-buy/">КАК ЗАКАЗАТЬ</a></div>
					</li>
					<li class="right">
						<div><a class="menu_right_last" href="/index.php/contacts/">КОНТАКТЫ</a></div>
					</li>
				</ul>
				<div class="burger_menu">
					<img src="/joomlastayn/templates/mytemplate/images/menu.png" alt="меню" id="burger_menu">
				</div>
				<div class="burger_menu_close">
					<img src="/joomlastayn/templates/mytemplate/images/close.png" alt=" закрыть меню">
				</div>
			</div>
			<div class="nav_mobile">
				<ul class="menu_mobile">
					<li class="">
						<div><a href="/index.php/shop/">МАГАЗИН</a></div>
					</li>
					<li class="">
						<div><a href="/index.php/blog">БЛОГ</a></div>
					</li>
					<li class="">
						<div><a href="/index.php/how-buy/">КАК ЗАКАЗАТЬ</a></div>
					</li>
					<li class="">
						<div><a href="/index.php/contacts/">КОНТАКТЫ</a></div>
					</li>
				</ul>
			</div>
		</div>
	</header>

	<div class="wrap_content_all_page">
		<div class="main-heading"></div>
		<jdoc:include type="message"/>
		<jdoc:include type="component"/>
	</div>
	<div class="wrap_feedback_form">
	<jdoc:include type="modules" name="feedback"/>
	</div>
</div>

<footer class="footer">
	<div class="footer_border_top">
		<div class="footer_wrapper">
			<div class="menu_footer left">
				<ul>
					<li>
						<div><a href="/index.php/shop/">МАГАЗИН</a></div>
					</li>
					<li>
						<div><a href="/index.php/blog/">БЛОГ</a></div>
					</li>
					<li>
						<div><a href="/index.php/how-buy/">КАК ЗАКАЗАТЬ</a></div>
					</li>
					<li>
						<div><a href="/index.php/contacts/">КОНТАКТЫ</a></div>
					</li>
				</ul>
			</div>
			<div class="icons_social_networks right">
				<div class="icon_footer">
					<a href="https://www.instagram.com" class="image_hover"><img
							src="/joomlastayn/templates/mytemplate/images/insta_hover.png"
							alt="Instagram"></a>
					<a href="https://www.instagram.com" class="image_upper"><img
							src="/joomlastayn/templates/mytemplate/images/insta.png" alt="Instagram"></a>
				</div>
				<div class="icon_footer">
					<a href="https://vk.com" class="image_hover"><img
							src="/joomlastayn/templates/mytemplate/images/vk_hover.png" alt="VK"></a>
					<a href="https://vk.com" class="image_upper"><img
							src="/joomlastayn/templates/mytemplate/images/vk.png"
							alt="VK"></a>
				</div>
				<div class="icon_footer">
					<a href="https://www.facebook.com" class="image_hover"><img
							src="/joomlastayn/templates/mytemplate/images/facebook_hover.png"
							alt="Facebook"></a>
					<a href="https://www.facebook.com" class="image_upper"><img
							src="/joomlastayn/templates/mytemplate/images/facebook.png" alt="Facebook"></a>
				</div>
			</div>
		</div>
	</div>
</footer>


</body>
</html>