<?php include('config/config.php'); ?>
<!DOCTYPE html>
<html>
  <head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- <script src="script.js"></script> -->
    <script src="<?=DEFAULT_URL?>/assets/js/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="<?=DEFAULT_URL?>/assets/css/style.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body style="background-color: grey;">
  <header>
  </header>
  <main>
    <script>
     function Export2Word(element, filename = ''){
        // Wrap the HTML content in a Word document template
        const preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
        const postHtml = "</body></html>";
        const html = preHtml + document.getElementById(element).innerHTML + postHtml;

        // Create a Blob object from the HTML content
        const blob = new Blob(['\ufeff', html], { type: 'application/msword' });

        // Create a URL that references the Blob data
        const url = URL.createObjectURL(blob);

        // Set the file name
        filename = filename ? filename + '.doc' : 'document.doc';

        // Create a download link element
        const downloadLink = document.createElement('a');

        // Set the link's attributes
        downloadLink.href = url;
        downloadLink.target = '_blank';
        downloadLink.download = filename;
        // Trigger a click event on the download link to open the document in a new tab
        downloadLink.click();
        // Release the resources associated with the URL object
        URL.revokeObjectURL(url);
  
  }
</script>

<html>
<head>

</head>
<body>
<div class="container" style="background-color: #2b2a2af5;">
<h3 class="text-center" style="color:white">PHP with ChatGPT</h3>
<div class="messaging">
  <div class="inbox_msg">
        <!-- <div class="mesgs"> -->
          <div class="container mt-4">
          <a href="javascript:void(0);" target="_blank" style="margin-left: 885px; margin-bottom: 24px;" class="btn btn-warning text-end" onclick="Export2Word('chat-history','chat_log' );">Export as Word</a>
          <div class="msg_history">
            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
            <div class="received_msg">
              <div class="received_withd_msg">
                <p  id="chat-history" style="width:940px;"></p>
                <span class="time_date" style="color:white"><?php echo date("F j, Y, g:i a"); ?> </span></div>
            </div>
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
            <form id="chat-form">
              <input style="color: #f0ecec;" type="text" class="write_msg" name="MESSAGE" id="MESSAGE" placeholder="Type a message" />
              <button class="msg_send_btn" type="submit">Generete</button>
            </form>
            </div>
          </div>
        </div>
      </div>
      <p class="text-center top_spac" style="color:white"> Design by <a target="_blank" href="">Shah Khurram</a></p>
    </div></div>
    </body>
    </html>

<script>
  $(document).ready(function() {
    // when the form is submitted
    $('#chat-form').submit(function(event) {
      alert();
      // prevent the form from refreshing the page
      event.preventDefault();
      // get the user input
      var message = $('#MESSAGE').val();
      // send the user input to the server using AJAX
      $.ajax({
        type: 'POST',
        url: '<?=DEFAULT_URL?>/action.php',
        data: {
          message: message
        },
        success: function(response) {
          // display the response
          // $('#chat-history').append('<p>' + response + '</p>');
          typewriter(response,message);
        }
      });
      // clear the input field
      $('#MESSAGE').val('');
    });
    
  function typewriter(message,qst) {
    var i = 0;
    var speed = 10;
    var chatHistory = $('#chat-history');
    chatHistory.append(qst);
    chatHistory.append('<p style="margin-left:25px;">');
    // add each character of the message with a delay
    var typeLoop = setInterval(function() {
      chatHistory.children('p').last().append(message.charAt(i));
      i++;
      // stop the loop when the message is fully displayed
      if (i > message.length) {
        clearInterval(typeLoop);
      }
    }, speed);

    chatHistory.append('</p>');
  }
  });
</script>

</body>
</html>
