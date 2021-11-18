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

//$file = 'quotes.txt';

//opening a file for reading
//$handle = fopen($file,'a+');

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
//fclose($handle);

//delete the file
//unlink('quotes.txt');



// CLASSES!!!

//First we create a class and write its properties and functions
class User {

    private $email;
    private $name;

    //we give initial values for the new objects of this class
    public function __construct($name, $email)
    {
//        $this->email = 'mario@thenetninja.co.uk';
//        $this->name = 'Mario';
        $this->email = $email;
        $this->name = $name;
    }

    public function login(){
        echo $this->name . " logged in";
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        if(is_string($name) && strlen($name) > 1){
            $this->name = $name;
            return "Name has been updated to $name";
        } else {
            return 'Not a valid name';
        }
    }

}

//Now we create an object
//$userOne = new User(); // its called class instantiation
//
//$userOne->login();
//echo $userOne->name;

$userTwo = new User('Nika','palagashvilinika@gmail.com');
//echo $userTwo->name . '</br>';
//$userTwo->name = 'Mario';
//echo $userTwo->email . '</br>';
//echo $userTwo->login();

echo $userTwo->getName() . '</br>';
//echo $userTwo->setName(50) . '</br>';
echo $userTwo->setName('Mario') . '</br>';
echo $userTwo->getName();

?>