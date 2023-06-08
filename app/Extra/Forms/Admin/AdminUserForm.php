<?php


namespace App\Extra\Forms\Admin;

use App\Extra\Forms\src\BuildForm;
use Illuminate\Validation\Rule;
use App\Model\Country;
use App\Model\Taluka;

class AdminUserForm extends BuildForm
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

    public static function rules($id = 0) : array
    {
        $rules = [
            "name" => "required",
            "role_id" => "required",
            "email" => "required|email|unique:users,email,NULL,id,deleted_at,NULL",
        ];

        if ($id > 0) {
            $rules["email"] = ['required', 'email', Rule::unique('users')->ignore($id)];
            $rules["password"] = "nullable|min:6|max:20";
        } else {
            $rules["password"] = "required|min:6|max:20";
        }

        return $rules;
    }

    public function form(): array
    {
        return [
            [
                "name" => "role_id",
                "label" => "Role",
                "type" => "select",
                "data" => role_list(),
                "extra" => [
                    "placeholder" => "Choose Role",
                    "required" => true ,
                ],
            ],
            [
                "name" => "district_id",
                "label" => "District",
                "type" => "select",
                "data" => district_list(),
                "extra" => [
                    "placeholder" => "Choose District",
                    "required" => true ,
                ],
            ],
            [
                "name" => "taluka_id",
                "label" => "Taluka",
                "type" => "select",
                "data" => isset($this->data) ? Taluka::TalukaList(['district_id' => $this->data->district_id]) : [],
                "extra" => [
                    "placeholder" => "Choose Taluka",                   
                ],
            ],
            [
                "name" => "name",
                "label" => "Name",
                "extra" => [
                    "placeholder" => "Enter Name",
                    "required" => true,
                ],
            ],
            [
                "name" => "email",
                "label" => "Email",
                "extra" => [
                    "placeholder" => "Enter Email",
                    "required" => true,
                ],
            ],
            [
                "name" => "password",
                "label" => "Password",
                "type" => "password",
                "extra" => [
                    "placeholder" => "Enter Password",
                    "required" =>  $this->data ? false : true ,
                ],
            ],
        ];
    }
}
