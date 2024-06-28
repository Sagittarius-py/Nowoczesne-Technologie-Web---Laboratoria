// app/app.service.js
function calculateAverage(stringsArray) {
	// Zamieniamy stringi na liczby
	const numbersArray = stringsArray.map(Number);

	// Liczymy sumę liczb w tablicy
	const sum = numbersArray.reduce((acc, num) => acc + num, 0);

	// Obliczamy średnią
	const average = sum / numbersArray.length;

	return average;
}

angular
	.module("scientificCalculator")
	.service("CalculatorService", function () {
		var service = this;

		service.handleButtonClick = function (label, vm) {
			if (!isNaN(label) || label === ".") {
				vm.display += label;
			} else if (label === "C") {
				vm.display = "";
			} else if (label === "=") {
				try {
					vm.display = eval(vm.display);
				} catch (e) {
					vm.display = "Error";
				}
			} else if (label === "sin") {
				vm.display = Math.sin(eval(vm.display));
			} else if (label === "cos") {
				vm.display = Math.cos(eval(vm.display));
			} else if (label === "tan") {
				vm.display = Math.tan(eval(vm.display));
			} else if (label === "sqrt") {
				vm.display = Math.sqrt(eval(vm.display));
			} else if (label === "log") {
				vm.display = Math.log10(eval(vm.display));
			} else if (label === "ln") {
				vm.display = Math.log(eval(vm.display));
			} else if (label === "π") {
				vm.display += Math.PI;
			} else if (label === "e") {
				vm.display += Math.E;
			} else if (label === "sss") {
				var string = vm.display;
				var numbers = string.split(",");
				vm.display = calculateAverage(numbers);
			} else {
				vm.display += label;
			}
		};
	});
