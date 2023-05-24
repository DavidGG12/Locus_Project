<?php
    function validate_text($text)
    {
        return (!empty($text)) ? false : true; 
    }

    function validate_password($password)
    {
        $er = '/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@#$!%&*?])[a-zA-Z\d@#$!%&*?]{8,100}$/';

        return (preg_match($er, $password)) ? true : false;
    }
?>