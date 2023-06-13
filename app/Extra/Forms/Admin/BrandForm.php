<?php


namespace App\Extra\Forms\Admin;

use App\Extra\Forms\src\BuildForm;
use Illuminate\Validation\Rule;

class BrandForm extends BuildForm
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
        ];
    }
}
