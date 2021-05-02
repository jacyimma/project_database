<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">        
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>     
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">         
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <style>
        label{
            font-weight:bold;
            color:black;
        }
       .logo{
              height:60px;
              width:130px;
              margin-left:50px;
            }
            .navbar{
              position: fixed;
              top:0;
              left:0;
              z-index:99;
            }
            .links{
              color:black;
              font-size:15px;
            }
            .itemImage{
                height:auto;
                width:90%;
            }
            .item{
               padding:20px;
               width:90%;
               margin-left:5%;
            }
            .group-cards{
                margin-top:100px;
            }
            .btns{
               margin-top:30px;
            }
            #show-to-insert{
                margin-top:100px;
            }
        </style>
    </head>
    <?php     
          $conn = oci_connect('System', 'omsnyh2001', 'localhost/XE','AL32UTF8');
          if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
           } 
?>
<body>
<div class="row">
<div class="col s12">
<nav class='navbar white'>
    <div class="nav-wrapper">
        <img src="{{asset('images/logo.jpg')}}" alt="" class='logo'>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li>
              <button class='btn blue' onclick="show()">Show To Insert</button>
        </li>
        <li>
                <form action="{{route('home')}}" method="get">
                     <input type="submit" value="Log out">
                </form>
        </li>
      </ul>
    </div>
  </nav>
</div>
</div>
<div class="oti" id="show-to-insert" style="display:none;">
    <form action="{{  route('insert')}}" method="POST">
    {{ csrf_field() }}
           <input type="number" name="id" required>
           <input type="text" name="product_id" required>
           <input type="text" name="title" required>
           <input type="text" name="product_url"required>
           <input type="text" name="origin_country" required>
           <input type="text" name="title_orig" required>
           <input type="submit" value="save">
    </form>
</div>
 <div  style="display:none;">        
   <form class="row z-depth-2 item">
    {{ csrf_field() }}
    <div class="col m5">
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='title'></textarea>
          <label for="textarea1" class=''>TITLE</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='title_orig'></textarea>
          <label for="textarea1">TITLE_ORIG</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='product_url'></textarea>
          <label for="textarea1">PRODUCT_URL</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='mer_title'></textarea>
          <label for="textarea1">MERCHANT_TITLE</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='mer_name'></textarea>
          <label for="textarea1">MERCHANT_NAME</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='origin_country'></textarea>
          <label for="textarea1">ORIGIN_COUNTRY</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='crawl'></textarea>
          <label for="textarea1">CRAWL_MONTH</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='inv_total'></textarea>
          <label for="textarea1">INVENTORY_TOTAL</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='mer_rating_count'></textarea>
          <label for="textarea1">MERCHANT_RATING_COUNT</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='ship_exp'></textarea>
          <label for="textarea1">SHIPPING_IS_EXPRESS</label>
    </div>
    </div>
    <div class="col s1"></div>
    <div class="col s3">
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='id'></textarea>
          <label for="textarea1">ID</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='product_id'></textarea>
          <label for="textarea1">PRODUCT_ID</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='product_picture'></textarea>
          <label for="textarea1">PRODUCT_PICTURE</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='product_color'></textarea>
          <label for="textarea1">PRODUCT_COLOR</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='currency_buyer'></textarea>
          <label for="textarea1">CURRENCY_BUYER</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='mer_id'></textarea>
          <label for="textarea1">MERCHANT_ID</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='product_var_size_id'></textarea>
          <label for="textarea1">PRODUCT_VARIATION_SIZE_ID</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='product_var_in'></textarea>
          <label for="textarea1">PRODUCT_VARIATION_SIZE_INVENTORY</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='shipping_name'></textarea>
          <label for="textarea1">SHIPPING_OPTION_NAME</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='shipping_price'></textarea>
          <label for="textarea1">SHIPPING_OPTION_PRICE</label>
    </div>
    </div>
  <div class='btns'>
      <button class="btn blue" type="submit">Save</button>
   </div>
</form>
</div>

<script>
 function show(){
    var x =  document.getElementById('show-to-insert');
    x.style.display="flex";
 } 
</script>

