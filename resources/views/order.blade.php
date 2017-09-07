@extends('templates.test')


@section('content')
    <div id="all">
        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Commander</li>
                    </ul>

                    {{--<div class="box">--}}
                        {{--<h1>Ladies</h1>--}}
                        {{--<p>In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide.</p>--}}
                    {{--</div>--}}

                    {{--<div class="box info-bar">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-12 col-md-4 products-showing">--}}
                                {{--Showing <strong>12</strong> of <strong>25</strong> products--}}
                            {{--</div>--}}

                            {{--<div class="col-sm-12 col-md-8  products-number-sort">--}}
                                {{--<div class="row">--}}
                                    {{--<form class="form-inline">--}}
                                        {{--<div class="col-md-6 col-sm-6">--}}
                                            {{--<div class="products-number">--}}
                                                {{--<strong>Show</strong>  <a href="#" class="btn btn-default btn-sm btn-primary">12</a>  <a href="#" class="btn btn-default btn-sm">24</a>  <a href="#" class="btn btn-default btn-sm">All</a> products--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-6 col-sm-6">--}}
                                            {{--<div class="products-sort-by">--}}
                                                {{--<strong>Sort by</strong>--}}
                                                {{--<select name="sort-by" class="form-control">--}}
                                                    {{--<option>Price</option>--}}
                                                    {{--<option>Name</option>--}}
                                                    {{--<option>Sales first</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</form>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="row products">--}}

                        {{--<div class="col-md-3 col-sm-4">--}}
                            {{--<div class="product">--}}
                                {{--<div class="flip-container">--}}

                                    {{--<div class="front">--}}
                                        {{--<a href="detail.html">--}}
                                            {{--<img src="images/photo1square.jpg" alt="" class="img-responsive img-circle">--}}
                                        {{--</a>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                                {{--<a href="detail.html" class="invisible">--}}
                                    {{--<img src="img/product1.jpg" alt="" class="img-responsive">--}}
                                {{--</a>--}}
                                {{--<div class="text">--}}
                                    {{--<h3><a href="detail.html">Fur coat with very but very very long name</a></h3>--}}
                                    {{--<p class="price">$143.00</p>--}}
                                    {{--<p class="buttons">--}}
                                        {{--<a href="detail.html" class="btn btn-default">View detail</a>--}}
                                        {{--<a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                                {{--<!-- /.text -->--}}
                            {{--</div>--}}
                            {{--<!-- /.product -->--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    <!-- /.products -->

                    @foreach($categories as $category)
                        <div class="box info-bar">
                            <h3 class="luna">{{ucfirst($category->name)}}</h3>
                        </div>
                        <div class="row products">
                            @foreach($products as $product)
                                @if($product->category_id === $category->id && $product->add_online == true)
                                    {{ Form::open(['action' => ['orderController@addToBasket', 'id' => $product->id]]) }}
                                    {{ csrf_field() }}
                                    <div class="col-md-3 col-sm-4">
                                        <div class="product">
                                            <div class="">

                                                <div class="img-product">
                                                    <a href="detail.html">
                                                        <img src="{{url('images/'.$product->image)}}" alt="" class="img-responsive img-circle">
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="text ingredients">
                                                <h3><a href="detail.html">{{ucfirst($product->name)}}</a></h3>
                                                <p><em>{{ucfirst($product->ingredient)}}</em></p>
                                            </div>
                                            <div class="text">
                                                <p class="price">{{str_replace('.', ',', $product->price)}}€</p>
                                                <p class="buttons quantity">
                                                    <a href="#" class="btn btn-primary minus"><i class="fa fa-minus"></i></a>
                                                    <input class="form-control qty" type="text" name="quantity" value="0">
                                                    <a href="#" class="btn btn-primary plus"><i class="fa fa-plus"></i></a>
                                                </p>
                                                <p class="buttons">
                                                    <a href="detail.html" class="btn btn-default">Personnaliser</a>
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Ajouter</button>
                                                </p>
                                            </div>


                                            <!-- /.text -->
                                        </div>
                                        <!-- /.product -->
                                    </div>
                                    {{--@if($product->add_on)--}}
                                            {{--@foreach($addOns as $addOn)--}}

                                            {{--@endforeach--}}

                                    {{--@endif--}}
                                    {{Form::close()}}
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <!-- /.col-md-9 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
@endsection


