<?php
class Header {

	public function printHTMLHeader(){
		print("<!doctype html>
		<html lang=en>
		<head>
		<meta charset=UTF-8>
		<title>EECS Asset Management System</title>
		<meta name=viewport content='width=device-width, initial-scale=1'>
		<link rel=stylesheet href=navMenu.css>
		</head>
		<body>
		<h1>EECS Asset Management System</h1>
		<label for=show-menu class=show-menu>Show Menu</label>
		<input type=checkbox id=show-menu role=button>
		<ul id=menu>
		<li><a href=#>Home</a></li>
		<li><a href=#>Hand Receipts</a></li>
		<li><a href=#>Search</a></li>
		<li><a href=#>Makes and Models</a></li>
		<li><a href=#>Latest Update</a></li>
		</ul>");
	}
}

?>

