
<!-- <resources>
        <resource>
            <directory>${project.sources}</directory>
            <filtering>true</filtering>
            <excludes>
                <exclude>**/*.woff</exclude>
                <exclude>**/*.ttf</exclude>
            </excludes>
        </resource>
        <resource>
            <directory>${project.sources}</directory>
            <filtering>false</filtering>
            <includes>
                <include>**/*.woff</include>
                <include>**/*.ttf</include>
            </includes>
        </resource>
</resources> -->


<?php 
$product= $data['result'];

?> 
 
 <!-- Main Container -->
   <div class="main-container col2-left-layout">
      <div class="container">
        <div class="row">
          <div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
            <div class="category-description std">
              <div class="slider-items-products">
                <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col1 owl-carousel owl-theme">

                    <!-- Item -->
                    <div class="item">
                      <a href="#x">
                        <img alt="" src="public/images/cat-slider-img1.jpg">
                      </a>
                      <div class="inner-info">
                        <div class="cat-img-title">
                          <span>Our new range of</span>
                          <h2 class="cat-heading">
                            <strong>Smartphone</strong>
                          </h2>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                          <a class="info" href="#">Shop Now</a>
                        </div>
                      </div>
                    </div>
                    <!-- End Item -->

                    <!-- Item -->
                    <div class="item">
                      <a href="#x">
                        <img alt="" src="public/images/cat-slider-img2.jpg">
                      </a>
                    </div>

                    <!-- End Item -->

                  </div>
                </div>
              </div>
            </div>
            <div class="shop-inner">
              <div class="page-title">
                <h2><?=$data['name']?></h2>
              </div>

              <div class="product-grid-area">
                <ul class="products-grid">
                <?php if($product[0]->name =='' and $product[0]->id_type == ''):
                            array_shift($product);
                            // echo 'dasd';
                            // echo '<pre>';
                            // print_r($product);
                            // echo '</pre>';
                            ?>
                <?php endif ?>
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
                </ul>
              </div>
              <?php 
              //print_r($sortPriceShowPagination)
              ?>
              <div class="pagination-area ">
                <div id='page-sort-price'><?=$data['showPagination']?></div>
              </div>
            </div>
          </div>
          <aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
            <div class="block category-sidebar">
              <div class="sidebar-title">
                <h3>Categories</h3>
              </div>
              <ul class="product-categories">
                <li class="cat-item current-cat cat-parent">
                  <a href="shop_grid.html">Women</a>
                  <ul class="children">
                    <li class="cat-item cat-parent">
                      <a href="shop_grid.html">
                        <i class="fa fa-angle-right"></i>&nbsp; Accessories</a>
                      <ul class="children">
                        <li class="cat-item">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; Dresses</a>
                        </li>
                        <li class="cat-item cat-parent">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; Handbags</a>
                          <ul style="display: none;" class="children">
                            <li class="cat-item">
                              <a href="shop_grid.html">
                                <i class="fa fa-angle-right"></i>&nbsp; Beaded Handbags</a>
                            </li>
                            <li class="cat-item">
                              <a href="shop_grid.html">
                                <i class="fa fa-angle-right"></i>&nbsp; Sling bag</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li class="cat-item cat-parent">
                      <a href="shop_grid.html">
                        <i class="fa fa-angle-right"></i>&nbsp; Handbags</a>
                      <ul class="children">
                        <li class="cat-item">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; backpack</a>
                        </li>
                        <li class="cat-item">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; Beaded Handbags</a>
                        </li>
                        <li class="cat-item">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; Fabric Handbags</a>
                        </li>
                        <li class="cat-item">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; Sling bag</a>
                        </li>
                      </ul>
                    </li>
                    <li class="cat-item">
                      <a href="shop_grid.html">
                        <i class="fa fa-angle-right"></i>&nbsp; Jewellery</a>
                    </li>
                    <li class="cat-item">
                      <a href="shop_grid.html">
                        <i class="fa fa-angle-right"></i>&nbsp; Swimwear</a>
                    </li>
                  </ul>
                </li>
                <li class="cat-item cat-parent">
                  <a href="shop_grid.html">Men</a>
                  <ul class="children">
                    <li class="cat-item cat-parent">
                      <a href="shop_grid.html">
                        <i class="fa fa-angle-right"></i>&nbsp; Dresses</a>
                      <ul class="children">
                        <li class="cat-item">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; Casual</a>
                        </li>
                        <li class="cat-item">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; Designer</a>
                        </li>
                        <li class="cat-item">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; Evening</a>
                        </li>
                        <li class="cat-item">
                          <a href="shop_grid.html">
                            <i class="fa fa-angle-right"></i>&nbsp; Hoodies</a>
                        </li>
                      </ul>
                    </li>
                    <li class="cat-item">
                      <a href="shop_grid.html">
                        <i class="fa fa-angle-right"></i>&nbsp; Jackets</a>
                    </li>
                    <li class="cat-item">
                      <a href="shop_grid.html">
                        <i class="fa fa-angle-right"></i>&nbsp; Shoes</a>
                    </li>
                  </ul>
                </li>
                <li class="cat-item">
                  <a href="shop_grid.html">Electronics</a>
                </li>
                <li class="cat-item">
                  <a href="shop_grid.html">Furniture</a>
                </li>
                <li class="cat-item">
                  <a href="shop_grid.html">KItchen</a>
                </li>
              </ul>
            </div>
            <div class="block shop-by-side">
              <div class="sidebar-bar-title">
                <h3>Shop By</h3>
              </div>
              <div class="block-content">
                <p class="block-subtitle">Shopping Options</p>
                <div class="layered-Category">
                  <h2 class="saider-bar-title">Categories</h2>
                  <div class="layered-content">
                    <ul class="check-box-list">
                      <li>
                        <input type="checkbox" id="jtv1" name="jtvc">
                        <label for="jtv1">
                          <span class="button"></span> Camera & Photo
                          <span class="count">(12)</span>
                        </label>
                      </li>
                      <li>
                        <input type="checkbox" id="jtv2" name="jtvc">
                        <label for="jtv2">
                          <span class="button"></span> Computers
                          <span class="count">(18)</span>
                        </label>
                      </li>
                      <li>
                        <input type="checkbox" id="jtv3" name="jtvc">
                        <label for="jtv3">
                          <span class="button"></span> Apple Store
                          <span class="count">(15)</span>
                        </label>
                      </li>
                      <li>
                        <input type="checkbox" id="jtv4" name="jtvc">
                        <label for="jtv4">
                          <span class="button"></span> Car Electronic
                          <span class="count">(03)</span>
                        </label>
                      </li>
                      <li>
                        <input type="checkbox" id="jtv5" name="jtvc">
                        <label for="jtv5">
                          <span class="button"></span> Accessories
                          <span class="count">(04)</span>
                        </label>
                      </li>
                      <li>
                        <input type="checkbox" id="jtv7" name="jtvc">
                        <label for="jtv7">
                          <span class="button"></span> Game & Video
                          <span class="count">(07)</span>
                        </label>
                      </li>
                      <li>
                        <input type="checkbox" id="jtv8" name="jtvc">
                        <label for="jtv8">
                          <span class="button"></span> Best selling
                          <span class="count">(05)</span>
                        </label>
                      </li>
                    </ul>
                  </div>
                </div>

              </div>
            </div>
            <div class="block product-price-range ">
              <div class="sidebar-bar-title">
                <h3>Price</h3>
              </div>
              <div class="block-content">
                <div class="slider-range">
                  <div data-label-reasult="Range:" id="slider-range" data-min="200000" data-max="70000000" data-unit="vnd " class="slider-range-price" data-value-min="300000"
                    data-value-max="10000000"></div>
                  <div class="amount-range-price">Range: 200.000 - 70.000.000</div>
                  <ul class="check-box-list" id='check-price'>
                    <li>
                      <input type="checkbox" id="p1" name="cc" value="200000-10000000"/>
                      <label class="lblPrice" for="p1">
                        <span class="button"></span> 200.000 - 10.000.000
                        <span class="count">(<?=$data['price1']?>)</span>
                      </label>
                    </li>
                    <li>
                      <input type="checkbox" id="p2" name="cc" value="10000000-20000000"/>
                      <label class="lblPrice" for="p2">
                        <span class="button"></span> 10.000.000 - 20.000.000
                        <span class="count">(<?=$data['price2']?>)</span>
                      </label>
                    </li>
                    <li>
                      <input type="checkbox" id="p3" name="cc" value="20000000-30000000"/>
                      <label class="lblPrice" for="p3">
                        <span class="button"></span> 20.000.000 - 30.000.000
                        <span class="count">(<?=$data['price3']?>)</span>
                      </label>
                    </li>
                    <li>
                      <input type="checkbox" id="p4" name="cc" value="30000000"/>
                      <label class="lblPrice" for="p4">
                        <span class="button"></span> >30.000.000
                        <span class="count">(<?=$data['price4']?>)</span>
                      </label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="block sidebar-cart">
              <div class="sidebar-bar-title">
                <h3>My Cart</h3>
              </div>
              <div class="block-content">
                <p class="amount">There are
                  <a href="shopping_cart.html">2 items</a> in your cart.</p>
                <ul>
                  <li class="item">
                    <a href="shopping_cart.html" title="Sample Product" class="product-image">
                      <img src="public/images/products/img07.jpg" alt="Sample Product ">
                    </a>
                    <div class="product-details">
                      <div class="access">
                        <a href="#" title="Remove This Item" class="remove-cart">
                          <i class="icon-close"></i>
                        </a>
                      </div>
                      <p class="product-name">
                        <a href="shopping_cart.html">Lorem ipsum dolor sit amet Consectetur</a>
                      </p>
                      <strong>1</strong> x
                      <span class="price">$19.99</span>
                    </div>
                  </li>
                  <li class="item last">
                    <a href="#" title="Sample Product" class="product-image">
                      <img src="public/images/products/img08.jpg" alt="Sample Product">
                    </a>
                    <div class="product-details">
                      <div class="access">
                        <a href="#" title="Remove This Item" class="remove-cart">
                          <i class="icon-close"></i>
                        </a>
                      </div>
                      <p class="product-name">
                        <a href="shopping_cart.html">Consectetur utes anet adipisicing elit</a>
                      </p>
                      <strong>1</strong> x
                      <span class="price">$8.00</span>
                      <!--access clearfix-->
                    </div>
                  </li>
                </ul>
                <div class="summary">
                  <p class="subtotal">
                    <span class="label">Cart Subtotal:</span>
                    <span class="price">$27.99</span>
                  </p>
                </div>
                <div class="cart-checkout">
                  <button class="button button-checkout" title="Submit" type="submit">
                    <i class="fa fa-check"></i>
                    <span>Checkout</span>
                  </button>
                </div>
              </div>
            </div>


            <div class="single-img-add sidebar-add-slider ">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <img src="public/images/add-slide1.jpg" alt="slide1">
                    <div class="carousel-caption">
                      <h3>
                        <a href="single_product.html" title=" Sample Product">Sale Up to 50% off</a>
                      </h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      <a href="#" class="info">shopping Now</a>
                    </div>
                  </div>
                  <div class="item">
                    <img src="public/images/add-slide2.jpg" alt="slide2">
                    <div class="carousel-caption">
                      <h3>
                        <a href="single_product.html" title=" Sample Product">Smartwatch Collection</a>
                      </h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      <a href="#" class="info">All Collection</a>
                    </div>
                  </div>
                  <div class="item">
                    <img src="public/images/add-slide3.jpg" alt="slide3">
                    <div class="carousel-caption">
                      <h3>
                        <a href="single_product.html" title=" Sample Product">Summer Sale</a>
                      </h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
           


          </aside>
        </div>
      </div>
    </div>
    <!-- Main Container End -->
    <!-- jquery js -->

  <script type="text/javascript" src="public/js/jquery.min.js"></script>
