
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
# conectando com o banco
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

# Autor

Bruno Lopes Soares
