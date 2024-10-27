<html>
    <body>
        @extends('admin.layout')

        @section('content')
        
        <main id="pgmain">
            <h2>SUBSCRIBERS LIST</h2>

            <!------ Messages ------>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!---------------------->

            <div class="admin-content">
                <div class="row">
                    <a href="{{ route('subscribers.writeEmail') }}" class="primary-btn my-btn create"><b>+</b> Schedule a new email</a>
                    
                    <button style="width:150px;margin-left:10px;" onclick="copySelection()">Copy Selection</button>
                </div>
    
                @if($subscribers->isEmpty())
                <p class='sub-empty'>No subscribers found.</p>
                @else
                    <table class="sub-table table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Email</th>
                                <th>Subscribed at</th>
                                <th style="text-align:center;">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="17" height="17" viewBox="0 0 256 256" xml:space="preserve">
                                    <defs>
                                    </defs>
                                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                        <path d="M 76.777 2.881 H 57.333 V 2.412 C 57.333 1.08 56.253 0 54.921 0 H 35.079 c -1.332 0 -2.412 1.08 -2.412 2.412 v 0.469 H 13.223 c -1.332 0 -2.412 1.08 -2.412 2.412 v 9.526 c 0 1.332 1.08 2.412 2.412 2.412 h 63.554 c 1.332 0 2.412 -1.08 2.412 -2.412 V 5.293 C 79.189 3.961 78.109 2.881 76.777 2.881 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        <path d="M 73.153 22.119 H 16.847 c -1.332 0 -2.412 1.08 -2.412 2.412 v 63.057 c 0 1.332 1.08 2.412 2.412 2.412 h 56.306 c 1.332 0 2.412 -1.08 2.412 -2.412 V 24.531 C 75.565 23.199 74.485 22.119 73.153 22.119 z M 33.543 81.32 c 0 1.332 -1.08 2.412 -2.412 2.412 h -2.245 c -1.332 0 -2.412 -1.08 -2.412 -2.412 V 30.799 c 0 -1.332 1.08 -2.412 2.412 -2.412 h 2.245 c 1.332 0 2.412 1.08 2.412 2.412 V 81.32 z M 48.535 81.32 c 0 1.332 -1.08 2.412 -2.412 2.412 h -2.245 c -1.332 0 -2.412 -1.08 -2.412 -2.412 V 30.799 c 0 -1.332 1.08 -2.412 2.412 -2.412 h 2.245 c 1.332 0 2.412 1.08 2.412 2.412 V 81.32 z M 63.526 81.32 c 0 1.332 -1.08 2.412 -2.412 2.412 h -2.245 c -1.332 0 -2.412 -1.08 -2.412 -2.412 V 30.799 c 0 -1.332 1.08 -2.412 2.412 -2.412 h 2.245 c 1.332 0 2.412 1.08 2.412 2.412 V 81.32 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    </g>
                                    </svg>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subscribers as $subscriber)
                                <tr>
                                    <td><input name='sub-selection' type="checkbox" value='{{ $subscriber->email }}' id="sub-checkbox-{{ $subscriber->id }}"></td>
                                    <td style='width:50%;'>
                                        {{ $subscriber->email }}
                                    </td>
                                    <td>{!! date('F j, Y', strtotime($subscriber->created_at)) !!}</td>
                                    <td style="text-align:center;">  
                                        <a href="{{ route('subscribers.unsubscribe', ['email' => $subscriber->email]) }}" onclick="return confirmUnsubscribe(this);">Delete</a> 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
    
                    <script>
                        function confirmUnsubscribe(element) {
                            if (confirm("Are you sure you want to unsubscribe this person?")) {
                                window.location.href = element.href;
                            }
                            return false;
                        }
                    </script>
                @endif
            </div>
        </main>
        
        @endsection

        <div id="selectedEmails"></div>

        <script>
            function copySelection() {
                // Sélectionne toutes les cases cochées
                const checkboxes = document.querySelectorAll('input[name="sub-selection"]:checked');
                
                // Récupère les valeurs (e-mails) et les met au format souhaité
                const emails = Array.from(checkboxes).map(cb => cb.value).join(', ');
                
                // Copie les e-mails dans le presse-papiers
                navigator.clipboard.writeText(emails).then(() => {
                    alert("Selected emails have been copied!");
                }).catch(err => {
                    console.error('Échec de la copie : ', err);
                });
            }

            document.addEventListener('DOMContentLoaded', function () {
                const copyIcons = document.querySelectorAll('.copy-icon');
        
                copyIcons.forEach(icon => {
                    icon.addEventListener('click', function () {
                        const email = this.getAttribute('data-email');
                        
                        // Créer un élément textarea pour copier le texte
                        const textarea = document.createElement('textarea');
                        textarea.value = email;
                        document.body.appendChild(textarea);
        
                        // Sélectionner et copier le texte
                        textarea.select();
                        document.execCommand('copy');
        
                        // Supprimer l'élément textarea après la copie
                        document.body.removeChild(textarea);
                    });
                });
            });
        </script>
    </body>
</html>