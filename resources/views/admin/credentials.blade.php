<body>
    @extends('admin.layout')

    @section('content')

      <main id="pgmain">
        <h2>UPDATE ADMIN PASSWORD</h2>
        @if(session('success'))
            <p class='message-success'>{{ session('success') }}</p>
        @endif

        @if(session('error'))
            <p class='message-error'>{{ session('error') }}</p>
        @endif

        <form method="POST" action="" id='credentials'>
          @csrf
          @method('PUT')
          
          <label class='labcredentials' for="current_password">Email:</label>
          <input class='inputcredentials' type="text" value="tucker.dona@gmail.com" style='background-color:#f0f0f0;' readonly disabled>

          <label class='labcredentials' for="current_password">Current Password:</label>
          <input class='inputcredentials' type="password" name="current_password" required>
          @error('current_password')
              <p style="color: red;">{{ $message }}</p>
          @enderror
          <br>
          <label class='labcredentials' for="new_password">New Password:</label>
          <input class='inputcredentials' type="password" name="new_password" required>
          @error('new_password')
              <p style="color: red;">{{ $message }}</p>
          @enderror
          <br>
          <label class='labcredentials' for="confirm_password">Confirm Password:</label>
          <input class='inputcredentials' type="password" name="confirm_password" required>
          @error('confirm_password')
              <p style="color: red;">{{ $message }}</p>
          @enderror
          <br>
          <button class='btncredentials' type="submit">Update</button>
        </form>
      <!-- ... -->
      </main>

    @endsection
</body>

