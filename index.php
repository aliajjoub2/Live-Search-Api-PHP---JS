<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<div >
	<input type="text" id="search" placeholder="Search ..." autocomplete="off"/>

	<div id="search_word"> </div>

</div>
<script>

		let search = document.getElementById("search");
		search.oninput = ()=>{
			let searchVaue = document.getElementById("search").value;
			if(searchVaue.length >=1){

				fetch("search_read.php",{
				method: 'POST' ,
				body : JSON.stringify({value:searchVaue}) 
			}).then(response => response.json()).then(data=>{
				let word = document.getElementById("word");
				let example = document.getElementById("example");
				search_word.innerHTML ='';
				//example.innerHTML ='';
				data.forEach(element => {
					search_word.innerHTML +='<a href="word_details.php?word='+element.word_english+ '">' +element.word_english + '</a> <br> <a href="#">Example: '+element.word_example + '</a> <br> <a href="#">Definition: '+element.word_example + '</a> <br>'; 
					//example.innerHTML +='<a href="#">' +element.word_example + '</a> <br>'; 
				});
			//   console.log(data);  
			})
			}
		};
</script>
		
		

</body>
</html>
       
