<?php 
include('layouts/header.php'); 

$signos = simplexml_load_file("signos.xml");
$data_nascimento = $_POST['data_nascimento']; 

$date = new DateTime($data_nascimento);
$dia_mes_usuario = $date->format('m-d'); 

$signo_encontrado = null;

foreach ($signos->signo as $signo) {
    $parts_inicio = explode('/', (string)$signo->dataInicio);
    $parts_fim = explode('/', (string)$signo->dataFim);
    
    $data_inicio_signo = $parts_inicio[1] . '-' . $parts_inicio[0];
    $data_fim_signo = $parts_fim[1] . '-' . $parts_fim[0];
    
    if ($data_inicio_signo > $data_fim_signo) {
        if ($dia_mes_usuario >= $data_inicio_signo || $dia_mes_usuario <= $data_fim_signo) {
            $signo_encontrado = $signo;
            break;
        }
    } else {
        if ($dia_mes_usuario >= $data_inicio_signo && $dia_mes_usuario <= $data_fim_signo) {
            $signo_encontrado = $signo;
            break;
        }
    }
}
?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                
                <?php if ($signo_encontrado): ?>
                    <div class="card text-white bg-dark shadow-lg p-5 rounded-4">
                        <div class="card-body">
                            <h1 class="display-3 fw-bold mb-4 text-warning">
                                <?php echo $signo_encontrado->signoNome; ?>
                            </h1>
                            <p class="fs-4">
                                <?php echo $signo_encontrado->descricao; ?>
                            </p>
                            <a href="index.php" class="btn btn-outline-light mt-4 px-4 rounded-pill fw-bold">Consultar Outra Data</a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger" role="alert">
                        Não foi possível identificar o seu signo. Verifique a data inserida!
                    </div>
                    <a href="index.php" class="btn btn-primary mt-3">Voltar</a>
                <?php endif; ?>

            </div>
        </div>
    </div>
</body>
</html>
