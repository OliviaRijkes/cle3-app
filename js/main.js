let lookDirection
let position
let goal = {x: 0, y: 0}

let products;

let body;
let detailModal;
let detailContent;
// let productSearch

window.addEventListener('load', init)

function init() {
    fetchStuff('https://cle3-app.test/webservice/', loadProducts);

    body = document.querySelector('body');
    detailModal = document.querySelector('#product-detail');
    detailContent = document.querySelector('.modal-content');

    products = document.querySelector('#product-list');
    products.addEventListener('click', productClickHandler);

    detailModal.addEventListener('click', dialogClickHandler);
    detailModal.addEventListener('close', dialogCloseHandler);


}

function fetchStuff(url, callback) {
    fetch(url)
        .then((response) => {
            if (!response.ok) {
                throw new Error(response.statusText);
            }
            return response.json();
        })
        .then(callback)
        .catch(fetchErrorHandler);
}

function fetchErrorHandler(data) {
    console.error(data);
}


function productClickHandler(e) {
    if (e.target.nodeName !== 'BUTTON') {
        return;
    }
    if (e.target.id === 'info') {
        // console.log(e.target.dataset.id)
        // console.log(`https://cle3-app.test/webservice/?id=${e.target.dataset.id}`)
        fetchStuff(`https://cle3-app.test/webservice/?id=${e.target.dataset.id}`, loadDetails)
    }
    if (e.target.id === 'goal') {
        goal = [e.target.dataset.x, e.target.dataset.y]
        //turn the cpx locator on
    }
}

function loadProducts(data) {
    for (const product of data) {
        console.log(product)

        //fill the products
        const article = document.createElement('article')
        const productImage = document.createElement('div')
        const namePrice = document.createElement('div')
        const infoRoute = document.createElement('div')
        productImage.id = "product-image"
        namePrice.id = "name-price"
        infoRoute.id = "info-route"
        const img = document.createElement('img')
        const name = document.createElement('h2')
        const price = document.createElement('strong')
        const info = document.createElement('button')
        const route = document.createElement('button')
        info.id = "info"
        info.textContent = "info"
        route.id = "route"
        route.textContent = "route"

        img.src = `images/${product.image}`
        name.textContent = product.name
        price.textContent = product.price
        route.dataset.category = product.category
        info.dataset.id = product.id
        info.dataset.name = product.name
        info.dataset.category = product.category

        products.appendChild(article)
        article.appendChild(productImage)
        article.appendChild(namePrice)
        article.appendChild(infoRoute)
        productImage.appendChild(img)
        namePrice.appendChild(name)
        namePrice.appendChild(price)
        infoRoute.appendChild(info)
        infoRoute.appendChild(route)
    }
}

function loadDetails(data) {
    //details pop-up
    //open the map
    //show location on map

    // console.log(data);


    const productName = data.name;
    // const productCategory = data.dataset.category;

    // const category = data.productCategory
    // if (category === "Pasta & Rijst") {
    //     playerCard.classList.add('');
    // } else if (category === "Snacks") {
    //     playerCard.classList.add('');
    // } else if (category === "Drinken") {
    //     playerCard.classList.add('')
    // } else if (category === "Vis & Kip") {
    //     playerCard.classList.add('')
    // } else if (category === "Fruit & Groente") {
    //     playerCard.classList.add('')
    // } else if (category === "Medicijnen") {
    //     playerCard.classList.add('')
    // } else if (category === "Melk & Yoghurt") {
    //     playerCard.classList.add('')
    // } else if (category === "Vlees") {
    //     playerCard.classList.add('')
    // } else if (category === "Ijs") {
    //     playerCard.classList.add('')

    detailContent.textContent = '';

    const title = document.createElement('h1');
    title.textContent = `${productName} Ingredienten:`
    detailContent.appendChild(title);

    const details = document.createElement('p');
    details.innerHTML = data.ingredients;
    detailContent.appendChild(details);

    if (data.stock > 0) {
        const stockProduct = document.createElement('p');
        stockProduct.innerHTML = `• ${data.stock} stuks op voorraad`
        detailContent.appendChild(stockProduct);
    } else {
        const nextDelivery = document.createElement('p');
        nextDelivery.innerHTML = ` • voorraad is momenteel leeg, het wordt bijgevuld op ${data.delivery}`
        detailContent.appendChild(nextDelivery);
    }

    detailModal.showModal();
    body.classList.add('dialog-open');
}

//if the user hits an intersection
function showNewDirection() {
    //first go up||down
}

function dialogClickHandler(e) {
    if (e.target.nodeName === 'DIALOG' || e.target.nodeName === 'BUTTON') {
        detailModal.close();
    }
}

function dialogCloseHandler(e) {
    body.classList.remove('dialog-open');
}
