package main

import "fmt"

type Client struct {
	Nome  string
	Idade int
	Ativo bool
	Endereco
}

type Endereco struct {
	Logradouro string
	Numero     int
	Cidade     string
	Estado     string
}

func main() {
	vitor := Client{
		Nome:  "Vitor",
		Idade: 21,
		Ativo: true,
	}
	vitor.Ativo = false
	vitor.Endereco.Cidade = "Ponta Grossa"
	fmt.Printf("Nome: %s, Idade: %d, Ativo: %t", vitor.Nome, vitor.Idade, vitor.Ativo)
}
