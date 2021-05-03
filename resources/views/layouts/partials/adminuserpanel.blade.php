<div class="user-panel">
    <div class="pull-left image">
         <img src="https://ui-avatars.com/api/?size=128&color=222d32&background=ecf0f5&&name={{ Auth::guard('admin_user')->user()->name  }}" class="img-circle" alt="User Image" />

    </div>
    <div class="pull-left info">
        <p>{{ Auth::guard('admin_user')->user()->name }}</p>
    </div>
</div>
