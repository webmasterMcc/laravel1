class botonReturn {
    constructor(boton) {
        this.boton = boton;
        // this.boton.addEventListener('click', this.retornarPagina.bind(this));
    }

     retornarPagina = function () {
       return  window.history.back();
    }
}




const btnReturn = new botonReturn("#btnReturn");

const btnRetorno = document.querySelector(btnReturn.boton);


btnRetorno.addEventListener('click', (e) => {
    // window.history.back();
    // console.log(e)
    btnReturn.retornarPagina();
});