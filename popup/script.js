var openModal = document.querySelector('.open_model');
var modal = document.querySelector('.model');
var iconClose = document.querySelector('.model_header i');
var closeModal = document.querySelector('.model_footer button');

function toggeModal() {
    modal.classList.toggle('hide')
}
openModal.addEventListener('click', toggeModal);
iconClose.addEventListener('click', toggeModal);
closeModal.addEventListener('click', toggeModal);
modal.addEventListener('click', function(e) {
    if(e.target == e.currentTarget) {
        toggeModal()    
    }
})
