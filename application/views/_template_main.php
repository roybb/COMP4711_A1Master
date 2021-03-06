<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>{pagetitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
		<script type="text/javascript" src="jquery/jquery-2.1.3.min.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/css/template.css">
		<link rel="stylesheet" type="text/css" href="assets/css/menu.css">
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	</head>
    <body>
		<div id="wrapper_main">
					
			<div class="heading_page">
				<div id="profilebox">
					<img id="avatarbox" alt="avatar" src="{avatar}"></image>
					<br>{uname} </br>
				</div>
				<span id="heading_text">{heading}</span>
				<p>
				<div id="menu_wrapper">
					{menu}
				</div>
			
			</div>
			
			<p>
			
			<div id="contentframe">
				<div id="content" class="content_wrapper">
				{content}
				</div>
			</div>
			
		</div>
    </body>
</html>
