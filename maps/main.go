package main

import "fmt"

func main() {
	salarios := map[string]int{"Vitor": 1000, "Hugo": 2000}
	// fmt.Println(salarios["Vitor"])
	delete(salarios, "Vitor")
	// fmt.Println(salarios["Vitor"])
	salarios["Vitor Hugo"] = 5000
	// fmt.Println(salarios["Vitor Hugo"])

	// sal := make(map[string]int)
	// sal1 := map[string]int{}
	// sal1["Sccp"] = 10000

	for nome, salario := range salarios {
		fmt.Printf("O salário de %s é de %d\n", nome, salario)
	}

	for _, salario := range salarios {
		fmt.Printf("O salário é de %d\n", salario)
	}
}
