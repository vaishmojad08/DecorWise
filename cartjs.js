window.onscroll = function() {scrollFunction();
    scrollFunctionBottom();};

function scrollFunction() {
  if (document.body.scrollTop > 160 || document.documentElement.scrollTop > 160) {
    document.getElementById("header12").style.paddingTop = "10px";
    document.getElementById("header12").style.minHeight = "50px";
    
  } else {
    document.getElementById("header12").style.paddingTop = "30px";
    document.getElementById("header12").style.minHeight = "70px";
  }
}


function scrollFunctionBottom() {
    var body = document.body,
    html = document.documentElement;

var height = Math.max( body.scrollHeight, body.offsetHeight, 
                       html.clientHeight, html.scrollHeight, html.offsetHeight );
                       console.log(height);

    if (document.body.scrollTop > height-800 || document.documentElement.scrollTop > height-800 ) {
      document.getElementById("footer12").style.padding = "30px";
      
    } else {
      document.getElementById("footer12").style.padding = "10px";
    }
  }

let carts = document.querySelectorAll('.shop-item-button');

let products = [
    {
        name: 'Wakefir King',
        tag: 'bed',
        price: 45000,
        incart: 0
    },
    {
        name: 'Simple King',
        tag: 'Kingbed',
        price: 35000,
        incart: 0
    },
    {
        name: 'Modern King',
        tag: 'King2bed',
        price: 50000,
        incart: 0
    },
    {
        name: 'Classic King',
        tag: 'King3bed',
        price: 55000,
        incart: 0
    },
    {
        name: 'Sleepyhead Queen',
        tag: 'queenbed',
        price: 25000,
        incart: 0
    },
    {
        name: 'Simple Queen',
        tag: 'queen2',
        price: 15000,
        incart: 0
    },
    {
        name: 'Modern Queen',
        tag: 'queen3',
        price: 25000,
        incart: 0
    },
    {
        name: 'Pine Wood',
        tag: 'pinewood',
        price: 17000,
        incart: 0
    },
    {
        name: 'Oak Wood',
        tag: 'oakwood',
        price: 20000,
        incart: 0
    },
    {
        name: 'Ply Wood',
        tag: 'plywood',
        price: 20000,
        incart: 0
    },
    {
        name: 'Single Sofa',
        tag: 'singlesofa',
        price: 27000,
        incart: 0
    },
    {
        name: 'Sofa set',
        tag: 'sofaset',
        price: 40000,
        incart: 0
    },
    {
        name: 'L Shape Sofa',
        tag: 'lshape',
        price: 35000,
        incart: 0
    },
    {
        name: 'Sofa cum Bed',
        tag: 'sofacumbed',
        price: 20000,
        incart: 0
    },
    {
        name: 'Recliner',
        tag: 'recliner',
        price: 1000,
        incart: 0
    },
    {
        name: 'Small Dining Table',
        tag: 'diningtable',
        price: 27000,
        incart: 0
    },
    {
        name: 'Medium Dining Table',
        tag: 'mediiumtable',
        price: 30000,
        incart: 0
    },
    {
        name: 'Big Dining Table',
        tag: 'bigtable',
        price: 35000,
        incart: 0
    },
    {
        name: 'Small Fridge',
        tag: 'smallfridge',
        price: 27000,
        incart: 0
    },
    {
        name: 'Medium Fridge',
        tag: 'mediumfridge',
        price: 40000,
        incart: 0
    },
    {
        name: 'Large Fridge',
        tag: 'largefridge',
        price: 65000,
        incart: 0
    },
    {
        name: 'Smart Led Tv',
        tag: 'smartled',
        price: 37000,
        incart: 0
    },
    {
        name: 'Smart Android 4k Tv',
        tag: '4kled',
        price: 50000,
        incart: 0
    },
    {
        name: 'Smart OLED Tv',
        tag: 'oledtv',
        price: 75000,
        incart: 0
    },
]

for(let i=0; i<carts.length;i++){
    console.log('a');
    carts[i].addEventListener('click', () => {
        console.log("Added to cart.")
        cartNumbers(products[i]);
        totalCost(products[i]);
    })
}

function onLoadCartNo(){
    let productNumbers = localStorage.getItem('cartNumbers');
    if(productNumbers){
        document.querySelector('.cartcount').textContent = productNumbers ;
    }
}

