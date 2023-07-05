
<!doctype html>
<?= $this->include('head'); ?>>
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="<?= base_url('/register')?>">
                        <img class="align-content" src="<?= base_url()?>/images/PIM.png" alt="pnl" height="250px" width="250px;">
                    </a>
                </div>
                <div class="login-form" style="border-radius: 30px; border: 5px">
                    <form action="<?= base_url()?>/login/submitlogin" method="POST">
                    <?php if(session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" value="<?= old('email');?>" name="email" class="form-control" placeholder="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" value="<?= old('password');?>" name="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-success offset-md-3" style="border-radius: 30px; width: 230px;">Masuk</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Belum memiliki akun? 
                                <a href="<?= base_url('/register')?>">Daftar</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('scripts')?>
</body>
</html>