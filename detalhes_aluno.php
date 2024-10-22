<?php
require_once './dao/AlunoDAO.php';

$alunoDAO = new AlunoDAO();
$alunoID = $_GET['matricula'] ?? null;

if ($alunoID) {
    $aluno = $alunoDAO->getAlunoWithDisciplinas($alunoID);
} else {
    echo "Aluno não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4">
    <h1 class="text-2xl font-bold mb-4">Detalhes do Aluno</h1>

    <div class="bg-white p-4 rounded shadow-md mb-4">
        <p><strong>Matrícula:</strong> <?= $aluno->getMatricula(); ?></p>
        <p><strong>Nome:</strong> <?= $aluno->getNome(); ?></p>
    </div>

    <h2 class="text-xl font-semibold mb-2">Disciplinas Matriculadas</h2>
    <ul class="list-disc pl-5 mb-4 bg-white p-4 rounded shadow-md">
        <?php foreach ($aluno->getDisciplinas() as $disciplina): ?>
            <li><?= $disciplina->getNome(); ?> - <?= $disciplina->getCargaHoraria(); ?> horas</li>
        <?php endforeach; ?>
    </ul>

    <a href="index.php" class="bg-blue-500 text-white py-2 px-4 rounded">Voltar</a>
</body>
</html>
