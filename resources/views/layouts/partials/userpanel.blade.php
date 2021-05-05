<div class="user-panel">
    <div class="pull-left image">

      @if(Auth::user()->avatar == '')
          <img src="https://ui-avatars.com/api/?size=128&color=222d32&background=ecf0f5&&name={{ Auth::user()->name }}" class="img-circle" alt="User Image" />
      @else
      <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="User Image" />
      @endif

    </div>
    <div class="pull-left info">
        @if(Auth::user()->social_name == '')
        <?php
          $cadena = Auth::user()->name;
          $parte = explode(" ",$cadena);
        ?>
        <p>{{ $parte[0] }} {{ $parte[1] }}</p>
        @else
        <p>{{ Auth::user()->social_name }}</p>
        @endif
    </div>
</div>
