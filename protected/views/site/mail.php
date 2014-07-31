<?php
//	var_dump(mail("andrew@vitebsk.oblgas.by", "My Subject", "Line 1\nLine 2\nLine 3"));

$result = mail('andrevka@gmail.com', 'subject', 'message');

if($result)
{
    echo 'все путем';
}
else
{
    echo 'что-то не так';
}