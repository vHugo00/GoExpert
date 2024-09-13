package main

import "fmt"

type Client struct {
	Nome  string
	Idade int
	Ativo bool
}

func main() {
	vitor := Client{
		Nome:  "Vitor",
		Idade: 21,
		Ativo: true,
	}
	vitor.Ativo = false
	fmt.Printf("Nome: %s, Idade: %d, Ativo: %t", vitor.Nome, vitor.Idade, vitor.Ativo)
}
