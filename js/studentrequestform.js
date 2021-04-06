function onFormSubmit(){

	var formData= readFormData();

}

	function ReadFormData(){
		var formData ={};
		formData["studentid"] =document.getElementByID("student-id").value;
		formData["firstname"] =document.getElementByID("first-name").value;
		formData["lastname"] =document.getElementByID("last-name").value;
		formData["email"] =document.getElementByID("email").value;
		formData["pass"] =document.getElementByID("pass").value;
		formData["department"] =document.getElementByID("department").value;
		formData["course"] =document.getElementByID("course").value;
		formData["year"] =document.getElementByID("year").value;

		return formData;
	}

function insertNewRecord(data){
	
}
