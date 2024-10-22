<?php
require_once './dao/DisciplinaDAO.php';

$disciplinaDAO = new DisciplinaDAO();
$disciplinaID = $_GET['id'] ?? null;

if ($disciplinaID) {
    $disciplina = $disciplinaDAO->getDisciplinaWithAlunos($disciplinaID);
    $professores = $disciplinaDAO->getProfessoresForDisciplina($disciplinaID);
} else {
    echo "Disciplina não encontrada!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Disciplina</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4">
    <h1 class="text-2xl font-bold mb-4">Detalhes da Disciplina</h1>

    <div class="bg-white p-4 rounded shadow-md mb-4">
        <p><strong>ID:</strong> <?= $disciplina->getId(); ?></p>
        <p><strong>Nome:</strong> <?= $disciplina->getNome(); ?></p>
        <p><strong>Carga Horária:</strong> <?= $disciplina->getCargaHoraria(); ?> horas</p>
    </div>

    <h2 class="text-xl font-semibold mb-2">Alunos Matriculados</h2>
    <ul class="list-disc pl-5 mb-4 bg-white p-4 rounded shadow-md">
        <?php foreach ($disciplina->getAlunos() as $aluno): ?>
            <li><?= $aluno->getNome(); ?></li>
        <?php endforeach; ?>
    </ul>

    <h2 class="text-xl font-semibold mb-2">Professores que Lecionam Esta Disciplina</h2>
    <ul class="list-disc pl-5 mb-4 bg-white p-4 rounded shadow-md">
        <?php foreach ($professores as $professor): ?>
            <li><?= $professor->getNome(); ?></li>
        <?php endforeach; ?>
    </ul>

    <a href="index.php" class="bg-blue-500 text-white py-2 px-4 rounded">Voltar</a>
</body>
</html>
