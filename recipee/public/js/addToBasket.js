
let currentBasket = []

// var oldparams = JSON.parse(oldparams);


// const queryString = window.location.search;
// const urlParams = new URLSearchParams(queryString);
// const recipeId = urlParams.get('recipeId')

function removeElement(event, position) {
    // alert(event.target.parentElement.parentElement)
    event.target.parentElement.parentElement.remove()
    delete currentBasket[position]
    
    currentBasket = currentBasket.filter(el => el != null)

    if(currentBasket == null) {
        $basket.classList.add("hidden")
    }

    return currentBasket[position]

}

const addJsonElement = json => {
    currentBasket.push(json)
    return currentBasket.lenght - 1
}

(function load() {


    // document.getElementById('ingredientsListItems').forEach(basketItem => {
    //     let index = addJsonElement({
    //         ingredient: this.getElementById('ingredient-name').innerHTML,
    //         quantity: this.getElementById('ingredient-quantity').innerHTML,
    //         unit: this.getElementById('ingredient-unit').innerHTML
    //     })
    // });


    const $form = document.getElementById("basket-form")
    const $basket = document.getElementById("basket")
    const $addButton = document.getElementById("addingbutton")

    const templateElement = (data, position) => {
        return(`
            <div class="basket-ingredient">
                ${ingredient}
            </div>
            
            <button type="button" class="relative remove-basket-item mmbr-color-hvr" onclick="removeElement(event, ${position})">
                <i class="mmbr-center mmbr-color-hvr fas fa-backspace" style="color:#5b5761;"></i>
            </button>
        `)


        
    }

    let pos = 0

    $addButton.addEventListener("click", (event) => {
        if($form.searchingredients.value != "") {
            let index = addJsonElement({
                ingredient: $form.searchingredients.value
            })

            const $basketItem = document.createElement("div")
            $basketItem.classList.add("basketItem")
            $basketItem.innerHTML = templateElement(`${ingredient=$form.searchingredients.value}`, pos)
            $basket.insertBefore($basketItem, $basket.firstChild)

            $basket.classList.remove("hidden")

            pos++

            $form.searchingredients.value=""


            jbasket = JSON.stringify(currentBasket)

        } else {
            alert('¡No ingresó ningún ingrediente!')
        }

    })

    // $saveButton.addEventListener("click", (event) => {

    //     if(currentBasket) {
    //         currentBasket = currentBasket.filter(el => el != null)
    //         $form.jsonlist.value=`${JSON.stringify(currentBasket)}`
    //         currentBasket =[]
    //     }
        
    // })
})()