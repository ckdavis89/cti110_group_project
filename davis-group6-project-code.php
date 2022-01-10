<!DOCTYPE html>
<html lang="en">

<head>
	<!--Name: Christopher Davis
		Filename: davis-group6-project-code.php
		Blackboard Username: cdavis25
		Class Section: 2021SU.CTI.110.0004
		Purpose: Group project PHP
	-->
	<meta charset="utf-8" />
	<title>L14 Concert Event Form</title>
	<link rel="stylesheet" type="text/css" href="davis-group6-project-style.css">
</head>
<body>
<?php
	/* 
			T1: Adult tickets:1 Child tickets:5 Expected total:355.57
			T2: Adult tickets:5 Child tickets:0 Expected total:430.33
	*/

	//Complete the missing code.
	/*Use the $_POST superglobal to pass the customer information to the costTickets function. The $_POST
	MUST match the name=xxx in the form input type.*/
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$adultTickets = $_POST['adultTickets'];
	$childTickets = $_POST['childTickets'];
	$date = $_POST['date'];

	/*Name of constants must follow the same rules as variable names, which means a valid constant name
	must starts with a letter or underscore, followed by any number of letters, numbers or underscores
	with one exception: the $ prefix is not required for constant names. By convention, constant names
	are usually written in uppercase letters separated by underscores. This is for their easy
	identification and differentiation from variables in the source code.*/

	define ("TAX", 0.07);
	define ("ADULT_COST", 79.50);
	define ("CHILD_COST", 50.00);
	define ("MIN_FEE", 0.50);
	define ("MAX_FEE", 1.00);
	define ("ATTEND_COMPARE", 5);
 
	//Code for processing goes here (fee, subtotal etc)
	$totalAttend = $adultTickets + $childTickets;
	$subTotal = ($adultTickets * ADULT_COST) + ($childTickets * CHILD_COST);
	$salesTax = $subTotal * TAX;
	if ($totalAttend <= ATTEND_COMPARE) {
		$fee = $totalAttend * MAX_FEE;
	} else {
		$fee = $totalAttend * MIN_FEE;
	}
	$totalCost = $subTotal + $salesTax + $fee;
 
	//Print is also considered to be a function while echo is a language construct. You can use html tags in the print and echo statements.
	//The period (.) is a concatenation symbol. For Flowgorithm you used an (&) ampersand
	/*All languages have a way to format output. The number_format function does this for numbers in
	PHP.
	We are asking for two decimal points since this is dollar data*/

	print ("<h1>Summary Ticket Cost for Concert</h1>");
	print ("<p>Thank you <b>".$name."</b> at <b>".$phone. "</b>. Details of your total cost <b>$".number_format($totalCost, 2). "</b> are shown below:</p>");
	echo("<ul><li>Adult Tickets: $adultTickets</li>");
	echo("<li>Child Tickets: $childTickets</li>");
	echo("<li>Date: $date</li>");
	echo("<li>Sub-total: $".number_format($subTotal, 2)."</li>");
	echo("<li>Sales tax: $".number_format($salesTax, 2)."</li>");
	echo("<li>Fee: $".number_format($fee, 2)."</li></ul>");
	echo("<ul><li><b>TOTAL: $".number_format($totalCost, 2)."</b></li></ul>");
	print ('<br>');
	print '<a href="davis-group6-project-lp.html">Return to main page</a>';
?>
</body>
</html>