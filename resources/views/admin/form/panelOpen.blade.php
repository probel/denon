<div class="card card-{{ $type ?? 'primary'}} {{ ($open ?? null) ? '' : 'collapsed-card' }}">
    <div class="card-header">
        <h3 class="card-title cursor-pointer" data-card-widget="collapse">{{ $title }}</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas {{ ($open ?? null) ? 'fa-minus' : 'fa-plus' }}"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: {{ ($open ?? null) ? 'block' : 'none' }};">
