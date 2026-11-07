<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login – ID Card Software</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="<?php echo base_url('backend/assets/css/style.css'); ?>" rel="stylesheet">
  <style>
    body { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 24px 16px; background-color: #f8fafc; }
    .login-box { width: 100%; max-width: 400px; margin-top: -60px; }
    .login-box h1 { text-align: center; font-size: 24px; font-weight: 700; margin-bottom: 24px; color: #1e293b; }
    .login-card { padding: 32px; border-radius: 8px; border: 0; box-shadow: 0 1px 3px rgba(15,23,42,.08); background: #fff; }
    .login-card .form-label { font-size: 14px; color: #475569; font-weight: 500; }
    .login-card .btn { width: 100%; font-weight: 600; }
    .login-card .btn-outline-secondary { background: #fff; color: #334155; border-color: #cbd5e1; }
    .login-card .btn-outline-secondary:hover { background: #f1f5f9; color: #1e293b; }
    .pw-wrap { position: relative; }
    .pw-toggle { position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #64748b; cursor: pointer; }
    @media (max-width: 575.98px) { .login-box { margin-top: 0; } .login-card { padding: 24px 20px; } }
  </style>
</head>
<body>
  <div class="login-box">
    <h1>MyAdmin Login</h1>
    <div class="card login-card">
      
      <!-- CodeIgniter Flash Message (রং বা ভুল হলে মেসেজ দেখানোর জন্য) -->
      <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger py-2 mb-3" id="loginError">
          <?php echo $this->session->flashdata('error'); ?>
        </div>
      <?php endif; ?>

      <!-- CodeIgniter Form Open -->
      <?php echo form_open('auth/login'); ?>
        
        <div class="mb-3">
          <label class="form-label" for="username">Email or Username</label>
          <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>" autocomplete="username" required>
        </div>

        <div class="mb-3">
          <label class="form-label" for="password">Password</label>
          <div class="pw-wrap">
            <input type="password" class="form-control" id="password" name="password" value="" autocomplete="current-password" required>
            <button type="button" class="pw-toggle" id="pwToggle" aria-label="Show password" title="Show / hide password"><i class="bi bi-eye"></i></button>
          </div>
        </div>

        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" id="remember" name="remember">
          <label class="form-check-label" for="remember" style="color:#475569">Remember me</label>
        </div>

        <button type="submit" class="btn btn-primary mb-3">Login</button>
        <a href="#" class="d-block mb-3 text-primary text-decoration-none text-center">Forgot Password?</a>
        <button type="button" class="btn btn-outline-secondary">Find My Company</button>
      
      <?php echo form_close(); ?>
    </div>
  </div>

  <script>

    const pw = document.getElementById('password'), tg = document.getElementById('pwToggle');
    tg.addEventListener('click', function () {
      const show = pw.type === 'password';
      pw.type = show ? 'text' : 'password';
      tg.innerHTML = '<i class="bi ' + (show ? 'bi-eye-slash' : 'bi-eye') + '"></i>';
      tg.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
    });
  </script>
</body>
</html>