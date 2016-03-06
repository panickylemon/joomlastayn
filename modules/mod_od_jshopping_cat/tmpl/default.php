<?php
defined('_JEXEC') or die('Restricted access');
error_reporting(E_ALL & ~E_NOTICE);

if (!empty($arResult)):
?>
	<div class="buttons_mobile_shop">
		<div class="link_all_categories_display">
			<a>
				<div class="all_categories_display">Все категории</div>
			</a>
		</div>

		<div class="link_all_filters_display">
			<a>
				<div class="all_filters_display">Фильтры</div>
			</a>
		</div>
	</div>
	<a href="/index.php/shop/"><p class="title_all_categories">Все категории</p></a>

<ul class="odcat <?php if($class){ echo $class;}?>">
<?php 
$previousLevel = 0;
foreach($arResult as $arItem):
?>
	<?php if ($previousLevel && $arItem["DEPTH"] < $previousLevel):?>
		<?php echo str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH"]));?>
	<?php endif?>
	<?php if ($arItem["IS_PARENT"]):?>
		<?php if ($arItem["DEPTH"] == 1):?>
			<li>
				<a href="<?php echo $arItem["LINK"]?>" class="root parent<?php if ($arItem["SELECTED"]):?> selected<?php endif?>">
					<div>
					<?php echo $arItem["NAME"]?><?php if($count){echo ' ('.$arItem["COUNT"].')';}?></div>
				</a>
				<ul class="odsubcat-<?php echo $arItem["DEPTH"]?>">
		<?php else:?>
			<li>
				<a href="<?php echo $arItem["LINK"]?>" class="parent<?php if ($arItem["SELECTED"]):?> selected<?php endif?>">
					<div>
					<?php echo $arItem["NAME"]?><?php if($count){echo ' ('.$arItem["COUNT"].')';}?></div>
				</a>
				<ul class="odsubcat-<?php echo $arItem["DEPTH"]?>">
		<?php endif?>
	<?php else:?>
			<?php if ($arItem["DEPTH"] == 1):?>
				<li>
					<a href="<?php echo $arItem["LINK"]?>" class="root<?php if ($arItem["SELECTED"]):?> selected<?php endif?>">
						<div>
						<?php echo $arItem["NAME"]?><?php if($count){echo ' ('.$arItem["COUNT"].')';}?></div>
					</a>
				</li>
			<?php else:?>
				<li>
					<a href="<?php echo $arItem["LINK"]?>" <?php if ($arItem["SELECTED"]):?>class="selected"<?php endif?>>
						<div>
						<?php echo $arItem["NAME"]?><?php if($count){echo ' ('.$arItem["COUNT"].')';}?></div>
					</a>
				</li>
			<?php endif?>
	<?php endif?>
	<?php $previousLevel = $arItem["DEPTH"];?>
<?php endforeach?>
<?php if ($previousLevel > 1)://close last item tags?>
	<?php echo str_repeat("</ul></li>", ($previousLevel-1) );?>
<?php endif?>
</ul>
<?php endif?>