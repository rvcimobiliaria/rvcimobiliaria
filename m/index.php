<?php
//Verifico se o arquivo existe
if(file_exists("../init.php")) {
	require "../init.php";		
} else {
	echo "Arquivo init.php nao foi encontrado";
	exit;
}
//verifico se a função que eu criei existe, vai que alguem pegou meu script e apagou ela = )
if(!function_exists("Abre_Conexao")) {
	echo "Erro o arquivo init.php foi auterado, nao existe a função Abre_Conexao";
	exit;
}

Abre_Conexao();

//verifico se nao deu erro de mysql
if(mysql_errno() != 0) {
                //verifico se a $errros existe, mesma coisa vai que alguem meche no script e apagou ela
	if(!isset($erros)) {
		echo "Erro o arquivo init.php foi auterado, nao existe \$erros";
		exit;
	}
	echo $erros[mysql_errno()];
	exit;
}	
$query_imovel = "SELECT * FROM IMOVEL WHERE STATUS_IMOVEL='A' AND DESTAQUE_IMOVEL='S' ORDER BY ID_IMOVEL DESC";
$imovel = mysql_query($query_imovel);

$row_imovel = mysql_fetch_assoc($imovel);
$totalrows_imovel = mysql_num_rows($imovel);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>RVC Imobiliária - A certeza de um negócio seguro</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />    
	<link rel="stylesheet" type="text/css" href="jquery.mobile-1.4.2.css"/>
    <link rel="stylesheet" type="text/css" href="../wt-rotator.css"/>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
	<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.easing.1.3.min.js"></script>
    <script type="text/javascript" src="../js/jquery.wt-rotator.min.js"></script>
    <script type="text/javascript" src="jquery.mobile-1.4.2.min.js"></script>
</head>

<body class="ui-mobile-viewport ui-overlay-a" id="ui-page-top" style="">
<div data-role="page" class="jqm-demos ui-page ui-page-theme-a ui-page-footer-fixed ui-page-active" data-quicklinks="true" data-url="/1.4.2/button-markup/" tabindex="0" style="padding-bottom: 62px; min-height: 500px;"><div data-role="panel" class="jqm-nav-panel jqm-quicklink-panel ui-panel ui-panel-position-right ui-panel-display-overlay ui-panel-closed ui-body-a ui-panel-animate" data-position="right" data-display="overlay" data-theme="a"><div class="ui-panel-inner"><ul data-role="listview" data-inset="false" data-theme="a" data-divider-theme="a" data-icon="false" class="jqm-list ui-listview ui-group-theme-a"><li data-role="list-divider" role="heading" class="ui-li-divider ui-bar-a ui-first-child">Quick Links</li><li><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#Basicmarkup" class="ui-btn">Basic markup</a></li><li><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#Corners" class="ui-btn">Corners</a></li><li><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#Shadow" class="ui-btn">Shadow</a></li><li><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#Inline" class="ui-btn">Inline</a></li><li><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#Theme" class="ui-btn">Theme</a></li><li><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#Mini" class="ui-btn">Mini</a></li><li><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#Icons" class="ui-btn">Icons</a></li><li><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#Iconposition" class="ui-btn">Icon position</a></li><li><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#Iconshadow" class="ui-btn">Icon shadow</a></li><li><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#Disabled" class="ui-btn">Disabled</a></li><li class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#Nativebutton" class="ui-btn">Native button</a></li></ul></div></div>

	<div data-role="header" class="jqm-header ui-header ui-bar-inherit" role="banner">
		<h2 class="ui-title" role="heading" aria-level="1"><a href="index.php" title="jQuery Mobile Demos home" class="ui-link"><img src="images/logo.gif" alt="jQuery Mobile"></a></h2>
		<a href="#" class="jqm-navmenu-link ui-nodisc-icon ui-alt-icon ui-btn-left ui-btn ui-icon-bars ui-btn-icon-notext ui-corner-all" data-role="button" role="button">Menu</a>
		<a href="#" class="jqm-search-link ui-nodisc-icon ui-alt-icon ui-btn-right ui-btn ui-icon-search ui-btn-icon-notext ui-corner-all" data-role="button" role="button">Search</a>
	</div><!-- /header -->

	<div role="main" class="ui-content jqm-content">

		<h1>Button markup</h1>

		<p>Add classes to style <code>a</code> and <code>button</code> elements. <code>input</code> buttons are enhanced by the button widget. See <a href="http://demos.jquerymobile.com/1.4.2/button/" data-ajax="false" class="ui-link">this page</a> for examples.</p>

		<p>Note that in 1.4 <code>data-</code> attributes will still work. The deprecated <code>buttonMarkup</code> method will add the applicable classes to <code>a</code> (with <code>data-role="button"</code>) and <code>button</code> elements. This method also adds the <code>role="button"</code> attribute to anchor elements.</p>

		<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" data-ajax="false" class="jqm-deeplink jqm-open-quicklink-panel ui-icon-carat-l ui-alt-icon">Quick Links</a><h2 id="Basicmarkup">Basic markup</h2>

		<div data-demo-html="true">
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn">Anchor</a>
			<button class="ui-btn">Button</button>
		</div><div><a class="jqm-view-source-link ui-btn ui-corner-all ui-btn-inline ui-mini" href="http://demos.jquerymobile.com/1.4.2/button-markup/#popupDemo" data-rel="popup" aria-haspopup="true" aria-owns="popupDemo" aria-expanded="false">View Source</a></div><!--/demo-html -->

		<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#ui-page-top" class="jqm-deeplink ui-icon-carat-u ui-alt-icon">Top</a><h2 id="Corners">Corners</h2>

		<div data-demo-html="true">
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-corner-all">Anchor</a>
			<button class="ui-btn ui-corner-all">Button</button>
		</div><div><a class="jqm-view-source-link ui-btn ui-corner-all ui-btn-inline ui-mini" href="http://demos.jquerymobile.com/1.4.2/button-markup/#popupDemo" data-rel="popup" aria-haspopup="true" aria-owns="popupDemo" aria-expanded="false">View Source</a></div><!--/demo-html -->

		<p>Icon-only buttons are round by default. Here we show how you can set the same border-radius as other buttons.</p>

		<div data-demo-html="true" data-demo-css="true">
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all">No text</a>
			<div id="custom-border-radius">
				<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all">No text</a>
			</div>
		</div><div><a class="jqm-view-source-link ui-btn ui-corner-all ui-btn-inline ui-mini" href="http://demos.jquerymobile.com/1.4.2/button-markup/#popupDemo" data-rel="popup" aria-haspopup="true" aria-owns="popupDemo" aria-expanded="false">View Source</a></div><!--/demo-html -->

		<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#ui-page-top" class="jqm-deeplink ui-icon-carat-u ui-alt-icon">Top</a><h2 id="Shadow">Shadow</h2>

		<div data-demo-html="true">
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-shadow">Anchor</a>
			<button class="ui-btn ui-shadow">Button</button>
		</div><div><a class="jqm-view-source-link ui-btn ui-corner-all ui-btn-inline ui-mini" href="http://demos.jquerymobile.com/1.4.2/button-markup/#popupDemo" data-rel="popup" aria-haspopup="true" aria-owns="popupDemo" aria-expanded="false">View Source</a></div><!--/demo-html -->

		<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#ui-page-top" class="jqm-deeplink ui-icon-carat-u ui-alt-icon">Top</a><h2 id="Inline">Inline</h2>

		<div data-demo-html="true">
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-btn-inline">Anchor</a>
			<button class="ui-btn ui-btn-inline">Button</button>
		</div><div><a class="jqm-view-source-link ui-btn ui-corner-all ui-btn-inline ui-mini" href="http://demos.jquerymobile.com/1.4.2/button-markup/#popupDemo" data-rel="popup" aria-haspopup="true" aria-owns="popupDemo" aria-expanded="false">View Source</a></div><!--/demo-html -->

		<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#ui-page-top" class="jqm-deeplink ui-icon-carat-u ui-alt-icon">Top</a><h2 id="Theme">Theme</h2>

		<div data-demo-html="true">
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn">Anchor - Inherit</a>
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-btn-a">Anchor - Theme swatch A</a>
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-btn-b">Anchor - Theme swatch B</a>
			<button class="ui-btn">Button - Inherit</button>
			<button class="ui-btn ui-btn-a">Button - Theme swatch A</button>
			<button class="ui-btn ui-btn-b">Button - Theme swatch B</button>
		</div><div><a class="jqm-view-source-link ui-btn ui-corner-all ui-btn-inline ui-mini" href="http://demos.jquerymobile.com/1.4.2/button-markup/#popupDemo" data-rel="popup" aria-haspopup="true" aria-owns="popupDemo" aria-expanded="false">View Source</a></div><!--/demo-html -->

		<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#ui-page-top" class="jqm-deeplink ui-icon-carat-u ui-alt-icon">Top</a><h2 id="Mini">Mini</h2>

		<div data-demo-html="true">
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-mini">Anchor</a>
			<button class="ui-btn ui-mini">Button</button>
		</div><div><a class="jqm-view-source-link ui-btn ui-corner-all ui-btn-inline ui-mini" href="http://demos.jquerymobile.com/1.4.2/button-markup/#popupDemo" data-rel="popup" aria-haspopup="true" aria-owns="popupDemo" aria-expanded="false">View Source</a></div><!--/demo-html -->

		<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#ui-page-top" class="jqm-deeplink ui-icon-carat-u ui-alt-icon">Top</a><h2 id="Icons">Icons</h2>

		<div data-demo-html="true">
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-icon-delete ui-btn-icon-left">Anchor</a>
			<button class="ui-btn ui-icon-delete ui-btn-icon-left">Button</button>
		</div><div><a class="jqm-view-source-link ui-btn ui-corner-all ui-btn-inline ui-mini" href="http://demos.jquerymobile.com/1.4.2/button-markup/#popupDemo" data-rel="popup" aria-haspopup="true" aria-owns="popupDemo" aria-expanded="false">View Source</a></div><!--/demo-html -->

		<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#ui-page-top" class="jqm-deeplink ui-icon-carat-u ui-alt-icon">Top</a><h2 id="Iconposition">Icon position</h2>

		<div data-demo-html="true">
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-icon-delete ui-btn-icon-left">Left</a>
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-icon-delete ui-btn-icon-right">Right</a>
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-icon-delete ui-btn-icon-top">Top</a>
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-icon-delete ui-btn-icon-bottom">Bottom</a>
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-icon-delete ui-btn-icon-notext">Icon only</a>
		</div><div><a class="jqm-view-source-link ui-btn ui-corner-all ui-btn-inline ui-mini" href="http://demos.jquerymobile.com/1.4.2/button-markup/#popupDemo" data-rel="popup" aria-haspopup="true" aria-owns="popupDemo" aria-expanded="false">View Source</a></div><!--/demo-html -->

		<p>Inline:</p>

		<div data-demo-html="true">
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-btn-inline ui-icon-delete ui-btn-icon-left">Left</a>
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-btn-inline ui-icon-delete ui-btn-icon-right">Right</a>
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-btn-inline ui-icon-delete ui-btn-icon-top">Top</a>
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-btn-inline ui-icon-delete ui-btn-icon-bottom">Bottom</a>
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-btn-inline ui-icon-delete ui-btn-icon-notext">Icon only</a>
		</div><div><a class="jqm-view-source-link ui-btn ui-corner-all ui-btn-inline ui-mini" href="http://demos.jquerymobile.com/1.4.2/button-markup/#popupDemo" data-rel="popup" aria-haspopup="true" aria-owns="popupDemo" aria-expanded="false">View Source</a></div><!--/demo-html -->

		<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#ui-page-top" class="jqm-deeplink ui-icon-carat-u ui-alt-icon">Top</a><h2 id="Iconshadow">Icon shadow</h2>
		<p>Note: This styling option is deprecated in jQuery Mobile 1.4.0 and will be removed in 1.5.0. Accordingly, we changed the default for framework-enhanced buttons to false.</p>

		<div data-demo-html="true">
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-icon-delete ui-btn-icon-left ui-shadow-icon">Anchor</a>
			<p>Theme B:</p>
			<button class="ui-btn ui-btn-b ui-icon-delete ui-btn-icon-left ui-shadow-icon">Button</button>
		</div><div><a class="jqm-view-source-link ui-btn ui-corner-all ui-btn-inline ui-mini" href="http://demos.jquerymobile.com/1.4.2/button-markup/#popupDemo" data-rel="popup" aria-haspopup="true" aria-owns="popupDemo" aria-expanded="false">View Source</a></div><!--/demo-html -->

		<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#ui-page-top" class="jqm-deeplink ui-icon-carat-u ui-alt-icon">Top</a><h2 id="Disabled">Disabled</h2>

		<div data-demo-html="true">
			<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-btn ui-state-disabled">Disabled anchor via class</a>
			<button disabled="" class=" ui-btn ui-shadow ui-corner-all">Button with disabled attribute</button>
		</div><div><a class="jqm-view-source-link ui-btn ui-corner-all ui-btn-inline ui-mini" href="http://demos.jquerymobile.com/1.4.2/button-markup/#popupDemo" data-rel="popup" aria-haspopup="true" aria-owns="popupDemo" aria-expanded="false">View Source</a></div><!--/demo-html -->

		<a href="http://demos.jquerymobile.com/1.4.2/button-markup/#ui-page-top" class="jqm-deeplink ui-icon-carat-u ui-alt-icon">Top</a><h2 id="Nativebutton">Native button</h2>
		<!-- TODO: Remove this demo in 1.5 -->
		<p>In 1.4 <code>button</code> will still be auto-enhanced. This example shows how you can prevent this.</p>

		<div data-demo-html="true">
			<button data-role="none">Button</button>
		</div><div><a class="jqm-view-source-link ui-btn ui-corner-all ui-btn-inline ui-mini" href="http://demos.jquerymobile.com/1.4.2/button-markup/#popupDemo" data-rel="popup" aria-haspopup="true" aria-owns="popupDemo" aria-expanded="false">View Source</a></div><!--/demo-html -->

	</div><!-- /content -->
	    <div data-role="panel" class="jqm-navmenu-panel ui-panel ui-panel-position-left ui-panel-display-overlay ui-panel-closed ui-body-a ui-panel-animate" data-position="left" data-display="overlay" data-theme="a">
	    	<div class="ui-panel-inner"><ul class="jqm-list ui-alt-icon ui-nodisc-icon ui-listview">
