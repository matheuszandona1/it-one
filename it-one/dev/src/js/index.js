$(".solutions_slick").slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	arrows: true,
	infinite: false,
	prevArrow: $(".prev"),
	nextArrow: $(".next"),
	mobileFirst: true,
	responsive: [
		{
			breakpoint: 991,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
			},
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			},
		},
	],
})
$(".valores_slick").slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	// centerMode: true,
	arrows: true,
	infinite: false,
	prevArrow: $(".prev"),
	nextArrow: $(".next"),
	mobileFirst: true,
	responsive: [
		{
			breakpoint: 991,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 1,
			},
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			},
		},
	],
})
$(".blog_slick").slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	// centerMode: true,
	arrows: true,
	infinite: false,
	prevArrow: $(".prev"),
	nextArrow: $(".next"),
})
$(".all_slick").slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	// centerMode: true,
	arrows: true,
	infinite: false,
	prevArrow: $(".prev"),
	nextArrow: $(".next"),
	mobileFirst: true,
	responsive: [
		{
			breakpoint: 991,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
			},
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			},
		},
	],
})

document.addEventListener("DOMContentLoaded", function () {
	const container = document.getElementById("dif-card")

	// Verifica se o container existe antes de prosseguir
	if (container) {
		const items = container.querySelectorAll(".solutions_card")
		const itemCount = items.length

		if (itemCount === 1) {
			container.classList.add("single-item")
		} else if (itemCount === 2) {
			container.classList.add("two-items")
		} else if (itemCount > 1 && itemCount < 4) {
			container.classList.add("multiple-items")
		} else if (itemCount >= 4) {
			container.classList.add("table-items")
		}
	}
})

var mySwiper = new Swiper(".swiper-container", {
	speed: 400,
	spaceBetween: 24,
	initialSlide: 0,
	//truewrapper adoptsheight of active slide
	autoHeight: false,
	// Optional parameters
	direction: "horizontal",
	loop: true,

	autoplayStopOnLast: false, // loop false also
	// If we need pagination

	// Navigation arrows
	nextButton: ".swiper-button-next",
	prevButton: ".swiper-button-prev",

	effect: "slide",
	slidesPerView: 2,
	autoHeight: true,
	//
	centeredSlides: true,
	//
	slidesOffsetBefore: 0,
	//
	grabCursor: true,
})
// Função para carregar os estados na seleção
function carregarEstados() {
	const estadosSelect = document.getElementById("inputEstado")
	if (!estadosSelect) return // Verificação para não executar se o elemento não existir

	fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados") // URL da API de estados do IBGE
		.then((response) => response.json())
		.then((data) => {
			data.forEach((estado) => {
				const option = document.createElement("option")
				option.value = estado.sigla
				option.text = estado.nome
				estadosSelect.appendChild(option)
			})
		})
}

// Função para carregar as cidades de um estado selecionado
function carregarCidades(estadoSelecionado) {
	const cidadesSelect = document.getElementById("inputCidade")
	if (!cidadesSelect) return // Verificação para não executar se o elemento não existir

	fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoSelecionado}/municipios`) // URL da API de cidades do IBGE
		.then((response) => response.json())
		.then((data) => {
			cidadesSelect.innerHTML = '<option value="">Selecione a Cidade</option>' // Limpa as opções anteriores
			data.forEach((cidade) => {
				const option = document.createElement("option")
				option.value = cidade.id
				option.text = cidade.nome
				cidadesSelect.appendChild(option)
			})
		})
}

// Verificação antes de adicionar o event listener
const estadoSelectElement = document.getElementById("inputEstado")
if (estadoSelectElement) {
	estadoSelectElement.addEventListener("change", function () {
		const estadoSelecionado = this.value
		if (estadoSelecionado) {
			carregarCidades(estadoSelecionado)
		} else {
			const cidadesSelect = document.getElementById("inputCidade")
			if (cidadesSelect) {
				cidadesSelect.innerHTML = '<option value="">Selecione a Cidade</option>' // Limpa as opções de cidades se nenhum estado for selecionado
			}
		}
	})

	// Carregar os estados assim que a página for carregada
	carregarEstados()
}

$(document).ready(function () {
	// Função para ajustar a altura
	function adjustHeader() {
		if ($(window).width() <= 480) {
			// Checa se a largura da tela é de 480px ou menos
			$(".navbar-collapse")
				.on("show.bs.collapse", function () {
					$(".header").css("height", "100vh") // Define a altura do .header para 100vh
					$(".header nav").css("height", "100%") // Define a altura da navbar para 100%
				})
				.on("hide.bs.collapse", function () {
					$(".header").css("height", "auto") // Retorna para altura automática quando o menu é fechado
					$(".header nav").css("height", "auto")
				})
		}
	}

	// Chama a função ao carregar a página
	adjustHeader()

	// Garante que a função seja chamada ao redimensionar a janela
	$(window).resize(function () {
		adjustHeader()
	})
})

// Seleciona todos os elementos <ul> com a classe 'cases_card-category'
const lists = document.querySelectorAll("ul.cases_card-category")

// Itera sobre cada <ul>
lists.forEach((list) => {
	// Verifica se há mais de um <li> dentro do <ul>
	if (list.children.length > 1) {
		// Itera sobre todos os <li> dentro do <ul>, começando do segundo
		for (let i = 1; i < list.children.length; i++) {
			// Adiciona a classe 'divider' ao <li>
			list.children[i].classList.add("divider-case")
		}
	}
})
