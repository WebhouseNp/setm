<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard') }}">
        <i class="c-sidebar-nav-icon cil-home"></i>Dashboard
    </a>
    @can('View Role')
    <a class="c-sidebar-nav-link" href="{{ route('role.index') }}">
        <i class="c-sidebar-nav-icon cib-microsoft"></i>Role
    </a>
    @endcan
    @can('View User')
    <a class="c-sidebar-nav-link" href="{{ route('user.index') }}">
        <i class="c-sidebar-nav-icon cil-user-follow"></i>User
    </a>
    @endcan
    @can('View Site')
    <a class="c-sidebar-nav-link" href="{{ route('site.index') }}">
        <i class="c-sidebar-nav-icon fab fa-battle-net"></i>Site Settings
    </a>
    @endcan

    @can('View Slider')
    <a class="c-sidebar-nav-link" href="{{ route('slider.index') }}">
        <i class="c-sidebar-nav-icon cib-microsoft"></i>Slider
    </a>
    @endcan

    @can('View Whatwedo')
    <a class="c-sidebar-nav-link" href="{{ route('whatwedo.index') }}">
        <i class="c-sidebar-nav-icon fas fa-handshake"></i>What We Do
    </a>
    @endcan

    @can('View Activity')
    <a class="c-sidebar-nav-link" href="{{ route('activity.index') }}">
        <i class="c-sidebar-nav-icon fas fa-handshake"></i>Activities
    </a>
    @endcan
    @can('View News')
    <a class="c-sidebar-nav-link" href="{{ route('news.index') }}">
        <i class="c-sidebar-nav-icon fas fa-handshake"></i>News
    </a>
    @endcan

    @can('View Quicklink')
    <a class="c-sidebar-nav-link" href="{{ route('quicklink.index') }}">
        <i class="c-sidebar-nav-icon fas fa-handshake"></i>Quick Links
    </a>
    @endcan

    {{-- @can('View WorkingPocess')
    <a class="c-sidebar-nav-link" href="{{ route('workingprocess.index') }}">
        <i class="c-sidebar-nav-icon fas fa-handshake"></i>Working Process
    </a>
    @endcan
    @can('View Product')
    <a class="c-sidebar-nav-link" href="{{ route('product.index') }}">
        <i class="c-sidebar-nav-icon fab fa-acquisitions-incorporated"></i>Products
    </a>
    @endcan
    @can('View Service')
    <a class="c-sidebar-nav-link" href="{{ route('service.index') }}">
        <i class="c-sidebar-nav-icon fas fa-exclamation-triangle"></i>Service
    </a>
    @endcan
    @can('View Partner')
    <a class="c-sidebar-nav-link" href="{{ route('partner.index') }}">
        <i class="c-sidebar-nav-icon fas fa-handshake"></i>Partner
    </a>
    @endcan
    @can('View Client')
    <a class="c-sidebar-nav-link" href="{{ route('client.index') }}">
        <i class="c-sidebar-nav-icon fas fa-users"></i>Client
    </a>
    @endcan
     @can('View Page')
    <a class="c-sidebar-nav-link" href="{{ route('page.index') }}">
        <i class="c-sidebar-nav-icon fab fa-pagelines"></i>Page
    </a>
    @endcan
    @can('View Team')
    <a class="c-sidebar-nav-link" href="{{ route('team.index') }}">
        <i class="c-sidebar-nav-icon fas fa-user-friends"></i>Team
    </a>
    @endcan

    @can('View Testimonial')
    <a class="c-sidebar-nav-link" href="{{ route('testimonial.index') }}">
        <i class="c-sidebar-nav-icon fas fa-quote-left"></i>Testimonial
    </a>
    @endcan

    @can('View Blog')
    <a class="c-sidebar-nav-link" href="{{ route('blog.index') }}">
        <i class="c-sidebar-nav-icon fas fa-blog"></i>Blog
    </a>
    @endcan
    @can('View Associated')
    <a class="c-sidebar-nav-link" href="{{ route('department.index') }}">
        <i class="c-sidebar-nav-icon fab fa-acquisitions-incorporated"></i>Associated With
    </a>
    @endcan
    @can('View Address')
    <a class="c-sidebar-nav-link" href="{{ route('address.index') }}">
        <i class="c-sidebar-nav-icon fas fa-address-card"></i>Address
    </a>
    @endcan --}}


    @can('View Contactus')
    <a class="c-sidebar-nav-link" href="{{ route('contactus.index') }}">
        <i class="c-sidebar-nav-icon fas fa-id-card-alt"></i>Contact Us
    </a>
    @endcan
    {{-- @can('View Contactus')
    <a class="c-sidebar-nav-link" href="{{ route('contactus.productInquiry') }}">
        <i class="c-sidebar-nav-icon fas fa-id-card-alt"></i>Product Inquiry
    </a>
    @endcan
    @can('View Contactus')
    <a class="c-sidebar-nav-link" href="{{ route('contactus.serviceInquiry') }}">
        <i class="c-sidebar-nav-icon fas fa-id-card-alt"></i>Service Inquiry
    </a>
    @endcan
    @can('View Contactus')
    <a class="c-sidebar-nav-link" href="{{ route('subscribe') }}">
        <i class="c-sidebar-nav-icon fas fa-id-card-alt"></i>Subscribes List
    </a>
    @endcan

   @can('View Incident')
    <a class="c-sidebar-nav-link" href="{{ route('incident.index') }}">
        <i class="c-sidebar-nav-icon fab fa-bandcamp"></i>Incident List
    </a>
    @endcan --}}

    {{-- @can('View Career')
    <a class="c-sidebar-nav-link" href="{{ route('career.index') }}">
        <i class="c-sidebar-nav-icon fas fa-award"></i>Career
    </a>
    @endcan --}}


</li>
