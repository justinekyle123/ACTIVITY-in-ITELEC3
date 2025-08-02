<?php

	$conn = new mysqli("localhost","root","","login");
	if(!$conn){
		die('error');
	}