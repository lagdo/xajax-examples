<?php

require (__DIR__ . '/vendor/autoload.php');

use Xajax\Xajax;
use Xajax\Response\Response;

$xajax = new Xajax();

// $xajax->configure('debug', true);
$xajax->configure('wrapperPrefix', 'xajax_');

/*
	Function: helloWorld
	
	Modify the innerHTML of div1.
*/
function helloWorld($isCaps)
{
	if ($isCaps)
		$text = 'HELLO WORLD!';
	else
		$text = 'Hello World!';
		
	$xResponse = new Response();
	$xResponse->assign('div1', 'innerHTML', $text);
	
	return $xResponse;
}

/*
	Function: setColor
	
	Modify the style.color of div1
*/
function setColor($sColor)
{
	$xResponse = new Response();
	$xResponse->assign('div1', 'style.color', $sColor);
	
	return $xResponse;
}

// Register functions
$reqHelloWorld = $xajax->register(XAJAX_FUNCTION, 'helloWorld');
$reqHelloWorld->useSingleQuote();

$reqSetColor = $xajax->register(XAJAX_FUNCTION, 'setColor');
$reqSetColor->useSingleQuote();
$reqSetColor->setParameter(0, XAJAX_INPUT_VALUE, 'colorselect1');

// Process the request, if any.
$xajax->processRequest();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="/favicon.ico">

	<title>Xajax Examples</title>

	<!-- Bootstrap core CSS -->
	<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet">

<?php
	echo $xajax->getCssInclude();
?>
<script type='text/javascript'>
	/* <![CDATA[ */
	window.onload = function() {
		// call the helloWorld function to populate the div on load
		<?php $reqHelloWorld->setParameter(0, XAJAX_JS_VALUE, 0); $reqHelloWorld->printScript(); ?>;
		// call the setColor function on load
		<?php $reqSetColor->printScript(); ?>;
	}
	/* ]]> */
</script>
</head>

<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Xajax Examples</a>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
<?php require(__DIR__ . '/includes/menu.php') ?>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<h3 class="page-header">Hello World Function</h3>

				<div class="row">
					<div class="col-sm-6 col-md-6 text">
<p>
This example shows how to export a function with Xajax.
</p>
					</div>
					<div class="col-sm-6 col-md-6 demo">
						<div style="margin:10px;" id="div1">
							&nbsp;
						</div>
						<div style="margin:10px;">
							<select class="form-control" id="colorselect1" name="colorselect1"
									onchange="<?php $reqSetColor->printScript(); ?>; return false;">
								<option value="black" selected="selected">Black</option>
								<option value="red">Red</option>
								<option value="green">Green</option>
								<option value="blue">Blue</option>
							</select>
						</div>
						<div style="margin:10px;">
							<button class="btn btn-primary" onclick="<?php $reqHelloWorld->setParameter(0, XAJAX_JS_VALUE, 0);
								$reqHelloWorld->printScript(); ?>; return false;" >Click Me</button>
							<button class="btn btn-primary" onclick="<?php $reqHelloWorld->setParameter(0, XAJAX_JS_VALUE, 1);
								$reqHelloWorld->printScript(); ?>; return false;" >CLICK ME</button>
						</div>
					</div>
				</div>

				<h4 class="page-header">How it works</h4>

				<div class="row">
					<div class="col-sm-6 col-md-6 xajax">
<p>The Xajax functions</p>
<pre>
function helloWorld($isCaps)
{
    if ($isCaps)
        $text = 'HELLO WORLD!';
    else
        $text = 'Hello World!';

    $xResponse = new Response();
    $xResponse->assign('div1', 'innerHTML', $text);

    return $xResponse;
}

function setColor($sColor)
{
    $xResponse = new Response();
    $xResponse->assign('div1', 'style.color', $sColor);

    return $xResponse;
}
</pre>
					</div>
					<div class="col-sm-6 col-md-6 xajax-code">
<p>The functions registration</p>
<pre>
$xajax = new Xajax();

// $xajax->configure('debug', true);
$xajax->configure('wrapperPrefix', 'xajax_');

// Register functions
$reqHelloWorld = $xajax->register(XAJAX_FUNCTION, 'helloWorld');
$reqSetColor = $xajax->register(XAJAX_FUNCTION, 'setColor');

// Process the request, if any.
$xajax->processRequest();
</pre>

<p>The generated javascript code</p>
<pre>
xajax_helloWorld = function() {...};
xajax_setColor = function() {...};
</pre>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/js/bootstrap.min.js"></script>
<?php
	echo $xajax->getJsInclude();
	echo $xajax->getJavascript();
?>
</body>
</html>