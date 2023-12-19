<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    

    <style>
  df-messenger {
   --df-messenger-bot-message: #006a4d;
   --df-messenger-button-titlebar-color: #006a4d;
   --df-messenger-chat-background-color: #fafafa;
   --df-messenger-font-color: white;
   --df-messenger-send-icon:#363635;
   --df-messenger-user-message: #8f8e8e;
  }

 
</style>
   
  </head>
  <body>


  <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
  <script src="public/js/chatbot.js"></script>

  <df-messenger style="background-color: #006a4d;"
    intent="WELCOME"
    chat-title="Carmel-Calfornia"
    agent-id="dc2cb33c-d133-4d66-819f-90102af7268c"
    language-code="en"
    chat-icon="https://drive.google.com/uc?export=download&id=1QyX4BQOcsvs34wmwZ5xIOSzRJUSvMDo_"></df-messenger>

  </body>
</html>
