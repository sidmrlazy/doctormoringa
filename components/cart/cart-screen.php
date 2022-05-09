<div class="container-fluid mt-5 cart-section">
    <div class="cart-heading-section">
        <p>There are total 3 products in your cart</p>
        <button type="button" class="cart-remove-btn">
            <ion-icon name="trash-outline"></ion-icon>
            <p>Clear Cart</p>
        </button>
    </div>

    <form class="main-cart">
        <div class="cart-product-img">
            <img src="assets/images/background/moringa-leaves.jpg" alt="">
        </div>
        <div class="cart-product-details">
            <h3>Product Category</h3>
            <h1>Product Name</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed ligula ut diam tincidunt
                ullamcorper
                ut at magna. Sed fermentum in est in elementum. </p>
        </div>

        <div class="cart-calculator">
            <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">
                <ion-icon name="remove-circle-outline" class="chevron-up-outline"></ion-icon>
            </div>
            <input type="number" id="number" value="0" />
            <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">
                <ion-icon name="add-circle-outline" class="chevron-down-outline"></ion-icon>
            </div>
        </div>

        <div class="cart-product-price">
            <p>₹200</p>
        </div>
    </form>
</div>