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
        body{
            background:#fffcf0;
            overflow-x:hidden;
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
            .image{
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
            .bold{
                font-weight:bold;
                font-size:15px;
            }
            .product{
                font-weight:500;
                font-size:17px;
            }
            .item-content{
                padding:10px;
                margin:10px 100px;
                box-shadow: 0 0 5px #b5b5b5;
            }
            .piechart {
            margin-top: 600px;
            margin-left:200px;
            display: block;
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background-image: conic-gradient(
                pink 70deg, 
                lightblue 0 235deg, 
                orange 0);
        }
        .piechart {
            display: flex;
            justify-content: center;
            align-items: center;
        }
            #show-to-insert{
                margin-top:100px;
            }
            .image-content{
                justify-content:center;
                height:auto;
                width:100%;
                text-align:center;
                margin-top:70px;
                margin-bottom:40px;
            }
            .image{
                height:300px;
                width:300px;
            }
        </style>
    </head>
    <body>
<?php     
          $conn = oci_connect('System', 'omsnyh2001', 'localhost/XE','AL32UTF8');
          if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
           } 
?>
<?php   
     $sql = 'SELECT * FROM ShopOfClothes WHERE ID = :didbv';
     $s = oci_parse($conn, $sql);
     $didbv = $id;
     oci_bind_by_name($s, ':didbv', $didbv);
     oci_execute($s, OCI_DEFAULT);
                     while (oci_fetch($s)) {
                     $id = oci_result($s, "ID"); 
                     $title =  oci_result($s, "TITLE");
                     $image =  oci_result($s, "PRODUCT_PICTURE");  
                     $title_orig = oci_result($s,'TITLE_ORIG');
                     $price =  oci_result($s,'PRICE');
                     $jimage = oci_result($s,'PRODUCT_PICTURE');
                     $product_id = oci_result($s,'PRODUCT_ID');
                     $currency_buyer = oci_result($s,'CURRENCY_BUYER');
                     $units_sold = oci_result($s,'UNITS_SOLD');
                     $uses_ad_boosts = oci_result($s,'USES_AD_BOOSTS');
                     $rating = oci_result($s,'RATING');
                     $rating_count = oci_result($s,'RATING_COUNT');
                     $tags = oci_result($s,'TAGS');
                     $product_color = oci_result($s,'PRODUCT_COLOR');
                     $product_size_id = oci_result($s,'PRODUCT_VARIATION_SIZE_ID');
                     $product_size_in = oci_result($s,'PRODUCT_VARIATION_INVENTORY');
                     $shipping_option_name = oci_result($s,'SHIPPING_OPTION_NAME');
                     $shipping_option_price = oci_result($s,'SHIPPING_OPTION_PRICE');
                     $shipping_option_exp = oci_result($s,'SHIPPING_IS_EXPRESS');
                     $countries_shipped_id = oci_result($s,'COUNTRIES_SHIPPED_TO');
                     $inventory_total =oci_result($s,'INVENTORY_TOTAL');
                     $urgency_text = oci_result($s,'URGENCY_TEXT');
                     $origin_country = oci_result($s,'ORIGIN_COUNTRY');
                     $mer_title = oci_result($s,'MERCHANT_TITLE');
                     $mer_name = oci_result($s,'MERCHANT_NAME');
                     $mer_rating_count = oci_result($s,'MERCHANT_RATING_COUNT');
                     $mer_id = oci_result($s,'MERCHANT_ID');
                     $product_url = oci_result($s,'PRODUCT_URL');
                     $total_profit = oci_result($s,'TOTAL_PROFIT');
                     $crawl = oci_result($s,'CRAWL_MONTH'); 
              ?>
            <div class='row'>
            <div class="col s1"></div>
              <div class="col s12 image-content">
                    <img src="<?php echo $image?>" alt="" class="image">
                    <div class="piechart">
                        <p><?php echo $rating ?></p>
                    </div>
                    <h6>ALIIOOP SHOP</h6>
              </div>
              <div class="col s12">
                   <div class="item-content">
                    <span class="bold">NAME : </span>
                    <span class="product"><?php echo $title_orig?></span>
                   </div>
                   <div class="item-content">
                    <span class="bold">TITLE: </span>
                    <span class="product"><?php echo $title?></span>
                   </div>
                   <div class="item-content">
                    <span class="bold">PRICE: </span>
                    <span class="product"><?php echo $price?></span>
                   </div>
                   <div class="item-content">
                    <span class="bold">PRODUCT COLOR: </span>
                    <span class="product"><?php echo $product_color?></span>
                   </div>
                   <div class="item-content">
                    <span class="bold">RATING: </span>
                    <span class="product"><?php echo $rating?></span>
                   </div>
                   <div class="item-content">
                    <span class="bold">ORIGIN COUNTRY: </span>
                    <span class="product"><?php echo $origin_country?></span>
                   </div>
                   <div class="item-content">
                    <span class="bold">TAGS: </span>
                    <span class="product"><?php echo $tags?></span>
                   </div>
                   <div class="item-content">
                    <span class="bold">SIZE: </span>
                    <span class="product"><?php echo $product_size_id?></span>
                   </div>
                   <div class="item-content">
                    <span class="bold">INVENTORY: </span>
                    <span class="product"><?php echo $product_size_in?></span>
                   </div>
              </div>
            </div>
       <?php  
    } ?>
     
</body>