<li data-filtertext="demos homepage" data-icon="home" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/" class="ui-btn ui-btn-icon-right ui-icon-home">Home</a></li>
<li data-filtertext="introduction overview getting started"><a href="http://demos.jquerymobile.com/1.4.2/intro/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Introduction</a></li>
<li data-filtertext="buttons button markup buttonmarkup method anchor link button element"><a href="./Button markup - jQuery Mobile Demos_files/Button markup - jQuery Mobile Demos.html" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Buttons</a></li>
<li data-filtertext="form button widget input button submit reset"><a href="http://demos.jquerymobile.com/1.4.2/button/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Button widget</a></li>
<li data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed ui-li-static ui-body-inherit"><h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-collapsible-heading-toggle ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-inherit">Checkboxradio widget<span class="ui-collapsible-heading-status"> click to expand contents</span></a></h3><div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
	
	<ul class="ui-listview">
		<li data-filtertext="form checkboxradio widget checkbox input checkboxes controlgroups" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/checkboxradio-checkbox/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Checkboxes</a></li>
		<li data-filtertext="form checkboxradio widget radio input radio buttons controlgroups" class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/checkboxradio-radio/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Radio buttons</a></li>
	</ul>
</div></li>
<li data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed ui-li-static ui-body-inherit"><h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-collapsible-heading-toggle ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-inherit">Collapsible (set) widget<span class="ui-collapsible-heading-status"> click to expand contents</span></a></h3><div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
	
	<ul class="ui-listview">
		<li data-filtertext="collapsibles content formatting" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/collapsible/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Collapsible</a></li>
		<li data-filtertext="dynamic collapsible set accordion append expand"><a href="http://demos.jquerymobile.com/1.4.2/collapsible-dynamic/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Dynamic collapsibles</a></li>
		<li data-filtertext="accordions collapsible set widget content formatting grouped collapsibles" class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/collapsibleset/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Collapsible set</a></li>
	</ul>
