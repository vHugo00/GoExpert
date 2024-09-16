package main

func main() {
	a := 10
	var ponteiro *int = &a
	*ponteiro = 50
	println(a)
	b := &a
	*b = 25
	println(a)
}