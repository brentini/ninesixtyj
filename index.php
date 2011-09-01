<?php
// no direct access
defined( '_JEXEC' ) or die;

// build the full path to the template files
$templatePath = $this->baseurl.'/templates/'.$this->template; // template path

// get the site name
$config		= JFactory::getConfig();
$siteName	= $config->get('config.sitename');

// determine which positions we want to show
$showLeftPosition	= $this->countModules('left');
$showRightPosition  = $this->countModules('right');
$showTopPosition    = $this->countModules('top');
$showTopmenuPosition    = $this->countModules('topmenu');
$showUser1User2User3Positions = $this->countModules('user1 or user2 or user3');
$showUser1Position  = $this->countModules('user1');
$showUser2Position  = $this->countModules('user2');
$showUser3Position  = $this->countModules('user3');
$showUser4User5User5Positions = $this->countModules('user4 or user5 or user6');
$showUser4Position  = $this->countModules('user4');
$showUser5Position  = $this->countModules('user5');
$showUser6Position  = $this->countModules('user6');
$showFooterPosition  = $this->countModules('footer');

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
    <link rel="stylesheet" href="<?php echo $templatePath; ?>/css/clearfix.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $templatePath; ?>/css/template_css.css" type="text/css" />
</head>

<body>
<div id="page-wrapper" class="page">

    <!-- ***************** top *************** -->
    <?php if ($showTopPosition) : ?>
    <div id="top-wrapper">
        <div class="top-wrapper-inner container-<?php echo $GridContainer; ?> region clearfix">
            <jdoc:include type="modules" name="top" style="box" />
        </div>
    </div>
    <?php endif; ?>

  <!-- ***************** header *************** -->
    <div id="header-wrapper">
        <div class="header-wrapper-inner container-<?php echo $GridContainer; ?> region header clearfix">
            <h1>
                <?php echo $siteName; ?>
            </h1>
        </div>
    </div>

  <!-- ***************** topmenu *************** -->
    <?php if ($showTopmenuPosition) : ?>
    <div id="topmenu-wrapper">
        <div class="topmenu-wrapper-inner container-<?php echo $GridContainer; ?> region clearfix">
            <jdoc:include type="modules" name="topmenu" style="box" />
        </div>
    </div>
    <?php endif; ?>

  <!-- ***************** user 1,2,3 *************** -->
    <?php if ($showUser1User2User3Positions) : ?>
    <div id="usertop-wrapper">
        <div class="usertop-wrapper-inner container-<?php echo $GridContainer; ?> region clearfix">
            <div class="grid-4 user-1">
                <?php if ($showUser1Position) : ?>
                <jdoc:include type="modules" name="user1" style="box" />
                <?php else : ?>
                &nbsp;
            <?php endif; ?>
            </div>
            <div class="grid-4 user-2">
                <?php if ($showUser2Position) : ?>
                <jdoc:include type="modules" name="user2" style="box" />
                <?php else : ?>
                &nbsp;
                <?php endif; ?>
            </div>
            <div class="grid-4 user-3">
                <?php if ($showUser3Position) : ?>
                <jdoc:include type="modules" name="user3" style="box" />
                <?php else : ?>
                &nbsp;
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

  <!-- ***************** main *************** -->
    <div id="main-wrapper">
        <div class="main-wrapper-inner container-<?php echo $GridContainer; ?> region clearfix">

        <!-- ***************** left *************** -->
            <div class="grid-<?php echo $leftPositionWidth; ?> left">
                <jdoc:include type="modules" name="left" style="box" />
            </div>

        
        <!-- ***************** content *************** -->
            <div class="grid-<?php echo $componentWidth; ?> content">
                <jdoc:include type="message" />
                <jdoc:include type="component" />
            </div>

        <!-- ***************** right *************** -->
            <?php if ($showRightPosition) : ?>
                <div class="grid-<?php echo $rightPositionWidth; ?> right">
                <jdoc:include type="modules" name="right" style="box" />
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- ***************** user 4,5,6 *************** -->
    <?php if ($showUser4User5User6Positions) : ?>
    <div id="userbottom-wrapper">
        <div class="userbottom-wrapper-inner container-<?php echo $GridContainer; ?> region clearfix">
            <div class="grid-4 user-4">
                <?php if ($showUser4Position) : ?>
                <jdoc:include type="modules" name="user4" style="box" />
                <?php else : ?>
                &nbsp;
            <?php endif; ?>
            </div>
            <div class="grid-4 user-5">
                <?php if ($showUser5Position) : ?>
                <jdoc:include type="modules" name="user5" style="box" />
                <?php else : ?>
                &nbsp;
                <?php endif; ?>
            </div>
            <div class="grid-4 user-6">
                <?php if ($showUser6Position) : ?>
                <jdoc:include type="modules" name="user6" style="box" />
                <?php else : ?>
                &nbsp;
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- ***************** footer *************** -->
    <?php if ($showFooterPosition) : ?>
    <div id="footer-wrapper">
        <div class="footer-wrapper-inner container-<?php echo $GridContainer; ?> region clearfix">
            <div class="grid-12 footer">
                <jdoc:include type="modules" name="footer" style="box" />
            </div>
        </div>
	</div>
    <?php endif; ?>
</div>
</body>
</html>