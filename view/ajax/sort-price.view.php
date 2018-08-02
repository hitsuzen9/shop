
<div id="data-<?=$data['id']?>" value="<?=$data['page']?>">
<?php $product = $data['product']; 

$sortPriceShowPagination= $data['sortPriceShowPagination'];
//$sortPriceShowPagination=json_encode($sortPriceShowPagination);

?>
 <div id='sortPriceShowPagination'><div id='replace' class="<?=$data['page']?>"><?=$sortPriceShowPagination?></div>
          </div>

<?php if(count($product)>1){
    if($product[0]->name =='' and $product[0]->id_type == ''){
        array_shift($product);
                           
    }
}
//echo '<base href="http://localhost/shop1701/">';
?>

                <?php if(count($product)>0): ?>
                    
              
                <?php foreach($product as $p): ?>
                  <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6" style="height:350px">
                    <div class="product-item">
                      <div class="item-inner">
                        <div class="product-thumbnail">
                            
                            <?php if($p->promotion_price !=0): ?>
                              <div class="icon-sale-label sale-left">Sale</div>
                            <?php endif ?>
                              <?php if($p->new == 1): ?>
                              <div class="icon-new-label   new-right">New</div>
                            <?php endif ?>
                          <div class="pr-img-area">
                            <a title="Ipsums Dolors Untra" href="<?=$p->url?>-<?=$p->id_url?>.html">
                              <figure>
                                <img class="first-img" src="public/images/products/<?=$p->image?>" alt="">
                                <img class="hover-img" src="public/images/products/<?=$p->image?>" alt="">
                              </figure>
                            </a>
                            <button type="button" class="add-to-cart-mt" id-product="<?=$p->id?>">
                              <i class="fa fa-shopping-cart"></i>
                              <span> Add to Cart</span>
                            </button>
                          </div>

                        </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title">
                              <a title="Ipsums Dolors Untra" href="<?=$p->url?>-<?=$p->id_url?>.html"><?=$p->name?> </a>
                            </div>
                            <div class="item-content">

                              <div class="item-price">
                                <div class="price-box">
                                <?php if($p->promotion_price==0): ?>
                                        <span class="regular-price">
                                          <span class="price"> <?= number_format($p->price)?> </span>
                                        </span>
                                        <?php else: ?>
                                        <p class="special-price">
                                          <span class="price-label">Special Price</span>
                                          <span class="price"> <?= number_format($p->promotion_price)?> </span>
                                        </p>
                                        <p class="old-price">
                                          <span class="price-label">Regular Price:</span>
                                          <span class="price"> <?= number_format($p->price)?> </span>
                                        </p>
                                  <?php endif ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                <?php endforeach ?>
                <?php else:
                  echo "<h2>Sản phẩm đang được cập nhật</h2>"; 
                endif;
                ?>
</div>           
              