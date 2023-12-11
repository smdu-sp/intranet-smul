function getItensLocalStorege() {
  var tamanhoFonteAtual = localStorage.getItem("tamnho_fonte");
  document.documentElement.style.fontSize = tamanhoFonteAtual;
  if (localStorage.getItem("altoContraste") === "true") {
    setTimeout(altoContraste, 1);
  }
}
getItensLocalStorege();

function tamanhoFonte(valor) {
  const elemRoot = document.documentElement;
  const estiloComputado = window.getComputedStyle(elemRoot);
  const tamanhoFonteRoot = estiloComputado.fontSize;
  const tamanhoFonteMin = 5;
  const tamanhoFonteMax = 20;
  let tamanhoFonteAtual = parseFloat(tamanhoFonteRoot);

  // Cancela a operação caso tamanhoFonte não seja definido em px
  if (!tamanhoFonteRoot.includes("px")) {
    return;
  }

  if (
    (valor > 0 && tamanhoFonteAtual < tamanhoFonteMax) ||
    (valor < 0 && tamanhoFonteAtual > tamanhoFonteMin)
  ) {
    tamanhoFonteAtual += valor;
  }
  localStorage.setItem("tamnho_fonte", tamanhoFonteAtual + "px");
  return (elemRoot.style.fontSize = tamanhoFonteAtual + "px");
}

function scrolldiv(div) {
  const elem = document.getElementById(div);
  elem.scrollIntoView({
    behavior: "smooth",
  });
}

// Função alto contraste
function altoContraste() {
  var contraste = document.body.classList.toggle("alto_contraste_teste");
  return localStorage.setItem("altoContraste", contraste);
}
