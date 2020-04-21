product_list = [
    {
        name: "Amalgam Fleece+Snyth",
        price: "$224.99",
        description: "An amalgamation of different materials stiched together to form the pertect hoodie.",
        src: "assets/Product-1-v0.jpg",
        image_href: "#",
        alt: ""
    },
    {
        name: "Retro Walkers",
        price: "$112.99",
        description: "Comfortable yet stylish sneakers that take inspiration from the NES generation.",
        src: "assets/Product-2-v0.jpg",
        image_href: "#",
        alt: ""
    },
    {
        name: "Deathlyhallow #3",
        price: "$89.99",
        description: "Cargo camo jogger for a all occasions, like a nice walk in the park or executing a stealth operation.",
        src: "assets/Product-3-v0.jpg",
        image_href: "#",
        alt: ""
    },
    {
        name: "Featuring Teddy Roosevelt",
        price: "$24.99",
        description: "This hat has been constructed from recycled materials sourced from US national parks.",
        src: "assets/Product-4-v0.jpg",
        image_href: "#",
        alt: ""
    },
    {
        name: "Graphic Design Is My Passion",
        price: "$74.99",
        description: "If you love graphic design then this is the shoe for you. It may look an Adidas shoe, but I promise you it's not :)",
        src: "assets/Product-5-v0.jpg",
        image_href: "#",
        alt: ""
    },
    {
        name: "P.A.N.T.S.",
        price: "$89.99",
        description: "Plants, Animals and Nature are Transcendent Soldiers. What does that mean? Thats for us to know and you to find out!",
        src: "assets/Product-6-v0.png",
        image_href: "#",
        alt: ""
    },
]

//Retrives local storage
var product = localStorage.getItem("textvalue")




var name = ""
var price = ""
var description = ""
var src = ""

window.onload = function() {
    updateVariables();
    // logInfo();
    updatePage();


  };


function updateVariables(){
//intializes the information
    for(var i=0;i<product_list.length; i++) {

        if (product === product_list[i].name){
            this.name = product_list[i].name;
            this.price = product_list[i].price;
            this.description = product_list[i].description;
            this.src = product_list[i].src;
        }
    }
}


function logInfo(){
    console.log(this.name)
    console.log(this.price)
    console.log(this.description)
}

function updatePage(){
    var name = document.getElementById("name");
    var description = document.getElementById("description");
    var price = document.getElementById("price");
    var img = document.getElementById("img")

    
    name.textContent = this.name;
    description.textContent = this.description;
    price.textContent = this.price;
    img.src = this.src


}



