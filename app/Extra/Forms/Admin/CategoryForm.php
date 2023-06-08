<?php


namespace App\Extra\Forms\Admin;

use App\Extra\Forms\src\BuildForm;
use Illuminate\Validation\Rule;

class CategoryForm extends BuildForm
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
            "name" => "required",
         #   "icon" => "mimes:jpg,jpeg,png|max:10240",
        ];
        if (!$id) {
           # $rules['icon'] = "required|mimes:jpg,jpeg,png|max:10240";
        }
       
                
        return $rules;
    }

    public function form(): array
    {
        return [
            [
                "name" => "name",
                "label" => "Name",
                "extra" => [
                    "placeholder" => "Enter Name",
                    "required" => true ,
                ],
            ],
        ];
    }
}
