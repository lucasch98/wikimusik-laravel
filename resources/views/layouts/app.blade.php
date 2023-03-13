<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <link rel="icon" href="Imagenes/iconoPagina.ico">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" ><!--type="text/css"-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">        <!-- Estilo navbar-->
        

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">                               <!-- Estilo cuadro-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">     <!-- Estilo cuadro-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">                      <!-- Estilo cuadro-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  <!-- Estilo cuadro-->
        

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>                                         <!-- Script navbar-->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>                <!-- Script navbar-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>              <!-- Script navbar-->
        <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 2000);


        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }


//Funcionalidad para el explorador de archivos (imagenes)
            $(document).on('change', '.file-input', function() {
            var filesCount = $(this)[0].files.length;
            var textbox = $(this).prev();

            if (filesCount === 1) {
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
            } else {
            textbox.text(filesCount + ' files selected');
            }

            if (typeof (FileReader) != "undefined") {
            var dvPreview = $("#divImageMediaPreview");
            dvPreview.html("");
            $($(this)[0].files).each(function () {
            var file = $(this);
            var reader = new FileReader();
            reader.onload = function (e) {
            var img = $("<img />");
            img.attr("style", "width: 150px; padding: 10px");
            img.attr("src", e.target.result);
            dvPreview.append(img);
            }
            reader.readAsDataURL(file[0]);
            });
            } else {
            alert("This browser does not support HTML5 FileReader.");
            }
            });



        </script>

    </head>
    <body class="font-sans antialiased">
            @include('navigation1')
       
            <section id="contenido">
                @yield('contenido')
            </section>
    </body>
</html>
