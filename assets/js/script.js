const quantityInput = document.getElementById("quantity");
const decreaseQuantityButton = document.querySelector(".decrease-quantity");
const increaseQuantityButton = document.querySelector(".increase-quantity");

decreaseQuantityButton.addEventListener("click", () => {
    let quantity = parseInt(quantityInput.value);
    if (quantity > 1) {
        quantity--;
        quantityInput.value = quantity;
    }
});

increaseQuantityButton.addEventListener("click", () => {
    let quantity = parseInt(quantityInput.value);
    quantity++;
    quantityInput.value = quantity;
});