</div></li>
<li data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed ui-li-static ui-body-inherit"><h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-collapsible-heading-toggle ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-inherit">Controlgroup widget<span class="ui-collapsible-heading-status"> click to expand contents</span></a></h3><div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
	
	<ul class="ui-listview">
		<li data-filtertext="controlgroups selectmenu checkboxradio input grouped buttons horizontal vertical" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/controlgroup/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Controlgroup</a></li>
		<li data-filtertext="dynamic controlgroup dynamically add buttons" class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/controlgroup-dynamic/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Dynamic controlgroups</a></li>
	</ul>
</div></li>
<li data-filtertext="form datepicker widget date input"><a href="http://demos.jquerymobile.com/1.4.2/datepicker/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Datepicker</a></li>
<li data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed ui-li-static ui-body-inherit"><h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-collapsible-heading-toggle ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-inherit">Events<span class="ui-collapsible-heading-status"> click to expand contents</span></a></h3><div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
	
	<ul class="ui-listview">
		<li data-filtertext="swipe to delete list items listviews swipe events" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/swipe-list/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Swipe list items</a></li>
		<li data-filtertext="swipe to navigate swipe page navigation swipe events" class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/swipe-page/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Swipe page navigation</a></li>
	</ul>
</div></li>
<li data-filtertext="filterable filter elements sorting searching listview table"><a href="http://demos.jquerymobile.com/1.4.2/filterable/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Filterable widget</a></li>
<li data-filtertext="form flipswitch widget flip toggle switch binary select checkbox input"><a href="http://demos.jquerymobile.com/1.4.2/flipswitch/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Flipswitch widget</a></li>
<li data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed ui-li-static ui-body-inherit"><h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-collapsible-heading-toggle ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-inherit">Forms<span class="ui-collapsible-heading-status"> click to expand contents</span></a></h3><div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
	
	<ul class="ui-listview">
		<li data-filtertext="forms text checkbox radio range button submit reset inputs selects textarea slider flipswitch label form elements" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/forms/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Forms</a></li>
		<li data-filtertext="form hide labels hidden accessible ui-hidden-accessible forms"><a href="http://demos.jquerymobile.com/1.4.2/forms-label-hidden-accessible/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Hide labels</a></li>
		<li data-filtertext="form field containers fieldcontain ui-field-contain forms"><a href="http://demos.jquerymobile.com/1.4.2/forms-field-contain/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Field containers</a></li>
		<li data-filtertext="forms disabled form elements"><a href="http://demos.jquerymobile.com/1.4.2/forms-disabled/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Forms disabled</a></li>
		<li data-filtertext="forms gallery examples overview forms text checkbox radio range button submit reset inputs selects textarea slider flipswitch label form elements" class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/forms-gallery/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Forms gallery</a></li>
	</ul>
</div></li>
<li data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed ui-li-static ui-body-inherit"><h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-collapsible-heading-toggle ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-inherit">Grids<span class="ui-collapsible-heading-status"> click to expand contents</span></a></h3><div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
	
	<ul class="ui-listview">
		<li data-filtertext="grids columns blocks content formatting rwd responsive css framework" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/grids/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Grids</a></li>
		<li data-filtertext="buttons in grids css framework"><a href="http://demos.jquerymobile.com/1.4.2/grids-buttons/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Buttons in grids</a></li>
		<li data-filtertext="custom responsive grids rwd css framework" class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/grids-custom-responsive/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Custom responsive grids</a></li>
	</ul>
</div></li>
<li data-filtertext="blocks content formatting sections heading"><a href="http://demos.jquerymobile.com/1.4.2/body-bar-classes/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Grouping and dividing content</a></li>
<li data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed ui-li-static ui-body-inherit"><h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-collapsible-heading-toggle ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-inherit">Icons<span class="ui-collapsible-heading-status"> click to expand contents</span></a></h3><div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
	
	<ul class="ui-listview">
		<li data-filtertext="button icons svg disc alt custom icon position" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/icons/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Icons</a></li>
		<li data-filtertext="" class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/icons-grunticon/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Grunticon loader</a></li>
	</ul>
</div></li>
<li data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed ui-li-static ui-body-inherit"><h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-collapsible-heading-toggle ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-inherit">Listview widget<span class="ui-collapsible-heading-status"> click to expand contents</span></a></h3><div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
	
	<ul class="ui-listview">
		<li data-filtertext="listview widget thumbnails icons nested split button collapsible ul ol" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/listview/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Listview</a></li>
		<li data-filtertext="autocomplete filterable reveal listview filtertextbeforefilter placeholder"><a href="http://demos.jquerymobile.com/1.4.2/listview-autocomplete/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Listview autocomplete</a></li>
		<li data-filtertext="autocomplete filterable reveal listview remote data filtertextbeforefilter placeholder"><a href="http://demos.jquerymobile.com/1.4.2/listview-autocomplete-remote/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Listview autocomplete remote data</a></li>
		<li data-filtertext="autodividers anchor jump scroll linkbars listview lists ul ol"><a href="http://demos.jquerymobile.com/1.4.2/listview-autodividers-linkbar/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Listview autodividers linkbar</a></li>
		<li data-filtertext="listview autodividers selector autodividersselector lists ul ol"><a href="http://demos.jquerymobile.com/1.4.2/listview-autodividers-selector/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Listview autodividers selector</a></li>
		<li data-filtertext="listview nested list items"><a href="http://demos.jquerymobile.com/1.4.2/listview-nested-lists/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Listview Nested Listviews</a></li>
		<li data-filtertext="listview collapsible list items flat"><a href="http://demos.jquerymobile.com/1.4.2/listview-collapsible-item-flat/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Listview collapsible list items (flat)</a></li>
		<li data-filtertext="listview collapsible list indented"><a href="http://demos.jquerymobile.com/1.4.2/listview-collapsible-item-indented/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Listview collapsible list items (indented)</a></li>
		<li data-filtertext="grid listview responsive grids responsive listviews lists ul" class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/listview-grid/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Listview responsive grid</a></li>
	</ul>
</div></li>
<li data-filtertext="loader widget page loading navigation overlay spinner"><a href="http://demos.jquerymobile.com/1.4.2/loader/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Loader widget</a></li>
<li data-filtertext="navbar widget navmenu toolbars header footer"><a href="http://demos.jquerymobile.com/1.4.2/navbar/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Navbar widget</a></li>
<li data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed ui-li-static ui-body-inherit"><h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-collapsible-heading-toggle ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-inherit">Navigation<span class="ui-collapsible-heading-status"> click to expand contents</span></a></h3><div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
	
	<ul class="ui-listview">
		<li data-filtertext="ajax navigation navigate widget history event method" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/navigation/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Navigation</a></li>
		<li data-filtertext="linking pages page links navigation ajax prefetch cache"><a href="http://demos.jquerymobile.com/1.4.2/navigation-linking-pages/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Linking pages</a></li>
		<li data-filtertext="php redirect server redirection server-side navigation"><a href="http://demos.jquerymobile.com/1.4.2/navigation-php-redirect/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">PHP redirect demo</a></li>
		<li data-filtertext="navigation redirection hash query" class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/navigation-hash-processing/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Hash processing demo</a></li>
	</ul>
</div></li>
<li data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed ui-li-static ui-body-inherit"><h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-collapsible-heading-toggle ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-inherit">Pages<span class="ui-collapsible-heading-status"> click to expand contents</span></a></h3><div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
	
	<ul class="ui-listview">
		<li data-filtertext="pages page widget ajax navigation" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/pages/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Pages</a></li>
		<li data-filtertext="single page"><a href="http://demos.jquerymobile.com/1.4.2/pages-single-page/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Single page</a></li>
		<li data-filtertext="multipage multi-page page"><a href="http://demos.jquerymobile.com/1.4.2/pages-multi-page/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Multi-page template</a></li>
		<li data-filtertext="dialog page widget modal popup" class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/pages-dialog/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Dialog page</a></li>
	</ul>
