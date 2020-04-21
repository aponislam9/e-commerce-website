
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

window.onload = function() {
    DOM_products_contaner = document.getElementById("products-container")

    for (let i in product_list) {
        var product = product_list[i]
        this.console.log(product)

        // Create the product card container with column formatting
        new_product_container = this.document.createElement("div")
        new_product_container.classList.add("col-lg-6")
        new_product_container.classList.add("col-md-6")
        new_product_container.classList.add("col-sm-6")
        new_product_container.classList.add("col-6")

        // new_product_container.classList.add("mb-6")
        new_product_container.classList.add("product-card")

        // Create the product card
        new_product_card = this.document.createElement("div")
        new_product_card.classList.add("card")
        new_product_card.classList.add("h-100")

        // Create the image container for this product
        image_container = this.document.createElement("a")
        image_container.classList.add("image-container")
        img = this.document.createElement("img")
        img.classList.add("card-img-top")
        img.src = product.src;
        img.alt = product.alt;

        // Card body
        card_body = this.document.createElement("div")
        card_body.classList.add("card-body")

        // Card title
        card_title = this.document.createElement("h4");
        card_title.classList.add("card-title");

        // Product title clickable a
        card_title_a = this.document.createElement("a")
        card_title_a.classList.add("product-title")
        card_title_a.innerHTML = product.name
        card_title_a.href = "product-page.html";
        card_title_a.onclick=function(e){
            // console.log(e.toElement.text)
            var product = e.toElement.text;
            passValue(product)
        }
        


        // Price
        card_cost = this.document.createElement("h5")
        card_cost.classList.add("card-cost")
        card_cost.innerHTML = product.price

        // Card text
        card_text = this.document.createElement("p");
        card_text.classList.add("card-text")
        card_text.innerHTML = product.description


        // Add everything together
        image_container.appendChild(img)
        card_title.appendChild(card_title_a)

        card_body.appendChild(card_title)
        card_body.appendChild(card_cost)
        card_body.appendChild(card_text)
        new_product_card.appendChild(image_container)
        new_product_card.appendChild(card_body)
        new_product_container.appendChild(new_product_card)

        // Now add it to the DOM
        DOM_products_contaner.appendChild(new_product_container)
    }

function passValue(product){
    localStorage.setItem("textvalue",product);
    return false;
    // console.log(product)
}

}
