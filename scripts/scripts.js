$(function(){

    var CriarNvPag = $('#criarPag');
    var Principal = $('#principal-1');
    var FundoForm = $('#fundo-form');
    var Form =$('#form');
    
    CriarNvPag.click(function(){
    Principal.css('pointer-events','none').css('position','fixed').css('opacity','0.1').css('z-index','1');
    FundoForm.css('display','block');
    })
    
    FundoForm.click(function(){
    /* FundoForm.css('display','none');*/
    })
    })
    
    
    function limparFormulario() {
      // Seleciona o formulário pelo ID
      const formulario = document.getElementById('meuFormulario');
    
      // Obtém todos os elementos input e textarea dentro do formulário
      const elementos = formulario.querySelectorAll('input, textarea');
    
      // Limpa o valor de cada elemento encontrado
      elementos.forEach(elemento => {
        if (elemento.type === 'checkbox' || elemento.type === 'radio') {
          elemento.checked = false; // Limpa checkboxes e radios
        } else {
          elemento.value = ''; // Limpa textos, números, email, textarea, etc.
        }
      });
    }