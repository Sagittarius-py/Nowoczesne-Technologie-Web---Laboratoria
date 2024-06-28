// app/app.controller.js
angular
	.module("scientificCalculator")
	.controller("CalculatorController", function (CalculatorService) {
		var vm = this;

		vm.display = "";
		vm.buttons = [
			{ label: "7" },
			{ label: "8" },
			{ label: "9" },
			{ label: "/" },
			{ label: "4" },
			{ label: "5" },
			{ label: "6" },
			{ label: "*" },
			{ label: "1" },
			{ label: "2" },
			{ label: "3" },
			{ label: "-" },
			{ label: "0" },
			{ label: "." },
			{ label: "=" },
			{ label: "+" },
			{ label: "sin" },
			{ label: "cos" },
			{ label: "tan" },
			{ label: "sqrt" },
			{ label: "log" },
			{ label: "ln" },
			{ label: "π" },
			{ label: "e" },
			{ label: "sss" },
			{ label: "," },
			{ label: "C" },
		];

		vm.onClick = function (button) {
			CalculatorService.handleButtonClick(button.label, vm);
		};
	});
