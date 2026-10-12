<?php include('layouts/header.php'); ?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h1 class="mb-4 text-primary fw-bold">Descubra seu signo:</h1>

                <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="shadow p-4 rounded bg-light">
                    <div class="mb-3 text-start">
                        <label for="data_nascimento" class="form-label fw-bold">Data de nascimento</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fw-bold">Descobrir</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
