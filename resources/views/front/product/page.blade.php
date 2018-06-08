@extends('layouts.front.app')

@section('content')
  <div class="container">
    <div class="row my-4">
      <div class="col-md-4 position-relative">
        <img src="{{ asset("storage/$product->image_src") }}" alt="{{ $product->name }}" class="img-fluid">
        <div class="discount-percentage position-absolute text-white">30% Off</div>
      </div>
      <div class="col-md-5">
        <h1>{{ $product->name }}</h1><!--name-->
        <p>{!! $product->content !!}</p> <!--Description-->
        <div class="product-info">
          <dl class="row">
            <dt class="col-6">SKU</dt>
            <dd class="col-6 text-right">{{ $product->sku }}</dd>
            <dt class="col-6">Brand</dt>
            <dd class="col-6 text-right"><a href="#">{{ $product->brand }}</a></dd>
            <dt class="col-6">Delivery Cost</dt>
            <dd class="col-6 text-right">{{ $product->delivery_cost }}</dd>
            <dt class="col-6">Delivery Time</dt>
            <dd class="col-6 text-right">{{ $product->delivery_time }}</dd>
          </dl>
        </div> <!-- Product info -->
        <div class="row">
          <div class="col-md-6">
            <div class="orginal_price">AED 2000{{ $product->orginal_price }}</div>
            <div class="special_price">AED {{ $product->special_price }}</div>
          </div>
          <div class="col-md-6 text-right">
            <a href="{{ $product->url }}" class="btn btn-secondary btn-lg text-white">View product</a>
          </div>
        </div>
      </div>
    </div><!-- row -->
  </div>

  <!-- Sort by -->
  <div class="row">
    <div class="col-sm-7">
      <h3 class="mb-4">Compare Product Prices</h3>
    </div>
    <div class="col-sm-5">
      <form>
        <div class="form-group row">
          <label for="exampleFormControlSelect1" class="col-sm-6 col-form-label text-right"><i class="fas fa-filter text-muted pr-2"></i>Sort By</label>
          <div class="col-sm-6">
            <select class="form-control" id="exampleFormControlSelect1">
              <option>Cheapest Price</option>
              <option>Shop Rating</option>
              <option>With Coupon</option>
            </select>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- Price comparison -->
  <div class="compare-block">
    <ul class="p-0">
      <li class="position-relative bg-white">
    		<div class="row">
    			<div class="col-sm-8">
              <div class="row">
        				<div class="col-sm-3">
                  <img src="../images/sprii.jpg" alt="sprii" class="img-fluid">
                  <div class="rate text-center">
                    <i class="fa fa-star pr-1 pt-2 pb-0 text-muted"></i><i class="fa fa-star pr-1 pt-2 pb-0 text-muted"></i><i class="fa fa-star pr-1 pt-2 pb-0 text-muted"></i><i class="fa fa-star pr-1 pt-2 pb-0 text-muted"></i><i class="fa fa-star pr-1 pt-2 pb-0 text-muted"></i>
                  </div>
                </div>
                <div class="col-sm-9 product-details">
                  <strong class="d-block mb-3">{{ $product->name }}</strong>
            				<small class="d-block"><i class="fa fa-truck pb-2 text-muted"></i>24H Delivery</small>
            				<small class="d-block"><i class="fas fa-coins text-muted"></i>AED 0 Shipping</small>
                </div>
              </div>
      			</div>
      			<div class="col-sm-2">
      				<div class="d-flex align-items-center h-100">
                <div>
        					<strong class="d-block mb-0 price"><span>AED</span> 2099.00</strong>
        					<small class="text-muted">Including shipping cost</small>
                </div>
      				</div>
      			</div>
            <div class="col-sm-2">
              <div class="d-flex align-items-center h-100 float-right">
                <div>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                    Get Coupon
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-white" id="exampleModalLongTitle">Sprii Coupon code</h5>
                          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-center">
                          <input type="text" value="BADeal398" id="myInput" class="coupon-code text-center mb-4 text-primary">
                          <p>Use coupon <strong>"BADeal398"</strong> for 50 AED off on first purchase using Axiom app for orders above AED 699.</p>


                          <div class="tooltip">
                          <button onclick="myFunction()" onmouseout="outFunc()">
                            <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
                            Copy text
                            </button>
                          </div>
                          <button onclick="myFunction()" class="copy btn btn-light"><i class="fa fa-copy mr-2"></i>Copy Code</button>
                          <!-- copy the coupon code -->
                          <script>
                            function myFunction() {
                              var copyText = document.getElementById("myInput");
                              copyText.select();
                              document.execCommand("copy");
                            }
                            </script>
                            <hr>
                            20 people used this coupon <br/>
                            expires on 29/07/2017
                            <a href="{{ $product->url }}" class="btn btn-secondary">View product</a>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a href="{{ $product->url }}" class="btn btn-secondary text-white d-block">View product</a>
                </div>
              </div>
            </div>
      		</div>
      	</li>
        <li class="position-relative bg-white">
      		<div class="row">
      			<div class="col-sm-6">
                <div class="row">
          				<div class="col-sm-4">
                    <img src="../images/sprii.jpg" alt="sprii" class="img-fluid">
                    <div class="rate text-center">
                      <i class="fa fa-star pr-1 pt-2 pb-0 text-muted"></i><i class="fa fa-star pr-1 pb-2 pb-0 text-muted"></i><i class="fa fa-star pr-1 pb-2 pb-0 text-muted"></i><i class="fa fa-star pr-1 pb-2 pb-0 text-muted"></i><i class="fa fa-star pr-1 pb-2 pb-0 text-muted"></i>
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <strong class="d-block">{{ $product->name }}</strong>
                    <small class="text-muted"><a href="#">Webshop</a></small>
                  </div>
                </div>
        			</div>
        			<div class="col-sm-2">
                <div class="d-flex align-items-center h-100">
                  <div>
            				<i class="fa fa-truck pr-2 pb-2"></i>24H Delivery <br/>
            				<i class="fas fa-coins pr-2"></i>AED 0 Shipping
                  </div>
                </div>
        			</div>
        			<div class="col-sm-2">
        				<div class="text-center">
        					<strong class="d-block mb-0">AED 2099.00</strong>
        					<small class="text-muted">Including shipping cost</small>
        				</div>
        			</div>
              <div class="col-sm-2">
                <a href="{{ $product->url }}" class="btn btn-secondary text-white d-block">View product</a>
              </div>
        		</div>
        	</li>
          <li class="position-relative bg-white">
        		<div class="row">
        			<div class="col-sm-4">
                  <div class="row">
            				<div class="col-sm-6">
                      <img src="../images/sprii.jpg" alt="sprii" class="img-fluid">
                      <div class="rate text-center">
                        <i class="fa fa-star pr-1 pt-2 text-muted"></i><i class="fa fa-star pr-1 pb-2 text-muted"></i><i class="fa fa-star pr-1 pb-2 text-muted"></i><i class="fa fa-star pr-1 pb-2 text-muted"></i><i class="fa fa-star pr-1 pb-2 text-muted"></i>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <h5><a href="#">Sprii</a></h5>
                      <small class="text-muted"><a href="#">Webshop</a></small>
                    </div>
                  </div>
          			</div>
          			<div class="col-sm-5">
                  <div class="d-flex align-items-center h-100">
                    <div>
              				<i class="fa fa-truck pr-2 pb-2"></i>Expected Delivery 24H <br/>
              				<i class="fas fa-coins pr-2"></i>Shipping cost: AED 0
                    </div>
                  </div>
          			</div>
          			<div class="col-sm-3">
          				<div class="text-center">
          					<strong class="d-block mb-0">AED 2099.00</strong>
          					<small class="text-muted">Including shipping cost</small>
          				</div>
          					<a href="{{ $product->url }}" class="btn btn-secondary text-white d-block">View product</a>
          			</div>
          		</div>
          	</li>
      </ul>
    </div>
    <!-- /* Related Product -->
    <div class="row product-teaser">
      <div class="col-md-12 my-4">
        <h2>Related Products</h2>
      </div>
      <div class="col-6 col-sm-6 col-md-3 position-relative">
        <a href="#"><img src="{{ asset("storage/$product->image_src") }}" alt="{{ $product->name }}" class="img-fluid"></a>
        <a href="#">{{ $product->brand }}</a>
        <h3><a href="#">hello im a title but i also can be long with nice style</a></h3>
        <div class="price-box">
          <div class="orginal_price">AED 2000{{ $product->orginal_price }}</div>
          <div class="special_price">AED {{ $product->special_price }}</div>
        </div>
        <a class="buy-now" href="#"><i class="fa fa-shopping-bag"></i></a>
      </div>
      <div class="col-6 col-sm-6 col-md-3 position-relative">
        <a href="#"><img src="{{ asset("storage/$product->image_src") }}" alt="{{ $product->name }}" class="img-fluid"></a>
        <a href="#">{{ $product->brand }}</a>
        <h3><a href="#">hello im a title but i also can be long with nice style</a></h3>
        <div class="price-box">
          <div class="orginal_price">AED 2000{{ $product->orginal_price }}</div>
          <div class="special_price">AED {{ $product->special_price }}</div>
        </div>
        <a class="buy-now" href="#"><i class="fa fa-shopping-bag"></i></a>
      </div>
      <div class="col-6 col-sm-6 col-md-3 position-relative">
        <a href="#"><img src="{{ asset("storage/$product->image_src") }}" alt="{{ $product->name }}" class="img-fluid"></a>
        <a href="#">{{ $product->brand }}</a>
        <h3><a href="#">hello im a title but i also can be long with nice style</a></h3>
        <div class="price-box">
          <div class="orginal_price">AED 2000{{ $product->orginal_price }}</div>
          <div class="special_price">AED {{ $product->special_price }}</div>
        </div>
        <a class="buy-now" href="#"><i class="fa fa-shopping-bag"></i></a>
      </div>
      <div class="col-6 col-sm-6 col-md-3 position-relative">
        <a href="#"><img src="{{ asset("storage/$product->image_src") }}" alt="{{ $product->name }}" class="img-fluid"></a>
        <a href="#">{{ $product->brand }}</a>
        <h3><a href="#">hello im a title but i also can be long with nice style</a></h3>
        <div class="price-box">
          <div class="orginal_price">AED 2000{{ $product->orginal_price }}</div>
          <div class="special_price">AED {{ $product->special_price }}</div>
        </div>
        <a class="buy-now" href="#"><i class="fa fa-shopping-bag"></i></a>
      </div>
    </div>
  </div><!-- container -->

@endsection

@section('footerjs')
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Product",
      "description": "{{ strip_tags($product->content) }}",
      "name": "{{ $product->name }}",
      "image": "{{ asset("storage/$product->image_src") }}",
      "brand": "{{ $product->brand }}",
      "offers": {
        "@type": "Offer",
        @if ($product->in_stock === 1)
        "availability": "http://schema.org/InStock"
        @else
        "availability": "http://schema.org/OutOfStock"
        @endif,
        "price": "{{ $product->special_price }}",
        "priceCurrency": "AED"

      },
    }
  </script>
@endsection
