<?php


namespace App\Extra\Forms\Admin;

use App\Extra\Forms\src\BuildForm;
use Illuminate\Validation\Rule;

class ProductForm extends BuildForm
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
            'category_id' => 'required',
            'price' => 'required',
            'sizes' => 'required',
            'colors' => 'required',
            'description' => 'required',
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
                "name" => "category_id",
                "label" => "Category",
                "type" => 'select',
                "data" => menu_parent_list(),
                "extra" => [
                    "placeholder" => "Select Category",
                    "required" => true ,
                ],
            ],
            [
                "name" => "price",
                "label" => "Price",
                "extra" => [
                    "placeholder" => "Enter Price",
                    "required" => true ,
                ],
            ],
            [
                "name" => "offer_price",
                "label" => "Offer Price",
                "extra" => [
                    "placeholder" => "Enter Price",
                    "required" => true ,
                ],
            ],
            [
                "name" => "sizes[]",
                "label" => "Size",
                "type" => 'select',
                "data" => size_list(),
                "extra" => [
                    "placeholder" => "Select Size",
                    "required" => true ,
                    "multiple" => true,
                    'id' => 'sizes'
                ],
            ],
            [
                "name" => "colors[]",
                "label" => "Color",
                "type" => 'select',
                "data" => color_list(),
                "extra" => [
                    "placeholder" => "Select Color",
                    "required" => true ,
                    "multiple" => true,
                    'id' => 'colors'
                ],
            ],
            [
                "name" => "images[]",
                "label" => "Images",
                "type" => 'file',
                "extra" => [
                    "required" => true ,
                    "multiple" => true,
                   
                ],
            ],
            [
                "name" => "description",
                "label" => "Description",
                "type" => 'textarea',
                "extra" => [
                    "placeholder" => "Enter description",
                    "required" => true ,
                   
                ],
            ],
        ];
    }
}
