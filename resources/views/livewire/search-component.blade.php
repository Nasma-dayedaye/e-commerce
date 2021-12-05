<main id="main" class="main-site left-sidebar">

<div class="container">

	<div class="wrap-breadcrumb">
		<ul>
			<li class="item-link"><a href="#" class="link">Accueil</a></li>
			<li class="item-link"><span>Achat</span></li>
		</ul>
	</div>
	<div class="row">

		<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

			<div class="banner-shop">
				<a href="#" class="banner-link">
					<figure><img src="{{ asset('assets/images/2.jpg') }}" alt=""></figure>
				</a>
			</div>

			<div class="wrap-shop-control">

			<h1 class="shop-title">Tout pour vous</h1>

				<div class="wrap-right">
					
					<div class="sort-item orderby ">
					<label>Trié par </label>
				<select name="orderby" class="use-chosen" wire:model="sorting" >
					<option value="default" selected="selected">Defaut</option>
					<option value="date">Nouveaux Arrivages</option>
					<option value="price">Prix bas à élèvé</option>
					<option value="price-desc">Prix élèvé à bas</option>
				</select>
			</div>

			<div class="sort-item product-per-page">
				<select name="post-per-page" class="use-chosen" wire:model="pagesize" >
					<option value="12" selected="selected">12 par page</option>
					<option value="16">16 par page</option>
					<option value="18">18 par page</option>
					<option value="21">21 par page</option>
					<option value="24">24 par page</option>
					<option value="30">30 par page</option>
					<option value="32">32 par page</option>
				</select>
					</div>

					<div class="change-display-mode">
						<a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
						<a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
					</div>

				</div>

			</div><!--end wrap shop control-->

			<style>
				.product-wish{
					position: absolute;
					top: 10%;
					left:0;
					z-index:99;
					right:30px;
					text-align:right;
					padding-top: 0;
				}
				.product-wish .fa{
					color: #cbcbcb;
					font-size:32px;
				}

				.product-wish .fa:hover{
					color:#ff7007;
				}
				.fill-heart{
					color:#ff7007 !important;
				}

			</style>
			<div class="row">

				<ul class="product-list grid-products equal-container">
					@php
						$witems = Cart::instance('wishlist')->content()->pluck('id');
					@endphp
					@foreach ($products as $product)   
					<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
						<div class="product product-style-3 equal-elem ">
							<div class="product-thumnail">
								<a href="{{route('product.details',['slug'=>$product->slug])}}" title="{{$product->name}}">
									<figure><img src="{{ asset('assets/images/products') }}/{{$product->image}}" alt="{{$product->name}}"></figure>
								</a>
							</div>
							<div class="product-info">
								<a href="{{route('product.details',['slug'=>$product->slug])}}" class="product-name"><span>{{$product->name}}</span></a>
								<div class="wrap-price"><span class="product-price">{{$product->regular_price}}</span></div>
								<a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})" >Ajouter au panier</a>
								<div class="product-wish">
									@if ($witems->contains($product->id))
										<a href="#" wire:click.prevent="removeFromWishlist({{$product->id}})"><i class="fa fa-heart fill-heart"></i></a>
									
									@else 
										<a href="#" wire:click.prevent="addToWishlist({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"><i class="fa fa-heart"></i></a>
									@endif
								</div>
							</div>
						</div>
					</li>
					@endforeach
				

				</ul>

			</div>

			<div class="wrap-pagination-info">
				{{$products->links()}}
				<!--
				<ul class="page-numbers">
					<li><span class="page-number-item current" >1</span></li>
					<li><a class="page-number-item" href="#" >2</a></li>
					<li><a class="page-number-item" href="#" >3</a></li>
					<li><a class="page-number-item next-link" href="#" >Next</a></li>
				</ul>
				<p class="result-count">Showing 1-8 of 12 result</p>
			-->
			</div>
		</div><!--end main products area-->

		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
			<div class="widget mercado-widget categories-widget">
				<h2 class="widget-title">Toutes catégories</h2>
				<div class="widget-content">
					<ul class="list-category">
						
						@foreach ($categories as $category)
						<li class="category-item">
							<a href="{{route('product.category',['category_slug'=>$category->slug])}}" class="cate-link">{{$category->name}}</a>
						</li>
						@endforeach
						
					</ul>
				</div>
			</div>
			<div class="widget mercado-widget filter-widget">
				
					<div class="widget-banner">
						<figure><img src="{{ asset('assets/images/size-banner-widget.jpg') }}" width="270" height="331" alt=""></figure>
					</div>
				</div>
			</div>
			<!-- Categories widget-->

