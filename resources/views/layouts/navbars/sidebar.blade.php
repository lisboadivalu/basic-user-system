<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('WD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('White Dashboard') }}</a>
        </div>
        <ul class="nav">
            @if(auth()->id() == 1)
                <li>
                    <a href="{{ route('users.all-users') }}">
                        <i class="tim-icons icon-single-02"></i>
                        <p>{{ _('Users') }}</p>
                    </a>
                </li>
            @endif
            <li >
                <a href="{{ route('profile.edit')  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ _('My Profile') }}</p>
                </a>
            </li>
            <li >
                <a href="{{ route('posts.index') }}">
                    <i class="tim-icons icon-paper"></i>
                    <p>{{ (Auth::id() ==1 ) ? ('Posts') : _('My Posts') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('pages.icons') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ _('Icons') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
