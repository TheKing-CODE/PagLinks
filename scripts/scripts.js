$(function(){

    var CriarNvPag = $('#criarPag');
    var Principal = $('#principal-1');
    var FundoForm = $('#fundo-form');
    var Form = $('#form');
    var Funcionamento = $('#funcionamento');
    var ComoFunciona = $('#ComoFunciona');
    var QntClick = 1;
    
    CriarNvPag.click(function(){
      Principal.css('pointer-events','none').css('position','fixed').css('opacity','0.1').css('z-index','1').css('width','100%');
      FundoForm.css('display','block');
      $('#funcionamento').css('display','none');      
    })

    ComoFunciona.click(function(){ 
      if(QntClick % 2 !== 0) {
        $('#funcionamento').css('display','grid');
        Principal.css('width','50%');
        QntClick+=1;
      }else {
        $('#funcionamento').css('display','none');
        Principal.css('width','100%');
        QntClick+=1;
      }
    })
    
})
    
    $('#limpaForm').click(function(){
        limparFormulario();
    })


    
    function limparFormulario() {
      // Seleciona o formulário pelo ID
      const formulario = document.getElementById('formulario');
    
      // Obtém todos os elementos input e textarea dentro do formulário
      const elementos = formulario.querySelectorAll('input, textarea');
    
      // Limpa o valor de cada elemento encontrado
      elementos.forEach(elemento => {
        if (elemento.type === 'checkbox' || elemento.type === 'radio') {
          elemento.checked = false; // Limpa checkboxes e radios
        } else {
          if(elemento.type != 'submit'){
            elemento.value = ''; // Limpa textos, números, email, textarea, etc.
          }  
          
        }
      });
    }
