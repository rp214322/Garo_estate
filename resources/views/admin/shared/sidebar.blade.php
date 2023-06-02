<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{!! route('admin.dashboard') !!}">
            <img src="{!! asset('images/logo.png') !!}" alt="" class="dark-logo">
            <img src="{!! asset('images/logo.png') !!}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{!! route('admin.dashboard') !!}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{!! route('admin.users.index') !!}" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-users"></span><span class="mtext">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.areas.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-location-arrow"></span><span class="mtext">Area</span>
                    </a>
                </li>
                <li>
                    <a href="{!! route('admin.categories.index') !!}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.amenities.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Amenities</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.properties.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-building"></span><span class="mtext">Property</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.inquiries.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-calendar"></span><span class="mtext">Inquiry</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.feedbacks.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Feedback</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
