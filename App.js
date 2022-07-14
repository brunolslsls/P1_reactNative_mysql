import { StatusBar } from 'expo-status-bar';
import React, { useState, useEffect } from 'react';
import { StyleSheet, Text, View, Modal, TouchableOpacity, SafeAreaView, TextInput, Alert, ScrollView } from 'react-native';
import { FaCheckCircle, FaTrash, FaPen } from 'react-icons/fa'; // npm i react-icons
import axios from 'axios'; // npm i axios


function App() {

  const [lista, setLista] = useState([]); // criar variaveis objetos
  const [nome, setNome] = useState('');   // criar variaveis String
  const [email, setEmail] = useState(''); // criar variaveis String
  const [senha, setSenha] = useState(''); // criar variaveis String
  const [id, setId] = useState('');        // criar variaveis String
  const [buscar, setBuscar] = useState('');// criar variaveis String

  /**
   * Hooks são uma nova adição ao React 16.8. Eles permitem que você use o state e outros recursos do React sem escrever uma classe.
   * O Effect Hook (Hook de Efeito) te permite executar efeitos colaterais em componentes funcionais:
   */
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


  // é necessario SEMPRE ter um return para react funcionar corretamente
  return(
    <>
      <Text>dkosad</Text>
    </>
  )

}

// exportar a function App
export default App;