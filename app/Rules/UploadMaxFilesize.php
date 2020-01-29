<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;


class UploadMaxFilesize implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value = $_FILES['select_file']['size'];
        $umf = ini_get('upload_max_filesize');
        $umfB = $this->SizeInBytes($umf);

        return $value < $umfB;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Завантажуваний файл перевищує upload_max_filesize = ". ini_get('upload_max_filesize') ;
    }

    public function SizeInBytes($val){
        $len = strlen($val);
        $last = strtolower(substr($val, -1));
        $number = substr($val, 0, $len-1);

        switch($last) {
            case 'g':
                $number *= 1024*1024*1024;
                break;
            case 'm':
                $number *= 1024*1024;
                break;
            case 'k':
                $number *= 1024;
                break;
        }

        return $number;
    }

}
