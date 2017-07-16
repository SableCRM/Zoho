<?php

	$arr = ["one","two","three","four","five"];

	$greet = "hello";

	print_r($arr);

	array_walk($arr, function($one) use($greet)
	{
		print_r($one);
	});
