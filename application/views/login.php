<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CMS Car Dealership</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        #auth { height: 100vh; overflow-x: hidden; }
        #auth-left { 
            display: flex; 
            flex-direction: column; 
            justify-content: center; /* Membuat form di tengah vertikal */
            align-items: center;    /* Membuat form di tengah horizontal */
            min-height: 100vh;
            padding: 0 15%;         /* Memberi jarak sisi kiri & kanan form */
        }
        .form-main { width: 100%; max-width: 450px; }
        #auth-right { 
        /* Menggunakan gambar mobil agar tidak sepi */
        background: linear-gradient(rgba(67, 94, 190, 0.7), rgba(67, 94, 190, 0.7)), 
                url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=1500&q=80');
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        text-align: center;
        }
        .auth-title { font-size: 3.5rem; color: #25396f; font-weight: 700; margin-bottom: 1rem; }
        .auth-subtitle { font-size: 1.2rem; color: #7c8db5; line-height: 1.6; }
        
        /* Gaya Ikon di dalam Input */
        .has-icon-left { position: relative; }
        .has-icon-left .form-control { padding-left: 3rem; }
        .has-icon-left .form-control-icon { 
            position: absolute; top: 50%; transform: translateY(-50%); 
            left: 1rem; color: #ced4da; 
        }
    </style>
</head>
<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12 bg-white">
                <div id="auth-left">
                    <div class="form-main">
                        <h1 class="auth-title">Log in.</h1>
                        <p class="auth-subtitle mb-5">Silakan masuk ke dashboard admin.</p>

                        <div id="ngilang">
                            <?= $this->session->flashdata('alert'); ?>
                        </div>

                        <form action="<?= base_url('auth/login') ?>" method="post">
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text" name="username" class="form-control form-control-xl" placeholder="Username" required>
                                <div class="form-control-icon"><i class="bi bi-person"></i></div>
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="password" name="password" class="form-control form-control-xl" placeholder="Password" required>
                                <div class="form-control-icon"><i class="bi bi-shield-lock"></i></div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg w-100 mt-3 p-3" style="border-radius: 10px;">
                                Log in
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <div class="p-5">
                        <h2 class="text-white fw-bold display-4">Car Dealership</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#ngilang').delay(3000).fadeOut('slow');
    </script>
</body>
</html>