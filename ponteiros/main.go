package main

// Não utilizar - quando quer apenas - pegar valores
// Utilizar - Quando quero fazer esses dados mutaveis

func soma(a, b *int) int {
	*a = 50
	return *a + *b
}

func main() {
	num1 := 10
	num2 := 20
	//& referencia da memoria
	soma(&num1, &num2)
	println(num1) // 10

	// a := 10
	// var ponteiro *int = &a
	// *ponteiro = 50
	// // println(a)
	// b := &a
	// *b = 25
	// // println(a)

}
