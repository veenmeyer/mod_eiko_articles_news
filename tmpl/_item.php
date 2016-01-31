<?php

/**

 * @package     Joomla.Site

 * @subpackage  mod_eiko_articles_news

 *

 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.

 * @license     GNU General Public License version 2 or later; see LICENSE.txt

 */



defined('_JEXEC') or die;

$item_heading = $params->get('item_heading', 'h4');

$obj = json_decode($item->images);

$db = JFactory::getDbo();
               $db->setQuery('SELECT cat.title,cat.params FROM #__categories cat  WHERE cat.id="'.$item->catid.'"');   
               $category_title = $db->loadObject();

$obj_cat = json_decode($category_title->params);


?>

<td  style="width:150px;vertical-align: bottom !important;margin-left:5px;padding-left:5px;margin-right:5px;padding-right:5px;margin-top:5px;padding-top:5px;margin-bottom:5px;padding-bottom:5px;">
<?php if ($obj->image_intro) :?>
<img src="<?php echo $obj->image_intro;?>" style ="width:<?php echo $params->get('img_width');?>;" width="<?php echo $params->get('img_width');?>" alt="<?php echo $item->title;?>">
<?php else :?>
<?php if ($obj_cat->image) :?>
<img src="<?php echo $obj_cat->image;?>" style ="width:<?php echo $params->get('img_width');?>;" width="<?php echo $params->get('img_width');?>" alt="<?php echo $category_title->title;?>">
<?php endif;?>
<?php endif;?>
</td>

<td style="margin-left:5px;padding-left:5px;margin-right:5px;padding-right:5px;margin-top:5px;padding-top:5px;margin-bottom:5px;padding-bottom:5px;">
<?php if ($params->get('item_title')) : ?>



	<<?php echo $item_heading; ?> class="newsflash-title<?php echo $params->get('moduleclass_sfx'); ?>">
<?php
               /* Printing category title*/
               if ($category_title->title)
               {
                   echo '<span style="font-weight:bold;color:'.$params->get('color_title').';">'.date("d-m-Y", strtotime($item->publish_up)).'  '.$category_title->title.'</span><br/>';  
               }   
?>

	<?php if ($params->get('link_titles') && $item->link != '') : ?>

		<a href="<?php echo $item->link;?>">

			<?php echo $item->title;?></a>

	<?php else : ?>

		<?php echo '<span style="color:'.$params->get('color_title').';">'.$item->title.'</span>'; ?>

	<?php endif; ?>

	</<?php echo $item_heading; ?>>



<?php endif; ?>


<?php if (!$params->get('intro_only')) :

	echo $item->afterDisplayTitle;

endif; ?>



<?php 


?>

<?php echo $item->beforeDisplayContent; ?>


<!--<?php echo $item->introtext; ?>-->



<?php if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) :

	echo '<a class="readmore" href="'.$item->link.'">'.$item->linkText.'</a>';

	?>

<?php endif; ?>

</td>