function cartNumbers(product){
    
    console.log("Clicked is ", product);
    let productNumbers = localStorage.getItem('cartNumbers');

    productNumbers = parseInt(productNumbers);

    if(productNumbers){
        localStorage.setItem('cartNumbers',productNumbers+1);
        document.querySelector('.cartcount').textContent = productNumbers +1;
        console.log("A"+productNumbers + 1);
    }
    else{
        localStorage.setItem('cartNumbers',1);
        document.querySelector('.cartcount').textContent = 1 ;
        console.log("A"+1);
    }

    setItems(product)
}

function setItems(product){
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);
    console.log("My cart items are ",cartItems);

    if(cartItems != null){
        if(cartItems[product.tag] == undefined){
            cartItems = {
                ...cartItems,
                [product.tag]: product
            }
        }
        cartItems[product.tag].incart +=1 ;
    }else{
        product.incart =1;
        cartItems = {
            [product.tag]: product
        }
    }
    
    
    localStorage.setItem("productsInCart", JSON.stringify(cartItems));
}

function totalCost(product) {
    console.log("The product price is ", product.price);

    let cartCost = localStorage.getItem('totalCost');
    

    if(cartCost!=null){
        cartCost = parseInt(cartCost);
        localStorage.setItem("totalCost", cartCost+product.price);
    }else{
        localStorage.setItem("totalCost", product.price);
    }
    
}

function displayCart(){
    let cartItems = localStorage.getItem("productsInCart");
    cartItems = JSON.parse(cartItems);
    console.log(cartItems);
    let productsContainer = document.querySelector(".product-container");
    if(cartItems && productsContainer){
        productsContainer.innerHTML = `
        <div class="product-header">
        <div class="product-image">
        
            </div>
                <h5 class="product-title">PRODUCT</h5>
                <h5 class="price">PRICE</h5>
                <h5 class="quantity">QUANTITY</h5>
                <h5 class="total">TOTAL</h5>
            </div>
        `;
        Object.values(cartItems).map(item =>{
            console.log(item.name);
            productsContainer.innerHTML += `
            <div class="product-list">
            <div class="product-image">
            <img src="./Furniture/${item.tag}.jpg">
            </div>
            <div class="product-title product-title-products">
                <span>${item.name}</span>
            </div>
            <div class="price">Rs.${item.price}</div>
            <div class="quantity">${item.incart}
            <button class="button_1" style="margin-left: 14px; padding:7px;" onclick="removeItem('${item.tag}')">Remove</button>
            </div>
            <div class="total">Rs.${item.incart * item.price}</div>
            </div>
            `
        })
        if(localStorage.getItem("cartNumbers")==0)
        {
            productsContainer.innerHTML +=`<br><br><br>
            Cart is empty!
            `
        }
        else{
        productsContainer.innerHTML += `<br><br>
        <div class="basketTotal">
        <h4>Basket Total: Rs.${localStorage.getItem('totalCost')}</h4>
        </div><BR><BR>
        <a class="button_1" style="text-decoration:none; padding-top:15px;" href="buy.html">Proceed</a>
        `}
    }
}

function removeItem(item){
    
    let cartItems = localStorage.getItem("productsInCart");
    cartItems = JSON.parse(cartItems);
    //console.log(cartItems[item]);
    let cartCount = localStorage.getItem('cartNumbers');
    cartCount = parseInt(cartCount);
    let total = localStorage.getItem('totalCost');
    total = parseInt(total);
    
    localStorage.setItem("cartNumbers", cartCount - cartItems[item].incart);
    localStorage.setItem("totalCost", total - (cartItems[item].price*cartItems[item].incart));
    delete cartItems[item];
    localStorage.setItem("productsInCart", JSON.stringify(cartItems));
    onLoadCartNo();
    displayCart();
}

function clearCart(){
    console.log("Clearing");

    let cartItems = localStorage.getItem("productsInCart");
    cartItems = JSON.parse(cartItems);
    
    localStorage.setItem("cartNumbers", 0);
    localStorage.setItem("totalCost", 0);
    cartItems={};
    localStorage.setItem("productsInCart", JSON.stringify(cartItems));

    displayCart();
    onLoadCartNo();
}

onLoadCartNo();
displayCart();


localStorage.setItem('Hello',"a");