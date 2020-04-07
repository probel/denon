@if ($user)
    <style>.admin-image{ border-radius: 50%; }</style>
    <li>
        <a href="/" target="_blank">
            @lang('sleeping_owl::lang.links.index_page')
        </a>
    </li>
    <li class="dropdown user user-menu" style="margin-right: 20px;">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <span class="hidden-xs">{{ $user->email }}</span>
        </a>
        <ul class="dropdown-menu">
            {{-- <li class="user-header">
                <img src="{{ asset('assets/static_images/avatar-no-foto.png')}}" alt="" class="admin-image" style="border-color: transparent;">
                <p>
                    <small>@lang('sleeping_owl::lang.auth.since', ['date' => $user->created_at->format('d.m.Y')])</small>
                </p>
            </li> --}}
            <li class="user-footer">
                <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-btn fa-sign-out"></i> @lang('sleeping_owl::lang.auth.logout')
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
@endif