</div></li>
<li data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed ui-li-static ui-body-inherit"><h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-collapsible-heading-toggle ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-inherit">Panel widget<span class="ui-collapsible-heading-status"> click to expand contents</span></a></h3><div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
	
	<ul class="ui-listview">
		<li data-filtertext="panel widget sliding panels reveal push overlay responsive" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/panel/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Panel</a></li>
		<li data-filtertext=""><a href="http://demos.jquerymobile.com/1.4.2/panel-external/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">External panels</a></li>
		<li data-filtertext="panel "><a href="http://demos.jquerymobile.com/1.4.2/panel-fixed/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Fixed panels</a></li>
		<li data-filtertext="panel slide panels sliding panels shadow rwd responsive breakpoint"><a href="http://demos.jquerymobile.com/1.4.2/panel-responsive/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Panels responsive</a></li>
		<li data-filtertext="panel custom style custom panel width reveal shadow listview panel styling page background wrapper"><a href="http://demos.jquerymobile.com/1.4.2/panel-styling/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Custom panel style</a></li>
		<li data-filtertext="panel open on swipe"><a href="http://demos.jquerymobile.com/1.4.2/panel-swipe-open/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Panel open on swipe</a></li>
		<li data-filtertext="panels outside page internal external toolbars" class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/panel-external-internal/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Panel external and internal</a></li>
	</ul>
</div></li>
<li data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed ui-li-static ui-body-inherit"><h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-collapsible-heading-toggle ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-inherit">Popup widget<span class="ui-collapsible-heading-status"> click to expand contents</span></a></h3><div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
	
	<ul class="ui-listview">
		<li data-filtertext="popup widget popups dialog modal transition tooltip lightbox form overlay screen flip pop fade transition" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/popup/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Popup</a></li>
		<li data-filtertext="popup alignment position"><a href="http://demos.jquerymobile.com/1.4.2/popup-alignment/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Popup alignment</a></li>
		<li data-filtertext="popup arrow size popups popover"><a href="http://demos.jquerymobile.com/1.4.2/popup-arrow-size/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Popup arrow size</a></li>
		<li data-filtertext="dynamic popups popup images lightbox"><a href="http://demos.jquerymobile.com/1.4.2/popup-dynamic/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Dynamic popups</a></li>
		<li data-filtertext="popups with iframes scaling"><a href="http://demos.jquerymobile.com/1.4.2/popup-iframe/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Popups with iframes</a></li>
		<li data-filtertext="popup image scaling"><a href="http://demos.jquerymobile.com/1.4.2/popup-image-scaling/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Popup image scaling</a></li>
		<li data-filtertext="external popup outside multi-page" class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/popup-outside-multipage" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Popup outside multi-page</a></li>
	</ul>
</div></li>
<li data-filtertext="form rangeslider widget dual sliders dual handle sliders range input"><a href="http://demos.jquerymobile.com/1.4.2/rangeslider/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Rangeslider widget</a></li>
<li data-filtertext="responsive web design rwd adaptive progressive enhancement PE accessible mobile breakpoints media query media queries"><a href="http://demos.jquerymobile.com/1.4.2/rwd/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Responsive Web Design</a></li>
<li data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed ui-li-static ui-body-inherit"><h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-collapsible-heading-toggle ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-inherit">Selectmenu widget<span class="ui-collapsible-heading-status"> click to expand contents</span></a></h3><div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
	
	<ul class="ui-listview">
		<li data-filtertext="form selectmenu widget select input custom select menu selects" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/selectmenu/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Selectmenu</a></li>
		<li data-filtertext="form custom select menu selectmenu widget custom menu option optgroup multiple selects"><a href="http://demos.jquerymobile.com/1.4.2/selectmenu-custom/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Custom select menu</a></li>
		<li data-filtertext="filterable select filter popup dialog" class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/selectmenu-custom-filter/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Custom select menu with filter</a></li>
	</ul>
</div></li>
<li data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed ui-li-static ui-body-inherit"><h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-collapsible-heading-toggle ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-inherit">Slider widget<span class="ui-collapsible-heading-status"> click to expand contents</span></a></h3><div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
	
	<ul class="ui-listview">
		<li data-filtertext="form slider widget range input single sliders" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/slider/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Slider</a></li>
		<li data-filtertext="form slider widget flipswitch slider binary select flip toggle switch"><a href="http://demos.jquerymobile.com/1.4.2/slider-flipswitch/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Slider flip toggle switch</a></li>
		<li data-filtertext="form slider tooltip handle value input range sliders" class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/slider-tooltip/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Slider tooltip</a></li>
	</ul>
</div></li>
<li data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed ui-li-static ui-body-inherit"><h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-collapsible-heading-toggle ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-inherit">Table widget<span class="ui-collapsible-heading-status"> click to expand contents</span></a></h3><div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
	
	<ul class="ui-listview">
		<li data-filtertext="table widget reflow column toggle th td responsive tables rwd hide show tabular" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/table-column-toggle/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Table Column Toggle</a></li>
		<li data-filtertext="table column toggle phone comparison demo"><a href="http://demos.jquerymobile.com/1.4.2/table-column-toggle-example/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Table Column Toggle demo</a></li>
		<li data-filtertext="responsive tables table column toggle heading groups rwd breakpoint"><a href="http://demos.jquerymobile.com/1.4.2/table-column-toggle-heading-groups/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Table Column Toggle heading groups</a></li>
		<li data-filtertext="responsive tables table column toggle hide rwd breakpoint customization options"><a href="http://demos.jquerymobile.com/1.4.2/table-column-toggle-options/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Table Column Toggle options</a></li>
		<li data-filtertext="table reflow th td responsive rwd columns tabular"><a href="http://demos.jquerymobile.com/1.4.2/table-reflow/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Table Reflow</a></li>
		<li data-filtertext="responsive tables table reflow heading groups rwd breakpoint"><a href="http://demos.jquerymobile.com/1.4.2/table-reflow-heading-groups/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Table Reflow heading groups</a></li>
		<li data-filtertext="responsive tables table reflow stripes strokes table style"><a href="http://demos.jquerymobile.com/1.4.2/table-reflow-stripes-strokes/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Table Reflow stripes and strokes</a></li>
		<li data-filtertext="responsive tables table reflow stack custom styles" class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/table-reflow-styling/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Table Reflow custom styles</a></li>
	</ul>
</div></li>
<li data-filtertext="ui tabs widget"><a href="http://demos.jquerymobile.com/1.4.2/tabs/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Tabs widget</a></li>
<li data-filtertext="form textinput widget text input textarea number date time tel email file color password"><a href="http://demos.jquerymobile.com/1.4.2/textinput/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Textinput widget</a></li>
<li data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed ui-li-static ui-body-inherit"><h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-collapsible-heading-toggle ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-inherit">Theming<span class="ui-collapsible-heading-status"> click to expand contents</span></a></h3><div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
	
	<ul class="ui-listview">
		<li data-filtertext="default theme swatches theming style css" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/theme-default/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Default theme</a></li>
		<li data-filtertext="classic theme old theme swatches theming style css" class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/theme-classic/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Classic theme</a></li>
	</ul>
</div></li>
<li data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed ui-li-static ui-body-inherit"><h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-collapsible-heading-toggle ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-inherit">Toolbar widget<span class="ui-collapsible-heading-status"> click to expand contents</span></a></h3><div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
	
	<ul class="ui-listview">
		<li data-filtertext="toolbar widget header footer toolbars fixed fullscreen external sections" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/toolbar/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Toolbar</a></li>
		<li data-filtertext="dynamic toolbars dynamically add toolbar header footer"><a href="http://demos.jquerymobile.com/1.4.2/toolbar-dynamic/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Dynamic toolbars</a></li>
		<li data-filtertext="external toolbars header footer"><a href="http://demos.jquerymobile.com/1.4.2/toolbar-external/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">External toolbars</a></li>
		<li data-filtertext="fixed toolbars header footer"><a href="http://demos.jquerymobile.com/1.4.2/toolbar-fixed/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Fixed toolbars</a></li>
		<li data-filtertext="fixed fullscreen toolbars header footer"><a href="http://demos.jquerymobile.com/1.4.2/toolbar-fixed-fullscreen/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Fullscreen toolbars</a></li>
		<li data-filtertext="external fixed toolbars header footer"><a href="http://demos.jquerymobile.com/1.4.2/toolbar-fixed-external/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Fixed external toolbars</a></li>
		<li data-filtertext="external persistent toolbars header footer navbar navmenu"><a href="http://demos.jquerymobile.com/1.4.2/toolbar-fixed-persistent/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Persistent toolbars</a></li>
		<li data-filtertext="external ajax optimized toolbars persistent toolbars header footer navbar"><a href="http://demos.jquerymobile.com/1.4.2/toolbar-fixed-persistent-optimized/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Ajax optimized toolbars</a></li>
		<li data-filtertext="form in toolbars header footer" class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/toolbar-fixed-forms/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Form in toolbar</a></li>
	</ul>
