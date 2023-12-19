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
    <link rel="stylesheet" href="public/css/dashboard/styles.css">

    <style>
  df-messenger {
   --df-messenger-bot-message: #363635d5;
   --df-messenger-button-titlebar-color: #363635d5;
   --df-messenger-chat-background-color: #fafafa;
   --df-messenger-font-color: white;
   --df-messenger-send-icon:#363635;
   --df-messenger-user-message: #8f8e8e;
  }

  .chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  box-shadow: 0 0 0 10000px rgba(0, 0, 0, 0.568);
  z-index: 1000;
  background:#006a4d;
}




.chat-pop{


padding: 5px 0 5px 20px;
overflow-x: hidden;
border-top: solid 1px rgba(228, 228, 228, 0.897);
border-bottom: solid 1px rgba(228, 228, 228, 0.897);

}

.chat-pop .side-btn2{

margin-left:160px;
}

</style>
   
  </head>
  <body>


  <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
  <script src="public/js/chatbot.js"></script>

  <df-messenger
    intent="WELCOME"
    chat-title="Carmel-Calfornia"
    agent-id="dc2cb33c-d133-4d66-819f-90102af7268c"
    language-code="en"
    chat-icon="https://drive.google.com/uc?export=download&id=1QyX4BQOcsvs34wmwZ5xIOSzRJUSvMDo_"></df-messenger>

  </body>
</html>
