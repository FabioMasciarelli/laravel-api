import "./bootstrap";
import "~resources/scss/app.scss";
import.meta.glob(["../img/**"]);
import * as bootstrap from "bootstrap";

const $one = document.querySelector.bind(document);
const $all = document.querySelectorAll.bind(document);


const openModalDelete = document.querySelector('.ms-openModalDelete');
const closeModalDelete = document.querySelector('.ms-closeModalDelete');

openModalDelete.addEventListener('click', function() {
    
    console.log('open modal');
    
    const modalDelete = $one('.ms-modal-delete');
    modalDelete.classList.remove('d-none');

});


closeModalDelete.addEventListener('click', function() {

    console.log('close modal');

    const modalDelete = $one('.ms-modal-delete');
    modalDelete.classList.add('d-none');
});




