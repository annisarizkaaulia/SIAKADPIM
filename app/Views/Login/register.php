<!doctype html>
<?= $this->include('head'); ?>>

<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="<?= base_url('/register')?>">
                        <img class="align-content" src="<?= base_url()?>/images/PIM.png" alt="pnl" height="250px"
                            width="250px;">
                    </a>
                </div>
                <div class="login-form" style="border-radius: 30px; border: 5px">
                    <form action="<?= base_url()?>/login/submitregister" method="POST">
                        <?php if(session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label>email</label>
                            <input type="email" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid': '';?>" placeholder="email">
                            <div class="invalid-feedback">
                                <?= $validation->getError('email');?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>password</label>
                            <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid': '';?>" placeholder="password">
                            <div class="invalid-feedback">
                                <?= $validation->getError('password');?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>username</label>
                            <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid': '';?>" placeholder="username">
                            <div class="invalid-feedback">
                                <?= $validation->getError('username');?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="namalengkap" class="form-control <?= ($validation->hasError('namalengkap')) ? 'is-invalid': '';?>"
                                placeholder="Masukkan nama lengkap">
                            <div class="invalid-feedback">
                                <?= $validation->getError('namalengkap');?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary offset-md-3"
                            style="border-radius: 30px; width: 230px;">Daftar</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Sudah memiliki akun? <a href="<?= base_url('/')?>">Masuk</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('scripts')?>
</body>
</html>