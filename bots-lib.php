<?php

function cdl_get_user($link, $chat_id)  {

    $query = sprintf("SELECT * from cdl_bot_users WHERE chat_id=%d", (int)$chat_id);
    $result = mysqli_query($link, $query);

    if (!$result)
      die(mysqli_error($link));
    $cdl_get_user = mysqli_fetch_assoc($result);

    return $cdl_get_user;
  }

function cdl_add_user($link, $username, $chat_id, $name, $old_id){
      $username = trim($username);
      $chat_id = trim($chat_id);
      $name = trim($name);


      if ($chat_id == $old_id)
          return false;
    
      $t = "INSERT INTO cdl_bot_users (username, chat_id, name) VALUES ('%s', '%s', '%s')";

      $query = sprintf($t, mysqli_real_escape_string($link, $username),
                                                      mysqli_real_escape_string($link, $chat_id),
                                                    mysqli_real_escape_string($link, $name));

      
      $result = mysqli_query($link, $query);

      if (!$result)
          die(mysqli_error($link));
      return true;
  }

function cdl_bot_textlog($link, $chat_id, $username, $text){
   
    if ($chat_id == '')
        return false;
    
    $t = "INSERT INTO cdl_bot_textlog (chat_id, username, text) VALUES ('%s', '%s', '%s')";

    $query = sprintf($t, mysqli_real_escape_string($link, $chat_id),
                                                  mysqli_real_escape_string($link, $username),
                                                  mysqli_real_escape_string($link, $text));

    
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));
  return true;
}
