
let parameters = []

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const recipeId = urlParams.get('recipeId')

function removeElement(event, position) {
    event.target.parentElement.parentElement.remove()
    return parameters[position]
}

const addJsonElement = json => {
    parameters.push(json)
    return parameters.lenght - 1
}

(function load() {
    const $form = document.getElementById("edit-form")
    const $listItems = document.getElementById("ingredientsListItems")
    const $addButton = document.getElementById("ingredient-add-in")
    const $saveButton = document.getElementById("save-button")

    const templateElement = (data, position) => {
        return(`
            <div class="ingredient-name">
                ${ingredient}
            </div>
            <div class="ingredient-quantity">
                ${quantity}
            </div>
            <div class="ingredient-unit">
                ${unit}
            </div>
            <button type="button" class="relative remove-ingredient mmbr-color-hvr" onclick="removeElement(event, ${position})">
                <i class="mmbr-center fas fa-backspace fa-lg" style="color:var(--mmbr-dark-2)"></i>,
            </button>
        `)
    }



    $addButton.addEventListener("click", (event) => {
        if($form.ingredientIn.value != "") {
            let index = addJsonElement({
                ingredient: $form.ingredientIn.value,
                quantity: $form.quantityIn.value,
                unit: $form.unitIn.value
            })
            const $listItem = document.createElement("div")
            $listItem.classList.add("ingredientsListItem")
            $listItem.innerHTML = templateElement(`${ingredient=$form.ingredientIn.value} ${quantity=$form.quantityIn.value} ${unit=$form.unitIn.value}`, index)
            $listItems.insertBefore($listItem, $listItems.firstChild)

            $form.ingredientIn.value=""
            $form.quantityIn.value=""
            $form.unitIn.value=""

        } else {
            alert('El campo "ingrediente" no puede quedar vacío')
        }
        
    })

    $saveButton.addEventListener("click", (event) => {

        if(parameters != null) {
            parameters = parameters.filter(el => el != null)
            parameters = `${JSON.stringify(parameters)}`
            
            parameters = []
        } else {
            alert("¡No has especificado ningún ingrediente!, si no especificas los ingredientes, la gente jamás podrá encontrar tu receta")
        }
        
    })
})()