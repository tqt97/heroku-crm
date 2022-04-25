<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url("/") }}" class="brand-link">
        <img src="{{ asset('vendor/adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CRM Checklist</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('vendor/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ implode(' ', showClassNavbar()) }}"
                data-widget="treeview" role="menu data-accordion=" false" id="aside_custom">
                @if (auth()->user()->is_admin)
                    <li class="nav-header"> {{ __(' Manage groups') }} </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.checklist_groups.create') }}" class="nav-link bg-success">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p> {{ __('Create new group') }} </p>
                        </a>
                    </li>
                    @foreach ($admin_menu as $group)
                        <li
                            class="nav-item {{ request()->is('admin/checklist_groups/' . $group->id . '/*') ? 'menu-open' : '' }}">
                            <a href="/" class="nav-link">
                                <i class="nav-icon fas fa-layer-group"></i>
                                <p>
                                    {{ $group->name }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item1 w-100 d-flex">
                                    <a href="{{ route('admin.checklist_groups.edit', $group->id) }}"
                                        class="nav-link w-33 text-primary shadow">
                                        <i class="nav-icon fas fa-edit fa-sm"></i>
                                    </a>

                                    <a href="{{ route('admin.checklist_groups.checklists.create', $group) }}"
                                        class="nav-link w-33 text-success shadow">
                                        <i class="nav-icon fas fa-plus fa-sm"></i>
                                    </a>

                                    <a class="nav-link w-33 text-danger shadow" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        if(confirm('Are you sure?')){
                                            document.getElementById('delete-form').submit();
                                        }">

                                        <i class="nav-icon fas fa-trash-alt fa-sm"></i>
                                    </a>

                                    <form action="{{ route('admin.checklist_groups.destroy', $group->id) }}"
                                        method="POST" id="delete-form" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </li>
                                @foreach ($group->checklists as $checklist)
                                    <li class="nav-item">
                                        <a href="{{ route('admin.checklist_groups.checklists.edit', [$group, $checklist]) }}"
                                            class="nav-link {{ request()->is('admin/checklist_groups/' . $group->id . '/checklists/' . $checklist->id . '/*')? 'active': '' }} ">
                                            <i class="nav-icon fas fa-list fa-small"></i>
                                            <p>{{ $checklist->name }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach

                    <li class="nav-header"> {{ __(' Manage pages') }} </li>
                    @foreach (\App\Models\Page::all() as $page)
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit', $page) }}" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    {{ $page->title }}
                                    {{-- <i class="fas fa-angle-left right"></i> --}}
                                </p>
                            </a>
                        </li>
                    @endforeach
                    <li class="nav-header"> {{ __(' Manage users') }} </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}"
                            class="nav-link @if (request()->routeIs('admin.users.*')) active @endif">
                            <i class="nav-icon fas fa-users"></i>
                            <p> {{ __('Users') }} </p>
                        </a>
                    </li>
                @else
                    @foreach ($user_tasks_menu as $key => $user_task_menu)
                        <li class="nav-item">
                            <a href="{{ route('user.tasklist', $key) }}"
                                class="nav-link @if (request()->routeIs('admin.users.tasks.*')) active @endif">
                                <i class="nav-icon fas fa-{{ $user_task_menu['icon'] }}"></i>
                                <p> {{ $user_task_menu['name'] }} </p>
                                @livewire('user-tasks-counter', [
                                'task_type' => $key,
                                'tasks_count' => $user_task_menu['tasks_count'],
                                ])
                            </a>
                        </li>
                    @endforeach

                    <li class="nav-header"> {{ __('Checklists') }} </li>

                    @foreach ($user_menu as $group)
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="nav-icon fas fa-layer-group"></i>
                                <p>
                                    {{ $group['name'] }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                                @if ($group['is_new'])
                                    <span class="badge badge-info">NEW</span>
                                @elseif ($group['is_updated'])
                                    <span class="badge badge-info">UPD</span>
                                @endif
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach ($group['checklists'] as $checklist)
                                    <li class="nav-item">
                                        <a href="{{ route('user.checklists.show', [$checklist['id']]) }}"
                                            class="nav-link {{ request()->is('checklists/' . $checklist['id']) ? 'active' : '' }}">
                                            <i class="nav-icon fas fa-list fa-sm"></i>
                                            <p>
                                                {{ $checklist['name'] }}
                                                @livewire('completed-tasks-counter', [
                                                'completed_tasks' => count($checklist['user_completed_tasks']),
                                                'tasks_count' => count($checklist['tasks']),
                                                'checklist_id' => $checklist['id']
                                                ])

                                                @if ($checklist['is_new'])
                                                    <span class="badge badge-info">NEW</span>
                                                @elseif ($checklist['is_updated'])
                                                    <span class="badge badge-info">UPD</span>
                                                @endif
                                            </p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach


                @endif
                <li class="nav-header"> {{ __(' Setting pages') }} </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            {{ __('Site settings') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.page-settings') }}"
                                class="nav-link {{ activeRoute('admin.page-settings') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p> {{ __('Page settings') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.website-settings') }}"
                                class="nav-link {{ activeRoute('admin.website-settings') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    {{ __('Website settings') }}
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>
