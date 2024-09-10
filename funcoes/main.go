package main

import (
	"errors"
	"fmt"
)

func main() {
	// fmt.Println(sum(51, 2))
	valor, err := sum(5, 10)
	if err != nil {
		fmt.Println(err)
	}
	fmt.Println(valor)
}

func sum(a, b int) (int, error) {
	if a+b >= 50 {
		return 0, errors.New("A SOMA É MAIOR QUE 50")
	}
	return a + b, nil
}
