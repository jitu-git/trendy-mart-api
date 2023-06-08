<?php

namespace App\Traits;

use App\Model\Schema\Events;

trait MassAction
{


    /**
     * @method mass_update
     * @param array $fields
     * @param array $ids
     * @return bool
     */
    public static function mass_update(array $fields, array $ids) {
        if($ids) {
            foreach ($ids as $id) {
                if($fields['status'] == 1){
                    #self::$event = Events::ACTIVE;
                } else {
                   # self::$event = Events::INACTIVE;
                }
                $response = self::find($id)->update($fields);
            }
        }
        return true;
    }

    /**
     * @method mass_delete
     * @param array $ids
     * @return bool
     */
    public static function mass_delete(array $ids) {
        if($ids) {
            foreach ($ids as $id) {
                self::find($id)->delete();
            }
        }
        return true;
    }


    public static function mass_action($action, $ids, $module = '') {
        switch ($action) {
            case 'active':
                $action =  self::mass_update(["status" => 1], $ids);
                if($action) {
                    $response = ['status' => true,'message' => 'Record activated' ];
                } else {
                    $response = ['status' => false,'message' => 'Something went wrong'];
                }
                break;

            case 'inactive':

                $action =  self::mass_update(["status" => 2], $ids);
                if($action) {
                    $response = ['status' => true,'message' => 'Record deactivated' ];
                } else {
                    $response = ['status' => false,'message' =>'Something went wrong'];
                }
                break;

            case 'delete':
                $action = self::mass_delete($ids);
                if($action) {
                    $response = ['status' => true,'message' => 'Record deleted' ];
                } else {
                    $response = ['status' => false,'message' => 'Something went wrong'];
                }
                break;

            default:
                $response = ['status' => false,'message' => 'Bad request'];
        }
        return $response;
    }

}
