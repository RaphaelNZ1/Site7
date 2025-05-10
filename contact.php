<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $mensagem = htmlspecialchars(trim($_POST['mensagem']));

    if (!$email) {
        echo "Email inválido.";
        exit;
    }

    // Configurações do e-mail
    $to = "seuemail@exemplo.com";  // Substitua pelo seu endereço de e-mail
    $subject = "Mensagem do Portfólio de $nome";

    // Corpo do e-mail em texto simples
    $body = "Você recebeu uma nova mensagem do portfólio:\n\n";
    $body .= "Nome: $nome\n";
    $body .= "Email: $email\n\n";
    $body .= "Mensagem:\n$mensagem\n";

    // Cabeçalhos
    $headers = "From: $nome <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Enviar o e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar mensagem.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>

