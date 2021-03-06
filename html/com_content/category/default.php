<?php
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT_SITE .'/helpers');

$show_page_heading   = $this->params->get('show_page_heading');
$show_category_title = $this->params->get('show_category_title');
$page_subheading     = $this->params->get('page_subheading');
$toggle_headings     = ($show_category_title || $page_subheading);
?>
<section class="category-list">
<?php
if ($show_page_heading)
{
	if ($show_page_heading && $toggle_headings) { ?><hgroup><?php } ?>
	<h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
<?php

	if ($show_category_title || $page_subheading) { ?>
	<h2><?php
		echo $this->escape($page_subheading);
		if ($show_category_title) {
			echo '<span class="subheading-category">'.$this->category->title.'</span>';
		}
		?></h2><?php
	}

	if ($show_page_heading && $toggle_headings) { ?></hgroup><?php }
}
?>

<?php
$desc     = $this->params->get('show_description');
$desc_img = $this->params->def('show_description_image');
if ($desc || $desc_img ) { ?>
<div class="category-desc">
	<?php if ($desc_img && ($img_src = $this->category->getParams()->get('image')) ) : ?>
	<img src="<?php echo $img_src; ?>"/>
	<?php endif;
		if ($desc && $this->category->description) {
			echo JHtml::_('content.prepare', $this->category->description);
		}
?><span class="clr"></span>
</div>
<?php }

if (is_array($this->children[$this->category->id])
	&& count($this->children[$this->category->id]) > 0
	&& $this->params->get('maxLevel') !=0
) { ?>
<div class="cat-children">
<?php
echo ($toggle_headings) ? '<h3>' : '<h2>' ;
echo JTEXT::_('JGLOBAL_SUBCATEGORIES');
echo ($toggle_headings) ? '</h3>' : '</h2>' ;

if (count($this->children[$this->category->id]) > 0) {
	echo $this->loadTemplate('children');
}

?>
</div>
<?php } ?>

<div class="cat-items">
<?php echo $this->loadTemplate('articles'); ?>
</div>

</section>
