<li class="dropdown user user-menu">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!-- The user image in the navbar-->
        @if(Auth::user()->avatar == '')
          <img src="https://ui-avatars.com/api/?size=128&color=222d32&background=ecf0f5&&name={{ Auth::user()->name }}" class="user-image" alt="User Image"/>
        @else
        <img src="{{ Auth::user()->avatar }}" class="user-image" alt="User Image"/>
        @endif
        <!-- hidden-xs hides the username on small devices so only the image appears. -->
        @if(Auth::user()->avatar == '')
        <span class="hidden-xs">{{ Auth::user()->name }}</span>
        @else
        <span class="hidden-xs">{{ Auth::user()->social_name }}</span>
        @endif
    </a>
    <ul class="dropdown-menu">
        <!-- The user image in the menu -->
        <li class="user-header">
          @if(Auth::user()->avatar == '')
              <img src="{{ asset('/img/avatar0.png') }}" class="img-circle" alt="User Image" />
          @else
          <img src="{{  Auth::user()->avatar }}" class="img-circle" alt="User Image" />
          @endif
            <p>@if(Auth::user()->social_name == '')
                {{ Auth::user()->name }}
               @else
                {{ Auth::user()->social_name }}
               @endif
                
            </p>
        </li>
        <!-- Menu Body -->

        <!-- Menu Footer-->
        <li class="user-footer">             
            <div class="pull-right"> 
                <form id="logout-form" action="{{ url('logout') }}" method="POST">
                    {{ csrf_field() }}
                    <input class="btn btn-block btn-default" type="submit" value="Cerrar sesión">
                </form>

            </div>
        </li>
    </ul>
</li>
