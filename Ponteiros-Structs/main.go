package main

import "fmt"

type Client struct {
	Nome string
}

func (c Client) Andou() {
	fmt.Printf("O cliente %v andou\n", c.Nome)
}

func main() {
	client := Client{
		Nome: "Vitor",
	}
	client.Andou()
	fmt.Printf("O valor da struct com nome %v\n", client.Nome)
}
