<body>
    @extends('admin.layout')

    @section('content')

      <main id="pgmain">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/form444.css') }}?t={{ time() }}">

        <h2>SEND EMAIL TO SUBSCRIBERS</h2>
        
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
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!---------------------->
        
        <div class="content444">
            <form class='form444' action="{{route('subscribers.sendEmail')}}" method='POST'>
                @csrf

                <label>Subject</label>
                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required>
                
                <label>Message</label>
                <textarea id="summernote" name="message">{{ old('message') }}</textarea>

                <label>Sending date and time</label>
                <input type="datetime-local" name="sending_date" id="sending_date" value="{{ old('sending_date') }}" style='width:200px;'>
    
                <span class="space444-30"></span>

                <input type="submit" value="SEND">
            </form>  

            <span class="space444-30"></span>
            <span class="space444-30"></span>

            <h3>PENDING EMAILS</h3>
            
            @if($emails->isEmpty())
                <p class='sub-empty'>No emails pending.</p>
            @else
                <table class="sub-table table">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Sending date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($emails as $email)
                        <tr>
                            <td>{{ $email->subject }}</td>
                            <td>{{ $email->sending_date }}</td>
                            <td>{{ $email->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
        

        <script>
            $(document).ready(function() {
                $('#summernote').summernote();
            });
        </script>

      <!-- ... -->
      </main>

    @endsection
</body>

