<?php
/**
 * Custom Override for com_users.reset.
 *
 * @package		Templates
 * @subpackage  Construc2
 * @author		WebMechanic http://webmechanic.biz
 * @copyright	(C) 2011 WebMechanic. All rights reserved.
 * @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
?>
<div class="line account reset">
	<?php if ($this->params->get('show_page_heading')) : ?>
	<h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
	<?php endif; ?>
       
	<form class="form-validate" id="user-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=reset.request'); ?>" method="post">
<?php foreach ($this->form->getFieldsets() as $fieldset): ?>
		<p><?php echo JText::_($fieldset->label); ?></p>
		<fieldset class="reset">
			<dl class="reset">
		<?php foreach ($this->form->getFieldset($fieldset->name) as $name => $field): ?>
				<dt><?php echo $field->label; ?></dt>
				<dd class="input"><?php echo $field->input; ?></dd>
		<?php endforeach; ?>
			</dl>
		</fieldset>
<?php endforeach; ?>

	<div class="line button">
	<button type="submit" class="validate"><?php echo JText::_('JSUBMIT'); ?></button>
	</div>
	<?php echo JHtml::_('form.token'); ?>
	</form>
</div>
