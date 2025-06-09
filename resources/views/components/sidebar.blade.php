@if ( auth()->user()->isadmin==1)
 {{-- admin --}}
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                <span class="text-primary">
                    <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <path
                                d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                                id="path-1"></path>
                            <path
                                d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                                id="path-3"></path>
                            <path
                                d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                                id="path-4"></path>
                            <path
                                d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                                id="path-5"></path>
                        </defs>
                        <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                                <g id="Icon" transform="translate(27.000000, 15.000000)">
                                    <g id="Mask" transform="translate(0.000000, 8.000000)">
                                        <mask id="mask-2" fill="white">
                                            <use xlink:href="#path-1"></use>
                                        </mask>
                                        <use fill="currentColor" xlink:href="#path-1"></use>
                                        <g id="Path-3" mask="url(#mask-2)">
                                            <use fill="currentColor" xlink:href="#path-3"></use>
                                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                                        </g>
                                        <g id="Path-4" mask="url(#mask-2)">
                                            <use fill="currentColor" xlink:href="#path-4"></use>
                                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                                        </g>
                                    </g>
                                    <g id="Triangle"
                                        transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                        <use fill="currentColor" xlink:href="#path-5"></use>
                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </span>
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">CSA admin</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item active open">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                <span class="badge rounded-pill bg-danger ms-auto">5</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item active">
                    <a href="/admin/dashboard" class="menu-link">
                        <div class="text-truncate" data-i18n="Analytics">Analytics</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/post/create"
                         class="menu-link">
                        <div class="text-truncate" data-i18n="CRM">Add Post</div>
                        <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/post"
                         class="menu-link">
                        <div class="text-truncate" data-i18n="CRM">Posts</div>
                        <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/incoming/create"
                         class="menu-link">
                        <div class="text-truncate" data-i18n="CRM">Add Incoming goods</div>
                        <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/incoming"
                         class="menu-link">
                        <div class="text-truncate" data-i18n="CRM">Incoming gods</div>
                        <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/outgoing/create"
                         class="menu-link">
                        <div class="text-truncate" data-i18n="CRM">Add Outgoing goods</div>
                        <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/outgoing"
                         class="menu-link">
                        <div class="text-truncate" data-i18n="CRM">outgoing goods</div>
                        <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Layouts -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div class="text-truncate" data-i18n="Layouts">Events & Service</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/admin/warehouse/create" class="menu-link">
                        <div class="text-truncate" data-i18n="Without menu">Add Warehouse</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/warehouse" class="menu-link">
                        <div class="text-truncate" data-i18n="Without navbar">View Warehouses</div>
                    </a>
                </li>
                 <li class="menu-item">
                    <a href="/admin/brand/create" class="menu-link">
                        <div class="text-truncate" data-i18n="Without menu">Add brand</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/brand" class="menu-link">
                        <div class="text-truncate" data-i18n="Without navbar">View brands</div>
                    </a>
                </li>
                 <li class="menu-item">
                    <a href="/admin/product/create" class="menu-link">
                        <div class="text-truncate" data-i18n="Without menu">Add product</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/product" class="menu-link">
                        <div class="text-truncate" data-i18n="Without navbar">View products</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/customer/create" class="menu-link">
                        <div class="text-truncate" data-i18n="Without menu">Add customer</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/customer" class="menu-link">
                        <div class="text-truncate" data-i18n="Without navbar">View customers</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/sale/create" class="menu-link">
                        <div class="text-truncate" data-i18n="Without menu">Add Sales</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/sale" class="menu-link">
                        <div class="text-truncate" data-i18n="Without navbar"> Sales</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/supplier/create" class="menu-link">
                        <div class="text-truncate" data-i18n="Without menu">Add Supplier</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/supplier" class="menu-link">
                        <div class="text-truncate" data-i18n="Without navbar"> Suppliers</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/event/create" class="menu-link">
                        <div class="text-truncate" data-i18n="Without menu">Add Event</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/event" class="menu-link">
                        <div class="text-truncate" data-i18n="Without navbar">View Events</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/service/create" class="menu-link">
                        <div class="text-truncate" data-i18n="Container">Add Service</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/admin/service" class="menu-link">
                        <div class="text-truncate" data-i18n="Blank">View Services</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Apps & Pages -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Apps &amp; Pages</span>
        </li>
        <li class="menu-item">
            <a href="/admin/category/create"
                target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-envelope"></i>
                <div class="text-truncate" data-i18n="Email">Add Category</div>

            </a>
        </li>
        <li class="menu-item">
            <a href="/admin/category"
                target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chat"></i>
                <div class="text-truncate" data-i18n="Chat">Categories</div>

            </a>
        </li>
        <!-- Pages -->
        <li class="menu-item">
            <a href="/admin/resource/create" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div class="text-truncate" data-i18n="Account Settings">Add Resource</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/admin/resource" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div class="text-truncate" data-i18n="Authentications">Resources</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/admin/admin/create" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div class="text-truncate" data-i18n="Authentications">Add admin</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/admin/admin" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div class="text-truncate" data-i18n="Authentications">Admins</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/admin/podcast/create" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div class="text-truncate" data-i18n="Authentications">Add Podcast</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/admin/podcast" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div class="text-truncate" data-i18n="Authentications"> Poddcasts</div>
            </a>
        </li>
        {{-- <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div class="text-truncate" data-i18n="Authentications">Add Modules</div>
            </a>
        </li> --}}
        {{-- <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div class="text-truncate" data-i18n="Authentications">Modules</div>
            </a>
        </li> --}}
        <li class="menu-item">
            <a href="/admin/quiz/create" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div class="text-truncate" data-i18n="Authentications">Add Quiz</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/admin/quiz" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div class="text-truncate" data-i18n="Authentications">Quizzes</div>
            </a>
        </li>
        {{-- <li class="menu-item">
            <a href="/admin/question/create" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div class="text-truncate" data-i18n="Authentications">Add Question</div>
            </a>
        </li> --}}
        {{-- <li class="menu-item">
            <a href="/admin/question" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div class="text-truncate" data-i18n="Authentications">Questions</div>
            </a>
        </li> --}}
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div class="text-truncate" data-i18n="Misc">Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/admin/profile" class="menu-link">
                        <div class="text-truncate" data-i18n="Error">Profile</div>
                    </a>
                </li>
                {{-- <li class="menu-item">
                    <a href="/auth-maintenance" class="menu-link">
                        <div class="text-truncate" data-i18n="Under Maintenance">Change password</div>
                    </a>
                </li> --}}
            </ul>
        </li>
        <!-- Misc -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
        <li class="menu-item">
            <form class="menu-link" action="/logout/auth" method="POST" >
                            @csrf()
                            @method("post")
                             <input  type="submit"  name="submit" value="Log Out" class="dropdown-item text-truncate" />
                            {{-- <i class="icon-base bx bx-power-off icon-md me-3"></i><span>Log Out</span> --}}
                        </input>
                        </form>
            {{-- <a href=""
                 class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div class="text-truncate" data-i18n="Support">logout</div>
            </a> --}}
        </li>
    </ul>
