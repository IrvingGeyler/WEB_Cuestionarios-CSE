let DatosPregunta = document.getElementById('apartado_datos');
let tipoPregunta = document.getElementById("tipo_pregunta"); //tipo pregunta


/**
 * Comprobar el tipo de pregunta que necesita
 */
const accionTipo = (e) => {
	eliminarDivDatos();
	switch (e.target.value) {
		case '-1':
			console.log("Datos limpiados");
			break;
		case '0':
			crearPreguntaCorto();
			break;
		case '1':
			crearPreguntaL();
			break;
		case '2':
			crearPreguntaLineal()
			break;
	}
}

/**
* Funcion para eliminar la seccion de datos
*/
function eliminarDivDatos() {
	if (document.getElementById("datos") != null) {
		let div = document.getElementById("datos");
		div.remove();
	}
}

/**
 * Funcion para crear una pregunta de respuesta corta
 */
function crearPreguntaCorto() {
	//Creacion de elementos
	let divContenido = document.createElement("div");
	let divPregunta = document.createElement("div");
	let divReque = document.createElement("div");

	let frase = document.createElement("p");
	let etiquetaReque = document.createElement("p");

	let inputPregunta = document.createElement("input");
	let requerido = document.createElement("input");

	//agregando atributos
	divContenido.setAttribute("id", "datos");
	divPregunta.setAttribute("class", "pregunta");
	divReque.setAttribute("class", "reque");

	frase.innerHTML = "Pregunta para respuesta corta";
	etiquetaReque.innerHTML = "Requerido";

	inputPregunta.setAttribute("type", "text")
	inputPregunta.setAttribute("name", "text_C")
	inputPregunta.setAttribute("id", "text_C")
	inputPregunta.required = true;

	requerido.setAttribute("type", "checkbox")
	requerido.setAttribute("name", "requerido")
	requerido.setAttribute("id", "requerido")
	requerido.setAttribute("value", '1');



	//uniendo
	divPregunta.appendChild(frase)
	divPregunta.appendChild(inputPregunta)

	divReque.appendChild(etiquetaReque)
	divReque.appendChild(requerido)

	divContenido.appendChild(divPregunta)
	divContenido.appendChild(divReque)

	DatosPregunta.appendChild(divContenido);
}


/**
 * Funcion para crear una pregunta de respuesta larga
 */
function crearPreguntaL() {
	//Creacion de elementos
	let divContenido = document.createElement("div");
	let divPregunta = document.createElement("div");
	let divReque = document.createElement("div");

	let frase = document.createElement("p");
	let etiquetaReque = document.createElement("p");

	let inputPregunta = document.createElement("input");
	let requerido = document.createElement("input");

	//agregando atributos
	divContenido.setAttribute("id", "datos");
	divPregunta.setAttribute("class", "pregunta");
	divReque.setAttribute("class", "reque");

	frase.innerHTML = "Pregunta para respuesta larga";
	etiquetaReque.innerHTML = "Requerido";

	inputPregunta.setAttribute("type", "text")
	inputPregunta.setAttribute("name", "text_L")
	inputPregunta.setAttribute("id", "text_L")
	inputPregunta.required = true;

	requerido.setAttribute("type", "checkbox")
	requerido.setAttribute("name", "requerido")
	requerido.setAttribute("id", "requerido")
	requerido.setAttribute("value", '1');


	//uniendo
	divPregunta.appendChild(frase)
	divPregunta.appendChild(inputPregunta)

	divReque.appendChild(etiquetaReque)
	divReque.appendChild(requerido)

	divContenido.appendChild(divPregunta)
	divContenido.appendChild(divReque)

	DatosPregunta.appendChild(divContenido);

}


/**
 * Funcion para crear una pregunta lineal
 */
