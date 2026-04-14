let products;

let body;
let detailModal;
let detailContent;
let productSearch;

window.addEventListener('load', init)

function init() {
    fetchStuff('http://cle3-app.test/webservice/', loadProducts);

    body = document.querySelector('body');
    detailModal = document.querySelector('#product-detail');
    detailContent = document.querySelector('.modal-content');

    products = document.querySelector('#product-list');
    products.addEventListener('click', productClickHandler);

    detailModal.addEventListener('click', dialogClickHandler);
    detailModal.addEventListener('close', dialogCloseHandler);


    productSearch = document.querySelector('#first-name');
    productSearch.addEventListener('input', productFilter);

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
        fetchStuff(`http://cle3-app.test/webservice/?id=${e.target.dataset.id}`, loadDetails)
    }
    if (e.target.id === 'route') {
        //reading the category in the button to get the end coords using catGoal
        for (const cat of catGoal) {
            if (cat.name === e.target.dataset.category){
                loadRoute(cat.end)
                break;
            }
        }
    }
}

function loadProducts(data) {
    for (const product of data) {
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
        const size = document.createElement('p')
        const info = document.createElement('button')
        const route = document.createElement('button')
        info.id = "info"
        info.textContent = "Info"
        route.id = "route"
        route.textContent = "Route"
        article.classList.add('productArticle')

        img.src = `images/${product.image}`
        name.textContent = product.name
        size.textContent = product.size
        price.textContent = `€ ${product.price}`
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
        namePrice.appendChild(size)
        namePrice.appendChild(price)
        infoRoute.appendChild(info)
        infoRoute.appendChild(route)


    }
}

function productFilter() {

    let input, filter, productList, articleproductList, h2, i, txtValue;
    input = document.getElementById('first-name');
    filter = input.value.toUpperCase();
    productList = document.getElementById("product-list");
    articleproductList = productList.getElementsByTagName('article');

    const Message = document.querySelector('.empty-message');
    if (Message) {
        Message.remove();
    }
    let productCheck = 0;
    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < articleproductList.length; i++) {

        h2 = articleproductList[i].getElementsByTagName("h2")[0];
        txtValue = h2.textContent || h2.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            articleproductList[i].style.display = "";
            productCheck++;
        } else {
            articleproductList[i].style.display = "none";
        }
    }

    if (productCheck === 0) {
        const empty_input = document.createElement('p');
        empty_input.textContent = `Helaas zijn er geen artikelen gevonden`
        empty_input.classList.add('empty-message');
        productList.appendChild(empty_input);
    }
}

function loadDetails(data) {
    //details pop-up
    //open the map
    //show location on map

    // console.log(data);


    const productName = data.name;

    detailContent.textContent = '';

    const title = document.createElement('h1');
    title.textContent = `${productName} Ingredienten:`
    detailContent.appendChild(title);

    const details = document.createElement('p');
    details.innerHTML = data.ingredients;
    detailContent.appendChild(details);

    if (data.stock > 0) {
        const stockProduct = document.createElement('p');
        stockProduct.innerHTML = `${data.stock} stuks op voorraad`;
        stockProduct.classList.add('stock-button');
        detailContent.appendChild(stockProduct);
    } else {
        const nextDelivery = document.createElement('p');
        nextDelivery.innerHTML = ` Niet op voorraad. Leverbaar vanaf ${data.delivery}.`
        nextDelivery.classList.add('delivery-button');
        detailContent.appendChild(nextDelivery);

    }

    detailModal.showModal();
    body.classList.add('dialog-open');

}

//Loadroute uses the functions of route.js to calculate and draw the route.
//It uses the given end coords to calculate the route
function loadRoute(end) {
    //it should clear the route for a new one (it doesn't work and can't be fixed)
    console.clear()
    let routeElements = document.querySelectorAll('.xRoute, .yRoute')
    for (const routeElement of routeElements) {
        routeElement.remove()
    }
    console.log(routeElements)

    //calculate the route steps
    calcRoute({...end})
    map = document.getElementById('map')
    console.log(route)

    //draw every routeElement per step of one position to the next from the route array
    for (let i = 0; i < route.length-1; i++) {
        drawStep(route[i],route[i+1])

    }
}

function dialogClickHandler(e) {
    if (e.target.nodeName === 'DIALOG' || e.target.nodeName === 'BUTTON') {
        detailModal.close();
    }
}

function dialogCloseHandler(e) {
    body.classList.remove('dialog-open');
}
