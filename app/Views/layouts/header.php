<!--  Header Start -->
<style>
  @media only screen and (max-width: 768px) {
    #navBtn {
      display: none;
    }
  }

  .navbar-dark {
    background-color: #fafbfe;
    border: 1px solid #D9D9D9;
    margin-left: 15px;
  }

  .navbar-dark .nav-link,
  .navbar-dark .navbar-nav .nav-item .nav-icon-hover {
    color: #011963;
  }

  .dropdown-menu {
    background-color: #fefefe;
    color: #02347e;
    margin-right: 10px;
  }

  .dropdown-menu a {
    color: #02347e;
  }

  .dropdown-menu a:hover {
    background-color: #004080;
  }

  .text-blue-dark {
    color: #02347e!important;
  }

</style>

<header class="app-header">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item d-block d-xl-none">
        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
          <i class="ti ti-menu-2"></i>
        </a>
      </li>
    </ul>
    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
      <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end gap-2" id="headerCollapse">
        <!-- Dropdown Profile -->
        <li class="nav-item dropdown d-flex align-items-center">
          <a class="nav-link nav-icon-hover position-relative" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?= base_url('image/profile.jpg'); ?>" alt="User Profile" width="35" height="35" class="rounded-circle border border-primary" style="background-color: white;">
          </a>
          
          <span class="ms-2 mx-5 fw-bold text-blue-dark">
              <?php
              $nama = session()->get('nama');
              if ($nama) {
                  echo $nama;
              } else {
                  echo "Nama tidak ditemukan di session";
              }
              ?>
          </span>

          <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" style="min-width: 300px;" aria-labelledby="drop2">
            <div class="message-body">
              <!-- Profil Pengguna -->
              <div class="mx-3 mt-2">
                <h5><?= session()->get('nama'); ?></h5> <!-- Nama Pengguna -->
                <p class="text-dark mb-0">Status: <?= session()->get('role'); ?></p> <!-- Status Pengguna -->
              </div>

              <!-- Tombol Detail dan Logout -->
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('profile'); ?>" class="btn btn-outline-primary mx-3 d-block">Profil</a>
              <a href="<?= base_url('logout'); ?>" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>
