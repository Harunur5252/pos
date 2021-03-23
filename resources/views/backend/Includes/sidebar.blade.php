 @php
     $prefix = Request::route()->getPrefix();
     $route  = Route::current()->getName();
 @endphp
 
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('/')}}backend_asset/images/inventory-management-system.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Pos Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(empty(Auth::user()->image))
             <img src="{{asset('/')}}upload/userprofileimg/noImg.jpg" class="img-circle elevation-2" alt="no image">
          @endif

          @if(!empty(Auth::user()->image))
            <img src="{{asset(Auth::user()->image)}}" class="img-circle elevation-2"  alt="User profile picture">
          @endif
        </div>
        <div class="info">
          <a href="{{route('profiles.view')}}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        @if(Auth::user()->usertype=='admin')
          <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fa fa-users" aria-hidden="true"></i>
              <p>
                Manage User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.view')}}" class="nav-link {{($route=='users.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          <li class="nav-item has-treeview {{($prefix=='/profiles')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fa fa-user" aria-hidden="true"></i>
              <p>
                Manage Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profiles.view')}}" class="nav-link {{($route=='profiles.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Profile</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profiles.passwordView')}}" class="nav-link {{($route=='profiles.passwordView')?'active':''}}">
                  <i class="fa fa-key" aria-hidden="true"></i>
                  <p>password change</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/suppliers')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-industry"></i>
              <p>
                Manage Supplier
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('suppliers.view')}}" class="nav-link {{($route=='suppliers.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view supplier</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/customers')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fa fa-user-circle" aria-hidden="true"></i>
              <p>
                Manage Customer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customers.view')}}" class="nav-link {{($route=='customers.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view customer</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customers.credit')}}" class="nav-link {{($route=='customers.credit')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credit customer</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customers.paid')}}" class="nav-link {{($route=='customers.paid')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>paid customer</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customers.wise.report')}}" class="nav-link {{($route=='customers.wise.report')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>customer wise report</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/units')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fa fa-underline" aria-hidden="true"></i>
              <p>
                Manage Unit
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('units.view')}}" class="nav-link {{($route=='units.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view unit</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/categories')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="far fa-list-alt"></i>
              <p>
                Manage Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categories.view')}}" class="nav-link {{($route=='categories.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view category</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/products')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fab fa-product-hunt"></i>
              <p>
                Manage Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('products.view')}}" class="nav-link {{($route=='products.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view product</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/purchases')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-shopping-cart"></i>
              <p>
                Manage Purchase
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('purchases.view')}}" class="nav-link {{($route=='purchases.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view purchase</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('purchases.pending')}}" class="nav-link {{($route=='purchases.pending')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval Purchase</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('purchases.report')}}" class="nav-link {{($route=='purchases.report')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Purchase Report</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/invoices')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-indent"></i>
              <p>
                Manage Invoice
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('invoices.view')}}" class="nav-link {{($route=='invoices.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view invoice</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('invoices.pending')}}" class="nav-link {{($route=='invoices.pending')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval invoice</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('invoices.print.list')}}" class="nav-link {{($route=='invoices.print.list')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Print Invoice List</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('invoices.daily.report')}}" class="nav-link {{($route=='invoices.daily.report')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice Daily Report</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/stocks')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-socks"></i>
              <p>
                Manage Stock
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('stocks.report')}}" class="nav-link {{($route=='stocks.report')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>stock report</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('stocks.supplier.product.wise.report')}}" class="nav-link {{($route=='stocks.supplier.product.wise.report')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier/Product wise Report</p>
                </a>
              </li>
            </ul>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>