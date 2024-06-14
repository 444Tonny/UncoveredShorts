<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Tonny Andriambololona">
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Uncovered Shorts : The goal of the game is to get the highest score possible. You will be presented with four questions, which will be of two question types 'Unique' and 'Ranked'">


 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Uncovered Shorts - Terms of services</title>

    <!-- Open Graph meta tags -->
    <meta property="og:title" content="Uncovered Shorts">
    <meta property="og:description" content="Uncovered Shorts : The goal of the game is to get the highest score possible. You will be presented with four questions, which will be of two question types 'Unique' and 'Ranked'">
    <meta property="og:image" content="{{ asset('img/square-logo.png') }}">
    <meta property="og:url" content="https://www.uncoveredshorts.com">
    
    <!-- Twitter Card meta tags -->
    <meta name="twitter:card" content="uncovered_shorts_image">
    <meta name="twitter:title" content="Uncovered Shorts">
    <meta name="twitter:description" content="Uncovered Shorts : The goal of the game is to get the highest score possible. You will be presented with four questions, which will be of two question types 'Unique' and 'Ranked' ">
    

    <link rel="stylesheet" href="{{ asset('css/header.css') }}?t=1">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/game.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/extra.css') }}?t={{ time() }}">

    <!-- Fonts -->
    <link href="https://fonts.cdnfonts.com/css/switzer" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
  </head>

  <body>
    <main class='terms-of-services'>
      <span class='back'><a href="{{ route('index') }}">← Back to the game</a></span>
      &nbsp;
      <br>
      <h1>Terms of services</h1>
    
        <h2>Welcome to Uncovered Shorts</h2>
    
        <p>These <strong>Terms of Service</strong> ("Terms") govern your use of the Uncovered Shorts website and mobile application (collectively referred to as the "Service"). By accessing or using the Service, you agree to be bound by these Terms.</p>
    
        <h2>1. Acceptance of Terms</h2>

        <p>1.1. <strong>Agreement:</strong> By accessing or using the Service, you agree to abide by these Terms of Service.</p>

        <h2>2. Game Rules</h2>
    
        <p>2.1. <strong>Fair Play:</strong> All users agree to play the game fairly and to not engage in cheating, hacking, or any other unauthorized methods to gain an advantage.</p>
    
        <p>2.2. <strong>Respect:</strong> Users must respect other players and refrain from engaging in any form of harassment, abuse, or offensive behavior.</p>
    
        <h2>3. User Content</h2>
    
        <p>3.1. <strong>Ownership:</strong> Any content you submit or upload to the Service remains your property. However, by submitting content, you grant Uncovered Shorts a non-exclusive, worldwide, royalty-free license to use, reproduce, modify, adapt, publish, translate, create derivative works from, distribute, and display such content.</p>
    
        <p>3.2. <strong>Prohibited Content:</strong> You agree not to upload, post, or transmit any content that is unlawful, threatening, abusive, defamatory, obscene, or otherwise objectionable.</p>
    
        <h2>4. Modifications to the Service</h2>
    
        <p>4.1. <strong>Changes:</strong> Uncovered Shorts reserves the right to modify or discontinue, temporarily or permanently, the Service or any part of it with or without notice.</p>
    
        <p>4.2. <strong>Updates to Terms:</strong> We may revise these Terms from time to time. The most current version will always be available on our website. By continuing to access or use the Service after revisions become effective, you agree to be bound by the revised Terms.</p>
    
        <h2>5. Limitation of Liability</h2>
    
        <p>5.1. <strong>Disclaimer:</strong> To the fullest extent permitted by law, Uncovered Shorts and its affiliates, officers, employees, agents, suppliers, and licensors shall not be liable for any indirect, incidental, special, consequential, or punitive damages, or any loss of profits or revenues, whether incurred directly or indirectly, or any loss of data, use, goodwill, or other intangible losses, resulting from (i) your access to or use of or inability to access or use the Service; (ii) any conduct or content of any third party on the Service; or (iii) unauthorized access, use, or alteration of your transmissions or content, whether based on warranty, contract, tort (including negligence), or any other legal theory, whether or not we have been informed of the possibility of such damage, and even if a remedy set forth herein is found to have failed of its essential purpose.</p>
    
        <h2>6. Governing Law</h2>
    
        <p>6.1. <strong>Jurisdiction:</strong> These Terms shall be governed by and construed in accordance with the laws of the United States, without regard to its conflict of law provisions.</p>
    
        <h2>7. Contact Us</h2>
    
        <p>7.1. <strong>Questions:</strong> If you have any questions about these Terms, please contact us at <a href='mailto:tucker@uncoveredshorts.com'>tucker@uncoveredshorts.com</a></p>
    
        <p>By using Uncovered Shorts, you agree to abide by these <strong>Terms of Service</strong>. Enjoy the game and good luck!</p>

        <br>
        &nbsp;

        <a href="{{ route('index') }}" class="play"><b style='font-weight:900;'>PLAY</b></a>
  </body>

</html>
