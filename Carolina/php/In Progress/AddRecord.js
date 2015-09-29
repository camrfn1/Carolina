//find browser type
function getXMLHttp()
{
  var xmlHttp

  try
  {
    //Firefox, Opera 8.0+, Safari
    xmlHttp = new XMLHttpRequest();
  }
  catch(e)
  {
    //Internet Explorer
    try
    {
      xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch(e)
    {
      try
      {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch(e)
      {
        alert("Your browser does not support AJAX!")
        return false;
      }
    }
  }
  return xmlHttp;
}
//call to php file to perform insert
function AjaxinsertCall(url)
{
	var xmlHttp = getXMLHttp();
	
	xmlHttp.onreadystatechange = function()
	{
		if(xmlHttp.readyState == 4)
		{
			HandleResponse(xmlHttp.responseText);
		}
	}

	xmlHttp.open("GET", url, true); 
	xmlHttp.send();
}
//onclick action of add records button 
//generates 3 strings
//insertAppendQuery creates the string to append to the insert statement in insertQuery.php in the form ('value','value'), ('value','value')
//successfulInsertMessage creates a table in the form of a string to display all the records inserted into the database
//url is the string used for the ajax call in function it uses insertAppendQuery and successfulInsertMessage as GET variables
function getInsertInput()
{
	var i=0;
	var s=document.getElementById("tableSelect");
	var selectedTable=s.options[s.selectedIndex].value;
	var key=" ";
	

	var rowCount=document.getElementById("count").value;
	rowCount=parseInt(rowCount);
	var x=document.getElementsByName("insertField[]");
	for(var i=1;i<x.length; i++)
	{
		key=key+","+x[i].value;
	}
	
	var url="php/insertQuery.php/?rowArray="+key+"&totalInserts="+rowCount+"&tableSelect="+selectedTable;
	AjaxinsertCall(url);
}

//after inputing the number of records to add this function checks if the number entered is <10, if not sets the field to 10
//calls the function inputFieldGenerator() to prepare the number of additional inputs to display and stores the string in displayInputs
//then calls addInsertFieldsToPage and adds the input texts to the column insertFields
//sets the numRec input field to hidden to prevent changes
function addFields()
{
	
	var numFields=document.getElementById("numRec").value;
	//allow no more than 10 records
	if(numFields>10)
		{
			numFields=10;
		}
	
	var s=document.getElementById("tableSelect");
	
	var table=s.options[s.selectedIndex].text;

	var head=getHeader(table);
	
	var row=getRow(table, numFields);
	
	//var displayInputs=inputFieldGenerator(numFields, row);
	
	displayInputs=head+row;
	
	addInsertFieldsToPage(displayInputs);
	document.getElementById("main").style.visibility ="hidden";

}

//generate table head for insert
function getHeader(selectedTable)
{
	var tabletop="<table><tr><th>";
	var tablehead={
	
		"Add User":["Id</th><th>firstname</th><th>Lastname</th><th>username</th><th>password</th></tr>"],
	
		"Add Products":["ProductId</th><th>product_name</th><th>brand_name</th><th>product_category</th><th>unit_price</th><th>price</th><th>profit</th><th>vendor</th><th>qty</th><th>qty_sold</th><th>expiration</th><th>arrival</th></tr>"],
	
		"Add Vendor":["vendor_id</th><th>vendor_name</th><th>vendor_address</th><th>vendor_city</th><th>vendor_zipcode</th><th>vendor_contact</th><th>vendor_number</th><th>comment</th></tr>"],
	
		"Record Sale":["transaction_id</th><th>invoice_number</th><th>date</th><th>amount</th><th>profit</th><th>amount_due</th></tr>"],
	
		"Record Order":["transaction_id</th><th>invoice</th><th>product_id</th><th>qty</th><th>amount</th><th>profit</th><th>product_name</th><th>brand_name</th><th>name</th><th>price</th><th>date</th></tr>"]
	};

	tabletop=tabletop+tablehead[selectedTable];
	return tabletop;
	
}

//generate row for each insert
function getRow(selectedTable, numFields)
{
	var row="";
	var tableRow={
		"Add User":[4],
		"Add Products":[11],
		"Add Vendor":[7],
		"Record Sale":[5],
		"Record Order":[10]
	}
	var rowCount=parseInt(tableRow[selectedTable]);
	var temp;
	var startIndex=parseInt(0);
	
	for(var i=0; i<numFields; i++)
	{
		temp=generaterow(rowCount, startIndex);
		row=row+temp;
		startIndex=parseInt(startIndex+rowCount+1);
	
	}
	row=row+"<input type=\"hidden\" id=\"count\" value=\" "+numFields+" \"/><tr><td><input type=\"submit\" value=\"Add Records\" onclick=\"getInsertInput()\"/></td></tr></table>";
	return row;
}


function generaterow(rowCount, startIndex)
{
	var inputStart="<tr><td>-<input type=\"hidden\" name=\"insertField[]\" value=\" \"/></td>";
	startIndex++;
	for(var i=0; i<rowCount; i++)
	{
		inputStart=inputStart+"<td><input type=\"text\" name=\"insertField[]\"/></td>";
		startIndex++;
	}
	inputStart=inputStart+"</tr>";
	return inputStart;	
}
	
//adds the table of inputs to the column insert fields
function addInsertFieldsToPage(DisplayInputs)
{
	document.getElementById("insertFields").innerHTML = DisplayInputs;	
}

//display success or failure of insert
//sets the number of records to be inserted to 0
//calls the add fields to clear the input boxes
//redisplays numRec to add additional inserts
function HandleResponse(response)
{
  document.getElementById("status").innerHTML = response;
  document.getElementById("numRec").value=0;
  addFields();
  document.getElementById("main").style.visibility ="visible";

  
}