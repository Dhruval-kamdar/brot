<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Order extends Model {

    protected $table = "order";
    public function getOrder(){
        
        $result = Order::select('product.productname','product_image.image','product.price','product.description','order.orderid','order.quantity','order.status','size.size')
                ->join('product','product.id','=','order.productid')
                ->join('size','size.id','=','order.size')
                ->join('product_image','product_image.productid','=','product.id')
                ->orderBy('order.id', 'asc')
                ->get();
        return $result;
    }
    
    public function getOrdercustomer($userid){
        $result = Order::select('product.productname','product_image.image','product.price','product.description','order.orderid','order.quantity','order.status','size.size')
                ->join('product','product.id','=','order.productid')
                ->join('size','size.id','=','order.size')
                ->join('product_image','product_image.productid','=','product.id')
                ->where('order.userid', $userid)
                ->orderBy('order.id', 'asc')
                ->get();
        return $result;
    }
    
    public function getOrdernew(){
        
        $result = Order::select('product.productname','product_image.image','product.price','product.description','order.orderid','order.quantity','order.status','size.size')
                ->join('product','product.id','=','order.productid')
                ->join('product_image','product_image.productid','=','product.id')
                ->join('size','size.id','=','order.size')
                ->groupBy('order.orderid')
                ->orderBy('order.id', 'asc')
                ->get();
        return $result;
    }
    
    public function changestatusOrder($orderid){

        $result = DB::table('order')
                ->where('orderid', $orderid['id'])
                ->update(['status' => "confirm"]);
        return $result;
    }
    
    public function confirmStatus($orderid){
        
        $result = DB::table('order')
                ->where('orderid', $orderid['id'])
                ->update(['status' => "delivered"]);
        return $result;
    }
}
