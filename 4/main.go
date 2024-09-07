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
	a = false
	fmt.Println(f)
}