<div class="main" id="TOP-18_pop">
 <div class="row group-cards">
    <?php
    $curs1 = oci_new_cursor($conn);
    $stid1 = oci_parse($conn, "begin  top_anime1.top_anime_181(:cursbv); end;");
    oci_bind_by_name($stid1, ":cursbv", $curs1, -1, OCI_B_CURSOR);
    oci_execute($stid1);
    oci_execute($curs1); 
    while (($row = oci_fetch_array($curs1, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                $id = $row['ID'];
                $name =  $row['TITLE'];
                $title_orig =  $row['TITLE_ORIG'];
                $price =  $row['PRICE'];
                $jimage =  $row['PRODUCT_PICTURE'];
                $product_id = $row['PRODUCT_ID'];
                $currency_buyer = $row['CURRENCY_BUYER'];
                $units_sold = $row['UNITS_SOLD'];
                $uses_ad_boosts = $row['USES_AD_BOOSTS'];
                $rating = $row['RATING'];
                $rating_count = $row['RATING_COUNT'];
                $tags = $row['TAGS'];
                $product_color = $row['PRODUCT_COLOR'];
                $product_size_id = $row['PRODUCT_VARIATION_SIZE_ID'];
                $product_size_in = $row['PRODUCT_VARIATION_INVENTORY'];
                $shipping_option_name = $row['SHIPPING_OPTION_NAME'];
                $shipping_option_price = $row['SHIPPING_OPTION_PRICE'];
                $shipping_option_exp = $row['SHIPPING_IS_EXPRESS'];
                $countries_shipped_id = $row['COUNTRIES_SHIPPED_TO'];
                $inventory_total = $row['INVENTORY_TOTAL'];
                $urgency_text = $row['URGENCY_TEXT'];
                $origin_country = $row['ORIGIN_COUNTRY'];
                $mer_title = $row['MERCHANT_TITLE'];
                $mer_name = $row['MERCHANT_NAME'];
                $mer_rating_count = $row['MERCHANT_RATING_COUNT'];
                $mer_id = $row['MERCHANT_ID'];
                $product_url = $row['PRODUCT_URL'];
                $total_profit = $row['TOTAL_PROFIT'];
                $crawl = $row['CRAWL_MONTH'];               
         ?>
  <form class="row z-depth-2 item" action="{{  route('update')}}" method="POST">
  {{ csrf_field() }}
    <div class="col m3">
        <img src="<?php echo $jimage?>" alt="" class='itemImage'>
    </div>
    <div class="col m5">
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='title'><?php echo $name?></textarea>
          <label for="textarea1" class=''>TITLE</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='title_orig'><?php echo $title_orig?></textarea>
          <label for="textarea1">TITLE_ORIG</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='product_url'><?php echo $product_url ?></textarea>
          <label for="textarea1">PRODUCT_URL</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='mer_title'><?php echo $mer_title?></textarea>
          <label for="textarea1">MERCHANT_TITLE</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='mer_name'><?php echo $mer_name?></textarea>
          <label for="textarea1">MERCHANT_NAME</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='origin_country'><?php echo $origin_country?></textarea>
          <label for="textarea1">ORIGIN_COUNTRY</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='crawl'><?php echo $crawl?></textarea>
          <label for="textarea1">CRAWL_MONTH</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='inv_total'><?php echo $inventory_total?></textarea>
          <label for="textarea1">INVENTORY_TOTAL</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='mer_rating_count'><?php echo $mer_rating_count?></textarea>
          <label for="textarea1">MERCHANT_RATING_COUNT</label>
    </div>
    <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name='ship_exp'><?php echo $shipping_option_exp?></textarea>
          <label for="textarea1">SHIPPING_IS_EXPRESS</label>
    </div>
    </div>
            <div class="col s1">
            </div>
        <div class="col s3">
        <div class="input-field">
            <textarea id="textarea1" class="materialize-textarea" name='id'><?php echo $id ?></textarea>
            <label for="textarea1">ID</label>
        </div>
        <div class="input-field">
            <textarea id="textarea1" class="materialize-textarea" name='product_id'><?php echo $product_id ?></textarea>
            <label for="textarea1">PRODUCT_ID</label>
        </div>
        <div class="input-field">
            <textarea id="textarea1" class="materialize-textarea" name='total_profit'><?php echo $total_profit?></textarea>
            <label for="textarea1">TOTAL_PROFIT</label>
        </div>

        <div class="input-field">
            <textarea id="textarea1" class="materialize-textarea" name='product_color'><?php echo $product_color ?></textarea>
            <label for="textarea1">PRODUCT_COLOR</label>
        </div>
        <div class="input-field">
            <textarea id="textarea1" class="materialize-textarea" name='currency_buyer'><?php echo $currency_buyer ?></textarea>
            <label for="textarea1">CURRENCY_BUYER</label>
        </div>
        <div class="input-field">
            <textarea id="textarea1" class="materialize-textarea" name='mer_id'><?php echo $mer_id?></textarea>
            <label for="textarea1">MERCHANT_ID</label>
        </div>
        <div class="input-field">
            <textarea id="textarea1" class="materialize-textarea" name='product_var_size_id'><?php echo $product_size_id?></textarea>
            <label for="textarea1">PRODUCT_VARIATION_SIZE_ID</label>
        </div>
        <div class="input-field">
            <textarea id="textarea1" class="materialize-textarea" name='product_var_in'><?php echo $product_size_in?></textarea>
            <label for="textarea1">PRODUCT_VARIATION_SIZE_INVENTORY</label>
        </div>
        <div class="input-field">
            <textarea id="textarea1" class="materialize-textarea" name='price'><?php echo $price?></textarea>
            <label for="textarea1">PRICE</label>
        </div>
        <div class="input-field">
            <textarea id="textarea1" class="materialize-textarea" name='shipping_name'><?php echo $shipping_option_name?></textarea>
            <label for="textarea1">SHIPPING_OPTION_NAME</label>
        </div>
        <div class="input-field">
            <textarea id="textarea1" class="materialize-textarea" name='shipping_price'><?php echo $shipping_option_price?></textarea>
            <label for="textarea1">SHIPPING_OPTION_PRICE</label>
        </div>
        </div>
        <input type="submit" value="save">
  </form>

  <form action="{{  route('delete')}}" method="POST">
  {{ csrf_field() }}
  <input type="text" name="id" value="<?php echo $id?>" style="display:none;">
  <input type="submit" value="delete">
 
  </form>
  <?php

    }
    oci_free_statement($stid1);
    oci_free_statement($curs1);
  ?>
</div>
</body>
