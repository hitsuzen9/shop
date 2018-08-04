<?php
$detail = $data['result'];
$related_detail=$data['related_detail'];
// echo '<pre>';
// print_r();
// echo '</pre>';
?>
<!-- Main Container -->
<div class="main-container col1-layout">
      <div class="container">
        <div class="row">
          <div class="col-main">
            <div class="product-view-area">
              <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
              <?php if($detail->promotion_price !=0): ?>
                                <div class="icon-sale-label sale-left">Sale</div>
              <?php endif ?>
                <?php if($detail->new == 1): ?>
                                <div class="icon-new-label new-right">New</div>
              <?php endif ?>
                <div class="large-image">
                  <a href="images/products/<?=$detail->image?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20">
                    <img style="width:100%" class="zoom-img" src="public/images/products/<?=$detail->image?>" alt="products"> </a>
                </div>
              </div>
              <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">

                <div class="product-name">
                  <h1><?=$detail->name?></h1>
                </div>
                <div class="price-box">
                                        <?php if($detail->promotion_price==0): ?>
                                        <span class="regular-price">
                                          <span class="price"> <?= number_format($detail->price)?> </span>
                                        </span>
                                        <?php else: ?>
                                        <p class="special-price">
                                          <span class="price-label">Special Price</span>
                                          <span class="price"> <?= number_format($detail->promotion_price)?> </span>
                                        </p>
                                        <p class="old-price">
                                          <span class="price-label">Regular Price:</span>
                                          <span class="price"> <?= number_format($detail->price)?> </span>
                                        </p>
                                        <?php endif ?>
                </div>

                <div class="short-description">
                <?php if($detail->detail != ''): ?>
                  <h2>Chi tiết sản phẩm</h2>
                <?php endif ?>    
                    <p> <?=$detail->detail?>
                    </p>
                   
                </div>

                <div class="product-variation">
                  <form action="#" method="post">
                    <div class="cart-plus-minus">
                      <label for="qty">số lượng:</label>
                      <div class="numbers-row">
                        <div   class="dec qtybutton">
                          <i class="fa fa-minus">&nbsp;</i>
                        </div>
                        <input type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                        <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"
                          class="inc qtybutton">
                          <i class="fa fa-plus">&nbsp;</i>
                        </div>
                      </div>
                    </div>
                    <button class="button pro-add-to-cart" title="Add to Cart" type="button">
                      <span>
                        <i class="fa fa-shopping-cart"></i> Add to Cart</span>
                    </button>
                  </form>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Main Container End -->
    <!-- Related Product Slider -->
    <section class="upsell-product-area">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">

            <div class="page-header">
              <h2>Các sản phẩm tương tự</h2>
            </div>
            <div class="slider-items-products">
              <div id="upsell-product-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4">
                  
                  <?php foreach($related_detail as $r): ?>
                  <?php if($r->id_url != $data['alias']):?>
                  <div class="product-item">
                    <div class="item-inner fadeInUp">
                      <div class="product-thumbnail">
                        <div class="pr-img-area">
                          <img class="first-img" src="public/images/products/<?=$r->image?>" alt="">
                          <img class="hover-img" src="public/images/products/<?=$r->image?>" alt="">
                          <button type="button" class="add-to-cart-mt" id-product="<?=$r->id?>">
                            <i class="fa fa-shopping-cart"></i>
                            <span> Add to Cart</span>
                          </button>
                        </div>

                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title">
                            <a title="Ipsums Dolors Untra" href="<?=$r->url?>-<?=$r->id_url?>.html"><?=$r->name?> </a>
                          </div>
                          <div class="item-content">

                            <div class="item-price">
                              <div class="price-box">
                              <?php if($detail->promotion_price==0): ?>
                                        <span class="regular-price">
                                          <span class="price"> <?= number_format($detail->price)?> </span>
                                        </span>
                                        <?php else: ?>
                                        <p class="special-price">
                                          <span class="price-label">Special Price</span>
                                          <span class="price"> <?= number_format($detail->promotion_price)?> </span>
                                        </p>
                                        <p class="old-price">
                                          <span class="price-label">Regular Price:</span>
                                          <span class="price"> <?= number_format($detail->price)?> </span>
                                        </p>
                              <?php endif ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>  
                  <?php endif ?>
                  <?php endforeach ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- Related Product Slider End -->
    <script type="text/javascript" src="public/js/jquery.min.js"></script>

    <script>
    $(document).ready(function(){
      
      //console.log(id);
      $('.inc').click(function(){
        var qty=$('#qty').val();
        //console.log(qty);
        qty = !isNaN(qty) ? parseInt(qty):0;
        $('#qty').val(qty);

      })
      $('.dec').click(function(){
        var qty=$('#qty').val();
        //console.log(qty);
        qty = !isNaN(qty) ? parseInt(qty):1;
        if(qty<=1){
          alert('số lượng là lớn hơn 0');
          qty=1;
          $('#qty').val(qty)
        }
        else
        $('#qty').val(qty-1);

      })
      $('.pro-add-to-cart').click(function(){
        var qty=$('#qty').val();
        // //console.log(qty);
        // qty=parseInt(qty);
        
        // qty = !isNaN(qty) ? parseInt(qty):1;
        // //console.log(qty);
        if(isNaN(qty)){
          alert('số lượng là số');
          $('#qty').focus();
          $('#qty').val(1);
        }
        if(qty==0){
          alert('số lượng là lớn hơn 0');
          $('#qty').focus();
        }
        qty=parseInt(qty);
        var id = "<?=$detail->id?>";
        //console.log(id);
        $.ajax({
          url:"cart.php",
          type:"POST",
          data:{
            idProduct:id,
            quantity:qty,
          },
          success:function(res){
          $('#name').text(res);
          $('#myModal1').modal('show');
          },
          error:function(){
          console.log('error');
          }
        })
        
      })
    })
    </script>
    