<!--   
  <script type="text/javascript"> 
  function preback(){window.history.forward();}
  setTimeout("preback()",0);
  window.onunload=function(){null};
  </script> -->

  <script>
  $(document).ready(function(){
    var oldData = $('.products-grid').html();
    var oldpagination = $('.pagination-area ').html();
    
    $('.lblPrice').click(function(){
      var sortPage=1;
        

        $("#check-price input:checkbox").on('click', function(){
          var $box = $(this);
          if ($box.is(":checked")){
            
            $('input:checkbox').removeAttr('checked');
            $box.prop("checked", true);
            
          
          }
          else{
            $box.prop("checked", false);
              $(this).checked==false;
             
          }
        })

        var id = $(this).attr('for');
        var price = $('#'+id).attr('value');
        var url = "<?=$_GET['alias']?>"
       
        
        
        if(!$('#'+id).is(":checked")){
          $.ajax({
            url: "sort-price.php",
              type:"GET",
              data:{
                pricesend:price,
                alias: url,
                id:id,  
                sortPage:sortPage
                
            },
            success:function(responseFromPHP){
              var pageRangePrice='';
              //$('.pagination-area ul').hide()
              
                $('div[id^="data-"] h2').remove()

            
                $('.products-grid').html(responseFromPHP)
             
              var a=$('.products-grid div #sortPriceShowPagination').html();
              
              $('.products-grid div #sortPriceShowPagination').remove()
              $('#page-sort-price').html(a);
              
              
              //$('#page-sort-price #replace ul li a').click
              
              // $('#page-sort-price #replace ul li a').click(function(){
              //   alert('sada');
              //   var contentA = $(this).attr('value');
              //   sortPage=contentA;
              //   var next=$('#page-sort-price #replace ul li .next').attr('value');
                
              //   next = parseInt(next)+1;

              //   var prev=$('#page-sort-price #replace ul li .prev').attr('value');
                
              //   prev = parseInt(prev)-1;
                
                
              //   $('#page-sort-price #replace ul li .next').attr('value',next)
              //   $('#page-sort-price #replace ul li .next').prev('value',prev)


              //   $.ajax({
              //           url: "sort-price.php",
              //             type:"GET",
              //             data:{
              //               pricesend:price,
              //               alias: url,
              //               id:id,  
              //               sortPage:sortPage},
              //           success:function(responseFromPHP){
                          
              //             $('.products-grid').html(responseFromPHP);
              //             //var abc=$('.products-grid div #sortPriceShowPagination').html();
              //             //console.log(abc);
              //             //$('#page-sort-price').html(abc);
              //           }

              //   })

              // })
              //$('.pagination-area ').show();
            }
          })
        }
        else{
        $('#data-'+id).remove()
        $('.pagination-area ').hide()
        }
        

//#page-sort-price #replace ul li a
//----------------------
                $('body').on("click",'#page-sort-price #replace ul li a',function(){
                //alert('sada');
                var contentA = $(this).attr('value');
                sortPage=contentA;
                var next=$('#page-sort-price #replace ul li .next').attr('value');
                
                next = parseInt(next)+1;

                var prev=$('#page-sort-price #replace ul li .prev').attr('value');
                
                prev = parseInt(prev)-1;
                
                
                $('#page-sort-price #replace ul li .next').attr('value',next)
                $('#page-sort-price #replace ul li .next').prev('value',prev)


                $.ajax({
                        url: "sort-price.php",
                          type:"GET",
                          data:{
                            pricesend:price,
                            alias: url,
                            id:id,  
                            sortPage:sortPage},
                        success:function(responseFromPHP){
                          
                          $('.products-grid').html(responseFromPHP);
                          var abc=$('.products-grid div #sortPriceShowPagination').html();
                          //console.log(abc);
                          $('.products-grid div #sortPriceShowPagination').remove();
                          $('#page-sort-price').html(abc);
                        }

                });

              })
//----------------------


        if($('.product-grid-area .products-grid li').length <1){
              console.log('empty');
              $('.products-grid').html(oldData)
              $('.pagination-area ').html(oldpagination);
              $('.pagination-area ').show();
        }

          // $('#replace ul li a').click(function(){
          //       alert('sada');
          //       var contentA = $(this).attr('value');
          //       sortPage=contentA;
                

          //       $.ajax({
          //               url: "sort-price.php",
          //                 type:"GET",
          //                 data:{
          //                   pricesend:price,
          //                   alias: url,
          //                   id:id,  
          //                   sortPage:sortPage},
          //               success:function(responseFromPHP){
                          
          //                 $('.products-grid').html(responseFromPHP);
          //                 var abc=$('.products-grid div #sortPriceShowPagination').html();
          //                 console.log(abc);
          //                 //$('#page-sort-price').html(abc);
          //               }

          //       })

          //     })     
        

    })

  

    
    $('#slider-range').click(function(){
      var rangePrice=$('.slider-range .amount-range-price').html();
      var pageUrl="<?=$data['name']?>";
      $('.products-grid li').remove();
      $('input:checkbox').removeAttr('checked');
      $('.pagination-area ul').hide();
      $.ajax({
        url: "range-price.php",
        type:"GET",
        data:{
          rangePriceSend:rangePrice,
          pageUrl:pageUrl,
        },
        success:function(rangePriceFromPHP){
          console.log(rangePriceFromPHP);
        }
      })
    })
  })
  
  </script>

