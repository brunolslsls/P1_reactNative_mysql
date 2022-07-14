<?php

include_once('conexao.php'); // inclui as variaveis do arquivo "conexao.php" nesce arquivo

$query = $pdo->query("SELECT * FROM usuarios order by id desc"); // "listar todos dados" da tabela "usuarios" por "id" em ordem "decresente" 
$res = $query->fetchAll(PDO::FETCH_ASSOC); // fetAll = percorre todos itens da tabela e PDO::FETCH_ASSOC = percorrer de forma de matriz 

for ($i = 0; $i < count($res); $i++) {      // percorre todos itens da tabela
   
   // o comando $res[$i] recebe apelido com "as" e agora pode ser chamado como "$key", e assim temos (chave => valor que a chave recebe)  
   // lembre que isso aqui é invalido ($res[$i] => $value ) logo precisamos do "as" para fazer codigo funcionar
    foreach ($res[$i] as $key => $value) {  
    }

    // pegar dados que esta no "$res" e colocar em um novo array de Objetos
    // para fazer isso pecorre os itens da tabela de forma vertical com o comando abaixo
    $dados[]  = array(
        'id' => $res[$i]['id'],       // chave "id do $dados"  recebe valores da coluna "id do $res[$i]['id']"
        'nome' => $res[$i]['nome'],   // chave "nome do $dados"  recebe valores da coluna "nome do $res[$i]['id']"
        'email' => $res[$i]['email'], // chave "email do $dados"  recebe valores da coluna "email do $res[$i]['id']"
        'senha' => $res[$i]['senha'], // chave "senha do $dados"  recebe valores da coluna "senha do $res[$i]['id']"
    );


}

// verifica se existe conteudo dentro da tabela 
if (count($res) > 0){
    //json_encode — Retorna a representação JSON de um valor
    // dentro de array temos (criação de json com chaves e valores)
    // e assim temos chave "success" que diz sim recebi valor da tabela e "result" que recebe dados da tabela
    $result =json_encode(array('success'=>true,'result'=>$dados));


}else {  // se não existir dados na tebela então ...
    // e assim temos chave "success" que diz NÃO recebi valor da tabela e "result" que recebe 0
    $result =json_encode(array('success'=>false,'result'=>'0'));

}
echo $result;


?>