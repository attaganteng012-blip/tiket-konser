<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ config('app.name', 'Tiket Konser') }} | Architect</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<style>
body{min-height:100vh;display:grid;place-items:center;padding:20px;font-family:'Open Sans',sans-serif;font-size:.9rem;background:linear-gradient(160deg,#16b3a0 0%,#6fc34a 65%,#a1cb2b 100%)}
.auth{width:100%;max-width:400px;background:#fff;border-radius:.4rem;padding:32px 28px;box-shadow:0 1rem 3rem rgba(4,9,20,.2)}
.logo{font-family:'Kaushan Script',cursive;font-size:2.3rem;color:#000;text-align:center;display:block;text-decoration:none}
.auth label{font-size:.85rem;color:#495057}
.auth input:not([type=checkbox]){display:block;width:100%;padding:.55rem .75rem;border:1px solid #ced4da;border-radius:.25rem;margin-top:4px}
.auth input:focus{outline:0;border-color:#3f6ad8;box-shadow:0 0 0 .2rem rgba(63,106,216,.2)}
.auth button[type=submit]{width:100%;border:0;border-radius:30px;padding:.6rem;background:#3f6ad8;color:#fff;font-weight:600;margin-top:8px}
.auth a{color:#3f6ad8;text-decoration:none}
</style>
</head>
<body>
  <div class="auth">
    <a href="/" class="logo">Architect</a>
    {{ $slot }}
  </div>
</body>
</html>
