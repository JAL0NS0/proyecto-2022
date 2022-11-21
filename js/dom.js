const DOM = function(){
    
    this.id = str=>document.getElementById(str);
    this.query= (regla_css,one=false)=> one===true ?
                                document.querySelector(regla_css):
                                document.querySelectorAll(regla_css);
    this.create = (str, props={}) =>{
        const etiqueta = document.createElement(str); 
        Object.assign(etiqueta,props);
        return etiqueta;
    }

    this.append = (hijos, padre=document.body) =>{
        if(hijos.length){
            for(let hijo of hijos) padre.appendChild(hijo);
        }else{
            padre.appendChild(hijos);
        }
    }
    this.remover = e => e.remove();

    this.alertar = (elemento)=>{         
        elemento.fadeTo(5000,500).slideUp(800, function(){
            elemento.slideUp(500);
        })
    }

    this.writeText = (elemento, string) => elemento.innerHTML = string;

}

const D = new DOM();
console.log(D);