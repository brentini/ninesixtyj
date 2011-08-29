<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$templatePath = $this->baseurl.'/templates/'.$this->template; // template path
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>
	<jdoc:include type="head" />
	<meta http-equiv="Content-Type" content="text/html;<?php echo _ISO; ?>" />
    <link rel="stylesheet" href="<?php echo $templatePath; ?>/css/reset.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $templatePath; ?>/css/text.css" type="text/css" />
    <style media="screen" >
        <!--
        body {
            padding: 0.5em;
        }
        -->
    </style>
</head>

<body class="contentpane">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</body>

</html>
