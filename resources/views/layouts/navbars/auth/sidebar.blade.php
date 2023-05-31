@php
    $menuHomeSettings = App\Models\HomeSetting::where('type', '!=', 'seo')->where('type', '!=', 'discover-item')->get();
    $menuSolutions = App\Models\Solution::get();
    $menuAboutUs = App\Models\SiteContent::where('content_type', '=', 'page-element')
        ->where('parent', '=', '24')->get();
        
@endphp
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main" style="max-width: 16.5rem!important;">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
            <img src="/images/logo.png" class="navbar-brand-img h-100" alt="...">
            <span class="ms-3 font-weight-bold">Jalin Health</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main" style="height: fit-content!important;">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('home-setting') ? 'active' : '') }}" href="{{ url('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>shop </title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background opacity-6"
                                                d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Jalin Health</span>
                </a>
            </li>
            <!-- Landing Page Sidebar Menu -->
            <li class="nav-item mt-2">
                <h6 class="ps-4 ms-2 text-uppercase text-md mb-0 font-weight-bolder opacity-6">Demo</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('admin/request-demo') ? 'active' : '') }}" href="{{ route('admin.request-demo.index') }}">
                    <span class="nav-link-text ms-1">Request Demo</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('admin/request-demo/organization-type') ? 'active' : '') }}" 
                href="{{ url('/admin/request-demo/organization-type') }}">
                    <span class="nav-link-text ms-1">Organization type</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('admin/request-demo/inquiry-subject') ? 'active' : '') }}" 
                href="{{ url('/admin/request-demo/inquiry-subject') }}">
                    <span class="nav-link-text ms-1">Inquiry Subject</span>
                </a>
            </li>
            
            <!-- Landing Page Sidebar Menu -->
            <li class="nav-item mt-2">
                <h6 class="ps-4 ms-2 text-uppercase text-md mb-0 font-weight-bolder opacity-6">Landing Pages</h6>
            </li>
            @empty(!$menuHomeSettings)
                @foreach ($menuHomeSettings as $homeSetting)
                <li class="nav-item">
                    <a class="nav-link pb-2 pt-2 {{ (Request::is(['home-setting/'.$homeSetting->name.'/*']) ? 'active' : '') }}"
                        href="{{ route('home-setting.edit', $homeSetting->name) }}">
                        <span class="nav-link-text ms-1 text-capitalize">{{ str_replace('-', ' ', $homeSetting->name) }}</span>
                    </a>
                </li>
                @endforeach
            @endempty
            {{-- <li class="nav-item pb-2">
                <a class="nav-link {{ (Request::is(['home-setting', 'home-setting/*']) ? 'active' : '') }}"
                    href="{{ url('home-setting') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;"
                            class="fas fa-lg fa-list-ul ps-2 pe-2 text-center text-dark {{ (Request::is(['home-setting', 'home-setting/*']) ? 'text-white' : 'text-dark') }} "
                            aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Landing Page</span>
                </a>
            </li> --}}

            <!-- Solutions Management Sidebar Menu -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-md font-weight-bolder opacity-6">Solutions Management</h6>
            </li>
            @empty(!$menuSolutions)
                @foreach ($menuSolutions as $menuSolution)
                <li class="nav-item pb-2">
                    <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/solutions/'.$menuSolution->slug.'/*']) ? 'active' : '') }}"
                        href="{{ route('admin.solutions.edit', $menuSolution) }}">
                        <div
                        class="p-1 shadow border-radius-md bg-gray-500 text-center me-2 d-flex align-items-center justify-content-center">
                            <img src="{{ url($menuSolution->icon) }}" class=""
                                style="object-fit: contain;" alt="user1" height="30px">
                        </div>
                        <span class="nav-link-text ms-1 text-capitalize">{{ $menuSolution->title }}</span>
                    </a>
                </li>
                @endforeach
            @endempty
            {{-- <li class="nav-item">
                <a class="nav-link {{ (Request::is(['admin/solutions', 'admin/solutions/*']) ? 'active' : '') }}"
                    href="{{ url('admin/solutions') }}">
                    <span class="nav-link-text ms-1">Solutions</span>
                </a>
            </li> --}}

            <!-- Product & Service Page Sidebar Menu -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-md font-weight-bolder opacity-6">Product & Service</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/product-service', 'admin/product-service/*', 'admin/product-service-card/*']) ? 'active' : '') }}"
                    href="{{ route('admin.product-service.index') }}">
                    <span class="nav-link-text ms-1">Product & Service</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/product-detail', 'admin/product-detail/*']) ? 'active' : '') }}"
                    href="{{ route('admin.product-detail.index') }}">
                    <span class="nav-link-text ms-1">Product Details</span>
                </a>
            </li>
            <li class="nav-item ps-3">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/content-feature/product-details']) ? 'active' : '') }}"
                    href="{{ url('/admin/content-feature/product-details') }}">
                    <span class="nav-link-text ms-1">Features</span>
                </a>
            </li>
            <li class="nav-item ps-3">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/content-benefit/product-details']) ? 'active' : '') }}"
                    href="{{ url('/admin/content-benefit/product-details') }}">
                    <span class="nav-link-text ms-1">Benefits</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/service-detail', 'admin/service-detail/*']) ? 'active' : '') }}"
                    href="{{ route('admin.service-detail.index') }}">
                    <span class="nav-link-text ms-1">Service Details</span>
                </a>
            </li>
            <li class="nav-item ps-3">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/content-feature/services-details']) ? 'active' : '') }}"
                    href="{{ url('/admin/content-feature/services-details') }}">
                    <span class="nav-link-text ms-1">Features</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/architecture', 'admin/architecture/*']) ? 'active' : '') }}"
                    href="{{ route('admin.architecture.index') }}">
                    <span class="nav-link-text ms-1">Architecture</span>
                </a>
            </li>
            <li class="nav-item ps-3">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/architecture-feature/architecture']) ? 'active' : '') }}"
                    href="{{ url('/admin/architecture-feature/architecture') }}">
                    <span class="nav-link-text ms-1">Features</span>
                </a>
            </li>

            <!-- Resources Sidebar Menu -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-md font-weight-bolder opacity-6">Resources Management</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/resources-settings']) ? 'active' : '') }}"
                    href="{{ route('admin.resources-settings.index') }}">
                    <span class="nav-link-text ms-1">Resource Page Grid</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/resources']) ? 'active' : '') }}"
                    href="{{ route('admin.resources.index') }}">
                    <span class="nav-link-text ms-1">List Resources</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/resources/create']) ? 'active' : '') }}"
                    href="{{ route('admin.resources.create') }}">
                    <span class="nav-link-text ms-1">New</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/categories','admin/resources/categories']) ? 'active' : '') }}"
                    href="{{ route('admin.categories.index') }}">
                    <span class="nav-link-text ms-1">Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/resource-setting']) ? 'active' : '') }}"
                    href="{{ route('admin.resource-setting.index') }}">
                    <span class="nav-link-text ms-1">Empty Resource Page</span>
                </a>
            </li>

            <!-- Contact Us Sidebar Menu -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-md font-weight-bolder opacity-6">Contact Us</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/contact-us']) ? 'active' : '') }}"
                    href="{{ route('admin.contact-us.index') }}">
                    <span class="nav-link-text ms-1">Contact Us</span>
                </a>
            </li>

            <!-- About Us Sidebar Menu -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-md font-weight-bolder opacity-6">About Us</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/about-us']) ? 'active' : '') }}"
                    href="{{ route('admin.about-us.index') }}">
                    <span class="nav-link-text ms-1">About Us</span>
                </a>
            </li>
            @empty(!$menuAboutUs)
                @foreach ($menuAboutUs as $aboutUs)
                <li class="nav-item">
                    <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/about-us/'.$aboutUs->slug.'/*']) ? 'active' : '') }}"
                        href="{{ route('admin.about-us-sections', $aboutUs->slug) }}">
                        <span class="nav-link-text ms-1 text-capitalize">{{ $aboutUs->title }}</span>
                    </a>
                </li>
                @endforeach
            @endempty
            <li class="nav-item">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/partners', 'admin/partners/*']) ? 'active' : '') }}"
                    href="{{ route('admin.partners.index') }}">
                    <span class="nav-link-text ms-1">Partner List</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-md font-weight-bolder opacity-6">Empty Search Page</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/search-setting']) ? 'active' : '') }}"
                    href="{{ route('admin.search-setting.index') }}">
                    <span class="nav-link-text ms-1">Search Page Setting</span>
                </a>
            </li>

            <!-- Users Sidebar Menu -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-md font-weight-bolder opacity-6">Users Management</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/user/administrator']) ? 'active' : '') }}"
                    href="{{ route('admin.users-list.administrator') }}">
                    <span class="nav-link-text ms-1">Adminstrator</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/user/membership']) ? 'active' : '') }}"
                    href="{{ route('admin.users-list.membership') }}">
                    <span class="nav-link-text ms-1">Member</span>
                </a>
            </li>
        </ul>
    </div>

</aside>
