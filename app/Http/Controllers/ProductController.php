<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(Request  $request){
        $this->validate($request, [
             'anime_s'=>'required'
        ]);
         $id = $request->input('anime_s');
           return  view('enter',["id" => $id]);
        }

        public function search(Request  $request){
            $this->validate($request, [
                 'search'=>'required'
            ]);
             $price = $request->input('search');
               return  view('search',["price" => $price]);
            }

            public function select(Request  $request){
                $this->validate($request, [
                     'byprice'=>'required',
                     'byrating'=>'required'
                ]);
                 $c1= $request->input('byprice');
                 $c2=$request->input('byrating');
                   return  view('select',["price" => $c1,"rating"=>$c2]);
                }

        function admin(Request $request){
            $this->validate($request, [
                    'email'=>'required',
                    'password'=>'required'
               ]); 
               $c = oci_connect('System', 'omsnyh2001', 'localhost/XE','AL32UTF8');
                     if (!$c) {
                       $e = oci_error();
                       trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                      } 
              $email = $request->input('email');
                 $psw   = $request->input('password');
                  $s = oci_parse($c, "select * from AdminOfShop where u_email=:bind1 and u_password = :bind5");
                  oci_bind_by_name($s, ":bind1", $email);
                  oci_bind_by_name($s, ":bind5", $psw);
                  oci_execute($s, OCI_DEFAULT);
                  $var = 0;
                    while (oci_fetch($s)) {
                     $var +=1;
                        $fname = oci_result($s, "F_NAME");
                        $lname = oci_result($s, "L_NAME");
              }
              if ($var > 0) {
               return view("admin",["email" => $email,"fname" => $fname,"lname" => $lname]);
               oci_free_statement($s);
                 oci_close($c);
              }else{
                 return back()->with('info', 'Wrong Login Details');
              }
           }
           public function logout(){
               return view('home');
           }
           public function add(Request $request){

            $this->validate($request, [
               'title'=>'required',
               'title_orig'=>'required',
               'product_url'=>'required',
               'origin_country'=>'required',
               'id'=>'required',
               'product_id'=>'required'
          ]); 
            $c = oci_connect('System', 'omsnyh2001', 'localhost/XE','AL32UTF8');
                if (!$c) {
                  $e = oci_error();
                  trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                 } 
            $c1 = $request->input('title');
            $c2 = $request->input('title_orig');
            $c3 = $request->input('product_url');
            $c4 = $request->input('origin_country');
            $c5 = $request->input('id');
            $c6 = $request->input('product_id');

            $s = oci_parse($c, "insert into ShopOfClothes(TITLE,TITLE_ORIG,PRODUCT_URL,ORIGIN_COUNTRY,ID,PRODUCT_ID) values(:bind1, :bind2, :bind3, :bind4, :bind5,:bind6)");
            oci_bind_by_name($s, ":bind1", $c1);
            oci_bind_by_name($s, ":bind2", $c2);
            oci_bind_by_name($s, ":bind3", $c3);
            oci_bind_by_name($s, ":bind4", $c4);
            oci_bind_by_name($s, ":bind5", $c5);
            oci_bind_by_name($s, ":bind6", $c6);
            oci_execute($s);
            oci_free_statement($s);
            oci_close($c);
            return back();
      }
      public function update(Request $request){
        $this->validate($request, [
           'price'=>'required',
           'id'=>'required',
           'total_profit'=>'required',
           'product_color'=>'required'
      ]); 
        $c = oci_connect('System', 'omsnyh2001', 'localhost/XE','AL32UTF8');
            if (!$c) {
              $e = oci_error();
              trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
             } 
        $c1 = $request->input('price');
        $c2 = $request->input('id');
        $c3 = $request->input('total_profit');
        $c4 = $request->input('product_color');
        $s = oci_parse($c, "UPDATE ShopOfClothes SET PRICE =:bind1 , TOTAL_PROFIT =:bind3 , PRODUCT_COLOR =:bind4 WHERE ID=:bind2");
        oci_bind_by_name($s, ":bind1", $c1);
        oci_bind_by_name($s, ":bind2", $c2);
        oci_bind_by_name($s, ":bind3", $c3);
        oci_bind_by_name($s, ":bind4", $c4);
        oci_execute($s);
        oci_free_statement($s);
        oci_close($c);
        return back();
  }
  function delete(Request $request){
    $this->validate($request, [
            'id'=>'required',
       ]); 
       $c = oci_connect('System', 'omsnyh2001', 'localhost/XE','AL32UTF8');
             if (!$c) {
               $e = oci_error();
               trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
              } 
      $id = $request->input('id');
          $s = oci_parse($c, "DELETE FROM ShopOfClothes where ID =:bind1");
           oci_bind_by_name($s, ":bind1", $id);
           oci_execute($s);
       return back();
   }
}
