
# Sobre o projeto

Esse é o primeiro projeto que eu construir utilizando react native para um FRONT-END

A aplicação consiste em adicionar e listar os dados em um dispositivo mobile

## Layout mobile
  
  <div style="display: inline-block;">
  <img  alt="Bruno-Java"  width="320" src="https://user-images.githubusercontent.com/107335359/178506133-6fdf0ab8-ca98-49b3-b695-86b1123a4641.png">
  ---
  <img  alt="Bruno-Java"  width="320" src="https://user-images.githubusercontent.com/107335359/178510151-e888597a-b260-410a-80a3-edde7c7a8cc4.png">
  </div>

# Tecnologias utilizadas

- HTML / CSS / JS 
- React Native
- Expo
- Android Studio
- Mysql
- Xampp

# intalações necessarias

```bash
npm install --save bootstrap
```
```bash
npm install --save reactstrap react react-dom
```
```bash
npm i react-icons
```
```bash
 npm i axios
```
```bash
npm install react-native-datepicker --save
```
# material do projeto

##conectando com o banco
estrutura pronta para conectar com banco do Xampp
- link do banco do xampp 
```
http://localhost/phpmyadmin/
```

- criar um arquivo "conexao.php" com esse código abaixo

```php
<?php 
// componentes essenciais para o projeto
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With'); 
header('Content-Type: application/json; charset=utf-8');  


//dados do banco no servidor local
$banco = 'react';
$host = 'localhost';
$usuario = 'root';
$senha = '';

try { 
	$pdo = new PDO("mysql:dbname=$banco;host=$host", "$usuario", "$senha");
	
} catch (Exception $e) {
	echo 'Erro ao conectar com o banco!! '. $e;
}

 ?>
```

## Arquivo app.js
- bibliotecas necessarias

```js
import { StatusBar } from 'expo-status-bar';
import React, { useState, useEffect } from 'react';
import { StyleSheet, Text, View, Modal, TouchableOpacity, SafeAreaView, TextInput, Alert, ScrollView } from 'react-native';
import { FaCheckCircle, FaTrash, FaPen } from 'react-icons/fa'; // npm i react-icons
import axios from 'axios'; // npm i axios


const [lista, setLista] = useState([]);
const [nome, setNome] = useState('');
const [email, setEmail] = useState('');
const [senha, setSenha] = useState('');
const [id, setId] = useState('');
const [buscar, setBuscar] = useState('');


/**
 * Hooks são uma nova adição ao React 16.8. Eles permitem que você use o state e outros recursos do React sem escrever uma classe.
 * O Effect Hook (Hook de Efeito) te permite executar efeitos colaterais em componentes funcionais:
 */
/*

useEffect(() => {
  listarDados();
}, [])


//async: permite utiliza (await) na function
// await: permite esperar até a tarefa seja finaliza e depois continua lendo o resto do codigo

async function listarDados() {
  const res = await axios.get('http://localhost/myApp/listar.php'); // get = pega os dados desse endereco e armazena em (res)
  setLista(res.data); // pega dados armazenados em res e envia para essa function
  console.log(res.data);

}

/*
const estilos = StyleSheet.create({
  modal: {
    flex: 1,
    backgroundColor: '#b2b2b2'

  },

  textoModal: {

    color: '#FFF',

    marginLeft: 15,
    fontSize: 25,


  },

  modalHeader: {

    marginLeft: 10,
    marginTop: 20,
    alignItems: 'center',
    flexDirection: 'row',
    marginBottom: 30,

  },


  input: {
    backgroundColor: '#FFF',
    borderRadius: 5,
    margin: 8,
    padding: 8,
    color: '#000',
    fontSize: 13
  },
  botaoModal: {
    backgroundColor: '#00335c',
    borderRadius: 5,
    margin: 5,
    padding: 12,
    color: '#FFF',
    alignItems: 'center',
    justifyContent: 'center',

  },
  textoBotaoModal: {
    fontSize: 16,
    color: '#FFF',

  },

  navbar: {
    backgroundColor: '#00335c',
    padding: 12,
    color: '#FFF',
    flexDirection: 'row',
    marginTop: 35,

  },

  textonavbar: {
    fontSize: 20,
    color: '#FFF',
    marginTop: 4,
    marginBottom: 2,
  },

  botao: {
    position: 'absolute',
    right: 13,
    marginTop: 11,
  },


  grid: {
    marginTop: 8,

  },

  griditem: {
    padding: 11,
    borderBottomColor: "#dbdbdb",
    borderBottomWidth: StyleSheet.hairlineWidth
  },

  gridbotaoEditar: {
    position: 'absolute',
    right: 40,
    color: '#5c7ef6',
  },

  gridbotaoExcluir: {
    position: 'absolute',
    right: 15,
    color: '#cc1414',
  },

  inputBuscar: {
    backgroundColor: '#FFF',
    borderRadius: 5,
    margin: 8,
    padding: 8,
    color: '#000',
    fontSize: 15,
    borderBottomColor: "#767676",
    borderBottomWidth: StyleSheet.hairlineWidth,
    width: '100%',
    position: 'relative',

  },

  ViewinputBuscar: {
    flexDirection: 'row',
  },

  iconeBuscar: {
    position: 'absolute',
    right: 20,
    top: 15,
  }
});

*/
```
## Arquivo listar.php
- bibliotecas necessarias

```php
<?php>

    include_once('conexao.php'); // inclui as variaveis do arquivo "conexao.php" nesce arquivo

$query = $pdo->query("SELECT * FROM usuarios order by id desc"); // "listar todos dados" da tabela "usuarios" por "id" em ordem "decresente" 
$res = $query->fetchAll(PDO::FETCH_ASSOC); // fetAll = percorre todos itens da tabela e PDO::FETCH_ASSOC = percorrer de forma de matriz 

for ($i = 0; $i < count($res); $i++) {      // percorre todos itens da tabela
    foreach ($res[$i] as $key => $value) { // o comando $res[$i] recebe apelido com "as" e agora pode ser chamado como "$key", e assim temos (chave => valor que a chave recebe)  
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

?>

```

# Autor

Bruno Lopes Soares
