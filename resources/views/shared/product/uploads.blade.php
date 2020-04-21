<div class="downloads text-uppercase">
    <div class="row downloads__row title align-items-center">
        <div class="col-lg-4 col-12"></div>
        <div class="col-lg-2 col-sm-3">Дата</div>
        <div class="col-lg-2 col-sm-3">ВЕС</div>
        <div class="col-lg-2 col-sm-3">ТИП ФАЙЛА</div>
        <div class="col-lg-2 col-sm-3"></div>
    </div>
    {{-- здесь класс .item (у этого и следующих downloads__row) --}}
    @foreach ($product->uploads as $row)
    @if (($row['type'] ?? '') == 'website')
    <div class="row downloads__row item align-items-center">
        <div class="col-lg-4 col-12">{{ $row['title'] ?? '' }}</div>
        <div class="col-lg-2 col-sm-3">{{ \Carbon\Carbon::parse($row['date'] ?? '')->format('d.m.Y') }}</div>
        <div class="col-lg-2 col-sm-3">-</div>
        <div class="col-lg-2 col-sm-3 text-uppercase">{{ $row['type'] ?? '' }}</div>
        <div class="col-lg-2 col-sm-3">
            <a class="btn" target="_blank" href="{{ $row['value'] ?? '' }}">Просмотр</a>
        </div>
    </div>
    @elseif(\Helpers::fileSize($row['value'] ?? ''))
    <div class="row downloads__row item align-items-center">
        <div class="col-lg-4 col-12">{{ $row['title'] ?? '' }}</div>
        <div class="col-lg-2 col-sm-3">{{ \Carbon\Carbon::parse($row['date'] ?? '')->format('d.m.Y') }}</div>
        <div class="col-lg-2 col-sm-3">{{ \Helpers::fileSize($row['value'] ?? '') }}</div>
        <div class="col-lg-2 col-sm-3 text-uppercase">{{ $row['type'] ?? '' }}</div>
        <div class="col-lg-2 col-sm-3">
            <a class="btn" download href="{{ asset($row['value'] ?? '') }}">Скачать</a>
        </div>
    </div>
    @endif
    @endforeach

</div>
