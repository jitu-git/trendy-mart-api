<?php


namespace App\Extra\Forms\Admin;

use App\Extra\Forms\src\BuildForm;
use Illuminate\Validation\Rule;

class SizeForm extends BuildForm
{

    public $data;

    /**
     * AdminUserForm constructor.
     * @param null $data
     */
    public function __construct($data = null)
    {
        $this->data = $data;
    }

    public static function rules($id = null) : array
    {
        $rules = [
            'title' => 'required',
            'short_title' => 'required',
        ];
                
        return $rules;
    }

    public function form(): array
    {
        return [
            [
                "name" => "title",
                "label" => "Title",
                "extra" => [
                    "placeholder" => "Enter Title",
                    "required" => true ,
                ],
            ],
            [
                "name" => "short_title",
                "label" => "Short Title",
                "extra" => [
                    "placeholder" => "Enter Short Title",
                    "required" => true ,
                   
                ],
            ],
        ];
    }
}
