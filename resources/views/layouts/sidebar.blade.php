<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">
        <img src="{{asset('images/logo.jpg')}}" style="width:40%">
    </div>
    <div class="list-group list-group-flush">       
        <div class="sidebar sidebar-light"> 
        <ul class="list-unstyled">
            <li class="{{  strpos(Route::currentRouteName(),'dashboard') !== false ? 'active' : '' }}">
                <a href="{{route('dashboard')}}" class="">
                    <i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li>
                <a class="nav-link"  data-toggle="collapse" href="#main-entries-layouts-requests" 
                aria-expanded="{{strpos(Route::currentRouteName(),'low_concrete') !== false ?'false':''}}              
                {{strpos(Route::currentRouteName(),'high_concrete') !== false ?'false':''}}
                {{strpos(Route::currentRouteName(),'high_timber') !== false ?'false':''}}
                {{strpos(Route::currentRouteName(),'low_timber') !== false ?'false':''}}
                {{strpos(Route::currentRouteName(),'ware_house') !== false ?'false':''}}" 
                aria-controls="main-entries-layouts-requests"> 
                <i class="fas fa-folder"></i> Main Entries</a>
                <div class="collapse non-padding {{strpos(Route::currentRouteName(),'low_concrete') !== false ?'show':''}}             
                {{strpos(Route::currentRouteName(),'high_concrete') !== false ?'show':''}}
                {{strpos(Route::currentRouteName(),'high_timber') !== false ?'show':''}}
                {{strpos(Route::currentRouteName(),'low_timber') !== false ?'show':''}}
                {{strpos(Route::currentRouteName(),'ware_house') !== false ?'show':''}}" id="main-entries-layouts-requests">
                    <ul class="list-unstyled">

                        <li class="{{  strpos(Route::currentRouteName(),'low_concrete') !== false ? 'active' : '' }}">
                            <a class="submenu" href="{{route('low_concrete.index')}}">
                                <i class="fas fa-file"></i> Building Low End Concrete Dwelling</a>
                        </li>

                        <li class="{{  strpos(Route::currentRouteName(),'high_concrete') !== false ? 'active' : '' }}">
                            <a class="submenu" href="{{route('high_concrete.index')}}">
                                <i class="fas fa-file"></i> Building High End Concrete Dwelling</a>
                        </li>

                        <li class="{{  strpos(Route::currentRouteName(),'low_timber') !== false ? 'active' : '' }}">
                            <a class="submenu" href="{{route('low_timber.index')}}">
                                <i class="fas fa-file"></i> Building Low End Timber Dwelling</a>
                        </li>

                        <li class="{{  strpos(Route::currentRouteName(),'high_timber') !== false ? 'active' : '' }}">
                            <a class="submenu" href="{{route('high_timber.index')}}">
                                <i class="fas fa-file"></i> Building High End Timber Dwelling</a>
                        </li>

                        <li class="{{  strpos(Route::currentRouteName(),'ware_house') !== false ? 'active' : '' }}">
                            <a class="submenu" href="{{route('ware_house.index')}}">
                                <i class="fas fa-file"></i> Building Ware House</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{  strpos(Route::currentRouteName(),'cost-estimate') !== false ? 'active' : '' }}">
                <a href="{{route('cost-estimate.form_1')}}" class="">
                    <i class="fas fa-file-invoice-dollar"></i> Cost Esimate Form</a>
            </li>
        </ul> 
        </div>   
    </div>
</div>
 