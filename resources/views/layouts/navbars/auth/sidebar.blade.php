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
                    <span class="nav-link-text ms-1">Organization Type</span>
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
                <a class="nav-link pb-2 pt-2 {{ (Request::is(['admin/resources', 'admin/resources/*']) ? 'active' : '') }}"
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
