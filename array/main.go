package main

import "fmt"

type ID int

var (
	a bool   = true
	b int    = 2
	c string = "Vitor"
	f ID     = 1
)

func main() {
	var myArr [3]int
	myArr[0] = 10
	myArr[1] = 20
	myArr[2] = 30
	for i, v := range myArr {
		fmt.Printf("O valor do indice %d é %d\n", i, v)
	}

}
