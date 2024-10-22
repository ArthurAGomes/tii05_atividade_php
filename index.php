<?php
require_once './dao/AlunoDAO.php';
require_once './dao/DisciplinaDAO.php';
require_once './dao/ProfessorDAO.php';

$alunoDAO = new AlunoDAO();
$disciplinaDAO = new DisciplinaDAO();
$professorDAO = new ProfessorDAO();

// Obter dados de alunos, disciplinas e professores
$alunos = $alunoDAO->getAll();
$disciplinas = $disciplinaDAO->getAll();
$professores = $professorDAO->getAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index - Sistema Acadêmico</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Tabelas de Professores, Alunos e Disciplinas</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow-md p-4">
            <h2 class="text-xl font-semibold">Professores</h2>
            <div class="overflow-x-auto">
                <table class="border-collapse border border-gray-300 w-full mt-2">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-2 py-1">ID</th>
                            <th class="border border-gray-300 px-2 py-1">Nome</th>
                            <th class="border border-gray-300 px-2 py-1">Disciplina ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($professores as $professor): ?>
                            <tr>
                                <td class="border border-gray-300 px-2 py-1"><?= $professor->getId(); ?></td>
                                <td class="border border-gray-300 px-2 py-1"><?= $professor->getNome(); ?></td>
                                <td class="border border-gray-300 px-2 py-1"><?= $professor->getDisciplinaId(); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-4">
            <h2 class="text-xl font-semibold">Alunos</h2>
            <div class="overflow-x-auto">
                <table class="border-collapse border border-gray-300 w-full mt-2">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-2 py-1">Matrícula</th>
                            <th class="border border-gray-300 px-2 py-1">Nome</th>
                            <th class="border border-gray-300 px-2 py-1">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alunos as $aluno): ?>
                            <tr>
                                <td class="border border-gray-300 px-2 py-1"><?= $aluno->getMatricula(); ?></td>
                                <td class="border border-gray-300 px-2 py-1"><?= $aluno->getNome(); ?></td>
                                <td class="border border-gray-300 px-2 py-1">
                                    <a href="detalhes_aluno.php?matricula=<?= $aluno->getMatricula(); ?>" class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-info-circle"></i> Detalhes
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    
        <div class="bg-white rounded-lg shadow-md p-4">
            <h2 class="text-xl font-semibold">Disciplinas</h2>
            <div class="overflow-x-auto">
                <table class="border-collapse border border-gray-300 w-full mt-2">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-2 py-1">ID</th>
                            <th class="border border-gray-300 px-2 py-1">Nome</th>
                            <th class="border border-gray-300 px-2 py-1">Carga Horária</th>
                            <th class="border border-gray-300 px-2 py-1">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($disciplinas as $disciplina): ?>
                            <tr>
                                <td class="border border-gray-300 px-2 py-1"><?= $disciplina->getId(); ?></td>
                                <td class="border border-gray-300 px-2 py-1"><?= $disciplina->getNome(); ?></td>
                                <td class="border border-gray-300 px-2 py-1"><?= $disciplina->getCargaHoraria(); ?></td>
                                <td class="border border-gray-300 px-2 py-1">
                                    <a href="detalhes_disciplina.php?id=<?= $disciplina->getId(); ?>" class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-info-circle"></i> Detalhes
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
