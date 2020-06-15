<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">

        <li class="nav-item active">
            <a class="nav-link" href="/">
                <i class="far fa-newspaper nav-icon"></i>
                Actu
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('album') }}">
                <i class="fas fa-camera nav-icon"></i>
                Photo
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('comment') }}">
                <i class="fas fa-comments nav-icon"></i>
                Commentaire
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('presentation') }}">
                <i class="fab fa-teamspeak nav-icon"></i>
                CL Team
            </a>
        </li>
        <hr>
        @can('users_manage')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("admin.permissions.index") }}"
                           class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-unlock-alt nav-icon">

                            </i>
                            {{ trans('cruds.permission.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.roles.index") }}"
                           class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-briefcase nav-icon">

                            </i>
                            {{ trans('cruds.role.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.users.index") }}"
                           class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-user nav-icon">

                            </i>
                            {{ trans('cruds.user.title') }}
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        <li class="nav-item">
            <a href="{{ route('auth.change_password') }}" class="nav-link">
                <i class="nav-icon fas fa-fw fa-key">

                </i>
                Change password
            </a>
        </li>
        @if(Gate::allows('posts_manage'))
            @can('posts_manage')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-newspaper nav-icon">

                        </i>
                        {{ trans('cruds.postManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a href="{{ route("admin.posts.index") }}"
                               class="nav-link {{ request()->is('admin/posts') || request()->is('admin/posts/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-newspaper nav-icon">

                                </i>
                                {{ trans('cruds.post.title') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("admin.categories.index") }}"
                               class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-sort-alpha-up nav-icon">

                                </i>
                                {{ trans('cruds.category.title') }}
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
        @endif
        @if(Gate::allows('images_manage'))
            @can('images_manage')
                <li class="nav-item">
                    <a href="{{ route("admin.images.index") }}"
                       class="nav-link {{ request()->is('images') || request()->is('images') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-images nav-icon">
                        </i>
                        {{ trans('cruds.image.title') }}
                    </a>
                </li>
            @endcan
        @endif

        @if(Gate::allows('comments')&& Auth::guard('web'))
            @can('comments')
                <li class="nav-item">
                    <a href="{{ route("admin.comments.index") }}"
                    class="nav-link {{ request()->is('comments') || request()->is('comments') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-comments nav-icon">
                        </i>
                        {{ trans('cruds.comment.title') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="nav-item">
            <a href="#" class="nav-link"
               onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
            <li class="nav-item">
                <a href="{{ route("auth.delete_account") }}" class="nav-link" id="delete-account">
                    <i class="nav-icon fas fa-fw fa-user-slash">

                    </i>
                    {{ trans('global.delete') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>