</aside>
{{-- end admin --}}
@elseif ( auth()->user()->isadmin==0)

{{--  user--}}
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                <span class="text-primary">
                    <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <path
                                d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                                id="path-1"></path>
                            <path
                                d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                                id="path-3"></path>
                            <path
                                d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                                id="path-4"></path>
                            <path
                                d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                                id="path-5"></path>
                        </defs>
                        <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                                <g id="Icon" transform="translate(27.000000, 15.000000)">
                                    <g id="Mask" transform="translate(0.000000, 8.000000)">
                                        <mask id="mask-2" fill="white">
                                            <use xlink:href="#path-1"></use>
                                        </mask>
                                        <use fill="currentColor" xlink:href="#path-1"></use>
                                        <g id="Path-3" mask="url(#mask-2)">
                                            <use fill="currentColor" xlink:href="#path-3"></use>
                                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                                        </g>
                                        <g id="Path-4" mask="url(#mask-2)">
                                            <use fill="currentColor" xlink:href="#path-4"></use>
                                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                                        </g>
                                    </g>
                                    <g id="Triangle"
                                        transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                        <use fill="currentColor" xlink:href="#path-5"></use>
                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </span>
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">CSA User</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item active open">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                <span class="badge rounded-pill bg-danger ms-auto">5</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item active">
                    <a href="/admin/dashboard" class="menu-link">
                        <div class="text-truncate" data-i18n="Analytics">Analytics</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/user/post"
                         class="menu-link">
                        <div class="text-truncate" data-i18n="CRM">Posts</div>
                        <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Layouts -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div class="text-truncate" data-i18n="Layouts">Events & Service</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/user/event" class="menu-link">
                        <div class="text-truncate" data-i18n="Without navbar"> Events</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/user/service" class="menu-link">
                        <div class="text-truncate" data-i18n="Blank"> Services</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="/user/resource" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div class="text-truncate" data-i18n="Authentications">Resources</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="/user/podcast" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div class="text-truncate" data-i18n="Authentications"> Poddcasts</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="/user/quiz" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div class="text-truncate" data-i18n="Authentications">Quizzes</div>
            </a>
        </li>
        {{-- <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div class="text-truncate" data-i18n="Authentications">Add Question</div>
            </a>
        </li> --}}
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div class="text-truncate" data-i18n="Misc">Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/user/profile" class="menu-link">
                        <div class="text-truncate" data-i18n="Error">Profile</div>
                    </a>
                </li>
                {{-- <li class="menu-item">
                    <a href="/auth-maintenance" class="menu-link">
                        <div class="text-truncate" data-i18n="Under Maintenance">Change password</div>
                    </a>
                </li> --}}
            </ul>
        </li>
        <!-- Misc -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
        <li class="menu-item">
            <form action="/logout/auth" method="POST">
                            @csrf()
                            @method('post')
                            <input type="submit" value="Log Out" name="submit" class="dropdown-item" />
                            <i class="icon-base bx bx-power-off icon-md me-3"></i>
                            </input>
                        </form>
            {{-- <a href="/user/profile"
                target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div class="text-truncate" data-i18n="Support">logout</div>
            </a> --}}
        </li>
    </ul>
</aside>
{{-- end user --}}
@endif




