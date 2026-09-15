<?php

echo "<h2>5a_Desafio 1 - Cadastro de Usuário e Verificação de Idade</h2>";

echo "<hr>";

echo '<form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="ano_nascimento">Ano de Nascimento:</label>
        <input type="number" name="ano_nascimento" required><br>

        <button type="submit">Enviar</button>
    </form>';

    echo "<hr>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $ano_nascimento = $_POST['ano_nascimento'];
    $idade = date('Y') - $ano_nascimento;

    if ($idade >= 18) {
        echo "<p>Acesso permitido, $nome!</p>";
        $arquivo = fopen('log_acessos.txt', 'a');
        fwrite($arquivo, "Nome: $nome, Idade: $idade\n");
        fclose($arquivo);
    } else {
        echo "<p>Acesso negado, $nome!</p>";
    }
}

echo "<p>Idade calculada: $idade </p>";

echo "<hr>";

?>