<!-- 
			<div class="widget mercado-widget filter-widget price-filter">
				<h2 class="widget-title">Prix</h2>
				<div class="widget-content" style="padding: 10px 5px 40px 5px;">
					<div id="slider" wire:ignore></div>
				</div>
			</div>

			<div class="widget mercado-widget filter-widget">
				<h2 class="widget-title">Color</h2>
				<div class="widget-content">
					<ul class="list-style vertical-list has-count-index">
						<li class="list-item"><a class="filter-link " href="#">Red <span>(217)</span></a></li>
						<li class="list-item"><a class="filter-link " href="#">Yellow <span>(179)</span></a></li>
						<li class="list-item"><a class="filter-link " href="#">Black <span>(79)</span></a></li>
						<li class="list-item"><a class="filter-link " href="#">Blue <span>(283)</span></a></li>
						<li class="list-item"><a class="filter-link " href="#">Grey <span>(116)</span></a></li>
						<li class="list-item"><a class="filter-link " href="#">Pink <span>(29)</span></a></li>
					</ul>
				</div>
			</div>

			<div class="widget mercado-widget filter-widget">
				<h2 class="widget-title">Size</h2>
				<div class="widget-content">
					<ul class="list-style inline-round ">
						<li class="list-item"><a class="filter-link active" href="#">s</a></li>
						<li class="list-item"><a class="filter-link " href="#">M</a></li>
						<li class="list-item"><a class="filter-link " href="#">l</a></li>
						<li class="list-item"><a class="filter-link " href="#">xl</a></li>
					</ul>
					<div class="widget-banner">
						<figure><img src="{{ asset('assets/images/size-banner-widget.jpg') }}" width="270" height="331" alt=""></figure>
					</div>
				</div>
			</div>

			<div class="widget mercado-widget widget-product">
				<h2 class="widget-title">Popular Products</h2>
				<div class="widget-content">
					<ul class="products">
						<li class="product-item">
							<div class="product product-widget-style">
								<div class="thumbnnail">
									<a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
										<figure><img src="{{ asset('assets/images/products/digital_1.jpg') }}" alt=""></figure>
									</a>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
									<div class="wrap-price"><span class="product-price">$168.00</span></div>
								</div>
							</div>
						</li>

						<li class="product-item">
							<div class="product product-widget-style">
								<div class="thumbnnail">
									<a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
										<figure><img src="{{ asset('assets/images/products/digital_17.jpg') }}" alt=""></figure>
									</a>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
									<div class="wrap-price"><span class="product-price">$168.00</span></div>
								</div>
							</div>
						</li>

						<li class="product-item">
							<div class="product product-widget-style">
								<div class="thumbnnail">
									<a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
										<figure><img src="{{ asset('assets/images/products/digital_18.jpg') }}" alt=""></figure>
									</a>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
									<div class="wrap-price"><span class="product-price">$168.00</span></div>
								</div>
							</div>
						</li>

						<li class="product-item">
							<div class="product product-widget-style">
								<div class="thumbnnail">
									<a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
										<figure><img src="{{ asset('assets/images/products/digital_20.jpg') }}" alt=""></figure>
									</a>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
									<div class="wrap-price"><span class="product-price">$168.00</span></div>
								</div>
							</div>
						</li>

					</ul>
				</div>
			</div> -->

		</div><!--end sitebar-->

	</div><!--end row-->

</div><!--end container-->

</main>

@push('scripts')
	<script>
		var slider = document.getElementById('slider');
		noUiSlider.create(slider,{
			start : [1,10000],
			connect : true,
			range:{
				'min' : 1,
				'max' : 10000
			},
			pips:{
				mode : 'steps',
				stepped:true,
				density:4
			}
		});
	</script>
@endpush
