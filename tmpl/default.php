<?php

/**

 * @package     Joomla.Site

 * @subpackage  mod_eiko_articles_news

 *

 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.

 * @license     GNU General Public License version 2 or later; see LICENSE.txt

 */



defined('_JEXEC') or die;
?>


<div style="width:<?php echo $params->get('width');?>;margin-bottom:10px;padding-bottom:10px;margin-left:10px;padding-left:10px;margin-top:10px;padding-top:10px;margin-right:10px;padding-right:10px;background:linear-gradient(to bottom left, <?php echo $params->get('color1');?>, <?php echo $params->get('color2');?>);border-radius: 18px ;">
<h2 style="text-decoration:underline;"><?php echo $params->get('title');?></h2>

<ul class="newsflash-horiz<?php echo $params->get('moduleclass_sfx'); ?>">
<table width="<?php echo $params->get('width');?>">
<?php for ($i = 0, $n = count($list); $i < $n; $i ++) :

	$item = $list[$i]; //print_r ($item);
	?>

	<tr style="border-bottom: 1px dashed #F9AB01;">

	<?php require JModuleHelper::getLayoutPath('mod_eiko_articles_news', '_item');



	if ($n > 1 && (($i < $n - 1) || $params->get('showLastSeparator'))) : ?>



	<span class="article-separator">&#160;</span>



	<?php endif; ?>

	</tr>

<?php endfor; ?>
</table>
</ul>
</div>