</div></li>
<li data-filtertext="page transitions animated pages popup navigation flip slide fade pop"><a href="http://demos.jquerymobile.com/1.4.2/transitions/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Transitions</a></li>
<li data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed ui-li-static ui-body-inherit ui-last-child"><h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-collapsible-heading-toggle ui-btn ui-icon-carat-d ui-btn-icon-right ui-btn-inherit">3rd party API demos<span class="ui-collapsible-heading-status"> click to expand contents</span></a></h3><div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
	
	<ul class="ui-listview">
		<li data-filtertext="backbone requirejs navigation router" class="ui-first-child"><a href="http://demos.jquerymobile.com/1.4.2/backbone-requirejs/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Backbone RequireJS</a></li>
		<li data-filtertext="google maps geolocation demo"><a href="http://demos.jquerymobile.com/1.4.2/map-geolocation/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Google Maps geolocation</a></li>
		<li data-filtertext="google maps hybrid" class="ui-last-child"><a href="http://demos.jquerymobile.com/1.4.2/map-list-toggle/" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Google Maps list toggle</a></li>
	</ul>
</div></li>



		     </ul></div>
		</div><!-- /panel -->


	<div data-role="footer" data-position="fixed" data-tap-toggle="false" class="jqm-footer ui-footer ui-bar-inherit ui-footer-fixed slideup" role="contentinfo">
		<p>jQuery Mobile Demos version <span class="jqm-version">1.4.2</span></p>
		<p>Copyright 2014 The jQuery Foundation</p>
	</div><!-- /footer -->
	<!-- TODO: This should become an external panel so we can add input to markup (unique ID) -->
    <div data-role="panel" class="jqm-search-panel ui-panel ui-panel-position-right ui-panel-display-overlay ui-body-a ui-panel-animate ui-panel-closed" data-position="right" data-display="overlay" data-theme="a">
		<div class="ui-panel-inner"><div class="jqm-search">
			<form class="ui-filterable"><div class="ui-input-search ui-shadow-inset ui-input-has-clear ui-body-inherit ui-corner-all"><input data-type="search" placeholder="Search demos..."><a href="http://demos.jquerymobile.com/1.4.2/button-markup/#" class="ui-input-clear ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-input-clear-hidden" title="Clear text">Clear text</a></div><button type="submit" data-icon="carat-r" data-inline="true" class="ui-hidden-accessible ui-btn ui-icon-carat-r ui-btn-icon-notext ui-btn-inline ui-shadow ui-corner-all" data-iconpos="notext">Submit</button></form><ul class="jqm-list ui-listview" data-filter-placeholder="Search demos..." data-filter-reveal="true"><li data-filtertext="demos homepage" data-icon="home" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/" class="ui-btn ui-btn-icon-right ui-icon-home">Home<span class="jqm-search-results-keywords ui-li-desc">demos homepage</span></a></li><li data-filtertext="introduction overview getting started" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/intro/" data-ajax="false" class="ui-btn">Introduction<span class="jqm-search-results-keywords ui-li-desc">introduction overview getting started</span></a></li><li data-filtertext="buttons button markup buttonmarkup method anchor link button element" class="ui-screen-hidden"><a href="./Button markup - jQuery Mobile Demos_files/Button markup - jQuery Mobile Demos.html" data-ajax="false" class="ui-btn">Buttons<span class="jqm-search-results-keywords ui-li-desc">buttons button markup buttonmarkup method anchor link button element</span></a></li><li data-filtertext="form button widget input button submit reset" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/button/" data-ajax="false" class="ui-btn">Button widget<span class="jqm-search-results-keywords ui-li-desc">form button widget input button submit reset</span></a></li><li data-filtertext="form checkboxradio widget checkbox input checkboxes controlgroups" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/checkboxradio-checkbox/" data-ajax="false" class="ui-btn">Checkboxes<span class="jqm-search-results-keywords ui-li-desc">form checkboxradio widget checkbox input checkboxes controlgroups</span></a></li><li data-filtertext="form checkboxradio widget radio input radio buttons controlgroups" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/checkboxradio-radio/" data-ajax="false" class="ui-btn">Radio buttons<span class="jqm-search-results-keywords ui-li-desc">form checkboxradio widget radio input radio buttons controlgroups</span></a></li><li data-filtertext="collapsibles content formatting" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/collapsible/" data-ajax="false" class="ui-btn">Collapsible<span class="jqm-search-results-keywords ui-li-desc">collapsibles content formatting</span></a></li><li data-filtertext="dynamic collapsible set accordion append expand" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/collapsible-dynamic/" data-ajax="false" class="ui-btn">Dynamic collapsibles<span class="jqm-search-results-keywords ui-li-desc">dynamic collapsible set accordion append expand</span></a></li><li data-filtertext="accordions collapsible set widget content formatting grouped collapsibles" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/collapsibleset/" data-ajax="false" class="ui-btn">Collapsible set<span class="jqm-search-results-keywords ui-li-desc">accordions collapsible set widget content formatting grouped collapsibles</span></a></li><li data-filtertext="controlgroups selectmenu checkboxradio input grouped buttons horizontal vertical" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/controlgroup/" data-ajax="false" class="ui-btn">Controlgroup<span class="jqm-search-results-keywords ui-li-desc">controlgroups selectmenu checkboxradio input grouped buttons horizontal vertical</span></a></li><li data-filtertext="dynamic controlgroup dynamically add buttons" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/controlgroup-dynamic/" data-ajax="false" class="ui-btn">Dynamic controlgroups<span class="jqm-search-results-keywords ui-li-desc">dynamic controlgroup dynamically add buttons</span></a></li><li data-filtertext="form datepicker widget date input" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/datepicker/" data-ajax="false" class="ui-btn">Datepicker<span class="jqm-search-results-keywords ui-li-desc">form datepicker widget date input</span></a></li><li data-filtertext="swipe to delete list items listviews swipe events" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/swipe-list/" data-ajax="false" class="ui-btn">Swipe list items<span class="jqm-search-results-keywords ui-li-desc">swipe to delete list items listviews swipe events</span></a></li><li data-filtertext="swipe to navigate swipe page navigation swipe events" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/swipe-page/" data-ajax="false" class="ui-btn">Swipe page navigation<span class="jqm-search-results-keywords ui-li-desc">swipe to navigate swipe page navigation swipe events</span></a></li><li data-filtertext="filterable filter elements sorting searching listview table" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/filterable/" data-ajax="false" class="ui-btn">Filterable widget<span class="jqm-search-results-keywords ui-li-desc">filterable filter elements sorting searching listview table</span></a></li><li data-filtertext="form flipswitch widget flip toggle switch binary select checkbox input" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/flipswitch/" data-ajax="false" class="ui-btn">Flipswitch widget<span class="jqm-search-results-keywords ui-li-desc">form flipswitch widget flip toggle switch binary select checkbox input</span></a></li><li data-filtertext="forms text checkbox radio range button submit reset inputs selects textarea slider flipswitch label form elements" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/forms/" data-ajax="false" class="ui-btn">Forms<span class="jqm-search-results-keywords ui-li-desc">forms text checkbox radio range button submit reset inputs selects textarea slider flipswitch label form elements</span></a></li><li data-filtertext="form hide labels hidden accessible ui-hidden-accessible forms" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/forms-label-hidden-accessible/" data-ajax="false" class="ui-btn">Hide labels<span class="jqm-search-results-keywords ui-li-desc">form hide labels hidden accessible ui-hidden-accessible forms</span></a></li><li data-filtertext="form field containers fieldcontain ui-field-contain forms" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/forms-field-contain/" data-ajax="false" class="ui-btn">Field containers<span class="jqm-search-results-keywords ui-li-desc">form field containers fieldcontain ui-field-contain forms</span></a></li><li data-filtertext="forms disabled form elements" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/forms-disabled/" data-ajax="false" class="ui-btn">Forms disabled<span class="jqm-search-results-keywords ui-li-desc">forms disabled form elements</span></a></li><li data-filtertext="forms gallery examples overview forms text checkbox radio range button submit reset inputs selects textarea slider flipswitch label form elements" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/forms-gallery/" data-ajax="false" class="ui-btn">Forms gallery<span class="jqm-search-results-keywords ui-li-desc">forms gallery examples overview forms text checkbox radio range button submit reset inputs selects textarea slider flipswitch label form elements</span></a></li><li data-filtertext="grids columns blocks content formatting rwd responsive css framework" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/grids/" data-ajax="false" class="ui-btn">Grids<span class="jqm-search-results-keywords ui-li-desc">grids columns blocks content formatting rwd responsive css framework</span></a></li><li data-filtertext="buttons in grids css framework" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/grids-buttons/" data-ajax="false" class="ui-btn">Buttons in grids<span class="jqm-search-results-keywords ui-li-desc">buttons in grids css framework</span></a></li><li data-filtertext="custom responsive grids rwd css framework" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/grids-custom-responsive/" data-ajax="false" class="ui-btn">Custom responsive grids<span class="jqm-search-results-keywords ui-li-desc">custom responsive grids rwd css framework</span></a></li><li data-filtertext="blocks content formatting sections heading" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/body-bar-classes/" data-ajax="false" class="ui-btn">Grouping and dividing content<span class="jqm-search-results-keywords ui-li-desc">blocks content formatting sections heading</span></a></li><li data-filtertext="button icons svg disc alt custom icon position" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/icons/" data-ajax="false" class="ui-btn">Icons<span class="jqm-search-results-keywords ui-li-desc">button icons svg disc alt custom icon position</span></a></li><li data-filtertext="" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/icons-grunticon/" data-ajax="false" class="ui-btn">Grunticon loader<span class="jqm-search-results-keywords ui-li-desc"></span></a></li><li data-filtertext="listview widget thumbnails icons nested split button collapsible ul ol" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/listview/" data-ajax="false" class="ui-btn">Listview<span class="jqm-search-results-keywords ui-li-desc">listview widget thumbnails icons nested split button collapsible ul ol</span></a></li><li data-filtertext="autocomplete filterable reveal listview filtertextbeforefilter placeholder" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/listview-autocomplete/" data-ajax="false" class="ui-btn">Listview autocomplete<span class="jqm-search-results-keywords ui-li-desc">autocomplete filterable reveal listview filtertextbeforefilter placeholder</span></a></li><li data-filtertext="autocomplete filterable reveal listview remote data filtertextbeforefilter placeholder" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/listview-autocomplete-remote/" data-ajax="false" class="ui-btn">Listview autocomplete remote data<span class="jqm-search-results-keywords ui-li-desc">autocomplete filterable reveal listview remote data filtertextbeforefilter placeholder</span></a></li><li data-filtertext="autodividers anchor jump scroll linkbars listview lists ul ol" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/listview-autodividers-linkbar/" data-ajax="false" class="ui-btn">Listview autodividers linkbar<span class="jqm-search-results-keywords ui-li-desc">autodividers anchor jump scroll linkbars listview lists ul ol</span></a></li><li data-filtertext="listview autodividers selector autodividersselector lists ul ol" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/listview-autodividers-selector/" data-ajax="false" class="ui-btn">Listview autodividers selector<span class="jqm-search-results-keywords ui-li-desc">listview autodividers selector autodividersselector lists ul ol</span></a></li><li data-filtertext="listview nested list items" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/listview-nested-lists/" data-ajax="false" class="ui-btn">Listview Nested Listviews<span class="jqm-search-results-keywords ui-li-desc">listview nested list items</span></a></li><li data-filtertext="listview collapsible list items flat" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/listview-collapsible-item-flat/" data-ajax="false" class="ui-btn">Listview collapsible list items (flat)<span class="jqm-search-results-keywords ui-li-desc">listview collapsible list items flat</span></a></li><li data-filtertext="listview collapsible list indented" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/listview-collapsible-item-indented/" data-ajax="false" class="ui-btn">Listview collapsible list items (indented)<span class="jqm-search-results-keywords ui-li-desc">listview collapsible list indented</span></a></li><li data-filtertext="grid listview responsive grids responsive listviews lists ul" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/listview-grid/" data-ajax="false" class="ui-btn">Listview responsive grid<span class="jqm-search-results-keywords ui-li-desc">grid listview responsive grids responsive listviews lists ul</span></a></li><li data-filtertext="loader widget page loading navigation overlay spinner" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/loader/" data-ajax="false" class="ui-btn">Loader widget<span class="jqm-search-results-keywords ui-li-desc">loader widget page loading navigation overlay spinner</span></a></li><li data-filtertext="navbar widget navmenu toolbars header footer" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/navbar/" data-ajax="false" class="ui-btn">Navbar widget<span class="jqm-search-results-keywords ui-li-desc">navbar widget navmenu toolbars header footer</span></a></li><li data-filtertext="ajax navigation navigate widget history event method" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/navigation/" data-ajax="false" class="ui-btn">Navigation<span class="jqm-search-results-keywords ui-li-desc">ajax navigation navigate widget history event method</span></a></li><li data-filtertext="linking pages page links navigation ajax prefetch cache" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/navigation-linking-pages/" data-ajax="false" class="ui-btn">Linking pages<span class="jqm-search-results-keywords ui-li-desc">linking pages page links navigation ajax prefetch cache</span></a></li><li data-filtertext="php redirect server redirection server-side navigation" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/navigation-php-redirect/" data-ajax="false" class="ui-btn">PHP redirect demo<span class="jqm-search-results-keywords ui-li-desc">php redirect server redirection server-side navigation</span></a></li><li data-filtertext="navigation redirection hash query" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/navigation-hash-processing/" data-ajax="false" class="ui-btn">Hash processing demo<span class="jqm-search-results-keywords ui-li-desc">navigation redirection hash query</span></a></li><li data-filtertext="pages page widget ajax navigation" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/pages/" data-ajax="false" class="ui-btn">Pages<span class="jqm-search-results-keywords ui-li-desc">pages page widget ajax navigation</span></a></li><li data-filtertext="single page" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/pages-single-page/" data-ajax="false" class="ui-btn">Single page<span class="jqm-search-results-keywords ui-li-desc">single page</span></a></li><li data-filtertext="multipage multi-page page" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/pages-multi-page/" data-ajax="false" class="ui-btn">Multi-page template<span class="jqm-search-results-keywords ui-li-desc">multipage multi-page page</span></a></li><li data-filtertext="dialog page widget modal popup" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/pages-dialog/" data-ajax="false" class="ui-btn">Dialog page<span class="jqm-search-results-keywords ui-li-desc">dialog page widget modal popup</span></a></li><li data-filtertext="panel widget sliding panels reveal push overlay responsive" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/panel/" data-ajax="false" class="ui-btn">Panel<span class="jqm-search-results-keywords ui-li-desc">panel widget sliding panels reveal push overlay responsive</span></a></li><li data-filtertext="" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/panel-external/" data-ajax="false" class="ui-btn">External panels<span class="jqm-search-results-keywords ui-li-desc"></span></a></li><li data-filtertext="panel " class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/panel-fixed/" data-ajax="false" class="ui-btn">Fixed panels<span class="jqm-search-results-keywords ui-li-desc">panel </span></a></li><li data-filtertext="panel slide panels sliding panels shadow rwd responsive breakpoint" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/panel-responsive/" data-ajax="false" class="ui-btn">Panels responsive<span class="jqm-search-results-keywords ui-li-desc">panel slide panels sliding panels shadow rwd responsive breakpoint</span></a></li><li data-filtertext="panel custom style custom panel width reveal shadow listview panel styling page background wrapper" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/panel-styling/" data-ajax="false" class="ui-btn">Custom panel style<span class="jqm-search-results-keywords ui-li-desc">panel custom style custom panel width reveal shadow listview panel styling page background wrapper</span></a></li><li data-filtertext="panel open on swipe" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/panel-swipe-open/" data-ajax="false" class="ui-btn">Panel open on swipe<span class="jqm-search-results-keywords ui-li-desc">panel open on swipe</span></a></li><li data-filtertext="panels outside page internal external toolbars" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/panel-external-internal/" data-ajax="false" class="ui-btn">Panel external and internal<span class="jqm-search-results-keywords ui-li-desc">panels outside page internal external toolbars</span></a></li><li data-filtertext="popup widget popups dialog modal transition tooltip lightbox form overlay screen flip pop fade transition" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/popup/" data-ajax="false" class="ui-btn">Popup<span class="jqm-search-results-keywords ui-li-desc">popup widget popups dialog modal transition tooltip lightbox form overlay screen flip pop fade transition</span></a></li><li data-filtertext="popup alignment position" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/popup-alignment/" data-ajax="false" class="ui-btn">Popup alignment<span class="jqm-search-results-keywords ui-li-desc">popup alignment position</span></a></li><li data-filtertext="popup arrow size popups popover" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/popup-arrow-size/" data-ajax="false" class="ui-btn">Popup arrow size<span class="jqm-search-results-keywords ui-li-desc">popup arrow size popups popover</span></a></li><li data-filtertext="dynamic popups popup images lightbox" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/popup-dynamic/" data-ajax="false" class="ui-btn">Dynamic popups<span class="jqm-search-results-keywords ui-li-desc">dynamic popups popup images lightbox</span></a></li><li data-filtertext="popups with iframes scaling" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/popup-iframe/" data-ajax="false" class="ui-btn">Popups with iframes<span class="jqm-search-results-keywords ui-li-desc">popups with iframes scaling</span></a></li><li data-filtertext="popup image scaling" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/popup-image-scaling/" data-ajax="false" class="ui-btn">Popup image scaling<span class="jqm-search-results-keywords ui-li-desc">popup image scaling</span></a></li><li data-filtertext="external popup outside multi-page" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/popup-outside-multipage" data-ajax="false" class="ui-btn">Popup outside multi-page<span class="jqm-search-results-keywords ui-li-desc">external popup outside multi-page</span></a></li><li data-filtertext="form rangeslider widget dual sliders dual handle sliders range input" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/rangeslider/" data-ajax="false" class="ui-btn">Rangeslider widget<span class="jqm-search-results-keywords ui-li-desc">form rangeslider widget dual sliders dual handle sliders range input</span></a></li><li data-filtertext="responsive web design rwd adaptive progressive enhancement PE accessible mobile breakpoints media query media queries" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/rwd/" data-ajax="false" class="ui-btn">Responsive Web Design<span class="jqm-search-results-keywords ui-li-desc">responsive web design rwd adaptive progressive enhancement PE accessible mobile breakpoints media query media queries</span></a></li><li data-filtertext="form selectmenu widget select input custom select menu selects" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/selectmenu/" data-ajax="false" class="ui-btn">Selectmenu<span class="jqm-search-results-keywords ui-li-desc">form selectmenu widget select input custom select menu selects</span></a></li><li data-filtertext="form custom select menu selectmenu widget custom menu option optgroup multiple selects" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/selectmenu-custom/" data-ajax="false" class="ui-btn">Custom select menu<span class="jqm-search-results-keywords ui-li-desc">form custom select menu selectmenu widget custom menu option optgroup multiple selects</span></a></li><li data-filtertext="filterable select filter popup dialog" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/selectmenu-custom-filter/" data-ajax="false" class="ui-btn">Custom select menu with filter<span class="jqm-search-results-keywords ui-li-desc">filterable select filter popup dialog</span></a></li><li data-filtertext="form slider widget range input single sliders" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/slider/" data-ajax="false" class="ui-btn">Slider<span class="jqm-search-results-keywords ui-li-desc">form slider widget range input single sliders</span></a></li><li data-filtertext="form slider widget flipswitch slider binary select flip toggle switch" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/slider-flipswitch/" data-ajax="false" class="ui-btn">Slider flip toggle switch<span class="jqm-search-results-keywords ui-li-desc">form slider widget flipswitch slider binary select flip toggle switch</span></a></li><li data-filtertext="form slider tooltip handle value input range sliders" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/slider-tooltip/" data-ajax="false" class="ui-btn">Slider tooltip<span class="jqm-search-results-keywords ui-li-desc">form slider tooltip handle value input range sliders</span></a></li><li data-filtertext="table widget reflow column toggle th td responsive tables rwd hide show tabular" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/table-column-toggle/" data-ajax="false" class="ui-btn">Table Column Toggle<span class="jqm-search-results-keywords ui-li-desc">table widget reflow column toggle th td responsive tables rwd hide show tabular</span></a></li><li data-filtertext="table column toggle phone comparison demo" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/table-column-toggle-example/" data-ajax="false" class="ui-btn">Table Column Toggle demo<span class="jqm-search-results-keywords ui-li-desc">table column toggle phone comparison demo</span></a></li><li data-filtertext="responsive tables table column toggle heading groups rwd breakpoint" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/table-column-toggle-heading-groups/" data-ajax="false" class="ui-btn">Table Column Toggle heading groups<span class="jqm-search-results-keywords ui-li-desc">responsive tables table column toggle heading groups rwd breakpoint</span></a></li><li data-filtertext="responsive tables table column toggle hide rwd breakpoint customization options" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/table-column-toggle-options/" data-ajax="false" class="ui-btn">Table Column Toggle options<span class="jqm-search-results-keywords ui-li-desc">responsive tables table column toggle hide rwd breakpoint customization options</span></a></li><li data-filtertext="table reflow th td responsive rwd columns tabular" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/table-reflow/" data-ajax="false" class="ui-btn">Table Reflow<span class="jqm-search-results-keywords ui-li-desc">table reflow th td responsive rwd columns tabular</span></a></li><li data-filtertext="responsive tables table reflow heading groups rwd breakpoint" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/table-reflow-heading-groups/" data-ajax="false" class="ui-btn">Table Reflow heading groups<span class="jqm-search-results-keywords ui-li-desc">responsive tables table reflow heading groups rwd breakpoint</span></a></li><li data-filtertext="responsive tables table reflow stripes strokes table style" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/table-reflow-stripes-strokes/" data-ajax="false" class="ui-btn">Table Reflow stripes and strokes<span class="jqm-search-results-keywords ui-li-desc">responsive tables table reflow stripes strokes table style</span></a></li><li data-filtertext="responsive tables table reflow stack custom styles" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/table-reflow-styling/" data-ajax="false" class="ui-btn">Table Reflow custom styles<span class="jqm-search-results-keywords ui-li-desc">responsive tables table reflow stack custom styles</span></a></li><li data-filtertext="ui tabs widget" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/tabs/" data-ajax="false" class="ui-btn">Tabs widget<span class="jqm-search-results-keywords ui-li-desc">ui tabs widget</span></a></li><li data-filtertext="form textinput widget text input textarea number date time tel email file color password" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/textinput/" data-ajax="false" class="ui-btn">Textinput widget<span class="jqm-search-results-keywords ui-li-desc">form textinput widget text input textarea number date time tel email file color password</span></a></li><li data-filtertext="default theme swatches theming style css" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/theme-default/" data-ajax="false" class="ui-btn">Default theme<span class="jqm-search-results-keywords ui-li-desc">default theme swatches theming style css</span></a></li><li data-filtertext="classic theme old theme swatches theming style css" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/theme-classic/" data-ajax="false" class="ui-btn">Classic theme<span class="jqm-search-results-keywords ui-li-desc">classic theme old theme swatches theming style css</span></a></li><li data-filtertext="toolbar widget header footer toolbars fixed fullscreen external sections" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/toolbar/" data-ajax="false" class="ui-btn">Toolbar<span class="jqm-search-results-keywords ui-li-desc">toolbar widget header footer toolbars fixed fullscreen external sections</span></a></li><li data-filtertext="dynamic toolbars dynamically add toolbar header footer" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/toolbar-dynamic/" data-ajax="false" class="ui-btn">Dynamic toolbars<span class="jqm-search-results-keywords ui-li-desc">dynamic toolbars dynamically add toolbar header footer</span></a></li><li data-filtertext="external toolbars header footer" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/toolbar-external/" data-ajax="false" class="ui-btn">External toolbars<span class="jqm-search-results-keywords ui-li-desc">external toolbars header footer</span></a></li><li data-filtertext="fixed toolbars header footer" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/toolbar-fixed/" data-ajax="false" class="ui-btn">Fixed toolbars<span class="jqm-search-results-keywords ui-li-desc">fixed toolbars header footer</span></a></li><li data-filtertext="fixed fullscreen toolbars header footer" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/toolbar-fixed-fullscreen/" data-ajax="false" class="ui-btn">Fullscreen toolbars<span class="jqm-search-results-keywords ui-li-desc">fixed fullscreen toolbars header footer</span></a></li><li data-filtertext="external fixed toolbars header footer" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/toolbar-fixed-external/" data-ajax="false" class="ui-btn">Fixed external toolbars<span class="jqm-search-results-keywords ui-li-desc">external fixed toolbars header footer</span></a></li><li data-filtertext="external persistent toolbars header footer navbar navmenu" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/toolbar-fixed-persistent/" data-ajax="false" class="ui-btn">Persistent toolbars<span class="jqm-search-results-keywords ui-li-desc">external persistent toolbars header footer navbar navmenu</span></a></li><li data-filtertext="external ajax optimized toolbars persistent toolbars header footer navbar" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/toolbar-fixed-persistent-optimized/" data-ajax="false" class="ui-btn">Ajax optimized toolbars<span class="jqm-search-results-keywords ui-li-desc">external ajax optimized toolbars persistent toolbars header footer navbar</span></a></li><li data-filtertext="form in toolbars header footer" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/toolbar-fixed-forms/" data-ajax="false" class="ui-btn">Form in toolbar<span class="jqm-search-results-keywords ui-li-desc">form in toolbars header footer</span></a></li><li data-filtertext="page transitions animated pages popup navigation flip slide fade pop" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/transitions/" data-ajax="false" class="ui-btn">Transitions<span class="jqm-search-results-keywords ui-li-desc">page transitions animated pages popup navigation flip slide fade pop</span></a></li><li data-filtertext="backbone requirejs navigation router" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/backbone-requirejs/" data-ajax="false" class="ui-btn">Backbone RequireJS<span class="jqm-search-results-keywords ui-li-desc">backbone requirejs navigation router</span></a></li><li data-filtertext="google maps geolocation demo" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/map-geolocation/" data-ajax="false" class="ui-btn">Google Maps geolocation<span class="jqm-search-results-keywords ui-li-desc">google maps geolocation demo</span></a></li><li data-filtertext="google maps hybrid" class="ui-screen-hidden"><a href="http://demos.jquerymobile.com/1.4.2/map-list-toggle/" data-ajax="false" class="ui-btn">Google Maps list toggle<span class="jqm-search-results-keywords ui-li-desc">google maps hybrid</span></a></li></ul>
		</div></div>
	</div><!-- /panel -->


