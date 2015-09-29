//sum function 
function sum() {
            var price = document.getElementById('price').value;
            var unitprice = document.getElementById('unitprice').value;
            var result = parseFloat(price).toFixed(2) - parseFloat(unitprice).toFixed(2);
            if (!isNaN(result)) {
                document.getElementById('profit').value = result.toFixed(2);
            }
			
			var quantity = document.getElementById('qty').value;
            var result = parseInt(quantity);
            if (!isNaN(result)) {
                document.getElementById('qtysold').value = result;				
            }	
        }
