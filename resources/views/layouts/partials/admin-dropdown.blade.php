<li class="dropdown user user-menu">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!-- The user image in the navbar-->
        <img src="https://ui-avatars.com/api/?size=128&color=222d32&background=ecf0f5&&name={{ Auth::guard('admin_user')->user()->name  }}" class="user-image" alt="User Image"/>
        <!-- hidden-xs hides the username on small devices so only the image appears. -->
        <span class="hidden-xs">{{ Auth::guard('admin_user')->user()->name }}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- The user image in the menu -->
        <li class="user-header">
          <img src="https://ui-avatars.com/api/?size=128&color=222d32&background=ecf0f5&&name={{ Auth::guard('admin_user')->user()->name  }}" class="img-circle" alt="User Image" />
            <p>
                {{ Auth::guard('admin_user')->user()->name }}                
            </p>
        </li>
        <!-- Menu Body -->

        <!-- Menu Footer-->
        <li class="user-footer"> 
            <div class="pull-right">
                

                <form id="logout-form" action="{{ url('/admin_logout') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-block btn-default"  value="Cerrar Sesión">
                </form>

            </div>
        </li>
    </ul>
</li>
