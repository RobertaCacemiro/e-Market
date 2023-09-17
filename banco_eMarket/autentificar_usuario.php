<?php

include "bd_connect.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = "SELECT id, nome, user_type, job_title 
                FROM prt_usuario 
               WHERE e_mail = '{$email}' 
                 AND senha = MD5('{$senha}')";

//  showArray($query);

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);


    // Se encontrou o usuário, inicie a sessão
    $_SESSION['logged_in'] = true;
    $_SESSION['user_id'] = $row['id']; // Exemplo: armazenando o ID do usuário
    $_SESSION['nome'] = $row['nome'];
    $_SESSION['user_type'] = $row['user_type']; // Exemplo: armazenando o e-mail do usuário
    $_SESSION['job_title'] = $row['job_title']; // Exemplo: armazenando o e-mail do usuário


    // Monta a resposta JSON de sucesso
    $response = array(
        'result' => 'success',
        'message' => 'Usuário autenticado com sucesso.'
    );
    echo json_encode($response);
} else {
    // Se não encontrou o usuário, retorne um erro JSON
    $response = array(
        'result' => 'error',
        'message' => 'Usuário não encontrado.'
    );
    echo json_encode($response);
}
