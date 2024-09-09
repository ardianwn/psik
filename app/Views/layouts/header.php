<!--  Header Start -->
<style>
  @media only screen and (max-width: 768px) {
    #navBtn {
      display: none;
    }
  }

  .navbar-light {
    box-shadow: 0 4px 2px -2px #333;
  }

  .navbar-dark .nav-link,
  .navbar-dark .navbar-nav .nav-item .nav-icon-hover {
    color: white; /* Warna teks dalam navbar */
  }

  .dropdown-menu {
    background-color: #011963; /* Biru tua untuk dropdown */
    color: white; /* Warna teks di dropdown */
  }

  .dropdown-menu a {
    color: white; /* Warna teks link di dropdown */
  }

  .dropdown-menu a:hover {
    background-color: #004080; /* Biru sedikit lebih terang saat hover */
  }
</style>

<header class="app-header">
  <nav class="navbar navbar-expand-lg navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item d-block d-xl-none">
        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
          <i class="ti ti-menu-2"></i>
        </a>
      </li>
    </ul>
    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
      <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end gap-2" id="headerCollapse">
        <li class="nav-item dropdown">
          <a class="nav-link nav-icon-hover position-relative" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
            <img alt="" width="35" height="35" class="rounded-circle border border-primary" style="background-color: white;">
            <i class="ti ti-user position-absolute top-50 start-50 translate-middle text-primary"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" style="min-width: 300px;" aria-labelledby="drop2">
            <div class="message-body">
              <div class="mx-3 mt-2">
                <h5>Profil</h5>
                
              <a href="<?= base_url('logout'); ?>" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!--  Header End -->
