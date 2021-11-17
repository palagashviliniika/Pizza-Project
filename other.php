<?php

//// file system - part 1
//
////$quotes = readfile('readme.txt'); // it reads the file
////echo $quotes;
//
//$file = 'readme.txt';
//
//if (file_exists($file)){
//
////    //read file
////    echo readfile($file) . '</br>';
////
////    //copy file
////    copy($file, 'quotes.txt');
////
////    //absolute path
////    echo realpath($file) . '</br>';
////
////    //file size
////    echo filesize($file) . '</br>';
////
////    //rename file
////    rename($file, 'test.txt');
//
//} else{
//    echo "File does not exist";
//}
//
////make directory
//mkdir('quotes');

//file system - part 2

$file = 'quotes.txt';

//opening a file for reading
$handle = fopen($file,'a+');

//read the file
//echo fread($handle, filesize($file));
//echo fread($handle, 111);

//read a single file
//echo fgets($handle);
//echo fgets($handle);

//read a single character
//echo fgetc($handle);
//echo fgetc($handle);

//writing to a file
//fwrite($handle, "\nEverything popular is wrong");

//closing a file
fclose($handle);

//delete the file
unlink('quotes.txt');


?>