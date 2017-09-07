@extends('templates.test')
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="/">Home</a>
                        </li>
                        <li><a href="/commander">Commander</a></li>
                        <li>{{ucfirst($category)}}</li>
                    </ul>

                    <div class="box">
                    <h1 class="luna">{{ucfirst($category)}}</h1>
                    </div>

                        <div class="row products">
                            @foreach($products as $product)
                                @if($product->add_online == true)
                                    {{ Form::open(['action' => ['orderController@addToBasket', 'id' => $product->id]]) }}
                                    {{ csrf_field() }}
                                    <div class="col-md-3 col-sm-4">
                                        <div class="product">
                                            <div class="flip-container">

                                                <div class="front">
                                                    <a href="detail.html">
                                                        <img src="{{url('images/'.$product->image)}}" alt="" class="img-responsive img-circle">
                                                    </a>
                                                </div>

                                            </div>
                                            <a href="detail.html" class="invisible">
                                                <img src="{{url('img/product1.jpg')}}" alt="" class="img-responsive">
                                            </a>
                                            <div class="text">
                                                <h3><a href="detail.html">{{ucfirst($product->name)}}</a></h3>
                                                <p><em>{{$product->ingredient}}</em></p>
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
                    @foreach($basket as $item)

                    @endforeach
                </div>
                <!-- /.col-md-9 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
@endsection
