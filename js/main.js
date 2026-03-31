let lookDirection
let position
let goal = {x: 0, y:0}

let products
// let productSearch

window.addEventListener('load', init)

function init(){
    fetchStuff('http://cle3-app.test/webservice/',loadProducts)
    products = document.getElementById('products')
    products.addEventListener('click', productClickHandler)

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


function productClickHandler(e){
    if(e.target.nodeName !=='BUTTON'){
        return;
    }
    if (e.target.id === 'details'){
        fetchStuff(`http://cle3-app.test/webservice/?id=${e.target.dataset.id}`, loadDetails)
    }
    if (e.target.id === 'goal'){
        goal = [e.target.dataset.x,e.target.dataset.y]
        //turn the cpx locator on
    }
}
function loadProducts(data){
    //fill the products
}
function loadDetails(product){
    //details pop-up
    //open the map
    //show location on map
}

//if the user hits an intersection
function showNewDirection(){
    //first go up||down


}

