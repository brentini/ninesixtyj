<?php
/**
 * A better mod_menu override
 *
 * Magic class_sfx '_ordered' or '_ol' uses an ordered list instead
 * of the standard unordered list for rendering. Other params apply.
 *
 * @package		Template
 * @subpackage	HTML
 * @author		WebMechanic http://webmechanic.biz
 * @copyright	Copyright (C)2011 WebMechanic. All rights reserved.
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/* SearchHelper knows about the (enhanced) stop words list in xx_XXLocalise
 * and is misused to clean the alias for use as a class name of list items
 */
JLoader::register('SearchHelper', JPATH_ADMINISTRATOR .'/components/com_search/helpers/search.php');
// need this to find the default language
$locale = JFactory::getLanguage()->get('tag');

$elt = 'ul';

if ( preg_match('#(?:[_|-](ordered|ol))#iu', $class_sfx, $m) )
{
	$elt		= 'ol';
	$class_sfx	= str_replace($m[0], '', $class_sfx);

	// find template css override or use default 'better_menu.css'
	$tplname	= $app->getTemplate();
	$class_sfx .= ' btrmnu';
	if (is_file(dirname(__FILE__) . '/better_'. $tplname. '.css')) {
		$class_sfx .= ' '.$tplname;
		$style 		= 'better_'. $tplname. '.css';
	} else {
		$style 		= 'better_menu.css';
	}

	JFactory::getDocument()->addStyleSheet(JURI::base(true).'/templates/'.$tplname.'/html/mod_menu/'. $style);
	unset($tplname, $style);
}

// Note. It is important to remove spaces between elements.
?>
<<?php echo $elt;?> class="menu <?php echo $class_sfx;?>"<?php
	if ($tag_id = $params->get('tag_id', null)) {
		echo ' id="'.$tag_id.'"';
	}
?>>
<?php
foreach ($list as $i => &$item) :

	$alias = str_replace('-', ' ', $item->alias);
	SearchHelper::santiseSearchWord($alias, $item->alias);

	// even if it proxies, singularization is fine for this
	if ($item->language == 'de-DE' || $locale == 'de-DE') {
		if ( method_exists('de_DELocalise', 'singularize') ) {
			$alias = de_DELocalise::singularize($alias);
		}
	}
	// fall back for english
	elseif ($item->language == 'en-GB' || $locale == 'en-GB') {
		// @todo test if JLanguage was patched to contain getSingular()
		// @todo test if Localise::INFLECTION is true
		if ( method_exists('en_GBLocalise', 'singularize') ) {
			$alias = en_GBLocalise::singularize($alias);
		}
	}
	else {
		// do some smart check for other xx-XXLocalise class
		// call static class via variable. 5.3+
	}
	$alias = str_replace(' ', '_', $alias);

	$class = array('mi', $alias);

	if ($item->id == $active_id) {
		$class[] = 'current ';
	}

	if (	$item->type == 'alias' &&
			in_array($item->params->get('aliasoptions'),$path)
		||	in_array($item->id, $path)) {
	  $class[] = 'active ';
	}
	if ($item->deeper) {
		$class[] = 'deeper ';
	}

	if ($item->parent) {
		$class[] = 'parent ';
	}

	if (!empty($class)) {
		$class = ' class="'.implode(' ', $class) .'"';
	}

	echo '<li id="item-'.$item->id.'"'.$class.'>';

	// Render the menu item.
	switch ($item->type) :
		case 'separator':
		case 'url':
		case 'component':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
			break;
	endswitch;

	// The next item is deeper.
	if ($item->deeper) {
		echo '<'. $elt .' class="submenu">';
	}
	// The next item is shallower.
	else if ($item->shallower) {
		echo '</li>';
		echo str_repeat('</'.$elt.'></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else {
		echo '</li>';
	}
endforeach;
?></<?php echo $elt;?>>
