@forelse ($products as $product)
<div class="col-xl-3 col-lg-4 col-md-6">
    @include('shared.product.teaser',['product'=>$product])
</div>
@empty
    <h4 class="text-center d-block mt-4 w-100">Предложений не найдено</h4>
    <h5 class="text-center d-block mt-4 mb-5 w-100">Попробуйте изменить параметры фильтрации</h5>
@endforelse
