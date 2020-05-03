 <div class="container">
     <div class="col-xl-10 mx-auto px-0 px-lg-3">
         <div class="row">
            @foreach($products ?? [] as $key => $product)
                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">

                    @include('shared.product.teaser')
                </div>
            @endforeach
         </div>
     </div>
 </div>
<a class="show-all w-100 text-center d-block text-uppercase" href="{{ $url ?? '' }}">ПОКАЗАТЬ ВСЮ КАТЕГОРИЮ</a>

