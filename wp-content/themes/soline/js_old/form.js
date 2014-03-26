function vCnpjCpf(t){
  if(t.length < 14) return validaCPF(t.replace(/\D/g,""))
  else return validaCNPJ(t.replace(/\D/g,""))
}
function validaCNPJ(cnpj){
  var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
  digitos_iguais = 1;
  if (cnpj.length < 14 && cnpj.length < 15)
    return false;

  for (i = 0; i < cnpj.length - 1; i++){
    if (cnpj.charAt(i) != cnpj.charAt(i + 1)){
      digitos_iguais = 0;
      break;
    }
  }

  if (!digitos_iguais){
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
        pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
      return false;
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
        pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
      return false;
    return true;
  }else{
    return false;
  }
}

function validaCPF(cpf) {
    if (cpf.length < 11) return false
    var nonNumbers = /\D/
    if (nonNumbers.test(cpf))return false
    if (cpf == "00000000000" || cpf == "11111111111" ||
        cpf == "22222222222" || cpf == "33333333333" ||
        cpf == "44444444444" || cpf == "55555555555" ||
        cpf == "66666666666" || cpf == "77777777777" ||
        cpf == "88888888888" || cpf == "99999999999")
            return false
    var a = []
    var b = new Number
    var c = 11
    for (i=0; i<11; i++){
            a[i] = cpf.charAt(i)
            if (i < 9) b += (a[i] * --c)
    }
    if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
    b = 0
    c = 11
    for (y=0; y<10; y++) b += (a[y] * c--)
    if ((x = b % 11) < 2) { a[10] = 0 } else { a[10] = 11-x }
    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]))return false
    return true
}

function vCPF(t){
    try{
        if(t=="")return true
        return validaCPF(t.replace(/\D/g,""))
    }catch(e){alert(e)}
}

function vNumero(t){
    return t.replace(/\d*/,"")==""
}

function vObrigatorio(t){
    return t!=""
}

function vEmail(t){
    return t.replace(/^\w[\w\.\+-]+@\w[\w\.\+-]+\.\w\w+$/,"")==""
}

function vCEP(t){
    return t.replace(/^\d{5}-\d{3}$/,"")==""
}

function vConfirma(t,i){
    return i.value==i.form.elements[i.name+"2"].value
}

function vData(t){
    if(t=="")return true
    var dat=/^[0123]?\d\/[01]?\d\/\d{4}$/
    if(!dat.test(t))return false
    dat=t.split("/")
    var d=new Date()
    d.setFullYear(parseFloat(dat[2]))
    d.setMonth(parseFloat(dat[1])-1)
    d.setDate(parseFloat(dat[0]))
    return d.getMonth()==parseFloat(dat[1])-1
}

validadores={
    "vNumero":vNumero,
    "vEmail":vEmail,
    "vCPF":vCPF,
    "vCEP":vCEP,
    "vConfirma":vConfirma,
    "vData":vData,
    "vCnpjCpf":vCnpjCpf,
    "vObrigatorio":vObrigatorio
}

erros={
    "vNumero":"o campo permite apenas n�meros",
    "vEmail":"digite corretamente o e-mail",
    "vCEP":"digite corretamente o CEP",
    "vCPF":"n�mero de CPF inv�lido",
    "vCnpjCpf":"n�mero de CNPJ ou CPF inv�lido",
    "vConfirma":"digite corretamente a confirma��o",
    "vData":"digite corretamente a data",
    "vObrigatorio":"o campo precisa ser preenchido"
}

mascaras={
    "vMaskNumero":[ [/\D/g,""]                                        , false      ],
    "vMaskCPF":   [ [/^(\d{3})(\d{3})(\d{3})(\d{2})$/,"$1.$2.$3-$4"]  , [/\D/g,""] ],
    "vMaskData":  [ [/^(\d{2})(\d{2})(\d{4})$/,"$1/$2/$3"]            , [/\D/g,""] ],
    "vMaskCEP":   [ [/^(\d{5})(\d{3})$/,"$1-$2"]                      , [/\D/g,""] ]
}

function showErros(er){
    var txterr="Por favor, corrija os seguintes erros:\n"
    for(var i=0;i<er.length;i++){
        txterr+=" * "+er[i][0].parentNode.innerHTML.replace(/<[^>]*>| *: */g,"")+": "+er[i][1]+"\n"
        er[i][0].parentNode.className+=" vErro"
    }
    alert(txterr)
}

function validaForm(){
    this.ferros=[]
    $(this).find("label:visible")
      .removeClass("vErro")
      .each(function(){
        var vals=this.className.split(" ")
        for(var i=0;i<vals.length;i++)
            try{
                var fn=validadores[vals[i]]
                var inp=$(this).find("input")[0]
                if(!fn(inp.value,inp)){
                    $(this).parents("form")[0].ferros.push([inp,erros[vals[i]]])
                }
            }catch(e){}
      })
    if(this.validation){
        var nerros=this.validation()
        for(var i=0; i<nerros.length; i++)
          this.ferros.push(nerros[i])
    }
    if(this.ferros.length>0){
        showErros(this.ferros)
        return false
    }
}

function mascarar(inp,n){
  var lbl=inp.parentNode
  var vals=lbl.className.split(" ")
  for(var j=0;j<vals.length;j++){
    try{
        var fn=mascaras[vals[j]]
        inp.value=inp.value.replace(fn[n][0],fn[n][1])
    }catch(e){}
  }
}

$(function(){
  $("form.vForm")
    .submit(validaForm)
    .find("label input")
      .blur(function(){mascarar(this,0)})
      .focus(function(){mascarar(this,1)})
})

