window.addEventListener('load', init);

let body;
let detailModal;
let detailContent;

/**
 * Initialize after the DOM is ready
 */
function init() {

    body = document.querySelector('body');
    detailModal = document.querySelector('#product-detail');
    detailContent = document.querySelector('.modal-content')
    detailModal.addEventListener('click', detailModalClickHandeler);
    detailModal.addEventListener('close', dialogCloseHandler);
}


function showProductDetails(button) {

    const productImage = button.dataset.productImage;


    fetch(``)
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error (${response}): ${response.statusText}`);
            }
            return response.json();
        })
        .then(() => {

            detailContent.textContent = '';

            detailModal.showModal();
            body.classList.add('dialog-open');
        })
        .catch(ajaxErrorHandler);
}


function detailModalClickHandeler(e) {
    if (e.target.nodeName === 'DIALOG' || e.target.nodeName === 'BUTTON') {
        detailModal.close();
    }

}

function dialogCloseHandler(e) {
    body.classList.remove('dialog-open');
}

// function ajaxErrorHandler {
//
// }