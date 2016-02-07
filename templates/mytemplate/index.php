<?php

defined('_JEXEC') or die;
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$menu = $app->getMenu();
$lang = JFactory::getLanguage();

$template_url = $this->baseurl . '/templates/' . $this->template;
$doc->addStyleSheet($template_url . '/css/template.css');
$doc->addStyleSheet($template_url . '/css/media.css');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/jquery-1.12.0.min.js', 'text/javascript');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/main.js', 'text/javascript');

$is_home_page = $menu->getActive() == $menu->getDefault($lang->getTag());
?>

<!doctype html>
<html xmlns:jdoc="http://www.w3.org/2001/XInclude">
<head>

	<jdoc:include type="head"/>
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
			<div class="checkin left">
				<div><a href="/joomlastayn/index.php/lichnyj-kabinet/login">
						<?php
						$user = JFactory::getUser();
						if (!$user->guest) {
							echo 'Привет, '.$user->username;

						} else {
							echo 'Вход | Pегистрация';
						}
						?>

					</a>
					</div>

			</div>

			<div class="basket_header right">
				<jdoc:include type="modules" name="cart"/>
			</div>

		</div>
		<div class="nav_wrap">
			<div class="nav">
				<ul class="menu menu_left left">
					<li class="left">
						<div><a class="menu_left_first" href="/joomlastayn/index.php/shop/">МАГАЗИН</a></div>
					</li>
					<li class="right">
						<div><a href="/joomlastayn/index.php/blog">БЛОГ</a></div>
					</li>
				</ul>

				<div class="logo">
					<div><a href="/joomlastayn/index.php/"><img src="/joomlastayn/templates/mytemplate/images/logo.png"
					                                            alt="логотип"></a></div>
				</div>

				<ul class="menu menu_right right">
					<li class="left">
						<div><a href="/joomlastayn/index.php/how-buy/">КАК ЗАКАЗАТЬ</a></div>
					</li>
					<li class="right">
						<div><a class="menu_right_last" href="/joomlastayn/index.php/contacts/">КОНТАКТЫ</a></div>
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
						<div><a href="#">МАГАЗИН</a></div>
					</li>
					<li class="">
						<div><a href="#">БЛОГ</a></div>
					</li>
					<li class="">
						<div><a href="#">КАК ЗАКАЗАТЬ</a></div>
					</li>
					<li class="">
						<div><a href="#">КОНТАКТЫ</a></div>
					</li>
				</ul>
			</div>
		</div>
	</header>

	<div class="wrap_content_all_page">
		<jdoc:include type="modules" name="form-1"/>
		<jdoc:include type="modules" name="search"/>
		<div class="list_categories">
			<jdoc:include type="modules" name="categories"/>
		</div>


		<div class="main-heading"></div>
		<jdoc:include type="message"/>
		<jdoc:include type="component"/>
	</div>
</div>

<footer class="footer">
	<div class="footer_wrapper">
		<div class="menu_footer left">
			<ul>
				<li>
					<div><a href="/joomlastayn/index.php/shop/">МАГАЗИН</a></div>
				</li>
				<li>
					<div><a href="/joomlastayn/index.php/blog/">БЛОГ</a></div>
				</li>
				<li>
					<div><a href="/joomlastayn/index.php/how-buy/">КАК ЗАКАЗАТЬ</a></div>
				</li>
				<li>
					<div><a href="/joomlastayn/index.php/contacts/">КОНТАКТЫ</a></div>
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
				<a href="https://vk.com" class="image_upper"><img src="/joomlastayn/templates/mytemplate/images/vk.png"
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
</footer>


</body>
</html>