function crearPreguntaLineal() {
	let valorFinal = 1;
	let valorFLimite = 10;

	//Creacion de elementos
	let divContenido = document.createElement("div");
	let divPregunta = document.createElement("div");
	let divValores = document.createElement("div");
	let divReque = document.createElement("div");


	let frase = document.createElement("p");
	let fraseValorI = document.createElement("p");
	let fraseValorF = document.createElement("p");
	let fraseReque = document.createElement("p");


	let inputPregunta = document.createElement("input");
	let etiquetaInicial = document.createElement("input");
	let etiquetaFinal = document.createElement("input");
	let requerido = document.createElement("input");

	let spanValorIni = document.createElement("span");
	let spanValorFin = document.createElement("span");

	let selectValorFinal = document.createElement("select");


	//agregando atributos
	divContenido.setAttribute("id", "datos");

	divPregunta.setAttribute("class", "pregunta");
	divReque.setAttribute("class", "reque");
	divValores.setAttribute("class","valores")

	//informacion a los p
	frase.innerHTML = "Pregunta";
	fraseReque.innerHTML = "Requerido";
	fraseValorI.innerHTML = "Valor inicial: 0";
	fraseValorF.innerHTML = "Valor final:"
	
	//atributos a los inputs
	inputPregunta.setAttribute("type", "text");
	inputPregunta.setAttribute("name", "descripcion");
	inputPregunta.setAttribute("id", "descripcion");
	inputPregunta.required = true;

	etiquetaInicial.setAttribute("type", "text");
	etiquetaInicial.setAttribute("name", "etiqueta_Inicial");
	etiquetaInicial.setAttribute("id", "etiqueta_Inicial");
	etiquetaInicial.setAttribute("placeholder","Etiqueta inicial opcional");

	etiquetaFinal.setAttribute("type", "text");
	etiquetaFinal.setAttribute("name", "etiqueta_Final");
	etiquetaFinal.setAttribute("id", "etiqueta_Final");
	etiquetaFinal.setAttribute("placeholder","Etiqueta final opcional");

	requerido.setAttribute("type", "checkbox");
	requerido.setAttribute("name", "requerido");
	requerido.setAttribute("id", "requerido");
	requerido.setAttribute("value", '1');

	//atributos de otros
	spanValorIni.setAttribute("id","Valor_incial");
	spanValorFin.setAttribute("id","Valor_final");

	selectValorFinal.setAttribute("id","valorFinal");
	selectValorFinal.setAttribute("name","valorFinal");
	selectValorFinal.required = true;

	var opcion;
	//agregando los valores al select
	for (valorFinal;valorFinal <= valorFLimite; valorFinal++) {
		opcion = document.createElement("option");
		opcion.setAttribute("value",valorFinal);
		opcion.innerHTML= valorFinal;
		selectValorFinal.appendChild(opcion);
	}

	//uniendo
	divPregunta.appendChild(frase);
	divPregunta.appendChild(inputPregunta);

	divReque.appendChild(fraseReque);
	divReque.appendChild(requerido);

	spanValorIni.appendChild(fraseValorI);
	spanValorIni.appendChild(etiquetaInicial);

	spanValorFin.appendChild(fraseValorF);
	spanValorFin.appendChild(selectValorFinal);
	spanValorFin.appendChild(etiquetaFinal);

	divValores.appendChild(spanValorIni);
	divValores.appendChild(spanValorFin);


	divContenido.appendChild(divPregunta);
	divContenido.appendChild(divValores);
	divContenido.appendChild(divReque);
	
	DatosPregunta.appendChild(divContenido);
}



//cuando se elige un tipo de pregunta
tipoPregunta.addEventListener("change", accionTipo);


/**
 * Si ya existe un dato previo
 */
if (tipoPregunta.value != -1) {
	switch (tipoPregunta.value) {
		case '0':
			crearPreguntaCorto();
			break;
		case '1':
			crearPreguntaL()
			break;
		case '2':
			crearPreguntaLineal()
			break;
	}
}
