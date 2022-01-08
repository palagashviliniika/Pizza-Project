<?php

Class validator {
    private $data;
    private $errors = [];
    private static $fields = ['email', 'title', 'ingredients'];

    public function __construct($post_data)
    {
        $this->data = $post_data;
    }

    public function validateForm(){
        foreach (self::$fields as $field){
            if(!array_key_exists($field, $this->data)){
                trigger_error("$field is not present in data");
                return;
            }
        }

    $this->validateEmail();
    $this->validateTitle();
    $this->validateIngredients();
    return $this->errors;

    }

    private function validateEmail(){
        $val = trim($this->data['email']);

        if(empty($val)){
            $this->addError('email','Email cannot be empty');
        } else {
            if (!filter_var($val, FILTER_VALIDATE_EMAIL)){
                $this->addError('email','Email is incorrect');
            }
        }
    }

    private function validateTitle(){
        $val = trim($this->data['title']);

        if (empty($val)){
            $this->addError('title', 'Title cannot be empty');
        } else {
            if (!preg_match('/^[a-zA-Z\s\']+$/', $val)){
                $this->addError('title', 'Title must be letters and spaces only');
            }
        }
    }

    private function validateIngredients(){
        $val = trim($this->data['ingredients']);

        if (empty($val)){
            $this->addError('ingredients','At least one ingredient is required');
        } else {
            if (!preg_match('/^([a-zA-Z]+)(,\s*[a-zA-Z]*)*$/', $val)){
                $this->addError('ingredients', 'Ingredients must be a comma separated list');
            }
        }
    }

    private function addError($key, $val){
    $this->errors[$key] = $val;
    }
}

?>