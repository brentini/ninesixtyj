<?php
// no direct access
defined( '_JEXEC' ) or die;

// build the full path to the template files
$templatePath = $this->baseurl.'/templates/'.$this->template; // template path

// get the site name
$config		= JFactory::getConfig();
$siteName	= $config->getValue('config.sitename');

// determine which positions we want to show
$showLeftPosition	= $this->countModules('left');
$showRightPosition  = $this->countModules('right');
$showTopPosition    = $this->countModules('top');
$showUser1User2User3Positions = $this->countModules('user1 or user2 or user3');
$showUser1Position  = $this->countModules('user1');
$showUser2Position  = $this->countModules('user2');
$showUser3Position  = $this->countModules('user3');
$showUser4Position  = $this->countModules('user4');

// Set Container and Grid to grid-12 or grid-16
$GridContainer = 12;

// defaults
$leftPositionWidth = $rightPositionWidth = 0;
// calculate column widths of positions left, component and right
if ($showLeftPosition) {
	// Set the Grid to show left Position if countModules = TRUE
	$leftPositionWidth  = 2;
}

if ($showRightPosition) {
	// Set the Grid to show right Position if countModules = TRUE
	$rightPositionWidth  = 2;
}

$componentWidth     = $GridContainer - $leftPositionWidth - $rightPositionWidth;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
	<jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo $templatePath; ?>/css/reset.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $templatePath; ?>/css/text.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $templatePath; ?>/css/960.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $templatePath; ?>/css/template_css.css" type="text/css" />
</head>

<body>
	<div class="container-<?php echo $GridContainer; ?>">
		<div class="grid-<?php echo $GridContainer; ?> header">
            <h1>
                <?php echo $siteName; ?>
            </h1>
		</div>
        <div class="clear"></div>

        <?php if ($showTopPosition) : ?>
        <div class="grid-<?php echo $GridContainer; ?>">
            <jdoc:include type="modules" name="top" style="box" />
        </div>
        <div class="clear"></div>
        <?php endif; ?>

        <div class="grid-<?php echo $leftPositionWidth; ?>">
            <jdoc:include type="modules" name="left" style="box" />
        </div>
        <div class="grid-<?php echo $componentWidth; ?>">
            <jdoc:include type="message" />
            <jdoc:include type="component" />
        </div>
        <?php if ($showRightPosition) : ?>
        <div class="grid-<?php echo $rightPositionWidth; ?>">
            <jdoc:include type="modules" name="right" style="box" />
        </div>
        <?php endif; ?>
        <div class="clear"></div>

        <?php if ($showUser1User2User3Positions) : ?>
        <div class="grid-4">
            <?php if ($showUser1Position) : ?>
            <jdoc:include type="modules" name="user1" style="box" />
            <?php else : ?>
            &nbsp;
            <?php endif; ?>
        </div>
        <div class="grid-4">
            <?php if ($showUser2Position) : ?>
            <jdoc:include type="modules" name="user2" style="box" />
            <?php else : ?>
            &nbsp;
            <?php endif; ?>
        </div>
        <div class="grid-4">
            <?php if ($showUser3Position) : ?>
            <jdoc:include type="modules" name="user3" style="box" />
            <?php else : ?>
            &nbsp;
            <?php endif; ?>
        </div>
        <div class="clear"></div>
        <?php endif; ?>

        <?php if ($showUser4Position) : ?>
        <div class="grid-12">
            <jdoc:include type="modules" name="user4" style="box" />
        </div>
        <div class="clear"></div>
        <?php endif; ?>
	</div>

</body>
</html>