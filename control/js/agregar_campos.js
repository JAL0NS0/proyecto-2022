
function agregar($listado,$descripciones,$costos){
    var numero = 1;
    const div_mayor = D.create('div',{className:'datos_opcion d-flex'});
    const div_valor = D.create('div',{className:'mb-3 form-floating opcion'});
    const div_costo = D.create('div',{className:'mb-3 form-floating precio'});
    const label_valor = D.create('label',{innerHTML:'Opcion', for:"nombre_campo"+numero});
    const input_valor = D.create('input',{type:'text',className:'form-control', name:$descripciones+'[]', autocomplete:'off', placeholder:'Nombre del campo', id:"nombre_campo"+numero});

    const label_costo = D.create('label',{innerHTML:'Costo', for:"valor_campo"+numero});
    const input_costo = D.create('input',{ type:'number',step:'0.01', min:'0',className:'form-control' , name:$costos+'[]', autocomplete:'off', placeholder:'Valor del campo', id:"valor_campo"+numero});

    const div_eliminar = D.create('div', {className: 'borrar mb-3'});
    const eliminar = D.create('a', {className:'btn btn-danger', href: 'javascript:void(0)', innerHTML:'X', onclick: function(){ D.remover(div_mayor)}})

    D.append([input_valor,label_valor],div_valor);
    D.append([input_costo,label_costo],div_costo);
    D.append(eliminar, div_eliminar);
    D.append([div_valor,div_costo, div_eliminar],div_mayor);
    D.append(div_mayor, D.id($listado))

    numero = numero+1;
    console.log(div_mayor);
}

function showForm(){
    getSelectValue = document.getElementById("tipo_input").value;
    

    if(getSelectValue == '0'){
        D.id("formulario_texto").style.display = 'none';
        D.id("formulario_selector").style.display = 'none';
        D.id("nombre_caracteristica").setAttribute('form', '')
    }

    if(getSelectValue == "1"){
        D.id("formulario_texto").style.display = 'none';
        D.id("formulario_selector").style.display = 'contents';
        D.id("nombre_caracteristica").setAttribute('form', 'selector_form')
        D.id("guardar").setAttribute('form', 'selector_form')
    }

    if(getSelectValue == "2"){
        D.id("formulario_selector").style.display = "none";
        D.id("formulario_texto").style.display = 'contents';
        D.id("nombre_caracteristica").setAttribute('form','texto_form')
        D.id("guardar").setAttribute('form', 'texto_form')

    }

}

function borrarInput($id){
    D.id($id).parentNode.removeChild(D.id($id));
}



