<div class="container-fluid mt-5 cart-section">
    <div class="cart-heading-section">
        <p>There are total 3 products in your cart</p>
        <button type="button" class="cart-remove-btn">
            <ion-icon name="trash-outline"></ion-icon>
            <p>Clear Cart</p>
        </button>
    </div>

    <form class="w-100" action="" method="POST">
        <div class="main-cart">
            <div class="cart-product-img">
                <img src="assets/images/background/moringa-leaves.jpg" alt="">
            </div>
            <div class="cart-product-details">
                <h3>Product Category</h3>
                <h1>Product Name</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed ligula ut diam tincidunt
                    ullamcorper
                    ut at magna. Sed fermentum in est in elementum. </p>

                <h5>Quantity: 4</h5>
            </div>
            <div class="cart-product-price">
                <p>₹200</p>
            </div>
        </div>

        <div class="main-cart">
            <div class="cart-product-img">
                <img src="assets/images/background/moringa-leaves.jpg" alt="">
            </div>
            <div class="cart-product-details">
                <h3>Product Category</h3>
                <h1>Product Name</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed ligula ut diam tincidunt
                    ullamcorper
                    ut at magna. Sed fermentum in est in elementum. </p>
                <h5>Quantity: 4</h5>
            </div>



            <div class="cart-product-price">
                <p>₹200</p>
            </div>
        </div>

        <div class="final-section mt-4">
            <div class="col-md-6 m-1 pricing-tab">
                <div class="inner-headings">
                    <div class="user-details">
                        <p id="user-details-heading">Customer Name</p>
                        <p>Item Price</p>
                    </div>

                    <div class="user-details">
                        <p id="user-details-heading">Contact</p>
                        <p>Item Price</p>
                    </div>
                </div>

                <div class="user-details">
                    <p id="user-details-heading">State</p>
                    <p>Item Price</p>
                </div>

                <div class="user-details">
                    <p id="user-details-heading">City</p>
                    <p>Item Price</p>
                </div>

                <div class="user-details">
                    <p id="user-details-heading">Address</p>
                    <p>Item Price</p>
                </div>

                <a href="checkout" type="submit" name="edit" class="checkout-btn">Edit</a>
            </div>
            <div class="col-md-6 m-1 pricing-tab">
                <div class="inner-headings">
                    <p id="heading">Subtotal</p>
                    <p>Item Price</p>
                </div>

                <div class="inner-headings">
                    <p id="heading">Shipping</p>
                    <p>Delivery Fee</p>
                </div>

                <div class="inner-headings">
                    <p id="heading">Grand Total</p>
                    <p>Delivey Fee + Item Price</p>
                </div>
                <!-- Use this button when developing the functionality -->
                <!-- <button type="submit" name="" class="checkout-btn">Proceed to Checkout</button> -->
                <a href="checkout" type="submit" name="" class="checkout-btn">Proceed to Checkout</a>
            </div>
        </div>
    </form>

    <div>

    </div>
</div>