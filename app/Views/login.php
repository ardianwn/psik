<?= $this->extend('layouts/auth') ?>

<?= $this->section('title') ?>
Login
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Section: Design Block -->
<section>
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%); margin-top:7rem;">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            Welcome Back <br />
            <span class="text-primary">Log in to your account</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
            Please enter your username and password to access your dashboard.
            If you don't have an account, you can register <a href="<?= site_url('/register'); ?>">here</a>.
          </p>
        </div>

        <!-- Login Form -->
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
              <form action="<?= site_url('/login/authenticate'); ?>" method="post">
                <?= csrf_field(); ?>

                <!-- Username input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="username">Username</label>
                  <input type="text" id="username" name="username" class="form-control" required />
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group">
                        <input type="password" id="password" name="password" class="form-control" required />
                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                            <i class="bi bi-eye-slash"></i>
                        </span>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                  Login
                </button>

                <!-- Error Message -->
                <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                  <?= session()->getFlashdata('error'); ?>
                </div>
                <?php endif; ?>

                <!-- Register link -->
                <div class="text-center">
                  <p>Don't have an account? <a href="<?= site_url('/register'); ?>">Register here</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End of Login Form -->
      </div>
    </div>
  </div>
</section>

<!-- Add Bootstrap Icons CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
        // Toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        
        // Toggle the eye icon
        this.querySelector('i').classList.toggle('bi-eye');
        this.querySelector('i').classList.toggle('bi-eye-slash');
    });
</script>

<?= $this->endSection() ?>
