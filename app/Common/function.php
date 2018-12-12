<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/12
 * Time: 3:00 PM
 */

if(!function_exists('modeltest')){
    function modeltest(){
        return true;
    }
}
if(!function_exists('return_json')){
    function return_json($data){
//        if(is_array($data)) {
            return response()->json($data);
//        }else{
//            return response()->
//        }
    }
}

if(!function_exists('success_code')){
    function success_code(){
        return [
            'code' => 'success',
            'message' => '操作成功',
        ];
    }
}

if(!function_exists('error_exception')){
    function error_exception( Exception $e){

        return error_code($e->getCode(),$e->getMessage());

    }
}

if(!function_exists('error_code')){
    function error_code( $code = 0,$message = '发生未知错误'){

        return [
                'code' => $code,
                'message' => $message,
            ];
    }
}