</div><!-- /page -->



<div class="ui-loader ui-corner-all ui-body-a ui-loader-default"><span class="ui-icon-loading"></span><h1>loading</h1></div><div class="ui-panel-dismiss"></div><div class="ui-panel-dismiss" style="height: 4589px;"></div><div class="ui-panel-dismiss"></div>




<div data-role="header" class="jqm-header ui-header ui-bar-inherit rvc-header" role="banner">
		<h2 class="ui-title" role="heading" aria-level="1"><a href="http://m.rvcimobiliaria.com.br" title="Rvc Imobiliária" class="ui-link"><img src="images/logo.gif" /></a></h2>
		<a href="#" class="jqm-navmenu-link ui-nodisc-icon ui-alt-icon ui-btn-left ui-btn ui-icon-bars ui-btn-icon-notext ui-corner-all" data-role="button" role="button">Menu</a>
		<a href="#" class="jqm-search-link ui-nodisc-icon ui-alt-icon ui-btn-right ui-btn ui-icon-search ui-btn-icon-notext ui-corner-all" data-role="button" role="button">Search</a>
	</div>
     

	<div id="root">
            <div data-role="panel" class="jqm-navmenu-panel ui-panel ui-panel-position-left ui-panel-display-overlay ui-panel-closed ui-body-a ui-panel-animate" data-position="left" data-display="overlay" data-theme="a">
	    	<div class="ui-panel-inner"><ul class="jqm-list ui-alt-icon ui-nodisc-icon ui-listview">
