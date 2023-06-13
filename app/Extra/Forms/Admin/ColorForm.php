<?php


namespace App\Extra\Forms\Admin;

use App\Extra\Forms\src\BuildForm;
use Illuminate\Validation\Rule;

class ColorForm extends BuildForm
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
            'color_name' => 'required',
            'color_code' => 'required',
        ];
                
        return $rules;
    }

    public function form(): array
    {
        return [
            [
                "name" => "color_name",
                "label" => "Color Name",
                "extra" => [
                    "placeholder" => "Enter Name",
                    "required" => true ,
                ],
            ],
            [
                "name" => "color_code",
                "label" => "Color code",
                "type" => 'color',
                "extra" => [
                    "placeholder" => "Select Color",
                    "required" => true ,
                   
                ],
            ],
        ];
    }
}
