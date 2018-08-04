<!-- Main Container -->
<?php
$carts=$data['cart'];
$cart=$data['cart']->items;
// echo '<pre>';
// print_r($carts);
// echo '</pre>';
?>


<section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          
          <div class="page-content page-order"><div class="page-title">
            <h2>Shopping Cart</h2>
          </div>
            
            <?php if($carts->totalQty != 0):?>
            <div class="order-detail-content">
              <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                  <thead>
                    <tr>
                      <th class="cart_product">Product</th>
                      <th>Description</th>
                      
                      <th>Price</th>
                      
                      <th>Qty</th>
                      <th>Total</th>
                      <th  class="action" ><i class="fa fa-trash-o"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php foreach($cart as $key => $c) :?>
                    <tr id="deleteRow-<?=$key?>">
                      <td class="cart_product"><a href="#"><img src="public/images/products/<?=$c['item']->image?>" alt="Product"></a></td>
                      <td class="cart_description"><p class="product-name"><a href="#"><?=$c['item']->detail?> </a></p>
        
                      
                      <td class="price" >
                        <span>
                        <?php if($c['item']->promotion_price>0):?>
                        <?=number_format($c['item']->promotion_price)?></span>
                        <br>
                        <del><?=number_format($c['item']->price)?></del>
                        <?php else: ?>
                        <?=number_format($c['item']->price)?></span>
                        <?php endif ?>
                      </td>
                      
                      <td class="qty"><input class="form-control input-sm" type="text" value="<?=$c['qty']?>" id-product="<?=$c['item']->id?>"></td>
                      <td class="total"><span class="total-<?=$key?>">
                        <?php if($c['item']->promotion_price>0):?>
                        <?=number_format(($c['qty'])*($c['item']->promotion_price))?></span>
                        <?php else: ?>
                        <?=number_format(($c['qty'])*($c['item']->price))?></span>
                        <?php endif ?>
                      </td>
                      <td class="action"><a class="delete-cart" id="<?=$key?>"><i class="icon-close"></i></a></td>
                    </tr>
                    <?php endforeach ?>

                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2" rowspan="2"></td>
                      <td colspan="3">Total Products </td>
                      <td colspan="2" class="totalQty"><?=$carts->totalQty?> </td>
                    </tr>
                    <tr>
                      <td colspan="3"><strong>Total Price</strong></td>
                      <td colspan="2" class="totalprice"><strong><?=$carts->promtPrice?> </strong></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="cart_navigation"> <a class="continue-btn" href="./"><i class="fa fa-arrow-left"> </i>&nbsp; Tiếp tục mua</a> <a class="checkout-btn" href="#"><i class="fa fa-check"></i> Đặt hàng</a> </div>
            </div>
            <?php else:?>
            <?php echo "<h3>Bạn hiện không có sản phẩm cần thanh toán </h3>" ?>
            <div>
            <a href="home"><button class="btn btn-primary">về trang chủ</button></a>
            </div>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript" src="public/js/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
    $('.input-sm').keyup(function(){
      
      var qty= $(this).val();
      var id = $(this).attr("id-product");
      setTimeout(function(){
        
        // console.log(qty);
        // console.log(id);
        $.ajax({
          url:"cart.php",
          type:"POST",
          data:{
            quantity:qty,
            idProduct:id,
            action:"update"
          },
          dataType: "JSON",
          success:function(res){
            //res=JSON.parse(res);
            //console.log(res)
            $('.total-'+id).html(res.discountPrice);
            $('.totalprice').html(res.totalPrice);
            $('.totalQty').html(res.totalQty);

          }
        })
      },2000)
    })

    $('.delete-cart').click(function(){
      
      var id = $(this).attr("id");
      $.ajax({
        url:"cart.php",
          type:"POST",
          data:{
            
            idProduct:id,
            action:"delete"
          },
          dataType: "JSON",
          success:function(res){
            //res=JSON.parse(res);
            //console.log(res)
            $('#deleteRow-'+id).hide(500);
            $('.totalprice').html(res.totalPrice);
            $('.totalQty').html(res.totalQty);
          }
      })
    })
  })
  </script>