<li data-icon="home" class="ui-first-child"><a href="index.php" class="ui-btn ui-btn-icon-right ui-icon-home">Inicio</a></li>
<li><a href="imoveis.php" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Imóveis</a></li>
<li><a href="servicos.php" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Serviços</a></li>
<li><a href="sobre.php" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Sobre</a></li>
<li><a href="caixa.php" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">CAIXA Aqui</a></li>
<li><a href="contato.php" data-ajax="false" class="ui-btn ui-btn-icon-right ui-icon-carat-r">Contato</a></li>


		     </ul></div>
		</div>
            
            
        <div class="container">
        	
    <div id="grid-home">
    	<h1>Imóveis em Destaque</h1>
    	<ul>
            <?php do { $tipo = $row_imovel["TIPO_IMOVEL"];?>
        	<li>
            	<h3><?php echo $row_imovel["NOME_IMOVEL"];?> - <?php echo $row_imovel["BAIRRO_IMOVEL"];?></h3>
            	<a href="../imovel.php?id=<?php echo $row_imovel["ID_IMOVEL"]; ?>"><img src="<?php echo $row_imovel["../THUMB_IMOVEL"];?>" /></a>
                <div class="tabela">
                <h4>R$ <?php echo $row_imovel["VALOR_IMOVEL"]; ?></h4>
                <?php if($tipo=='A' or $tipo=='L' or $tipo=='C'){ ?>
                <div class="quarto"><?php echo $row_imovel["QUARTO_IMOVEL"]; ?></div>
                <div class="garagem"><?php echo $row_imovel["GARAGEM_IMOVEL"]; ?></div>
                <?php }; ?>
                <br style="clear:both;" />
                <?php if($tipo=='A' or $tipo=='L' or $tipo=='T' or $tipo=='C'){ ?>
                <h4 style="border-bottom:none; border-top:1px solid #CCC; padding-top:10px;">Área:<span style="font-weight:normal;"> <?php echo $row_imovel["AREA_IMOVEL"]; ?> m²</span></h4>
                <?php } else{ ?>
                <h4 style="border-bottom:none; border-top:1px solid #CCC; padding-top:10px;">Área:<span style="font-weight:normal;"> <?php echo $row_imovel["AREA_IMOVEL"]; ?> ha</span></h4>
                <?php }; ?>
                
                
                <a href="../imovel.php?id=<?php echo $row_imovel["ID_IMOVEL"]; ?>"><span>Mais Detalhes</span><img src="../images/grid-detalhes.gif" style="margin:0; float:right;" /></a>
                
              </div>
                <p><?php echo $row_imovel["MINIDESC_IMOVEL"];?></p>                
            </li>
            <?php } while($row_imovel = mysql_fetch_assoc($imovel)); ?>
                                  
        </ul>

         <br style="clear:both;"/> 
    </div>
    <div id="assinatura">
    	<div id="assinatura-esquerda">
        <p>© 2013 RVC Imobiliária - A certeza de um négocio seguro. Todos os direitos reservados.<br /><br />
        <a href="http://www.facebook.com/rvcimobiliaria" target="_blank"><img src="../images/icon-facebook.png" /></a>
        </p></div>
        <div id="assinatura-direita">
        <a href="../caixa.php"><img src="../images/icon-caixa.png" /></a>
        </div>
    </div>
        </div>
    </div> 
</body>
</html>
