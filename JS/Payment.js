function validateForm()
{
    var name = document.getElementById("name").value;
    var cardNumber = document.getElementById("card_number").value;
    var expiryDate = document.getElementById("expiry_date").value;
    var cvv = document.getElementById("cvv").value;
    var amount = document.getElementById("amount").value;

    if (name == "" || cardNumber == "" || expiryDate == "" || cvv == "" || amount == "") 
    {
		alert("Please fill out all the required fields.");
        return false;
    }
}

  
 