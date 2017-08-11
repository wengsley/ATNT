
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!--set rule to hide for customer-->
        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::fallback(asset('la-assets/img/user2-160x160.jpg'))->get(Auth::user()->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        @if(!LAConfigs::getByKey('sidebar_search'))
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
	                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        @endif
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ url(config('laraadmin.adminRoute')) }}"><i class='fa fa-home'></i> <span>Dashboard</span></a></li>
            <?php
            $user = \Auth::user();
            $role_id = $user->roles->first()->id;
            $menuItems = Dwij\Laraadmin\Models\Menu::where("parent", 0)->orderBy('hierarchy', 'asc')->get();
            //check permission here
            ?>
            @foreach ($menuItems as $menu)
            <?php 
            $get_module_id = Dwij\Laraadmin\Models\Module::get($menu->name);
            
            if($get_module_id) {
                $query = DB::table('role_module')->where('role_id', '=', $role_id)->where('module_id', '=', $get_module_id->id)->first();
            }else{
                $query = null;
            }
            
            if($query != null) {
                $view = $query->acc_view;
                $create = $query->acc_create;
                $edit = $query->acc_edit;
                $delete = $query->acc_delete;
            }else{
                $view = 0;
                $create = 0;
                $edit = 0;
                $delete = 0;
            }
             ?>
                @if($menu->type == "module")
                   
                    <?php
                    $temp_module_obj = Module::get($menu->name);
                    ?>
                    @la_access($temp_module_obj->id)
                     @if($view == 1 || ($create == 1 || $edit == 1 || $delete == 1))
						@if(isset($module->id) && $module->name == $menu->name)
                        	<?php echo App\Http\Helpers\LAHelper2::print_menu($menu ,true); ?>
						@else
							<?php echo App\Http\Helpers\LAHelper2::print_menu($menu); ?>
						@endif
                     @endif   
                    @endla_access
                @else
                    <?php echo App\Http\Helpers\LAHelper2::print_menu($menu); ?>
                @endif
            @endforeach
            <!-- LAMenus -->
            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
