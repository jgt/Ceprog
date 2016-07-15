<script>
	
	
	Dropzone.options.myDropzone = {

		autoProcessQueue: false,
		uploadMultiple: true,
		maxFilesize: 900,
		maxFiles: 5,
		parallelUploads: 5,	
		acceptedFiles: ".docx, .pdf, .mp4, .mp3, .flv",
		addRemoveLinks: true,

		init: function(){

			var submitButton = document.querySelector("#submit-all")
			myDropzone = this;

			submitButton.addEventListener("click", function(e){

				e.preventDefault();
				e.stopPropagation();

				$form = $(this);
				var id = $('#videoUni').val();
				var form = $('#my-dropzone');
				var link = form.attr('action');
				var metodo = form.attr('method');
				var route = link.split('%7Bid%7D').join(id);


				var formdata = new FormData($form[0]);

				var request = new XMLHttpRequest();

				request.open(metodo, route);
				request.send(formdata);

			});

			this.on("sendingmultiple", function(){

				alert('el archivo se esta enviando');

			});

			this.on("successmultiple", function(file){

				alert('el archivo se ha enviado exitosamente');

			});

			this.on("addedfile", function(file){

				alert("se agrego un archivo");

			});

			this.on("complete", function(file){

				myDropzone.removeFile(file);

			});

			this.on("errormultiple", function(){

				alert("el archivo no puedo subirse por favor intentelo de nuevo");

			});
		}
	}

		

</script>