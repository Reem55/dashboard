<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light" style="  font-size: 30px; font-family: Times">AlexInk</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
         <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p>
                            <i class="fas fa-fw fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("admin.conversations.index") }}" class="nav-link">
                       <p>
                           <i class="fas fa-comment">

                         </i>
                          <span>{{ trans('cruds.conversations.title') }}</span>
                       </p>
                   </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('expense_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/stadia*') ? 'menu-open' : '' }} {{ request()->is('admin/expense-categories*') ? 'menu-open' : '' }} {{ request()->is('admin/income-categories*') ? 'menu-open' : '' }} {{ request()->is('admin/expenses*') ? 'menu-open' : '' }} {{ request()->is('admin/incomes*') ? 'menu-open' : '' }} {{ request()->is('admin/expense-reports*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-money-bill">

                            </i>
                            <p>
                                <span>{{ trans('cruds.expenseManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('stadium_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.stadia.index") }}" class="nav-link {{ request()->is('admin/stadia') || request()->is('admin/stadia/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-hospital">

                                        </i>
                                        <p>
                                            
                                            <span>{{ trans('cruds.stadium.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('expense_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.expense-categories.index") }}" class="nav-link {{ request()->is('admin/expense-categories') || request()->is('admin/expense-categories/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-list">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.expenseCategory.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('income_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.income-categories.index") }}" class="nav-link {{ request()->is('admin/income-categories') || request()->is('admin/income-categories/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-list">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.incomeCategory.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('expense_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.expenses.index") }}" class="nav-link {{ request()->is('admin/expenses') || request()->is('admin/expenses/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-arrow-circle-right">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.expense.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('income_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.incomes.index") }}" class="nav-link {{ request()->is('admin/incomes') || request()->is('admin/incomes/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-arrow-circle-right">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.income.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('expense_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.expense-reports.index") }}" class="nav-link {{ request()->is('admin/expense-reports') || request()->is('admin/expense-reports/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-chart-line">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.expenseReport.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('product_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/products*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-money-bill">

                            </i>
                            <p>
                                <span>{{ trans('cruds.product.management') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('stadium_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.stadia.index") }}" class="nav-link {{ request()->is('admin/stadia') || request()->is('admin/stadia/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-hospital">

                                        </i>
                                        <p>
                                            
                                            <span>{{ trans('cruds.stadium.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan 
                            @can('product_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.products.index") }}" class="nav-link {{ request()->is('admin/products') || request()->is('admin/products*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-list">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.product.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_consumption_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.product-consumptions.index") }}" class="nav-link {{ request()->is('admin/product-consumptions') || request()->is('admin/product-consumptions*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-list">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.product-consumptions.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
               @can('system_player_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/players*') ? 'menu-open' : '' }} {{ request()->is('admin/player-invoices*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-user-friends">

                            </i>
                            <p>
                                <span>{{ trans('cruds.systemPlayer.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('player_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.players.index") }}" class="nav-link {{ request()->is('admin/players') || request()->is('admin/players/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-futbol">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.player.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('player_invoice_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.player-invoices.index") }}" class="nav-link {{ request()->is('admin/player-invoices') || request()->is('admin/player-invoices/*') ? 'active' : '' }}">
                                        <i class="fa-fw far fa-address-card">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.playerInvoice.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan 

                 @can('system_player_access')

                    <li class="nav-item has-treeview {{ request()->is('admin/stockssorting*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-user-friends">

                            </i>
                            <p>
                                <span>{{ trans('cruds.stocksorting.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('player_access') -->
                            <li class="nav-item">
                                    <a href="{{ route("admin.stockssorting.index") }}" class="nav-link {{ request()->is('admin/stockssorting') || request()->is('admin/stockssorting/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-futbol">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.stocksorting.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan 
                @can('system_trainer_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/trainers*') ? 'menu-open' : '' }} {{ request()->is('admin/trainer-invoices*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.systemTrainer.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a> 
                         <ul class="nav nav-treeview">
                            @can('trainer_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.trainers.index") }}" class="nav-link {{ request()->is('admin/trainers') || request()->is('admin/trainers/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user-tie">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.trainer.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                           @can('trainer_invoice_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.trainer-invoices.index") }}" class="nav-link {{ request()->is('admin/trainer-invoices') || request()->is('admin/trainer-invoices/*') ? 'active' : '' }}">
                                        <i class="fa-fw far fa-address-card">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.trainerInvoice.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
<!-- elma5azen -->

<ul class="nav nav-treeview">
                            @can('stockssorting_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.stocksorting.index") }}" class="nav-link {{ request()->is('admin/stocksorting') || request()->is('admin/stocksorting/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-hospital">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.stocksorting.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan

                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
