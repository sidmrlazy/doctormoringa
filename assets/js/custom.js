//Get the button:
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

// Function to Increase and Decrease Value
function increaseValue() {
  var value = parseInt(document.getElementById("number").value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById("number").value = value;
}

function decreaseValue() {
  var value = parseInt(document.getElementById("number").value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? (value = 1) : "";
  value--;
  document.getElementById("number").value = value;
}

function getUserCity() {
  var city = document.getElementById("userCity").value;
  var delivery = 0;

  if (city == "Lucknow" || city == "Lucknow District") {
    delivery = 80;
  } else {
    delivery = 100;
  }
  document.getElementById("cart_delivery_fee").value = delivery;
  document.getElementById("feeCalc").innerHTML = "₹" + delivery;

  var subTotal = document.getElementById("temp_subtotal").value;
  document.getElementById("temp_subtotal_result").innerHTML = "₹" + subTotal;

  var grandTotal = parseInt(subTotal) + parseInt(delivery);
  document.getElementById("grandTotalShow").innerHTML = "₹" + grandTotal;
  document.getElementById("grandTotal").value = grandTotal;
}

function showPasswordField() {
  var getValue = document.getElementById("accountCheck").checked;

  if (getValue == true) {
    document.getElementById("passField").style.display = "block";
  } else if (getValue == false) {
    document.getElementById("passField").style.display = "none";
  }
}

// Fetching Sub-total on page load and displaying to user

// Function to calculate delivery fee and grand total
function getFee() {
  var city = document.getElementById("user_city").value;
  var deliveryFee = 0;
  if (city == "Lucknow" || city == "Lucknow District") {
    var deliveryFee = 80;
  } else if (city != "Lucknow" || city != "Lucknow District") {
    var deliveryFee = 100;
  }
  document.getElementById("delivery_chearge").innerHTML = "₹" + deliveryFee;

  var grossTotal = document.getElementById("all_total_price").value;

  // document.getElementById("gross_total").innerHTML =
  //   parseInt(deliveryFee) + parseInt(grossTotal);
}
