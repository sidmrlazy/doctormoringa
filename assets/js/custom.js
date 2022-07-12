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

// Calculate Delivery Fee According to City
function getDeliveryFee() {
  var getCity = document.getElementById("user_city").value;
  if (getCity === "Lucknow" || getCity === "Lucknow District") {
    var fee = "₹" + 80;
  } else if (getCity !== "Lucknow" || getCity !== "Lucknow District") {
    var fee = "₹" + 100;
  } else {
    var fee = "Please select delivery city";
  }
  document.getElementById("deliveryFee").innerHTML = fee;
}
