<?= $this->extend('layouts/auth') ?>

<?= $this->section('title') ?>
Register
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <!-- Left Side Text -->
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            Join Us Today <br />
            <span class="text-primary">Create Your Account</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
            Register now to access our features and manage your tasks with ease.
            It's quick and easy to set up an account!
          </p>
        </div>

        <!-- Register Form -->
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
              <form action="<?= site_url('/register/store'); ?>" method="post">
                <?= csrf_field(); ?>

                <!-- Name input -->
                <div class="row">
                  <div class="col-mb-4">
                    <div data-mdb-input-init class="form-outline mb-4">
                      <label class="form-label" for="first_name">Nama</label>
                      <input type="text" id="name" name="nama" class="form-control" required />
                    </div>
                  </div>
                </div>

                <!-- Divisi input -->
                <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="divisi">Divisi</label>
                <input type="text" id="divisi" name="divisi" class="form-control" required />
                </div>

                <!-- Username input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="username">Username</label>
                  <input type="text" id="username" name="username" class="form-control" required />
                </div>

                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="email">Email address</label>
                  <input type="email" id="email" name="email" class="form-control" required />
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

                <!-- Confirm Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="confirm_password">Password</label>
                    <div class="input-group">
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" required />
                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                            <i class="bi bi-eye-slash"></i>
                        </span>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">
                  Register
                </button>

                <!-- Success/Error Message -->
                <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                  <?= session()->getFlashdata('success'); ?>
                </div>
                <?php elseif (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                  <?= session()->getFlashdata('error'); ?>
                </div>
                <?php endif; ?>

                <!-- Login link -->
                <div class="text-center">
                  <p>Already have an account? <a href="<?= site_url('/login'); ?>">Login here</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End of Register Form -->
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->

<?= $this->endSection() ?>
